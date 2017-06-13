<?php 

add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles');
function salient_child_enqueue_styles() {
	
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('font-awesome'));

    if ( is_rtl() ) 
   		wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
}

// Create Volunteer Projects Custom Post Type
function volunteer_projects_init() {
    $args = array(
      'label' => 'Volunteer Projects',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'volunteer_projects'),
        'query_var' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'tags',
            'trackbacks',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
        );
    register_post_type( 'volunteer_projects', $args );
}
add_action( 'init', 'volunteer_projects_init' );

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_project_type_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Project Type for your posts
function create_project_type_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Project Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Project Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Project Types' ),
    'all_items' => __( 'All Project Types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Project Type' ), 
    'update_item' => __( 'Update Project Type' ),
    'add_new_item' => __( 'Add New Project Type' ),
    'new_item_name' => __( 'New Project Type Name' ),
    'menu_name' => __( 'Project Types' ),
  ); 	

// Now register the taxonomy

  register_taxonomy('project_type',array('volunteer_projects'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'project_type' ),
  ));

}

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_impact_type_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Project Type for your posts
function create_impact_type_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Impact Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Impact Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Impact Types' ),
    'all_items' => __( 'All Impact Types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Impact Type' ), 
    'update_item' => __( 'Update Impact Type' ),
    'add_new_item' => __( 'Add New Impact Type' ),
    'new_item_name' => __( 'New Impact Type Name' ),
    'menu_name' => __( 'Impact Types' ),
  ); 	

// Now register the taxonomy

  register_taxonomy('impact_type',array('volunteer_projects'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'impact_type' ),
  ));

}

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_destination_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Project Type for your posts
function create_destination_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Destination', 'taxonomy general name' ),
    'singular_name' => _x( 'Destination', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Destinations' ),
    'all_items' => __( 'All Destinations' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Destination' ), 
    'update_item' => __( 'Update Destination' ),
    'add_new_item' => __( 'Add New Destination' ),
    'new_item_name' => __( 'New Destination Name' ),
    'menu_name' => __( 'Destinations' ),
  ); 	

// Now register the taxonomy

  register_taxonomy('destination',array('volunteer_projects'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'destination' ),
  ));

}


?>