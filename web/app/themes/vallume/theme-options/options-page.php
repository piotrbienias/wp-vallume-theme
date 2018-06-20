<?php

require_once('settings.php');


/**
 * Load scripts for options page
 */
function vallume_options_page_scripts() {
    wp_enqueue_media();
    
    wp_register_script( 'vallume-options-script', get_template_directory_uri() . '/theme-options/js/scripts.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'vallume-options-script' );
}
add_action( 'admin_enqueue_scripts', 'vallume_options_page_scripts' );



/**
 * Add Vallume options page to WP Dashboard
 */
function vallume_options_page_setup() {
    add_options_page(
        'Vallume options',
        'Theme options',
        'manage_options',
        'vallume-options',
        'add_valume_options_page'
    );
}
add_action( 'admin_menu', 'vallume_options_page_setup' );


/**
 * Rendering Vallume options page
 */
function add_valume_options_page() {

    global $vallume_options_tab;

    $vallume_options_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'home';

    ?>
    <h2 class="nav-tab-wrapper">
        <?php
            do_action( 'vallume_home_tab' );
            do_action( 'vallume_general_tab' );
        ?>
    </h2>
    <?php
        do_action( 'vallume_home_content' );
        do_action( 'vallume_general_content' );

}


/**
 * Render GENERAL tab
 */
function print_vallume_general_tab() {
    global $vallume_options_tab;
    ?>
    <a
        class="nav-tab <?php echo $vallume_options_tab == 'general' ? 'nav-tab-active' : ''; ?>"
        href="<?php echo admin_url( 'options-general.php?page=vallume-options&tab=general' ); ?>">
        <?php _e('General', 'vallume'); ?>
    </a>
    <?php
}
add_action( 'vallume_general_tab', 'print_vallume_general_tab', 1 );


/**
 * Render HOME tab
 */
function print_vallume_home_tab() {
    global $vallume_options_tab;

    ?>
    <a
        class="nav-tab <?php echo $vallume_options_tab == 'home' || '' ? 'nav-tab-active' : ''; ?>"
        href="<?php echo admin_url( 'options-general.php?page=vallume-options&tab=home' ); ?>">
        <?php _e('Home page', 'vallume'); ?>
    </a>
    <?php
}
add_action( 'vallume_home_tab', 'print_vallume_home_tab', 1 );


/**
 * Render HOME tab content
 */
function print_vallume_home_content() {
    global $vallume_options_tab;

    if ( $vallume_options_tab == '' || $vallume_options_tab == 'home' ) {
        ?>
        <form method="post" action="options.php">
            <?php
                settings_fields( 'vallume-home-page-options' );
                do_settings_sections( 'vallume-home-page-options' );
                submit_button();
            ?>
        </form>
        <?php
    } else {
        return;
    }
}
add_action( 'vallume_home_content', 'print_vallume_home_content' );



/**
 * Render GENERAL tab content
 */
function print_valume_general_content() {
    global $vallume_options_tab;

    if ( $vallume_options_tab == 'general' ) {
        ?>
        <form method="post" action="options.php">
            <?php
                settings_fields( 'vallume-general-options' );
                do_settings_sections( 'vallume-general-options' );
                submit_button();
            ?>
        </form>
        <?php
    }
}
add_action( 'vallume_general_content', 'print_valume_general_content' );