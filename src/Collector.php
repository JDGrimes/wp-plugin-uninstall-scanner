<?php

/**
 * .
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */

namespace WP_Plugin_Uninstall_Scanner;

use PhpParser\Node;

/**
 * Class Collector
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */
class Collector {

	protected $items = [];

	/**
	 *
	 *
	 * @since 0.1.0
	 *
	 * @param      $item
	 * @param      $function
	 * @param Node $node
	 */
	public function add( $item, $function, Node $node ) {
		$this->items[] = [
			'item' => $item,
			'function' => $function,
			'node' => $node
		];
	}

	public function get() {
		return $this->items;
	}

	public function reset() {
		$this->items = [];
	}
}

// EOF
