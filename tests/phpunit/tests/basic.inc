<?php

/**
 * .
 *
 * @package WP_Plugin_Uninstall_Scanner
 * @since   0.1.0
 */

$var = 'var';

add_option( 'option_name', 'option_value' );
update_option( 'option_name', 'option_value' );
update_option( 1, 'option_value' );
update_option( 5.0, 'option_value' );
update_option( "option_name", 'option_value' );
update_option( "option_name-{$var}", 'option_value' );
update_option( "{$var}-option_name", 'option_value' );
update_option( "{$var}-option_name-{$var}", 'option_value' );
update_option( "option_{$var}_name", 'option_value' );
update_option( "option_{$var}{$var}_name", 'option_value' );
update_option( "option_{$var}-{$var}_name", 'option_value' );
update_option( "option_name-" . $var, 'option_value' );
update_option( $var . "-option_name", 'option_value' );
update_option( $var . "-option_name-" . $var, 'option_value' );
update_option( "option_" . $var . "_name", 'option_value' );
update_option( "option_" . $var . $var . "_name", 'option_value' );
update_option( "option_" . $var . "-" . $var . "_name", 'option_value' );
update_option( $var, 'option_value' );
update_option();

add_site_option( 'option_name', 'option_value' );
update_site_option( 'option_name', 'option_value' );

$blog_id = 4;
add_blog_option( $blog_id, 'option_name', 'option_value' );
update_blog_option( $blog_id, 'option_name', 'option_value' );

$network_id = 5;
add_network_option( $network_id, 'option_name', 'option_value' );
update_network_option( $network_id, 'option_name', 'option_value' );

set_transient( 'transient_name', 'transient_value' );
set_site_transient( 'transient_name', 'transient_value' );

add_user_meta( $user_id, 'meta_key', 'meta_value' );
update_user_meta( $user_id, 'meta_key', 'meta_value' );
add_post_meta( $user_id, 'meta_key', 'meta_value' );
update_post_meta( $user_id, 'meta_key', 'meta_value' );
add_comment_meta( $user_id, 'meta_key', 'meta_value' );
update_comment_meta( $user_id, 'meta_key', 'meta_value' );
add_term_meta( $user_id, 'meta_key', 'meta_value' );
update_term_meta( $user_id, 'meta_key', 'meta_value' );

update_user_option( $user_id, 'option_name', 'option_value' );

add_metadata( 'meta_type', $id, 'meta_key', 'meta_value' );
update_metadata( 'meta_type', $id, 'meta_key', 'meta_value' );

register_widget( 'My_Widget_Class' );

add_screen_option( 'option_name' );

// EOF
