<?php
/**
 * couchcurb functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package couchcurb
 */

if ( ! function_exists( 'couchcurb_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function couchcurb_setup() {
		
        
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on couchcurb, use a find and replace
		 * to change 'couchcurb' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'couchcurb', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
        add_image_size('post-image-full', 1400);
        add_image_size('post-image-mobile', 800);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'couchcurb' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		/*add_theme_support( 'custom-background', apply_filters( 'couchcurb_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );*/
        // Set up the WordPress core custom background feature.
	
         // No header text...
        define( 'NO_HEADER_TEXT', true );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'couchcurb_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function couchcurb_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'couchcurb_content_width', 1200 );
}
add_action( 'after_setup_theme', 'couchcurb_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function couchcurb_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'couchcurb' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'couchcurb' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'couchcurb_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function couchcurb_scripts() {
     wp_enqueue_style('couchcurb-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Freckle+Face|Rubik:700' );
                    
    wp_enqueue_style('couchcurb-fontawesome','https://use.fontawesome.com/releases/v5.1.0/css/all.css' );
    
	wp_enqueue_style( 'couchcurb-style', get_stylesheet_uri() );

	//wp_enqueue_script( 'couchcurb-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//wp_enqueue_script( 'couchcurb-skrollr', get_template_directory_uri() . '/js/skrollr.min.js', array(), '20160310', true );
    
    wp_enqueue_script( 'couchcurb-easing-js', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '20160310', true );
    
     wp_enqueue_script( 'couchcurb-masonry-js', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), '20180718', true );
    
   wp_enqueue_script( 'couchcurb-imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), '20180718', true );
    
    
    
    
	wp_enqueue_script( 'couchcurb-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    // wp_enqueue_script( 'couchcurb-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '20150923', true );
    
    wp_enqueue_script( 'couchcurb-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '20180718', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'couchcurb_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Hide Advanced Custom Fields
 */

//add_filter('acf/settings/show_admin', '__return_false');



/**
 * Randomize the query on home page
 */



//add_action('pre_get_posts','alter_query');
function alter_query($query){
    //if ($query->is_main_query() &&  is_home())
    if ($query->is_main_query() )
        $query->set('orderby', 'rand'); //Set the order to random
}
 
/**
 * Sort by Advanced Custom Field
 */
// array of filters (field key => field name)
$GLOBALS['my_query_filters'] = array( 
	'field_1'	=> 'rating'
);


// action
add_action('pre_get_posts', 'my_pre_get_posts', 10, 1);

function my_pre_get_posts( $query ) {
	
	// bail early if is in admin
	if( is_admin() ) return;
	
	
	// bail early if not main query
	// - allows custom code / plugins to continue working
	if( !$query->is_main_query() ) return;
	
	
	// get meta query
	$meta_query = $query->get('meta_query');

	
	// loop over filters
	foreach( $GLOBALS['my_query_filters'] as $key => $name ) {
		
		// continue if not found in url
		if( empty($_GET[ $name ]) ) {
			
			continue;
			
		}
		
		
		// get the value for this filter
		// eg: http://www.website.com/events?city=melbourne,sydney
		$value = explode(',', $_GET[ $name ]);
		
		
		// append meta query
    	$meta_query[] = array(
            'key'		=> $name,
            'value'		=> $value,
            'compare'	=> 'IN',
        );
        
	} 
	
	
	// update meta query
	$query->set('meta_query', $meta_query);

}
