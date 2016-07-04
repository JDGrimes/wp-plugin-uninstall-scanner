<?php

/**
 * .
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */

namespace WP_Plugin_Uninstall_Scanner\PHPUnit\Test;

use WP_Plugin_Uninstall_Scanner\PHPUnit\TestCase;

/**
 * Class Basic
 *
 * @package WP_Plugin_Uninstall_Scanner\PHPUnit\Test
 * @since   0.1.0
 */
class Basic extends TestCase {

	/**
	 * @since 0.1.0
	 */
	public function expectations() {
		return [
			[
				'item' => 'option_name',
				'function' => 'add_option',
			],
			[ 
				'item' => 'option_name',
				'function' => 'update_option',
			],
			[
				'item' => 1,
				'function' => 'update_option',
			],
			[
				'item' => 5.0,
				'function' => 'update_option',
			],
			[
				'item' => 'option_name',
				'function' => 'update_option',
			],
			[
				'item' => 'option_name-%',
				'function' => 'update_option',
			],
			[
				'item' => '%-option_name',
				'function' => 'update_option',
			],
			[
				'item' => '%-option_name-%',
				'function' => 'update_option',
			],
			[
				'item' => 'option_%_name',
				'function' => 'update_option',
			],
			[
				'item' => 'option_%_name',
				'function' => 'update_option',
			],
			[
				'item' => 'option_%-%_name',
				'function' => 'update_option',
			],
			[
				'item' => 'option_name-%',
				'function' => 'update_option',
			],
			[
				'item' => '%-option_name',
				'function' => 'update_option',
			],
			[
				'item' => '%-option_name-%',
				'function' => 'update_option',
			],
			[
				'item' => 'option_%_name',
				'function' => 'update_option',
			],
			[
				'item' => 'option_%_name',
				'function' => 'update_option',
			],
			[
				'item' => 'option_%-%_name',
				'function' => 'update_option',
			],
			[
				'item' => '%',
				'function' => 'update_option',
			],
			[
				'item' => 'option_name',
				'function' => 'add_site_option',
			],
			[
				'item' => 'option_name',
				'function' => 'update_site_option',
			],
			[
				'item' => 'option_name',
				'function' => 'add_blog_option',
			],
			[
				'item' => 'option_name',
				'function' => 'update_blog_option',
			],
			[
				'item' => 'option_name',
				'function' => 'add_network_option',
			],
			[
				'item' => 'option_name',
				'function' => 'update_network_option',
			],
			[
				'item' => 'transient_name',
				'function' => 'set_transient',
			],
			[
				'item' => 'transient_name',
				'function' => 'set_site_transient',
			],
			[
				'item' => 'meta_key',
				'function' => 'add_user_meta',
			],
			[
				'item' => 'meta_key',
				'function' => 'update_user_meta',
			],
			[
				'item' => 'meta_key',
				'function' => 'add_post_meta',
			],
			[
				'item' => 'meta_key',
				'function' => 'update_post_meta',
			],
			[
				'item' => 'meta_key',
				'function' => 'add_comment_meta',
			],
			[
				'item' => 'meta_key',
				'function' => 'update_comment_meta',
			],
			[
				'item' => 'meta_key',
				'function' => 'add_term_meta',
			],
			[
				'item' => 'meta_key',
				'function' => 'update_term_meta',
			],
			[
				'item' => 'option_name',
				'function' => 'update_user_option',
			],
			[
				'item' => 'meta_key',
				'function' => 'add_metadata',
			],
			[
				'item' => 'meta_key',
				'function' => 'update_metadata',
			],
			[
				'item' => 'My_Widget_Class',
				'function' => 'register_widget',
			],
			[
				'item' => 'option_name',
				'function' => 'add_screen_option',
			],
		];
	}
}

// EOF
