<?php

/**
 * .
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */

namespace WP_Plugin_Uninstall_Scanner;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class NodeVisitor extends NodeVisitorAbstract {
	
	protected $collector;
	protected $functions;

	protected $wildcard = '%';

	public function __construct( Collector $collector, Config $config ) {
		$this->collector = $collector;
		$this->functions = $config->get_functions();
	}

	/**
	 *
	 * @since 0.1.0
	 *
	 * @param \PHPParser\Node $node
	 *
	 * @return void
	 */
	public function enterNode( Node $node ) {

		if ( ! $node instanceof Node\Expr\FuncCall ) {
			return;
		}

		$function_name = $node->name->toString();

		if ( ! isset( $this->functions[ $function_name ] ) ) {
			return;
		}

		$function_data = $this->functions[ $function_name ];

		if ( ! isset( $node->args[ $function_data['arg'] ] ) ) {
			return;
		}

		$arg = $node->args[ $function_data['arg'] ];

		if (
			$arg->value instanceof Node\Scalar\String_
			|| $arg->value instanceof Node\Scalar\LNumber
			|| $arg->value instanceof Node\Scalar\DNumber
		) {

			$value = $arg->value->value;

		} elseif ( $arg->value instanceof Node\Scalar\Encapsed ) {

			$value = '';

			foreach ( $arg->value->parts as $part ) {
				if ( $part instanceof Node\Scalar\EncapsedStringPart ) {
					$value .= $part->value;
				} else {
					$value .= $this->wildcard;
				}
			}

			// Replace multiple wildcards in a row with a single wildcard.
			$value = preg_replace( "/{$this->wildcard}+/", $this->wildcard, $value );
		
		} elseif ( $arg->value instanceof Node\Expr\BinaryOp\Concat ) {
			
			$value = $this->get_string_from_concat( $arg->value );
			$value = preg_replace( "/{$this->wildcard}+/", $this->wildcard, $value );

		} else {

			$value = $this->wildcard;
		}

		$this->collector->add( $value, $function_name, $node );
	}

	/**
	 *
	 *
	 * @since 0.1.0
	 *
	 * @param $concat
	 *
	 * @return string
	 */
	protected function get_string_from_concat( Node\Expr\BinaryOp\Concat $concat ) {
		
		$value = '';

		if ( $concat->left instanceof Node\Scalar\String_ ) {
			$value .= $concat->left->value;
		} elseif ( $concat->left instanceof Node\Expr\BinaryOp\Concat ) {
			$value .= $this->get_string_from_concat( $concat->left );
		} else {
			$value .= $this->wildcard;
		}

		if ( $concat->right instanceof Node\Scalar\String_ ) {
			$value .= $concat->right->value;
		} else {
			$value .= $this->wildcard;
		}

		return $value;
	}
}

// EOF
