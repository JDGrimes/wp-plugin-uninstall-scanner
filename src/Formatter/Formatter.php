<?php

/**
 * Formatter interface.
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */

namespace WP_Plugin_Uninstall_Scanner\Formatter;

use WP_Plugin_Uninstall_Scanner\Collector;

/**
 * Interface for output formatters.
 *
 * @package WP_Plugin_Uninstall_Scanner\Formatter
 * @since   0.1.0
 */
interface Formatter {

	/**
	 * Set the path being scanned.
	 *
	 * @since 0.1.0
	 *
	 * @param string $path The full path being scanned.
	 */
	public function setPath( $path );

	/**
	 * Formats the list of uninstallable elements.
	 *
	 * @since 0.1.0
	 *
	 * @param Collector $collector The collection of uninstallable elements.
	 *
	 * @return string The formatted output.
	 */
	public function format( Collector $collector );
}

// EOF
