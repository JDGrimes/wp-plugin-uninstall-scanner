<?php

/**
 * PHPUnit testcase class.
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */

namespace WP_Plugin_Uninstall_Scanner\PHPUnit;

use PhpParser\Error;
use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter;
use WP_Plugin_Uninstall_Scanner\Collector;
use WP_Plugin_Uninstall_Scanner\Config;
use WP_Plugin_Uninstall_Scanner\NodeVisitor;

/**
 * Main testcase for the PHPUnit tests.
 *
 * @package WP_Plugin_Uninstall_Scanner\PHPUnit
 * @since   0.1.0
 */
abstract class TestCase extends \PHPUnit_Framework_TestCase {
	public function test() {

		$class = get_class( $this );
		$class = substr( $class, 41 /* WP_Plugin_Uninstall_Scanner\PHPUnit\Test\ */ );
		$file_name = $class . '.inc';

		$parser        = ( new ParserFactory )->create( ParserFactory::PREFER_PHP7 );
		$traverser     = new NodeTraverser;

		// add your visitor
		$collector = new Collector;
		$traverser->addVisitor( new NodeVisitor( $collector, new Config ) );

		try {

			$code = file_get_contents( __DIR__ . '/../tests/' . $file_name );

			// parse
			$stmts = $parser->parse( $code );

			// traverse
			$traverser->traverse( $stmts );

			$found = $collector->get();

			foreach ( $found as &$item ) {
				unset( $item['node'], $item['file'] );
			}

			$this->assertEquals( $this->expectations(), $found );

		} catch ( Error $e ) {
			echo 'Parse Error: ', $e->getMessage();
		}
	}

	abstract public function expectations();
}

// EOF
