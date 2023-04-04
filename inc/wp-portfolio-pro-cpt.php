<?php

/**
 * Creates custom post type
 *
 * @link       https://webcrawlersites.com
 * @since      1.0.0
 *
 * @package    Wp_Portfolio_Pro
 * @subpackage Wp_Portfolio_Pro/includes
 */

 function wppro_register_cpt() {
	$args = array(
		'labels' => array(
		  'name' => __( 'Portfolio Items' ),
		  'singular_name' => __( 'Portfolio Item' )
		),
		'public' => true,
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'show_in_rest'	=> true
	  );

	register_post_type( 'wppro-portfolio', $args );
 }
 add_action( 'init', 'wppro_register_cpt' );