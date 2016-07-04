<?php

/**
 * .
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */

namespace WP_Plugin_Uninstall_Scanner;

use PhpParser\Error;
use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;
use Psr\Log\LoggerInterface;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/**
 * Class Scanner
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */
class Scanner {

	/**
	 *
	 *
	 * @since 0.1.0
	 *
	 * @var \PhpParser\Parser
	 */
	protected $parser;

	/**
	 *
	 *
	 * @since 0.1.0
	 *
	 * @var \PhpParser\NodeTraverser
	 */
	protected $traverser;

	/**
	 *
	 *
	 * @since 0.1.0
	 *
	 * @var Collector
	 */
	protected $collector;

	/**
	 *
	 *
	 * @since 0.1.0
	 *
	 * @var Config
	 */
	protected $config;

	/**
	 *
	 *
	 * @since 0.1.0
	 *
	 * @var LoggerInterface
	 */
	protected $logger;

	public function __construct( Config $config, LoggerInterface $logger  ) {

		$this->config = $config;
		$this->logger = $logger;
		$this->parser = ( new ParserFactory )->create( ParserFactory::PREFER_PHP7 );
		$this->traverser = new NodeTraverser;
		$this->collector = new Collector;

		// Add visitors.
		$this->traverser->addVisitor(
			new NodeVisitor( $this->collector, $this->config )
		);
	}

	public function scan( $path ) {

		if ( is_file( $path ) ) {
			$this->scan_file( $path );
		} else {
			$this->scan_directory( $path );
		}

		return $this->collector;
	}

	protected function scan_file( $file_name ) {

		try {

			$this->logger->info( 'Scanning ' . $file_name );
			
			$code = file_get_contents( $file_name );

			$this->traverser->traverse( $this->parser->parse( $code ) );

		} catch ( Error $e ) {

			$this->logger->error( 'Parse Error: ' . $e->getMessage() );
		}
		
		foreach ( $this->collector->get() as $result ) {
			$this->logger->notice( $result['function'] . '(): ' . $result['item'] );
		}
		
		$this->collector->reset();
	}

	protected function scan_directory( $path ) {

		$directory = new RecursiveDirectoryIterator(
			$path
			, RecursiveDirectoryIterator::SKIP_DOTS
		);

		$iterator = new RecursiveIteratorIterator( $directory );

		foreach( $iterator as $file ) {
			if ( substr( $file, -4 ) === '.php' ) {
				$this->scan_file( $file );
			}
		}
	}
}

// EOF
