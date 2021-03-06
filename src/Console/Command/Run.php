<?php

/**
 * Run console command class.
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
use WP_Plugin_Uninstall_Scanner\Formatters;
use WP_Plugin_Uninstall_Scanner\Scanner;

/**
 * The run console command.
 *
 * @package WP_Plugin_Uninstall_Scanner\Console
 * @since   0.1.0
 */
class Run extends Command {

	/**
	 * The formatters to format the output.
	 *
	 * @since 0.1.0
	 *
	 * @var Formatters
	 */
	protected $formatters;

	/**
	 * Sets the formats.
	 *
	 * @since 0.1.0
	 *
	 * @param Formatters $formatters The formatters.
	 */
	public function setFormatters( Formatters $formatters ) {
		$this->formatters = $formatters;
	}

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
				'config'
				, 'c'
				, InputOption::VALUE_REQUIRED
				, 'If set, the given JSON config file will be parsed to supply custom configuration'
			)
			->addOption(
				'format'
				, 'f'
				, InputOption::VALUE_REQUIRED
				, 'The format for the output'
				, 'markdown'
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

		$format = $input->getOption( 'format' );

		$formatter = $this->formatters->get( $format );

		if ( ! $formatter ) {
			$output->writeln( "Error: unknown format '{$format}'" );
			return;
		}

		$formatter->setPath( $path );

		$config  = new Config;
		$logger  = new ConsoleLogger( $output );
		$scanner = new Scanner( $config, $logger );

		$collector = $scanner->scan( $path );

		$output->write( $formatter->format( $collector ) );
	}
}

// EOF
