<?php

/*****************************

* Scripts Includes

*****************************/

function mm_load_scripts(){
	
	wp_enqueue_style('mm-styles', plugin_dir_url( __FILE__ ) . 'styles/mm_styles.css');

	wp_enqueue_script(
		'mm-scripts',
		plugin_dir_url( __FILE__ ) . 'js/mm_scripts.js',
		array( 'jquery' )
	);
	
}

add_action('wp_enqueue_scripts', 'mm_load_scripts');

function mm_admin_styles() {
    wp_register_style( 'mm_admin_stylesheet', plugins_url( 'styles/mm_admin_styles.css', __FILE__ ) );
    wp_enqueue_style( 'mm_admin_stylesheet' );
    wp_register_script( 'mm_admin_scripts', plugins_url( 'js/mm_admin_scripts.js', __FILE__ ) );
    wp_enqueue_script( 'mm_admin_scripts' );

}

add_action( 'admin_enqueue_scripts', 'mm_admin_styles' );

function mm_custom_css()
{
	global $mediamodal_options;

	$output="<style type='text/css'> ".$mediamodal_options['mailCustomCSS']." </style>";

	echo $output;

}

add_action('wp_footer','mm_custom_css');