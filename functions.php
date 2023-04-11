<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! isset( $content_width ) ) $content_width = 1200;

/*============== THEME ESSENTIALS START ==============*/
function saTheme_init() {
    // add_theme_support( 'title-tag' );
    add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'custom-logo', array(
		'width' => 260,
		'height' => 100,
		'flex-height' => true,
		'flex-width' => true,
	) );
	
	register_nav_menus( array( 
        'desk_main_menu' => __( 'Desk Main Menu', 'saTheme' ),
        'mob_main_menu' => __( 'Mob Main Menu', 'saTheme' ),
        'footer_menu' => __( 'Footer Menu', 'saTheme' ),
         )
	);
}
add_action( 'after_setup_theme', 'saTheme_init' );

function saTheme_scripts_styles() {
	wp_enqueue_style( 'saTheme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'saTheme_scripts_styles' );
/*============== THEME ESSENTIALS END ==============*/


/*============== SA SEO START ==============*/
function saPageTitle(){ if(is_front_page()) { bloginfo('name'); echo " - "; bloginfo('description'); } else{ wp_title('-', true, 'right'); bloginfo('name');} };
function saPageDescription(){ if(has_excerpt()) { echo get_the_excerpt(); } else{ bloginfo('name'); echo " - "; bloginfo('description'); } };
function saPageUrl(){echo esc_url(get_permalink());};
function saPageImgUrl() {echo get_site_icon_url();};
/*============== SA SEO END ==============*/


/*============== REMOVE UNWANTED WP ASSETS START ==============*/
// remove emoji support
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove rss feed links
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

// remove wp-embed
add_action( 'wp_footer', function(){
    wp_dequeue_script( 'wp-embed' );
});

add_action( 'wp_enqueue_scripts', function(){
    // // remove block library css
    wp_dequeue_style( 'wp-block-library' );
    // // remove comment reply JS
    wp_dequeue_script( 'comment-reply' );
} );

// Remove Deafult WP CSS
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );

//Remove CSS assets from Gutenberg Blocks & WooCommerce Blocks
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' );
}, 100 );

// Remove id='classic-theme-styles-css' From Header
add_action( 'wp_enqueue_scripts', 'mywptheme_child_deregister_styles', 20 );
function mywptheme_child_deregister_styles() {
    wp_dequeue_style( 'classic-theme-styles' );
}

//Remove id='dashicons-css'
function disable_dashicons() {
   wp_deregister_style('dashicons');
}
add_action('wp_enqueue_scripts', 'disable_dashicons');

//Elementor - disable font awesome
add_action( 'elementor/frontend/after_register_styles',function() {
    foreach( [ 'solid', 'regular', 'brands' ] as $style ) {
        wp_deregister_style( 'elementor-icons-fa-' . $style );
    }
}, 20 );

//Remove Elementor Icon's + Font Awesome 2 CSS
function disable_elementor_font_awesome() {
    wp_deregister_style('elementor-icons');
    wp_deregister_style('font-awesome');
    wp_dequeue_style('elementor-icons');
    wp_dequeue_style('font-awesome');
}
add_action('wp_enqueue_scripts', 'disable_elementor_font_awesome', 9999);
/*============== REMOVE UNWANTED WP ASSETS END ==============*/
