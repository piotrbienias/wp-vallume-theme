<?php

class Separator {

    function __construct() {
        add_shortcode( 'separator', array( $this, 'separator_shortcode' ) );
    }

    public function separator_shortcode( $attributes ) {
        $attributes = shortcode_atts(
            array(
                'class' => 'btmspace-80'
            ),
            $attributes
        );

        return '<hr class="' . $attributes['class'] . '"></hr>';
    }
    
}

new Separator();