<?php

/**
 * .
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */

namespace WP_Plugin_Uninstall_Scanner\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;
use WP_Plugin_Uninstall_Scanner\Config;
use WP_Plugin_Uninstall_Scanner\Scanner;

/**
 * Class Run
 *
 * @package WP_Plugin_Uninstall_Scanner\Console
 * @since   0.1.0
 */
class Run extends Command {

	/**
	 * @since 0.1.0
	 */
	protected function configure() {

		$this
			->setName( 'run' )
			->setDescription( 'Run the scanner' )
			->addArgument(
				'path'
				, InputArgument::OPTIONAL
				, 'The file or directory to scan. Defaults to the current working directory'
			)
			->addOption(
				'bootstrap'
				, 'b'
				, InputOption::VALUE_REQUIRED
				, 'If set, the given bootstrap file will be loaded to supply custom configuration'
			)
		;
	}

	/**
	 * @since 0.1.0
	 */
	protected function execute( InputInterface $input, OutputInterface $output ) {

		$path = $input->getArgument( 'path' );

		if ( ! $path ) {
			$path = getcwd();
		}

		$config = new Config;
		$logger = new ConsoleLogger( $output );
		$scanner = new Scanner( $config, $logger );

		$collector = $scanner->scan( $path );
//
//		$processor = new Processor( $collector );
//		$processor->process();


//		$results = $this->collector->get();
//		$functions = $this->config->get_functions();
//
//		foreach ( $results as $result ) {
//
//			/** @var \PhpParser\Node $node */
//			$node = $result['node'];
//			$node->getLine();
//
//			$output->writeln(  );
//		}
	}
}

// EOF
