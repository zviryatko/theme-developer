<?php

/*
 Plugin Name: Theme Developer
 Description: Provide information to loaded templates
 Author: Alex Davyskiba aka Zviryatko
 */

if ( function_exists( 'override_function' ) ) {
	override_function( 'load_template', '$_template_file, $require_once = true', '
	global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

	if ( is_array( $wp_query->query_vars ) )
		extract( $wp_query->query_vars, EXTR_SKIP );

	global $theme_developer_template_name;
	$theme_developer_template_name = $_template_file;
	require( __DIR__ . "/template-wrapper.php" );
' );

	function theme_developer_init_action() {
		wp_enqueue_script( 'theme-developer', plugins_url( '/theme-developer.js', __FILE__ ), array( 'jquery' ) );
	}

	add_action( 'init', 'theme_developer_init_action' );
}