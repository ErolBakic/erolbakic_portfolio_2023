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

// Register REST API
add_action('rest_api_init', 'register_route');
function register_route(){
    // route url: domain.com/wp-json/$namespace/$route
    $namespace = 'cases';
    $route     = 'fetch-case';

    register_rest_route($namespace, $route, array(
        'methods'   => 'POST',
        'callback'  => 'endpoint_receive_case'
    ));
}

// Endpoint - Receive case
function endpoint_receive_case( $request = null  ){

    // Init variables
    $response   = array();
    $parameters = $request->get_json_params();

    $caseID = sanitize_text_field($parameters['caseID']);
    
    $error = new WP_Error();

    // No case set
    if(empty($caseID)){
        $error->add(400, __("Der er sket en fejl! - #134256", 'wp-rest-user'), array('status' => 400));
        return $error;
    }

    // Insert SVG code of technologies to arr
    $technologies = [];
    foreach( get_field('technologies', $caseID) as $technology ){
        $technologies[ $technology['billede']['title'] ] = file_get_contents( $technology['billede']['url'] );
    }

    // Get post
    $case = array(
        'id'           => $caseID,
        'title'        => get_the_title($caseID),
        'content'      => get_post_field('post_content', $caseID),
        'cover'        => get_field('cover', $caseID),
        'mobile_cover' => get_field('mobile_cover', $caseID),
        'technologies' => $technologies,
        'links'        => get_field('externals', $caseID)
    );

    // Done
    $response['code']    = 200;
    $response['content'] = json_encode($case);
    return new WP_REST_Response($response, 123);
}