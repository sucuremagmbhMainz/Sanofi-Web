<?php
/**
 * Control functions for the Aspegic theme
 * 
 * @author Ashiqur Rahman
 * @url http://choobs.com
 **/

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1150;
}

/**
 * Theme only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
    require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'aspegic_setup' ) ) {
    function aspegic_setup() {

        /*
         * Make theme available for translation.
         */
        load_theme_textdomain( 'aspegic' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1200, 630, true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'aspegic' ),
            'page'  => __( 'Page Menu', 'aspegic' ),
            'footer'  => __( 'Footer Menu', 'aspegic' )
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
            'caption'
        ) );

        /*
         * Enable support for custom logo.
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 248,
            'width'       => 248,
            'flex-height' => true,
        ) );
    }
} // aspegic_setup
add_action( 'after_setup_theme', 'aspegic_setup' );

/**
 * Enqueue scripts and styles
 */
function aspegic_enqueue_scripts() {
    global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    if ( ! is_admin() ) {

        // primary style for theme
        wp_register_style( 'aspegic-main-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );

        // register main stylesheet
        wp_register_style( 'font-awesome', get_stylesheet_directory_uri() . '/library/font-awesome-4.6.3/css/font-awesome.min.css', array(), '', 'all' );
        wp_register_style( 'animate', get_stylesheet_directory_uri() . '/library/animate.css/animate.css', array(), '', 'all' );

        //Google font
        wp_register_style( 'google-fonts', get_stylesheet_directory_uri() . '/library/css/google-fonts.css', array(), '', 'all' );

        wp_register_style( 'aspegic-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );

        // comment reply script for threaded comments
        if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1 ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        //adding scripts file in the footer
        wp_register_script( 'aspegic-js', get_stylesheet_directory_uri() . '/library/js/script.min.js', array( 'jquery' ), '', true );

        //Localize script to add variable values
        wp_localize_script( 'aspegic-js', 'ajax_data', array(
                'ajax_url' => add_query_arg( 'lang', ICL_LANGUAGE_CODE, admin_url( 'admin-ajax.php' ) ),
                'excuse_text' => __( 'I need an excuse', 'aspegic' ),
                'excuse_text_clicked' => __( 'I need a new excuse', 'aspegic' ),
                'base_url' => get_bloginfo( 'url' ),
                'site_name' => get_bloginfo( 'name' ),
                'site_description' => get_bloginfo( 'description' )
            )
        );

        //Add Facebook JavaScript SDK
        wp_add_inline_script( 'aspegic-js', 'window.fbAsyncInit = function() {
                FB.init({
                    appId      : \'177100272723623\',
                    xfbml      : true,
                    version    : \'v2.7\'
                });
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, \'script\', \'facebook-jssdk\'));' );

        // enqueue styles and scripts
        wp_enqueue_style( 'aspegic-main-stylesheet' );
        wp_enqueue_style( 'font-awesome' );
        wp_enqueue_style( 'animate' );
        wp_enqueue_style( 'google-fonts' );
        wp_enqueue_style( 'aspegic-stylesheet' );

        /*
        I recommend using a plugin to call jQuery
        using the google cdn. That way it stays cached
        and your site will load faster.
        */
        wp_enqueue_script( 'jquery', '', '', true );
        wp_enqueue_script( 'aspegic-js' );

    }
}
add_action( 'wp_enqueue_scripts', 'aspegic_enqueue_scripts', 999 );

/**
 * Register custom post types
 */
function register_custom_post_types() {
    /**
     * Register excuse post type
     */

    $labels = array(
        'name'               => _x( 'Excuses', 'post type general name', 'aspegic' ),
        'singular_name'      => _x( 'Excuse', 'post type singular name', 'aspegic' ),
        'menu_name'          => _x( 'Excuses', 'admin menu', 'aspegic' ),
        'name_admin_bar'     => _x( 'Excuse', 'add new on admin bar', 'aspegic' ),
        'add_new'            => _x( 'Add New', 'excuse', 'aspegic' ),
        'add_new_item'       => __( 'Add New Excuse', 'aspegic' ),
        'new_item'           => __( 'New Excuse', 'aspegic' ),
        'edit_item'          => __( 'Edit Excuse', 'aspegic' ),
        'view_item'          => __( 'View Excuse', 'aspegic' ),
        'all_items'          => __( 'All Excuses', 'aspegic' ),
        'search_items'       => __( 'Search Excuses', 'aspegic' ),
        'parent_item_colon'  => __( 'Parent Excuses:', 'aspegic' ),
        'not_found'          => __( 'No excuses found.', 'aspegic' ),
        'not_found_in_trash' => __( 'No excuses found in Trash.', 'aspegic' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description', 'aspegic' ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'excuse' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-format-status',
        'supports'           => array( 'title', 'editor', 'thumbnail', )
    );

    register_post_type( 'excuse', $args );

    /**
     * Register product post type
     */

    $labels = array(
        'name'               => _x( 'Products', 'post type general name', 'aspegic' ),
        'singular_name'      => _x( 'Product', 'post type singular name', 'aspegic' ),
        'menu_name'          => _x( 'Products', 'admin menu', 'aspegic' ),
        'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'aspegic' ),
        'add_new'            => _x( 'Add New', 'excuse', 'aspegic' ),
        'add_new_item'       => __( 'Add New Product', 'aspegic' ),
        'new_item'           => __( 'New Product', 'aspegic' ),
        'edit_item'          => __( 'Edit Product', 'aspegic' ),
        'view_item'          => __( 'View Product', 'aspegic' ),
        'all_items'          => __( 'All Products', 'aspegic' ),
        'search_items'       => __( 'Search Products', 'aspegic' ),
        'parent_item_colon'  => __( 'Parent Products:', 'aspegic' ),
        'not_found'          => __( 'No products found.', 'aspegic' ),
        'not_found_in_trash' => __( 'No products found in Trash.', 'aspegic' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description', 'aspegic' ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'product' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-image-filter',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' )
    );

    register_post_type( 'product', $args );

    /**
     * Register benefit post type
     */

    $labels = array(
        'name'               => _x( 'Benefits', 'post type general name', 'aspegic' ),
        'singular_name'      => _x( 'Benefit', 'post type singular name', 'aspegic' ),
        'menu_name'          => _x( 'Benefits', 'admin menu', 'aspegic' ),
        'name_admin_bar'     => _x( 'Benefit', 'add new on admin bar', 'aspegic' ),
        'add_new'            => _x( 'Add New', 'excuse', 'aspegic' ),
        'add_new_item'       => __( 'Add New Benefit', 'aspegic' ),
        'new_item'           => __( 'New Benefit', 'aspegic' ),
        'edit_item'          => __( 'Edit Benefit', 'aspegic' ),
        'view_item'          => __( 'View Benefit', 'aspegic' ),
        'all_items'          => __( 'All Benefits', 'aspegic' ),
        'search_items'       => __( 'Search Benefits', 'aspegic' ),
        'parent_item_colon'  => __( 'Parent Benefits:', 'aspegic' ),
        'not_found'          => __( 'No benefits found.', 'aspegic' ),
        'not_found_in_trash' => __( 'No benefits found in Trash.', 'aspegic' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description', 'aspegic' ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'benefit' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-megaphone',
        'supports'           => array( 'title', 'editor', 'thumbnail' )
    );

    register_post_type( 'benefit', $args );

    /**
     * Register pain post type
     */

    $labels = array(
        'name'               => _x( 'Pains', 'post type general name', 'aspegic' ),
        'singular_name'      => _x( 'Pain', 'post type singular name', 'aspegic' ),
        'menu_name'          => _x( 'Pains', 'admin menu', 'aspegic' ),
        'name_admin_bar'     => _x( 'Pain', 'add new on admin bar', 'aspegic' ),
        'add_new'            => _x( 'Add New', 'excuse', 'aspegic' ),
        'add_new_item'       => __( 'Add New Pain', 'aspegic' ),
        'new_item'           => __( 'New Pain', 'aspegic' ),
        'edit_item'          => __( 'Edit Pain', 'aspegic' ),
        'view_item'          => __( 'View Pain', 'aspegic' ),
        'all_items'          => __( 'All Pains', 'aspegic' ),
        'search_items'       => __( 'Search Pains', 'aspegic' ),
        'parent_item_colon'  => __( 'Parent Pains:', 'aspegic' ),
        'not_found'          => __( 'No pains found.', 'aspegic' ),
        'not_found_in_trash' => __( 'No pains found in Trash.', 'aspegic' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description', 'aspegic' ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'pain' ),
        'capability_type'    => 'page',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-clipboard',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' )
    );

    register_post_type( 'pain', $args );
}
add_action( 'init', 'register_custom_post_types' );

/**
 * Add a custom body class
 */
function aspegic_body_class($classes = '')
{
    $classes[] = 'aspegic-choobs';
    return $classes;
}
add_filter('body_class','aspegic_body_class');

/**
 * Remove posts and comments from admin menu
 */
function remove_posts_page() {
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_posts_page' );

require_once 'library/utility/functions.php';