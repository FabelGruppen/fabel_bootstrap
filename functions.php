<?php 
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

if ( ! function_exists( 'fabel_bootstrap_setup' ) ) :
	function fabel_bootstrap_setup() {

		// Content Width
		if ( ! isset( $content_width ) ) $content_width = 900;

		// Language Translations
		load_theme_textdomain( 'fabel_bootstrap', TEMPLATEPATH.'/languages' );

		$locale = get_locale();
		$locale_file = TEMPLATEPATH."/languages/$locale.php";
		if ( is_readable($locale_file) )
		require_once($locale_file);

		// Custom Editor Style Support
		add_editor_style();

		// Support for Featured Images
		add_theme_support( 'post-thumbnails' ); 

	}

	add_action( 'after_setup_theme', 'fabel_bootstrap_setup' );

endif;


/**
 * Enqueue jQuery
 */

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-1.11.0.min.js", false, null);
   wp_enqueue_script('jquery');
}

/**
 * Enqueue Scripts and Styles for Front-End
 */

if ( ! function_exists( 'bootstrap_assets' ) ) :

function bootstrap_assets() {

	if (!is_admin()) {

		// Load JavaScripts
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap-core/js/bootstrap.min.js', null, '3.2.0', true );
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );

		// Load Stylesheets
		wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/bootstrap-core/css/bootstrap.min.css' );
	
	}

}

add_action( 'wp_enqueue_scripts', 'bootstrap_assets' );

endif;

/**
 * Register menu
 */
register_nav_menu( 'primary_menu', 'Primary menu' );


/**
 * Register Sidebars
 */

if ( ! function_exists( 'fabel_bootstrap_widgets' ) ) :

function fabel_bootstrap_widgets() {

	// Sidebar Right
	register_sidebar( array(
			'id' => 'sidebar_right',
			'name' => __( 'Sidebar Right', 'fabel_bootstrap' ),
			'description' => __( 'This sidebar is located on the right-hand side of each page.', 'fabel_bootstrap' ),
			'before_widget' => '<div class="panel panel-default">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="panel-heading"><h5 class="panel-title">',
			'after_title' => '</h5></div><div class="panel-body">',
		) );
}

add_action( 'widgets_init', 'fabel_bootstrap_widgets' );

endif;

/**
 * Register custom taxonomy
 */

function cases_tax_init() {
	register_taxonomy(
		'cases_tax',
		'case',
		array(
			'label' => __( 'Case categories' ),
			'rewrite' => array( 'slug' => 'cases' ),
			'hierarchical' => true
		)
	);
}
add_action( 'init', 'cases_tax_init' );


/**
 * Register custom post type
 */

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type('case', array(
        'labels' => array(
            'name' => 'Cases',
            'singular_name' => 'Case',
            'add_new' => 'New Case',
            'edit_item' => 'Edit case',
            'new_item' => 'New case',
            'view_item' => 'View case',
            'search_items' => 'Search cases',
            'not_found' => 'No cases found',
            'not_found_in_trash' => 'No cases found in trash'
        ),
        'public' => true,
        'hierarchical' => true,
        'supports' => array( 'title', 'editor', 'thumbnail')
    ));
}

?>