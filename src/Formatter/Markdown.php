<?php

/**
 * Markdown formatter class.
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */

namespace WP_Plugin_Uninstall_Scanner\Formatter;

use WP_Plugin_Uninstall_Scanner\Collector;

/**
 * Formats the list of discovered uninstallable elements with markdown.
 *
 * @package WP_Plugin_Uninstall_Scanner\Formatter
 * @since   0.1.0
 */
class Markdown implements Formatter {

	/**
	 * @since 0.1.0
	 */
	public function format( Collector $collector ) {

		$output = '';

		$results = [];

		foreach ( $collector->get() as $element ) {
			$results[ $element['type'] ][ $element['item'] ] = $element['item'];
		}

		ksort( $results );

		foreach ( $results as $type => $items ) {

			$type = str_replace( '_', ' ', $type );
			$type = ucwords( $type );

			if ( substr( $type, -4 ) !== 'Meta' ) {
				$type .= 's';
			}

			$output .= "# {$type}\n\n";

			ksort( $items );

			$items = array_unique( $items );

			foreach ( $items as $item ) {
				$output .= "- `{$item}`\n";
			}

			$output .= "\n";
		}

		return $output;
	}
}

// EOF
