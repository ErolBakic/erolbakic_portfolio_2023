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