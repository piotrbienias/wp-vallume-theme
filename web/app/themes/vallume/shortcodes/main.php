<?php

class Main {

    function __construct() {
        add_shortcode( 'main', array( $this, 'main_shortcode' ) );
    }

    public function main_shortcode( $attributes, $content = null ) {
        $attributes = shortcode_atts(
            array(
                'classes'   => ''
            ),
            $attributes
        );

        return '<main class="' . $attributes['classes'] . '">' . do_shortcode( $content ) . '</main>';
    }

}

new Main();