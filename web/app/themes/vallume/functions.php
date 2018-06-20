<?php

remove_action('wp_head', 'wp_generator');


require_once('theme-options/options-page.php');


// enqueue style files
function add_stylesheets() {
    wp_register_style( 'vallume-stylesheet', get_template_directory_uri() . '/dist/css/style.css', array(), false, 'all' );
    wp_register_style( 'vallume-framework', get_template_directory_uri() . '/dist/css/framework.css', array(), false, 'all');
    wp_register_style( 'vallume-layout', get_template_directory_uri() . '/dist/css/layout.css', array(), false, 'all' );
    wp_register_style( 'vallume-fontawesome', get_template_directory_uri() . '/dist/css/font-awesome.min.css', array(), false, 'all' );

    wp_enqueue_style( 'vallume-fontawesome' );
    wp_enqueue_style( 'vallume-stylesheet' );
    wp_enqueue_style( 'vallume-framework' );
    wp_enqueue_style( 'vallume-layout' );
}
add_action( 'wp_enqueue_scripts', 'add_stylesheets' );


// enqueue javascript files
function add_javascript() {
    wp_register_script( 'jquery-backtotop', get_template_directory_uri() . '/dist/js/jquery.backtotop-min.js', array( 'jquery' ), false, true);
    wp_register_script( 'vallume-scripts', get_template_directory_uri() . '/dist/js/scripts-min.js', array( 'jquery' ), false, true );

    wp_enqueue_script( 'jquery-backtotop' );
    wp_enqueue_script( 'vallume-scripts' );
}
add_action( 'wp_enqueue_scripts', 'add_javascript' );


// register main menu
function register_main_menu() {
    register_nav_menus(
        array(
            'main-menu'     => 'Main menu',
            'top-menu'      => 'Top menu',
            'footer-menu'   => 'Footer menu'
        )
    );
}
add_action( 'init', 'register_main_menu' );


// add 'linklist' class to footer menu
function add_linklist_to_footer_menu( $items, $args ) {

    // print_r( $args );
    if ( $args->theme_location == 'footer-menu' ) {
        // echo $args->menu_class;
        $args->menu_class .= ' linklist';
        // echo $args->menu_class;
    }

    return $items;

    // if ( $args->theme_location == 'footer-menu' ) {
    //     $classes .= ' linklist';
    // }

    // return $classes;
}
add_filter( 'wp_nav_menu_items', 'add_linklist_to_footer_menu', 10, 2 );


// add 'drop' class if menu item has submenu
function add_drop_class_to_menu_item( $atts, $item, $args, $depth ) {

    if ( in_array( 'menu-item-has-children', $item->classes ) ){

        if ( array_key_exists('class', $atts) ) {
            $atts['class'] .= ' drop';
        } else {
            $atts['class'] = 'drop';
        }

    }

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_drop_class_to_menu_item', 10, 4 );


// register footer widgets
function register_footer_widgets() {

    register_sidebar(
        array(
            'name'              => 'Footer 1',
            'id'                => 'widget-footer-1',
            'before_widget'     => '<div>',
            'after_widget'      => '</div>',
            'before_title'      => '<h6 class="heading">',
            'after_title'       => '</h6>'
        )
    );

    register_sidebar(
        array(
            'name'              => 'Footer 2',
            'id'                => 'widget-footer-2',
            'class'             => 'lolopolo',
            'before_widget'     => '<div>',
            'after_widget'      => '</div>',
            'before_title'      => '<h6 class="heading">',
            'after_title'       => '</h6>'
        )
    );

    register_sidebar(
        array(
            'name'              => 'Footer 3',
            'id'                => 'widget-footer-3',
            'before_widget'     => '<div>',
            'after_widget'      => '</div>',
            'before_title'      => '<h6 class="heading">',
            'after_title'       => '</h6>'
        )
    );

    register_sidebar(
        array(
            'name'              => 'Footer 4',
            'id'                => 'widget-footer-4',
            'before_widget'     => '<div>',
            'after_widget'      => '</div>',
            'before_title'      => '<h6 class="heading">',
            'after_title'       => '</h6>'
        )
    );

}
add_action( 'widgets_init', 'register_footer_widgets' );