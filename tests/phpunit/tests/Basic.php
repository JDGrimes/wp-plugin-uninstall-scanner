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
				'type' => 'option',
				'function' => 'add_option',
			],
			[
				'item' => 'option_name',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => 1,
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => 5.0,
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => 'option_name',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => 'option_name-%',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => '%-option_name',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => '%-option_name-%',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => 'option_%_name',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => 'option_%_name',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => 'option_%-%_name',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => 'option_name-%',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => '%-option_name',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => '%-option_name-%',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => 'option_%_name',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => 'option_%_name',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => 'option_%-%_name',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => '%',
				'type' => 'option',
				'function' => 'update_option',
			],
			[
				'item' => 'option_name',
				'type' => 'network_option',
				'function' => 'add_site_option',
			],
			[
				'item' => 'option_name',
				'type' => 'network_option',
				'function' => 'update_site_option',
			],
			[
				'item' => 'option_name',
				'type' => 'blog_option',
				'function' => 'add_blog_option',
			],
			[
				'item' => 'option_name',
				'type' => 'blog_option',
				'function' => 'update_blog_option',
			],
			[
				'item' => 'option_name',
				'type' => 'network_option',
				'function' => 'add_network_option',
			],
			[
				'item' => 'option_name',
				'type' => 'network_option',
				'function' => 'update_network_option',
			],
			[
				'item' => 'transient_name',
				'type' => 'transient',
				'function' => 'set_transient',
			],
			[
				'item' => 'transient_name',
				'type' => 'network_transient',
				'function' => 'set_site_transient',
			],
			[
				'item' => 'meta_key',
				'type' => 'user_meta',
				'function' => 'add_user_meta',
			],
			[
				'item' => 'meta_key',
				'type' => 'user_meta',
				'function' => 'update_user_meta',
			],
			[
				'item' => 'meta_key',
				'type' => 'post_meta',
				'function' => 'add_post_meta',
			],
			[
				'item' => 'meta_key',
				'type' => 'post_meta',
				'function' => 'update_post_meta',
			],
			[
				'item' => 'meta_key',
				'type' => 'comment_meta',
				'function' => 'add_comment_meta',
			],
			[
				'item' => 'meta_key',
				'type' => 'comment_meta',
				'function' => 'update_comment_meta',
			],
			[
				'item' => 'meta_key',
				'type' => 'term_meta',
				'function' => 'add_term_meta',
			],
			[
				'item' => 'meta_key',
				'type' => 'term_meta',
				'function' => 'update_term_meta',
			],
			[
				'item' => 'option_name',
				'type' => 'user_option',
				'function' => 'update_user_option',
			],
			[
				'item' => 'meta_key',
				'type' => 'meta',
				'function' => 'add_metadata',
			],
			[
				'item' => 'meta_key',
				'type' => 'meta',
				'function' => 'update_metadata',
			],
			[
				'item' => 'My_Widget_Class',
				'type' => 'widget',
				'function' => 'register_widget',
			],
			[
				'item' => 'option_name',
				'type' => 'screen_option',
				'function' => 'add_screen_option',
			],
		];
	}
}

// EOF
