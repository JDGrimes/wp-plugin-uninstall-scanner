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
	 * The full path to the file currently being scanned.
	 *
	 * @since 0.1.0
	 *
	 * @var string
	 */
	protected $file;

	/**
	 * Adds an item to the collection.
	 *
	 * @since 0.1.0
	 *
	 * @param string $type     The type of item.
	 * @param string $item     The item.
	 * @param string $function The function the item was parsed from.
	 * @param Node   $node     The node for the function.
	 */
	public function add( $type, $item, $function, Node $node ) {

		$this->items[] = [
			'item'     => $item,
			'type'     => $type,
			'function' => $function,
			'node'     => $node,
			'file'     => $this->file,
		];
	}

	public function get() {
		return $this->items;
	}

	public function reset() {
		$this->items = [];
	}

	/**
	 * Set the path to the file currently being parsed.
	 *
	 * @since 0.1.0
	 *
	 * @param string $file The full path to the file.
	 */
	public function setFile( $file ) {
		$this->file = $file;
	}
}

// EOF
