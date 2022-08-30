<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
   
}


//Leader custom post type

add_action('init', 'create_leader_custom_post_type');
 
function create_leader_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
 
$labels = array(
'name' => _x('Leaders', 'plural'),
'singular_name' => _x('Leaders', 'singular'),
'menu_name' => _x('Leaders', 'admin menu'),
'name_admin_bar' => _x('Leaders', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Leader'),
'new_item' => __('New Leader'),
'edit_item' => __('Edit Leader'),
'view_item' => __('View Leader'),
'all_items' => __('All Leader'),
'search_items' => __('Search Leader'),
'not_found' => __('No Leader found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'leader'),
'has_archive' => true,
'hierarchical' => false,
'menu_position' => 4,
'menu_icon' => 'dashicons-groups',
);
 
register_post_type('leaders', $args); // Register Post type
}
/********************** end leader ******************/

//Gallery custom post type

add_action('init', 'create_gallery_custom_post_type');
 
function create_gallery_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
 
$labels = array(
'name' => _x('Gallery', 'plural'),
'singular_name' => _x('Gallery', 'singular'),
'menu_name' => _x('Gallery', 'admin menu'),
'name_admin_bar' => _x('Gallery', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Gallery'),
'new_item' => __('New Gallery'),
'edit_item' => __('Edit Gallery'),
'view_item' => __('View Gallery'),
'all_items' => __('All Gallery'),
'search_items' => __('Search Gallery'),
'not_found' => __('No Gallery found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'gallery'),
'has_archive' => false,
'hierarchical' => false,
'menu_position' => 4,
'menu_icon' => 'dashicons-format-gallery',
);
 
register_post_type('gallery', $args); // Register Post type
}
/********************** end gallery ******************/
//Services custom post type

add_action('init', 'create_services_custom_post_type');
 
function create_services_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
 
$labels = array(
'name' => _x('Online Services', 'plural'),
'singular_name' => _x('Online Services', 'singular'),
'menu_name' => _x('Online Services', 'admin menu'),
'name_admin_bar' => _x('Online Services', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Service'),
'new_item' => __('New Service'),
'edit_item' => __('Edit Service'),
'view_item' => __('View Service'),
'all_items' => __('All Services'),
'search_items' => __('Search Services'),
'not_found' => __('No Service found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'service'),
'has_archive' => true,
'hierarchical' => false,
'menu_position' => 4,
'menu_icon' => 'dashicons-edit-page',
);
 
register_post_type('services', $args); // Register Post type
}
/********************** end services ******************/

//News custom post type

add_action('init', 'create_news_custom_post_type');
 
function create_news_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
 
$labels = array(
'name' => _x('News', 'plural'),
'singular_name' => _x('News', 'singular'),
'menu_name' => _x('News', 'admin menu'),
'name_admin_bar' => _x('News', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New News'),
'new_item' => __('New News'),
'edit_item' => __('Edit News'),
'view_item' => __('View News'),
'all_items' => __('All News'),
'search_items' => __('Search News'),
'not_found' => __('No News found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'news'),
'has_archive' => true,
'hierarchical' => false,
'menu_position' => 4,
'menu_icon' => 'dashicons-megaphone',
);
 
register_post_type('news', $args); // Register Post type
}

add_action('init', 'register_news_custom_taxonomy');
 
function register_news_custom_taxonomy()
{
    $labels = array(
        'name'              => _x('News Category', 'taxonomy general name'),
'singular_name'     => _x('News Category','taxonomy singular name'),
'search_items'      => __('Search News Category'),
'all_items'         => __('All News Category'),
'parent_item'       => __('Parent News Category'),
'parent_item_colon' => __('Parent News Category:'),
'edit_item'         => __('Edit News Category'),
'update_item'       => __('Update News Category'),
'add_new_item'      => __('Add New News Category'),
'new_item_name'     => __('New Event News Category'),
'menu_name'         => __('News Category'),
);
 
$args = array(
'hierarchical'      => true, // make it hierarchical (like categories)
'labels'            => $labels,
'show_ui'           => true,
'show_admin_column' => true,
'query_var'         => true,
'show_in_rest' => true,
'rewrite'    => array('slug' => 'news_category'),
);
 
register_taxonomy('news_category', 'news', $args); // Register Taxonomy
}
/********************** end news ******************/

//Events custom post type

add_action('init', 'create_events_custom_post_type');
 
function create_events_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
 
$labels = array(
'name' => _x('Events', 'plural'),
'singular_name' => _x('Events', 'singular'),
'menu_name' => _x('Events', 'admin menu'),
'name_admin_bar' => _x('Events', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Event'),
'new_item' => __('New Event'),
'edit_item' => __('Edit Event'),
'view_item' => __('View Event'),
'all_items' => __('All Events'),
'search_items' => __('Search Event'),
'not_found' => __('No Event found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => false,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'event'),
'has_archive' => false,
'hierarchical' => false,
'menu_position' => 6,
'menu_icon' => 'dashicons-calendar-alt',
);
 
register_post_type('events', $args); // Register Post type
}

/********************** end news ******************/

//Administrative Setup custom post type

add_action('init', 'create_administrative_setup_custom_post_type');
 
function create_administrative_setup_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
 
$labels = array(
'name' => _x('Administrative', 'plural'),
'singular_name' => _x('Administrative', 'singular'),
'menu_name' => _x('Administrative', 'admin menu'),
'name_admin_bar' => _x('Administrative', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Administrative'),
'new_item' => __('New Administrative'),
'edit_item' => __('Edit Administrative'),
'view_item' => __('View Administrative'),
'all_items' => __('All Administrative'),
'search_items' => __('Search Administrative'),
'not_found' => __('No Administrative found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'administrative'),
'has_archive' => true,
'hierarchical' => false,
'menu_position' => 4,
'menu_icon' => 'dashicons-networking',
);
 
register_post_type('administrative', $args); // Register Post type
}
/********************** end administrative setup ******************/

//Public Utilities Setup custom post type

add_action('init', 'create_public_utilities_custom_post_type');
 
function create_public_utilities_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
 
$labels = array(
'name' => _x('Public Utilities', 'plural'),
'singular_name' => _x('Public Utilities', 'singular'),
'menu_name' => _x('Public Utilities', 'admin menu'),
'name_admin_bar' => _x('Public Utilities', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Public Utilities'),
'new_item' => __('New Public Utilities'),
'edit_item' => __('Edit Public Utilities'),
'view_item' => __('View Public Utilities'),
'all_items' => __('All Public Utilities'),
'search_items' => __('Search Public Utilities'),
'not_found' => __('No Public Utilities found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'public_utilities'),
'has_archive' => true,
'hierarchical' => false,
'menu_position' => 4,
'menu_icon' => 'dashicons-hammer',
);
 
register_post_type('public_utilities', $args); // Register Post type
}
/********************** end public utilities ******************/
//Documents custom post type

add_action('init', 'create_documents_custom_post_type');
 
function create_documents_custom_post_type() {
 
$supports = array(
'title', // post title
'thumbnail', // featured images
'custom-fields', // custom fields
);
 
$labels = array(
'name' => _x('Documents', 'plural'),
'singular_name' => _x('Document', 'singular'),
'menu_name' => _x('Documents', 'admin menu'),
'name_admin_bar' => _x('Documents', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Documents'),
'new_item' => __('New Documents'),
'edit_item' => __('Edit Documents'),
'view_item' => __('View Documents'),
'all_items' => __('All Documents'),
'search_items' => __('Search Documents'),
'not_found' => __('No Documents found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'documents'),
'has_archive' => false,
'hierarchical' => false,
'menu_position' => 15,
'menu_icon' => 'dashicons-media-document',
);
 
register_post_type('documents', $args); // Register Post type
}
/********************** end documents ******************/

//Tenders custom post type

add_action('init', 'create_tenders_custom_post_type');
 
function create_tenders_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'custom-fields', // custom fields
);
 
$labels = array(
'name' => _x('Tenders', 'plural'),
'singular_name' => _x('Tenders', 'singular'),
'menu_name' => _x('Tenders', 'admin menu'),
'name_admin_bar' => _x('DocTendersuments', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Tenders'),
'new_item' => __('New Tenders'),
'edit_item' => __('Edit Tenders'),
'view_item' => __('View Tenders'),
'all_items' => __('All Tenders'),
'search_items' => __('Search Tenders'),
'not_found' => __('No Tenders found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => false,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'tender'),
'has_archive' => false,
'hierarchical' => false,
'menu_position' => 15,
'menu_icon' => 'dashicons-index-card',
);
 
register_post_type('tenders', $args); // Register Post type
}
/********************** end documents ******************/
// Theme Option

add_action('init', 'create_theme_option_setup');
 
function create_theme_option_setup() {
 
$supports = array();
 
$labels = array(
'name' => _x('Theme Option', 'plural'),
'singular_name' => _x('Theme Option', 'singular'),
'menu_name' => _x('Theme Option', 'admin menu'),
'add_new_item' => __('Theme Option'),
'new_item' => __('Theme Option'),
'edit_item' => __('Edit Theme Option'),
'view_item' => __('View Theme Option'),
'all_items' => __('Theme Option'),
'search_items' => __('Search'),
'not_found' => __('No found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'page',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'theme_option'),
'has_archive' => false,
'hierarchical' => false,
'menu_position' => 95,
'menu_icon' => 'dashicons-admin-generic',
);
 
register_post_type('footer_option', $args); // Register Post type
}

//Department custom post type

add_action('init', 'create_department_custom_post_type');
 
function create_department_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'custom-fields', // custom fields
'revisions', // post revisions
);
 
$labels = array(
'name' => _x('Department', 'plural'),
'singular_name' => _x('Department', 'singular'),
'menu_name' => _x('Department', 'admin menu'),
'name_admin_bar' => _x('Department', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Department'),
'new_item' => __('New Department'),
'edit_item' => __('Edit Department'),
'view_item' => __('View Department'),
'all_items' => __('All Department'),
'search_items' => __('Search Department'),
'not_found' => __('No Department found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'department'),
'has_archive' => false,
'hierarchical' => false,
'menu_position' => 4,
'menu_icon' => 'dashicons-bank',
);
 
register_post_type('department', $args); // Register Post type
}
/********************** end Department ******************/

//Cities custom post type

add_action('init', 'create_cities_custom_post_type');
 
function create_cities_custom_post_type() {
 
$supports = array(
'title', // post title
'author', // post author
'thumbnail', // featured images
'custom-fields', // custom fields
'revisions', // post revisions
);
 
$labels = array(
'name' => _x('Cities', 'plural'),
'singular_name' => _x('Cities', 'singular'),
'menu_name' => _x('Cities', 'admin menu'),
'name_admin_bar' => _x('Cities', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Cities'),
'new_item' => __('New City'),
'edit_item' => __('Edit City'),
'view_item' => __('View City'),
'all_items' => __('All City'),
'search_items' => __('Search City'),
'not_found' => __('No City found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'cities'),
'has_archive' => false,
'hierarchical' => false,
'menu_position' => 4,
'menu_icon' => 'dashicons-location',
);
 
register_post_type('cities', $args); // Register Post type
}
/********************** end Department ******************/

//Dashboards custom post type

add_action('init', 'create_dashboards_custom_post_type');
 
function create_dashboards_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
);
 
$labels = array(
'name' => _x('Dashboards', 'plural'),
'singular_name' => _x('Dashboards', 'singular'),
'menu_name' => _x('Dashboards', 'admin menu'),
'name_admin_bar' => _x('Dashboards', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Dashboard'),
'new_item' => __('New Dashboard'),
'edit_item' => __('Edit Dashboard'),
'view_item' => __('View Dashboard'),
'all_items' => __('All Dashboard'),
'search_items' => __('Search Dashboard'),
'not_found' => __('No Dashboard found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'dashboard'),
'has_archive' => false,
'hierarchical' => false,
'menu_position' => 4,
'menu_icon' => 'dashicons-grid-view',
);
 
register_post_type('dashboards', $args); // Register Post type
}
/********************** end administrative setup ******************/

//FAQs custom post type

add_action('init', 'create_faqs_custom_post_type');
 
function create_faqs_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
);
 
$labels = array(
'name' => _x('FAQs', 'plural'),
'singular_name' => _x('FAQs', 'singular'),
'menu_name' => _x('FAQs', 'admin menu'),
'name_admin_bar' => _x('FAQs', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New FAQs'),
'new_item' => __('New FAQ'),
'edit_item' => __('Edit FAQ'),
'view_item' => __('View FAQ'),
'all_items' => __('All FAQ'),
'search_items' => __('Search FAQ'),
'not_found' => __('No FAQ found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => false,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'faq'),
'has_archive' => false,
'hierarchical' => false,
'menu_position' => 4,
'menu_icon' => 'dashicons-editor-alignleft',
);
 
register_post_type('faqs', $args); // Register Post type
}
/********************** end faqs ******************/

//Phone Directory custom post type

add_action('init', 'create_phone_directory_custom_post_type');
 
function create_phone_directory_custom_post_type() {
 
$supports = array(
'title', // post title
'thumbnail', // featured images
'custom-fields', // custom fields
);
 
$labels = array(
'name' => _x('Phone Directory', 'plural'),
'singular_name' => _x('Phone Directory', 'singular'),
'menu_name' => _x('Phone Directory', 'admin menu'),
'name_admin_bar' => _x('Phone Directory', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Phone Directory'),
'new_item' => __('New Phone Directory'),
'edit_item' => __('Edit Phone Directory'),
'view_item' => __('View Phone Directory'),
'all_items' => __('All Phone Directory'),
'search_items' => __('Search Phone Directory'),
'not_found' => __('No Phone Directory found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'phone_directory'),
'has_archive' => false,
'hierarchical' => false,
'menu_position' => 15,
'menu_icon' => 'dashicons-smartphone',
);
 
register_post_type('phone_directory', $args); // Register Post type
}
/********************** end phone directory ******************/

//Job Listing custom post type

add_action('init', 'create_job_listing_post_type');
 
function create_job_listing_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
 
$labels = array(
'name' => _x('Job Listing', 'plural'),
'singular_name' => _x('Job Listing', 'singular'),
'menu_name' => _x('Job Listing', 'admin menu'),
'name_admin_bar' => _x('Job Listing', 'admin bar'),
'add_new' => _x('Add New', 'add Job'),
'add_new_item' => __('Add New Job'),
'new_item' => __('New Job'),
'edit_item' => __('Edit Job'),
'view_item' => __('View Job'),
'all_items' => __('All Job'),
'search_items' => __('Search Job'),
'not_found' => __('No News found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'job'),
'has_archive' => false,
'hierarchical' => false,
'menu_position' => 4,
'menu_icon' => 'dashicons-index-card',
);
 
register_post_type('job_listing', $args); // Register Post type
}

add_action('init', 'register_job_listing_taxonomy');
 
function register_job_listing_taxonomy()
{
    $labels = array(
        'name'              => _x('Job Category', 'taxonomy general name'),
'singular_name'     => _x('Job Category','taxonomy singular name'),
'search_items'      => __('Search Job Category'),
'all_items'         => __('All Job Category'),
'parent_item'       => __('Parent Job Category'),
'parent_item_colon' => __('Parent Job Category:'),
'edit_item'         => __('Edit Job Category'),
'update_item'       => __('Update Job Category'),
'add_new_item'      => __('Add New Job Category'),
'new_item_name'     => __('New Event Job Category'),
'menu_name'         => __('Job Category'),
);
 
$args = array(
'hierarchical'      => true, // make it hierarchical (like categories)
'labels'            => $labels,
'show_ui'           => true,
'show_admin_column' => true,
'query_var'         => true,
'show_in_rest' => true,
'rewrite'    => array('slug' => 'job_category'),
);
 
register_taxonomy('job_category', 'job_listing', $args); // Register Taxonomy
}
/********************** end job listing ******************/


//Surveys custom post type

add_action('init', 'create_surveys_custom_post_type');
 
function create_surveys_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
 
$labels = array(
'name' => _x('Surveys', 'plural'),
'singular_name' => _x('Survey', 'singular'),
'menu_name' => _x('Surveys', 'admin menu'),
'name_admin_bar' => _x('Surveys', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Survey'),
'new_item' => __('New Survey'),
'edit_item' => __('Edit Survey'),
'view_item' => __('View Survey'),
'all_items' => __('All Survey'),
'search_items' => __('Search Survey'),
'not_found' => __('No Survey found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => true,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'survey'),
'has_archive' => false,
'hierarchical' => false,
'menu_position' => 15,
'menu_icon' => 'dashicons-welcome-view-site',
);
 
register_post_type('surveys', $args); // Register Post type
}
/********************** end phone directory ******************/

//Notification custom post type

add_action('init', 'create_notification_custom_post_type');
 
function create_notification_custom_post_type() {
 
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
 
$labels = array(
'name' => _x('Notifications', 'plural'),
'singular_name' => _x('Notifications', 'singular'),
'menu_name' => _x('Notifications', 'admin menu'),
'name_admin_bar' => _x('Notifications', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New Notification'),
'new_item' => __('New Notification'),
'edit_item' => __('Edit Notification'),
'view_item' => __('View Notification'),
'all_items' => __('All Notification'),
'search_items' => __('Search Notification'),
'not_found' => __('No Notification found.'),
);
 
$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => '',
'public' => false,
'taxonomies' => array(''),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
 'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'notification'),
'has_archive' => false,
'hierarchical' => false,
'menu_position' => 15,
'menu_icon' => 'dashicons-bell',
);
 
register_post_type('notification', $args); // Register Post type
}
/********************** end phone directory ******************/

/************ Digit API Setting Started ***************/
add_action('admin_menu', 'add_event_api_submenu');

//admin_menu callback function

function add_event_api_submenu(){

     add_submenu_page(
                     'options-general.php', //$parent_slug
                     'Digit API Setting',  //$page_title
                     'Digit API Settings',        //$menu_title
                     'administrator',           //$capability
                     'digit_api_setting',//$menu_slug
                     'digit_api_setting_render_page'//$function
     );

}

//add_submenu_page callback function

function digit_api_setting_render_page() {

     echo '<h2> Digit API Setting </h2>';
     ?>
     <form method="post" action="options.php">
            <?php
                settings_fields("section");
                do_settings_sections("theme-options");      
                submit_button(); 
            ?>          
        </form>
        <?php

}

function display_event_api_element()
{
    ?>
        <input type="text" name="event_api_tenant_id" id="event_api_tenant_id" value="<?php echo get_option('event_api_tenant_id'); ?>" />
    <?php
}

function display_event_api_username_element()
{
    ?>
        <input type="text" name="event_api_username" id="event_api_username" value="<?php echo get_option('event_api_username'); ?>" autocomplete="off" />
    <?php
}

function display_event_api_password_element()
{
    ?>
        <input type="password" name="event_api_password" id="event_api_password" value="<?php echo get_option('event_api_password'); ?>" autocomplete="off"/>
    <?php
}

function display_event_api_url_element()
{
    ?>
        <input type="url" name="event_api_url" id="event_api_url" value="<?php echo get_option('event_api_url'); ?>" autocomplete="off"/>
    <?php
}


function display_event_api_panel_fields()
{
    add_settings_section("section", "All Settings", null, "theme-options");
    
    add_settings_field("event_api_tenantid", "Enter Digit API Tenant ID", "display_event_api_element", "theme-options", "section");
    add_settings_field("event_api_username", "Enter Digit API Username", "display_event_api_username_element", "theme-options", "section");
    add_settings_field("event_api_password", "Enter Digit API Password", "display_event_api_password_element", "theme-options", "section");
    add_settings_field("event_api_url", "Enter Digit API URL", "display_event_api_url_element", "theme-options", "section");

    register_setting("section", "event_api_tenant_id");
    register_setting("section", "event_api_username");
    register_setting("section", "event_api_password");
    register_setting("section", "event_api_url");
}

add_action("admin_init", "display_event_api_panel_fields");
/************ Digit API Setting ***************/

add_action('admin_head', 'my_custom_fonts');




function my_custom_fonts() {
  echo '<style>
    body.post-type-footer_option .tablenav.top,body.post-type-footer_option #delete-action, body.post-type-footer_option #misc-publishing-actions, body.post-type-footer_option #preview-action, .menu-icon-footer_option .wp-submenu.wp-submenu-wrap,body.post-type-footer_option .row-actions,body.post-type-footer_option .page-title-action, body.post-type-footer_option #titlediv{display:none;
    } 
  </style>';
}

add_filter( "the_content", "limit_content_chr" );
function limit_content_chr( $content ){
    if ( 'news' == get_post_type() ) {
        $data='<div class="news_read_less">';
        $data .=substr($content, 0, 1000).' ..';
        $data .='<p><a href="javascript:void(0)" id="news_read_more">Read More</a></p>';
        $data .='</div>';
        $data .='<div class="news_read_more" style="display:none;">';
        $data .=$content;
        $data .='<p><a href="javascript:void(0)" id="news_read_less">Read Less</a></p></div>';

        return $data;

    } else {
        return $content;
    }
}


// corn job

add_filter( 'cron_schedules', 'isa_add_every_five_minutes' );
function isa_add_every_five_minutes( $schedules ) {
    $schedules['every_five_minutes'] = array(
            'interval'  => 60 * 5,
            'display'   => __( 'Every 5 Minutes', 'textdomain' )
    );
    return $schedules;
}

// Schedule an action if it's not already scheduled
if ( ! wp_next_scheduled( 'isa_add_every_five_minutes' ) ) {
    wp_schedule_event( time(), 'every_five_minutes', 'isa_add_every_five_minutes' );
}

// Hook into that action that'll fire every five minutes
add_action( 'isa_add_every_five_minutes', 'every_five_minutes_event_func' );
function every_five_minutes_event_func() {
     
     $name = "Pradeep Maurya";
  $email = "pradeepku041@gmail.com";
  $message = "This is an automatic WordPress email for testing a cron event.";

//php mailer variables
  $to = "webcuretechnology@gmail.com";
  $subject = "Some text in subject...";
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";
 

//Here put your Validation and send mail
$sent = wp_mail($to, $subject, strip_tags($message), $headers);
}




add_action('wp_ajax_get_ajax_city_data', 'get_ajax_city_data');
add_action('wp_ajax_nopriv_get_ajax_city_data', 'get_ajax_city_data');

 function get_ajax_city_data()
 { 
    global $wpdb;

    $city_keyword = $_POST['city_keyword'];
    $dist_id = $_POST['dist_id'];

     $district_values = get_field('add_city_details',$dist_id);

      $count_ttl= count($district_values);
     $data='';
     for($i=0; $i<=$count_ttl;$i++){

        if (strpos($district_values[$i]['city_name'], $city_keyword) == true) {

        $data .='<div class="col-md-4">
                 <div class="city">
                 <a href="'.$district_values[$i]["city_link"].'">'.$district_values[$i]["city_name"].'</a>
                            </div>
                        </div>';
   }
}
   echo $data;
 }

/******************  event bulk import by date ******************/
 

add_action('admin_menu', 'add_events_cpt_submenu');

//admin_menu callback function

function add_events_cpt_submenu(){

     add_submenu_page(
                     'edit.php?post_type=events', //$parent_slug
                     'Import Event by Date',  //$page_title
                     'Import Event by Date',        //$menu_title
                     'manage_options',           //$capability
                     'import_bulk_events_by_date',//$menu_slug
                     'import_bulk_events_by_date_render_page'//$function
     );

}

//add_submenu_page callback function

function import_bulk_events_by_date_render_page() {

     echo '<h2> Import Event by Date </h2>';

if(isset($_POST['event_from_date']) && isset($_POST['event_to_date'])){

  $event_from_date=date('Y-m-d H:i:s',strtotime($_POST['event_from_date']));

$event_to_date=date('Y-m-d H:i:s',strtotime($_POST['event_to_date']));


 $previous_time=strtotime($event_from_date);
$current_time=strtotime($event_to_date);

$epoch_from_date=$previous_time*1000;
$epoch_to_date=$current_time*1000;

$tenantID=get_option('event_api_tenant_id');
$apiUsername=get_option('event_api_username');
$apiPassword=get_option('event_api_password');
$apiURL=get_option('event_api_url');
$found=0;
$cancelled=0;
$inserted_response=array();
$inserted_response['result']=" No Records Found";
$cancelled_response=array();
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $apiURL."/user/oauth/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "username=".$apiUsername."&password=".$apiPassword."&grant_type=password&scope=read&tenantId=".$tenantID."&userType=EMPLOYEE",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json, text/plain, */*",
    "accept-language: en-GB,en-US;q=0.9,en;q=0.8",
     "authority: qa.digit.org",
    "authorization: Basic ZWdvdi11c2VyLWNsaWVudDo=",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "cookie: _ga=GA1.2.1798825227.1646894210",
    "origin: ".$apiURL,
    "postman-token: c8581ddb-dc7f-0994-1b44-1c06af21f076",
    "referer: ".$apiURL."/employee/user/login",
    "sec-ch-ua: \"Google Chrome\";v=\"93\", \" Not;A Brand\";v=\"99\", \"Chromium\";v=\"93\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Linux\"",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-origin",
    "user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $accessToken= json_decode($response);
   $api_accessToken=$accessToken->access_token;

//print_r($api_accessToken);
   /*********** Insert Event On Cron Job Trigger ****************/

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $apiURL."/egov-user-event/v1/events/_search?tenantId=".$tenantID."&status=ACTIVE&fromDate=".$epoch_from_date."&toDate=".$epoch_to_date,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"RequestInfo\": {\n    \"apiId\": \"org.egov.pt\",\n    \"msgId\": \"654654\",\n    \"authToken\": \"".$api_accessToken."\"\n  }\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 7f469dbe-4e7b-c27f-ba8c-4867f293c463"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

  $event_lists = json_decode($response);
  $all_events= $event_lists->events;
 // echo "<pre>";
 //print_r($all_events);
 // echo "</pre>";
  //die();
  foreach($all_events as $events){
  
$eventId = $events->id;
$event_title= $events->name;
$event_desc= $events->description;
$eventType= $events->eventType;
$status= $events->status;
$eventDetails= $events->eventDetails;
$actions= $events->actions;
if($actions){
    $actionUrls =$actions->actionUrls[0]->actionUrl;
}else{
    $actionUrls='';
}

$event_organizer= $eventDetails->organizer;
$event_address= $eventDetails->address;
$event_fromDate= $eventDetails->fromDate;
$event_toDate= $eventDetails->toDate;


if($event_fromDate !='' && $event_toDate !=''){

$efromdate=date('Ymd',($event_fromDate/1000));
$efromtime=date('h:i a',($event_fromDate/1000));
$etodate=date('Ymd',($event_toDate/1000));
$etotime=date('h:i a',($event_toDate/1000));

global $wpdb;

$results = $wpdb->get_results( "select post_id from $wpdb->postmeta where meta_key = 'eventId' AND meta_value='".$eventId."'");

if($results){

  
if($status =='ACTIVE' || $status =='active'){

$new_event = array(
'ID' => $results[0]->post_id,
'post_title' => $event_title,
'post_content' => $event_desc,
'post_status' => 'publish',
'post_date' => date('Y-m-d H:i:s'),
'post_author' => 1,
'post_type' => 'events',
);
$post_id = wp_insert_post($new_event);

if($results[0]->post_id){
$post_id = $results[0]->post_id;
update_post_meta($post_id, 'event_status', $status);
update_post_meta($post_id, 'eventId', $eventId);
update_post_meta($post_id, 'event_sub_heading', $event_organizer);
update_post_meta($post_id, 'event_date', $efromdate);
update_post_meta($post_id, 'event_time_from', $efromtime);
update_post_meta($post_id, 'event_date_to', $etodate);
update_post_meta($post_id, 'event_time_to', $etotime);
update_post_meta($post_id, 'event_venue', $event_address);
update_post_meta($post_id, 'registration_url', $actionUrls);
$found++;
$inserted_response['result']=$post_id." Data updated successfully";

}else{
$inserted_response['result']="Error";
}
}

}else{
if($status =='ACTIVE' || $status =='active'){
    
$new_event = array(

'post_title' => $event_title,
'post_content' => $event_desc,
'post_status' => 'publish',
'post_date' => date('Y-m-d H:i:s'),
'post_author' => 1,
'post_type' => 'events',
);
$post_id = wp_insert_post($new_event);

if($post_id){
add_post_meta($post_id, 'event_status', $status);
add_post_meta($post_id, 'eventId', $eventId);
add_post_meta($post_id, 'event_sub_heading', $event_organizer);
add_post_meta($post_id, 'event_date', $efromdate);
add_post_meta($post_id, 'event_time_from', $efromtime);
add_post_meta($post_id, 'event_date_to', $etodate);
add_post_meta($post_id, 'event_time_to', $etotime);
add_post_meta($post_id, 'event_venue', $event_address);
add_post_meta($post_id, 'registration_url', $actionUrls);
$found++;
$inserted_response['result']=$found." Data inserted successfully";

}else{
$inserted_response['result']="Error";
}

}
}
/*** event insert end **/

}else{
     if($found==0){
  $inserted_response['result']="No Data Found";
}

  }


}
echo json_encode($inserted_response);
}

}
}


     ?>

     <form method="post">
            <?php
                settings_fields("eventsection");
                do_settings_sections("event-options");      
                submit_button(__( 'Submit', 'textdomain' ), 'primary', 'submit-form', false ); 
            ?>          
        </form>
        <?php
}


function display_event_from_date_element()
{
    ?>
        <input type="date" name="event_from_date" id="event_from_date" value="<?php if(isset($_POST['event_from_date'])){echo $_POST['event_from_date'];} ?>" />
    <?php
}

function display_event_to_date_element()
{
    ?>
        <input type="date" name="event_to_date" id="event_to_date" value="<?php if(isset($_POST['event_to_date'])){echo $_POST['event_to_date']; }?>" autocomplete="off" />
    <?php
}

function display_event_import_fields()
{
    add_settings_section("eventsection", "", null, "event-options");
    
    add_settings_field("event_api_from_date", "From Date", "display_event_from_date_element", "event-options", "eventsection");
    add_settings_field("event_api_to_date", "To Date", "display_event_to_date_element", "event-options", "eventsection");

    register_setting("eventsection", "event_api_from_date");
    register_setting("eventsection", "event_api_to_date");
}

add_action("admin_init", "display_event_import_fields");


/*************************** Import Document By Date ***********************/


add_action('admin_menu', 'add_documents_cpt_submenu');

//admin_menu callback function

function add_documents_cpt_submenu(){

     add_submenu_page(
                     'edit.php?post_type=documents', //$parent_slug
                     'Import Documents by Date',  //$page_title
                     'Import Documents by Date',        //$menu_title
                     'manage_options',           //$capability
                     'import_bulk_documents_by_date',//$menu_slug
                     'import_bulk_document_by_date_render_page'//$function
     );

}

//add_submenu_page callback function

function import_bulk_document_by_date_render_page() {

     echo '<h2> Import Document by Date </h2>';

if(isset($_POST['document_from_date']) && isset($_POST['document_to_date'])){

  $document_from_date=date('Y-m-d H:i:s',strtotime($_POST['document_from_date']));

$document_to_date=date('Y-m-d H:i:s',strtotime($_POST['document_to_date']));


 $previous_time=strtotime($document_from_date);
$current_time=strtotime($document_to_date);

$epoch_from_date=$previous_time*1000;
$epoch_to_date=$current_time*1000;

$tenantID=get_option('event_api_tenant_id');
$apiUsername=get_option('event_api_username');
$apiPassword=get_option('event_api_password');
$apiURL=get_option('event_api_url');
$found=0;
$cancelled=0;
$inserted_response=array();
$inserted_response['result']=" No Records Found";
$cancelled_response=array();
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $apiURL."/user/oauth/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "username=".$apiUsername."&password=".$apiPassword."&grant_type=password&scope=read&tenantId=".$tenantID."&userType=EMPLOYEE",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json, text/plain, */*",
    "accept-language: en-GB,en-US;q=0.9,en;q=0.8",
    "authority: qa.digit.org",
    "authorization: Basic ZWdvdi11c2VyLWNsaWVudDo=",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "cookie: _ga=GA1.2.1798825227.1646894210",
    "origin: ".$apiURL,
    "postman-token: c8581ddb-dc7f-0994-1b44-1c06af21f076",
    "referer: ".$apiURL."/employee/user/login",
    "sec-ch-ua: \"Google Chrome\";v=\"93\", \" Not;A Brand\";v=\"99\", \"Chromium\";v=\"93\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Linux\"",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-origin",
    "user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $accessToken= json_decode($response);
   $api_accessToken=$accessToken->access_token;

   /*********** Insert Document On Cron Job Trigger ****************/

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $apiURL."/egov-document-uploader/egov-du/document/_search?tenantIds=".$tenantID."&fromDate=".$epoch_from_date."&toDate=".$epoch_to_date,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"RequestInfo\": {\n    \"apiId\": \"org.egov.pt\",\n    \"msgId\": \"654654\",\n    \"authToken\": \"".$api_accessToken."\"\n  }\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 7f469dbe-4e7b-c27f-ba8c-4867f293c463"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

  $document_lists = json_decode($response);
 $total_count= $document_lists->totalCount;
$Documents= $document_lists->Documents;

   //echo "<pre>";
   //print_r($Documents);
//echo "</pre>";
//die();
  foreach($Documents as $documet){

$uuid = $documet->uuid;
$document_name= $documet->name;
$document_subhead='';
$doc_desc= $documet->description;
$doc_category= $documet->category;
$documentLink= $documet->documentLink;

global $wpdb;
$doc_exit = $wpdb->get_results( "select post_id from $wpdb->postmeta where meta_value='".$uuid."'");

if($documentLink !=='' && !$doc_exit){


$results = $wpdb->get_results( "select post_id from $wpdb->postmeta where meta_key = 'digit_category_name' AND meta_value='".$doc_category."'");

if($results){

if($results[0]->post_id){

$post_id = $results[0]->post_id;

if($post_id){

 $doc_count=get_post_meta($post_id, 'add_document_details', true);
if(!$doc_count){
  $doc_count=0;
}

                $file_name = $documentLink;
                $upload_dir = wp_upload_dir();
                $image_data = file_get_contents( $documentLink );
                $filename = basename( $file_name );
                $filetype = wp_check_filetype($file_name);
                $filename = time().'.'.$filetype['ext'];

                if ( wp_mkdir_p( $upload_dir['path'] ) ) {
                  $file = $upload_dir['path'] . '/' . $filename;
                }
                else {
                  $file = $upload_dir['basedir'] . '/' . $filename;
                }

                file_put_contents( $file, $image_data );
                $wp_filetype = wp_check_filetype( $filename, null );
                $attachment = array(
                  'post_mime_type' => $wp_filetype['type'],
                  'post_title' => sanitize_file_name( $filename ),
                  'post_content' => '',
                  'post_status' => 'inherit'
                );

                $attach_id = wp_insert_attachment( $attachment, $file );
                require_once( ABSPATH . 'wp-admin/includes/image.php' );
                $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
                wp_update_attachment_metadata( $attach_id, $attach_data );


add_post_meta($post_id, 'add_document_details_'.$doc_count.'_document_heading', $document_name);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_document_heading', 'field_61f940f8cbb92');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_document_subheading', $document_subhead);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_document_subheading', 'field_61f9410ccbb93');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_upload_document_pdf', $attach_id);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_upload_document_pdf', 'field_61f94133cbb95');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_description', $doc_desc);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_description', 'field_61f94125cbb94');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_uuid', $uuid);

$doc_count=$doc_count+1;

update_post_meta($post_id, 'add_document_details', $doc_count);
$found++;
$inserted_response['result']=$found." Data Inserted successfully";

}else{
$inserted_response['result']="Error";
}

}
/*** event insert end **/

}else{


$doc_title=str_replace("_"," ",$doc_category);
$new_event = array(

'post_title' => $doc_title,
'post_content' => '',
'post_status' => 'publish',
'post_date' => date('Y-m-d H:i:s'),
'post_author' => 1,
'post_type' => 'documents',
);
$post_id = wp_insert_post($new_event);

if($post_id){

add_post_meta($post_id, 'digit_category_name', $doc_category);
add_post_meta($post_id, '_digit_category_name', 'field_62817efe8e774');

$doc_count=get_post_meta($post_id, 'add_document_details', true);

if(!$doc_count){
  $doc_count=0;

  add_post_meta($post_id, 'add_document_details', $doc_count);
add_post_meta($post_id, '_add_document_details', 'field_61f94079cbb91');
}

                $file_name = $documentLink;
                $upload_dir = wp_upload_dir();
                $image_data = file_get_contents( $documentLink );
                $filename = basename( $file_name );
                $filetype = wp_check_filetype($file_name);
                $filename = time().'.'.$filetype['ext'];

                if ( wp_mkdir_p( $upload_dir['path'] ) ) {
                  $file = $upload_dir['path'] . '/' . $filename;
                }
                else {
                  $file = $upload_dir['basedir'] . '/' . $filename;
                }

                file_put_contents( $file, $image_data );
                require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
                require_once( ABSPATH . 'wp-admin/includes/image.php' );
                $wp_filetype = wp_check_filetype( $filename, null );
                $attachment = array(
                  'post_mime_type' => $wp_filetype['type'],
                  'post_title' => sanitize_file_name( $filename ),
                  'post_content' => '',
                  'post_status' => 'inherit'
                );

                $attach_id = wp_insert_attachment( $attachment, $file );

                $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
                wp_update_attachment_metadata( $attach_id, $attach_data );


add_post_meta($post_id, 'add_document_details_'.$doc_count.'_document_heading', $document_name);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_document_heading', 'field_61f940f8cbb92');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_document_subheading', $document_subhead);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_document_subheading', 'field_61f9410ccbb93');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_upload_document_pdf', $attach_id);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_upload_document_pdf', 'field_61f94133cbb95');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_description', $doc_desc);
add_post_meta($post_id, '_add_document_details_'.$doc_count.'_description', 'field_61f94125cbb94');

add_post_meta($post_id, 'add_document_details_'.$doc_count.'_uuid', $uuid);

$doc_count=$doc_count+1;

update_post_meta($post_id, 'add_document_details', $doc_count);
$found++;
$inserted_response['result']=$found." Data inserted successfully";

}else{
$inserted_response['result']="Error";
}
   
  }

 }

}
echo json_encode($inserted_response);
}


}
}


     ?>

     <form method="post">
            <?php
                settings_fields("documentsection");
                do_settings_sections("document-options");      
                submit_button(__( 'Submit', 'textdomain' ), 'primary', 'submit-form', false ); 
            ?>          
        </form>
        <?php
}


function display_document_from_date_element()
{
    ?>
        <input type="date" name="document_from_date" id="document_from_date" value="<?php if(isset($_POST['document_from_date'])){echo $_POST['document_from_date'];} ?>" />
    <?php
}

function display_document_to_date_element()
{
    ?>
        <input type="date" name="document_to_date" id="document_to_date" value="<?php if(isset($_POST['document_to_date'])){echo $_POST['document_to_date']; }?>" autocomplete="off" />
    <?php
}

function display_document_import_fields()
{
    add_settings_section("documentsection", "", null, "document-options");
    
    add_settings_field("document_api_from_date", "From Date", "display_document_from_date_element", "document-options", "documentsection");
    add_settings_field("document_api_to_date", "To Date", "display_document_to_date_element", "document-options", "documentsection");

    register_setting("documentsection", "document_api_from_date");
    register_setting("documentsection", "document_api_to_date");
}

add_action("admin_init", "display_document_import_fields");



/*************************** Notification Document By Date ***********************/


add_action('admin_menu', 'add_notification_cpt_submenu');

//admin_menu callback function

function add_notification_cpt_submenu(){

     add_submenu_page(
                     'edit.php?post_type=notification', //$parent_slug
                     'Import Notification by Date',  //$page_title
                     'Import Notification by Date',        //$menu_title
                     'manage_options',           //$capability
                     'import_bulk_notification_by_date',//$menu_slug
                     'import_bulk_notification_by_date_render_page'//$function
     );

}

//add_submenu_page callback function

function import_bulk_notification_by_date_render_page() {

     echo '<h2> Import Notification by Date </h2>';

if(isset($_POST['notification_from_date']) && isset($_POST['notification_to_date'])){

  $notification_from_date=date('Y-m-d H:i:s',strtotime($_POST['notification_from_date']));

$notification_to_date=date('Y-m-d H:i:s',strtotime($_POST['notification_to_date']));


 $previous_time=strtotime($notification_from_date);
$current_time=strtotime($notification_to_date);

$epoch_from_date=$previous_time*1000;
$epoch_to_date=$current_time*1000;


$tenantID=get_option('event_api_tenant_id');
$apiUsername=get_option('event_api_username');
$apiPassword=get_option('event_api_password');
$apiURL=get_option('event_api_url');
$found=0;
$cancelled=0;
$inserted_response=array();
 $inserted_response['result']="No Data Found";
$cancelled_response=array();
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $apiURL."/user/oauth/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "username=".$apiUsername."&password=".$apiPassword."&grant_type=password&scope=read&tenantId=".$tenantID."&userType=EMPLOYEE",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json, text/plain, */*",
    "accept-language: en-GB,en-US;q=0.9,en;q=0.8",
    "authority: qa.digit.org",
    "authorization: Basic ZWdvdi11c2VyLWNsaWVudDo=",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "cookie: _ga=GA1.2.1798825227.1646894210",
    "origin: ".$apiURL,
    "postman-token: c8581ddb-dc7f-0994-1b44-1c06af21f076",
    "referer: ".$apiURL."/employee/user/login",
    "sec-ch-ua: \"Google Chrome\";v=\"93\", \" Not;A Brand\";v=\"99\", \"Chromium\";v=\"93\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Linux\"",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-origin",
    "user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $accessToken= json_decode($response);
   $api_accessToken=$accessToken->access_token;

   /*********** Insert Event On Cron Job Trigger ****************/

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $apiURL."/egov-user-event/v1/events/_search?tenantId=".$tenantID."&eventType=BROADCAST&status=ACTIVE&fromDate=".$epoch_from_date."&toDate=".$epoch_to_date,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"RequestInfo\": {\n    \"apiId\": \"org.egov.pt\",\n    \"msgId\": \"654654\",\n    \"authToken\": \"".$api_accessToken."\"\n  }\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 7f469dbe-4e7b-c27f-ba8c-4867f293c463"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

  $event_lists = json_decode($response);
  $all_events= $event_lists->events;
  foreach($all_events as $events){
 
$eventId = $events->id;
$event_title= $events->name;
$event_desc= $events->description;
$eventType= $events->eventType;
$status= $events->status;
$actions= $events->actions;
if($actions){
    $actionUrls =$actions->actionUrls[0]->actionUrl;
    $code =$actions->actionUrls[0]->code;
}else{
    $actionUrls='';
    $code='';
}
$eventDetails= $events->eventDetails;
$event_fromDate= $eventDetails->fromDate;
$event_toDate= $eventDetails->toDate;

if($eventType =='BROADCAST'){

$efromdate=date('Ymd',($event_fromDate/1000));
$efromtime=date('h:i a',($event_fromDate/1000));
$etodate=date('Ymd',($event_toDate/1000));
$etotime=date('h:i a',($event_toDate/1000));

global $wpdb;

$results = $wpdb->get_results( "select post_id from $wpdb->postmeta where meta_key = 'notificationId' AND meta_value='".$eventId."'");

if($results){

$new_event = array(
'ID' => $results[0]->post_id,
'post_title' => $event_title,
'post_content' => $event_desc,
'post_status' => 'publish',
'post_date' => date('Y-m-d H:i:s'),
'post_author' => 1,
'post_type' => 'notification',
);
$post_id = wp_insert_post($new_event);

if($results[0]->post_id){
$post_id = $results[0]->post_id;
update_post_meta($post_id, 'notification_button_title', $code);
update_post_meta($post_id, 'notificationId', $eventId);
update_post_meta($post_id, 'notification_button_url', $actionUrls);
update_post_meta($post_id, 'notification_from', $efromdate);
update_post_meta($post_id, 'notification_to', $etodate);
$found++;
$inserted_response['result']=$found." Notification updated successfully";

}else{
$inserted_response['result']="Error";
}

}else{
$new_event = array(

'post_title' => $event_title,
'post_content' => $event_desc,
'post_status' => 'publish',
'post_date' => date('Y-m-d H:i:s'),
'post_author' => 1,
'post_type' => 'notification',
);
$post_id = wp_insert_post($new_event);

if($post_id){
update_post_meta($post_id, 'notification_button_title', $code);
update_post_meta($post_id, 'notificationId', $eventId);
update_post_meta($post_id, 'notification_button_url', $actionUrls);
update_post_meta($post_id, 'notification_from', $efromdate);
update_post_meta($post_id, 'notification_to', $etodate);

$found++;
$inserted_response['result']=$found." Notification inserted successfully";


}else{
$inserted_response['result']="Error";
}

}
/*** event insert end **/

}else{
     if($found==0){
  $inserted_response['result']="No Data Found";
}

  }


}
echo json_encode($inserted_response);
}



}
}


     ?>

     <form method="post">
            <?php
                settings_fields("notificationsection");
                do_settings_sections("notification-options");      
                submit_button(__( 'Submit', 'textdomain' ), 'primary', 'submit-form', false ); 
            ?>          
        </form>
        <?php
}


function display_notification_from_date_element()
{
    ?>
        <input type="date" name="notification_from_date" id="notification_from_date" value="<?php if(isset($_POST['notification_from_date'])){echo $_POST['notification_from_date'];} ?>" />
    <?php
}

function display_notification_to_date_element()
{
    ?>
        <input type="date" name="notification_to_date" id="notification_to_date" value="<?php if(isset($_POST['notification_to_date'])){echo $_POST['notification_to_date']; }?>" autocomplete="off" />
    <?php
}

function display_notification_import_fields()
{
    add_settings_section("notificationsection", "", null, "notification-options");
    
    add_settings_field("notification_api_from_date", "From Date", "display_notification_from_date_element", "notification-options", "notificationsection");
    add_settings_field("notification_api_to_date", "To Date", "display_notification_to_date_element", "notification-options", "notificationsection");

    register_setting("notificationsection", "document_api_from_date");
    register_setting("notificationsection", "document_api_to_date");
}

add_action("admin_init", "display_notification_import_fields");


function theme_slug_excerpt_length( $length ) {
        if ( is_admin() ) {
                return $length;
        }
        return 25;
}
add_filter( 'excerpt_length', 'theme_slug_excerpt_length', 999 );