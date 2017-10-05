<?php

/**
 * Scanner class.
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
 * Scans a codebase for uninstallable elements.
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

	/**
	 * Scan a file or directory.
	 *
	 * @since 0.1.0
	 *
	 * @param string $path The full path of the file or directory to scan.
	 *
	 * @return Collector A collection of the results.
	 */
	public function scan( $path ) {

		if ( is_file( $path ) ) {
			$this->scan_file( $path );
		} else {
			$this->scan_directory( $path );
		}

		return $this->collector;
	}

	/**
	 * Scans a file.
	 *
	 * @since 0.1.0
	 *
	 * @param string $file The full path of the file to scan.
	 */
	protected function scan_file( $file ) {

		try {

			$this->logger->info( 'Scanning ' . $file );

			$code = file_get_contents( $file );

			$this->traverser->traverse( $this->parser->parse( $code ) );

		} catch ( Error $e ) {

			$this->logger->error( 'Parse Error: ' . $e->getMessage() );
		}
//
//		foreach ( $this->collector->get() as $result ) {
//			$this->logger->notice( $result['function'] . '(): ' . $result['item'] );
//		}
//
//		$this->collector->reset();
	}

	/**
	 * Scans a directory.
	 *
	 * @since 0.1.0
	 *
	 * @param string $path The full path of the directory to scan.
	 */
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
