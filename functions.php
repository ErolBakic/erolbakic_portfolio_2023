<?php

// Frontend
if(!is_admin()){
    $theme = get_template_directory_uri();

    wp_enqueue_style('stylesheet', $theme . '/assets/css/main.min.css');
    wp_enqueue_script('javascript', $theme . '/assets/js/main.min.js', null, 1.0, true);

    // Disable jQuery on front-end
    add_filter( 'wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX );
    function change_default_jquery( ){
        wp_dequeue_script( 'jquery');
        wp_deregister_script( 'jquery');
    }
}

// Register nav menu
if ( !function_exists( 'mytheme_register_nav_menu' ) ) {
	function mytheme_register_nav_menu(){
		register_nav_menus( array(
	    	'primary_menu' => __( 'Primary Menu', 'text_domain' ),
		) );
	}
	add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}

// Add <title> to page
add_theme_support( 'title-tag' );

// ACF - Register options page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Indholds indstilling',
        'menu_title'    => 'Indholds indstilling',
        'menu_slug'     => 'content-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}