<?php

/* Theme Image Maximum Content Width */

if ( ! isset( $content_width ) ) {
    $content_width = 660;
}

/* Theme support for automatic feed links and title tags */

function unveil_setup() {

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');

    // Register Custom Navigation Walker
    require_once('wp_bootstrap_navwalker.php');

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'unveil' ),
    ) );

}

add_action('after_setup_theme','unveil_setup');

/* Enqueue styles and scripts */

function unveil_scripts() {

/* Stylesheets */

wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );

wp_enqueue_style( 'viewport-bug-style', get_template_directory_uri() . '/css/ie10-viewport-bug-workaround.css' );

wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css' );

wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/style.css' );

/* Scripts */

wp_enqueue_script( 'html5-shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js' );

wp_enqueue_script( 'responsive-script', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js' );

    wp_enqueue_script( 'responsive-script', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', true );

wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() .'/js/bootstrap.min.js', array('jquery'), '3.3.6', true );

wp_enqueue_script( 'ie-viewport-bug', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', true );

wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/scripts.js', true );
}

add_action('wp_enqueue_scripts','unveil_scripts');