<?php

/**
 * Initialize Vallume settings sections
 */
function initialize_vallume_options() {
    /* SECTIONS */

    // home-page-section
    add_settings_section(
        'home-page-section',
        'Home page',
        'home_page_section_cb',
        'vallume-home-page-options'
    );

    // general-section
    add_settings_section(
        'general-section',
        'General',
        'general_section_cb',
        'vallume-general-options'
    );


    /* SETTINGS FIELDS */

    /**
     * home_page_title
     */
    add_settings_field(
        'home_page_title',
        'Title',
        'home_page_title_cb',
        'vallume-home-page-options',
        'home-page-section',
        array()
    );

    /**
     * home_page_subtitle
     */
    add_settings_field(
        'home_page_subtitle',
        'Subtitle',
        'home_page_subtitle_cb',
        'vallume-home-page-options',
        'home-page-section'
    );

    /**
     * home_page_left_button_title
     */
    add_settings_field(
        'home_page_left_button_title',
        'Left button title',
        'home_page_left_button_title_cb',
        'vallume-home-page-options',
        'home-page-section'
    );

    // home_page_left_button_url

    /**
     * home_page_right_button_title
     */
    add_settings_field(
        'home_page_right_button_title',
        'Right button title',
        'home_page_right_button_title_cb',
        'vallume-home-page-options',
        'home-page-section'
    );

    // home_page_right_button_url
    /**
     * home_page_background_img
     */
    add_settings_field(
        'home_page_background_img',
        'Background image',
        'home_page_background_img_cb',
        'vallume-home-page-options',
        'home-page-section'
    );

    // general_option_1
    add_settings_field(
        'general_option_1',
        'General - Option 1',
        'general_option_1_cb',
        'vallume-general-options',
        'general-section',
        array()
    );


    /* REGISTER SETTINGS */
    register_setting( 'vallume-home-page-options', 'home_page_title' );
    register_setting( 'vallume-home-page-options', 'home_page_subtitle' );
    register_setting( 'vallume-home-page-options', 'home_page_left_button_title' );
    register_setting( 'vallume-home-page-options', 'home_page_right_button_title' );
    register_setting( 'vallume-home-page-options', 'home_page_background_img' );

    register_setting( 'vallume-general-options', 'general_option_1' );
}
add_action( 'admin_init', 'initialize_vallume_options' );


/**
 * home_page_title callback to render field
 */
function home_page_title_cb() {
    ?>
    <input
        type="text"
        name="home_page_title"
        size="50"
        value="<?php echo esc_attr( get_option( 'home_page_title' ) ); ?>">
    <?php
}

/**
 * home_page_subtitle callback to render field
 */
function home_page_subtitle_cb() {
    ?>
    <input
        type="text"
        name="home_page_subtitle"
        size="50"
        value="<?php echo esc_attr( get_option( 'home_page_subtitle' ) ); ?>">
    <?php
}

/**
 * home_page_left_button_title_cb callback to render field
 */
function home_page_left_button_title_cb() {
    ?>
    <input
        type="text"
        name="home_page_left_button_title"
        size="50"
        value="<?php echo esc_attr( get_option( 'home_page_left_button_title' ) );?>">
    <?php
}

/**
 * home_page_right_button_title_cb callback to render field
 */
function home_page_right_button_title_cb() {
    ?>
    <input
        type="text"
        name="home_page_right_button_title"
        size="50"
        value="<?php echo esc_attr( get_option( 'home_page_right_button_title' ) ); ?>">
    <?php
}

/**
 * home_page_background_img_cb callback to render field
 */
function home_page_background_img_cb() {
    $src = esc_attr( get_option( 'home_page_background_img' ) );
    ?>
    <img id="home_page_background_img" data-src="<?php echo $src; ?>" src="<?php echo $src; ?>" width="200" height="100" />
    <div>
        <input type="hidden" name="home_page_background_img" value="<?php echo $src; ?>" />
        <button type="submit" class="upload_image_button button"><?php _e('Upload', 'vallume'); ?></button>
        <button type="submit" class="remove_image_button button">&times;</button>
    </div>
    <?php
}


/**
 * general_option_1 callback to render field
 */
function general_option_1_cb() {
    ?>
    <input
        type="text"
        name="general_option_1"
        value="<?php echo esc_attr( get_option( 'general_option_1' ) ); ?>">
    <?php
}

/**
 * general-section callback to render section description
 */
function general_section_cb() {
    ?>
    <p>Here you can change general theme options</p>
    <?php
}


/**
 * home-page-section callback to render section description
 */
function home_page_section_cb() {
    ?>
    <p>Here you can change Home page settings</p>
    <?php
}