<?php

/**
 * Initialize Vallume settings sections
 */
function initialize_vallume_options() {
    /* SECTIONS */

    // home-page-section
    

    // general-section
    add_settings_section(
        'general-section',
        'General',
        'general_section_cb',
        'vallume-general-options'
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
    

    register_setting( 'vallume-general-options', 'general_option_1' );
}
add_action( 'admin_init', 'initialize_vallume_options' );





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