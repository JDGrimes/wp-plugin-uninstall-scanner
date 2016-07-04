<?php

/**
 * .
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */

namespace WP_Plugin_Uninstall_Scanner;

/**
 * Class Config
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */
class Config {
	protected $functions = [
		'update_option' => [
			'type' => 'option',
			'arg'  => 0,
		],
		'add_option' => [
			'type' => 'option',
			'arg'  => 0,
		],
		'update_site_option' => [
			'type' => 'network_option',
			'arg'  => 0,
		],
		'add_site_option' => [
			'type' => 'network_option',
			'arg'  => 0,
		],
		'update_blog_option' => [
			'type' => 'blog_option',
			'arg'  => 1,
		],
		'add_blog_option' => [
			'type' => 'blog_option',
			'arg'  => 1,
		],
		'update_network_option' => [
			'type' => 'network_option',
			'arg'  => 1,
		],
		'add_network_option' => [
			'type' => 'network_option',
			'arg'  => 1,
		],
		'set_transient' => [
			'type' => 'transient',
			'arg'  => 0,
		],
		'set_site_transient' => [
			'type' => 'site_transient',
			'arg'  => 0,
		],
		'add_user_meta' => [
			'type' => 'user_meta',
			'arg'  => 1,
		],
		'update_user_meta' => [
			'type' => 'user_meta',
			'arg'  => 1,
		],
		'add_post_meta' => [
			'type' => 'post_meta',
			'arg'  => 1,
		],
		'update_post_meta' => [
			'type' => 'post_meta',
			'arg'  => 1,
		],
		'add_comment_meta' => [
			'type' => 'comment_meta',
			'arg'  => 1,
		],
		'update_comment_meta' => [
			'type' => 'comment_meta',
			'arg'  => 1,
		],
		'add_term_meta' => [
			'type' => 'term_meta',
			'arg'  => 1,
		],
		'update_term_meta' => [
			'type' => 'term_meta',
			'arg'  => 1,
		],
		'update_user_option' => [
			'type' => 'user_option',
			'arg'  => 1,
		],
		'add_metadata' => [
			'type' => 'meta',
			'arg'  => 2,
		],
		'update_metadata' => [
			'type' => 'meta',
			'arg'  => 2,
		],
		'register_widget' => [
			'type' => 'widget',
			'arg'  => 0,
		],
		'add_screen_option' => [
			'type' => 'screen_option',
			'arg'  =>  0,
		]
	];
	
	public function get_functions() {
		return $this->functions;
	}
}

// EOF
