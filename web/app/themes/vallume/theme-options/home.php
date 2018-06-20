<?php

class HomePageOptions {

    /**
     * create section, add settings and register them
     */
    function __construct() {
        add_action( 'admin_init', array( $this, 'initialize_home_settings' ) );
    }

    /**
     * initialize home page settings section
     */
    public function initialize_home_settings() {
        add_settings_section(
            'home-page-section',
            'Home page',
            array( $this, 'home_page_section_cb' ),
            'vallume-home-page-options'
        );

        $this->add_home_page_settings();
    }

    /**
     * home-page-section callback to render section description
     */
    public function home_page_section_cb() {
        ?>
        <p>Here you can change Home page settings</p>
        <?php
    }

    /**
     * create home page settings
     */
    private function add_home_page_settings() {
        add_settings_field(
            'home_page_title',
            'Title',
            array('VallumeHelper', 'render_simple_input_field'),
            'vallume-home-page-options',
            'home-page-section',
            array( 'home_page_title' )
        );

        add_settings_field(
            'home_page_subtitle',
            'Subtitle',
            array('VallumeHelper', 'render_simple_input_field'),
            'vallume-home-page-options',
            'home-page-section',
            array( 'home_page_subtitle' )
        );

        add_settings_field(
            'home_page_left_button_title',
            'Left button title',
            array('VallumeHelper', 'render_simple_input_field'),
            'vallume-home-page-options',
            'home-page-section',
            array( 'home_page_left_button_title' )
        );

        add_settings_field(
            'home_page_right_button_title',
            'Right button title',
            array('VallumeHelper', 'render_simple_input_field'),
            'vallume-home-page-options',
            'home-page-section',
            array( 'home_page_right_button_title' )
        );

        add_settings_field(
            'home_page_background_img',
            'Background image',
            array( $this, 'home_page_background_img_cb' ),
            'vallume-home-page-options',
            'home-page-section'
        );

        $this->register_home_page_settings();
    }

    /**
     * home_page_background_img_cb callback to render field
     */
    public function home_page_background_img_cb() {
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
     * register home page settings
     */
    private function register_home_page_settings() {
        register_setting( 'vallume-home-page-options', 'home_page_title' );
        register_setting( 'vallume-home-page-options', 'home_page_subtitle' );
        register_setting( 'vallume-home-page-options', 'home_page_left_button_title' );
        register_setting( 'vallume-home-page-options', 'home_page_right_button_title' );
        register_setting( 'vallume-home-page-options', 'home_page_background_img' );
    }

}

new HomePageOptions();