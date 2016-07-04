<?php

/**
 * .
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */

namespace WP_Plugin_Uninstall_Scanner;

/**
 * Class Processor
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */
class Processor {

	/**
	 *
	 *
	 * @since 0.1.0
	 *
	 * @var Collector
	 */
	private $collector;
	
	/**
	 *
	 *
	 * @since 0.1.0
	 *
	 * @var Config
	 */
	private $config;

	/**
	 *
	 *
	 * @since 0.1.0
	 *
	 * @var
	 */
	protected $handlers;

	public function __construct( Config $config, Collector $collector ) {

		$this->config = $config;
		$this->collector = $collector;
	}
	
	public function process() {
		
		$results = $this->collector->get();
		$functions = $this->config->get_functions();

		foreach ( $results as $result ) {
			
			

			if ( ! isset( $functions[ $result['function'] ] ) ) {
				continue;
			}
			
			$function_data = $functions[ $result['function'] ];
			
			if ( isset( $this->handlers[ $function_data['type'] ] ) ) {
				$this->handlers[ $function_data['type'] ]->add( $result );
			}
		}
	}
}

// EOF
