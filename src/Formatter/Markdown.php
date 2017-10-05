<?php

/**
 * Markdown formatter class.
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */

namespace WP_Plugin_Uninstall_Scanner\Formatter;

use PhpParser\Node;
use WP_Plugin_Uninstall_Scanner\Collector;

/**
 * Formats the list of discovered uninstallable elements with markdown.
 *
 * @package WP_Plugin_Uninstall_Scanner\Formatter
 * @since   0.1.0
 */
class Markdown implements Formatter {

	/**
	 * The path being scanned.
	 *
	 * @since 0.1.0
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * @since 0.1.0
	 */
	public function setPath( $path ) {
		$this->path = $path;
	}

	/**
	 * @since 0.1.0
	 */
	public function format( Collector $collector ) {

		$output = '';

		$results = [];

		foreach ( $collector->get() as $element ) {
			$results[ $element['type'] ][ $element['item'] ][] = $element;
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

			foreach ( $items as $item => $elements ) {

				$output .= "- `{$item}`\n";

				foreach ( $elements as $element ) {

					/** @var Node $node */
					$node = $element['node'];

					$output .= "  - `{$element['file']}:{$node->getLine()}` \n";
				}
			}

			$output .= "\n";
		}

		$output = str_replace( $this->path, '', $output );

		return $output;
	}
}

// EOF
