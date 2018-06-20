<?php

class Row {

    function __construct() {
        add_shortcode( 'row', array( $this, 'row_shortcode' ) );
    }

    public function row_shortcode( $attributes, $content = null ) {
        $attributes = shortcode_atts(
            array(
                'type'      => '2',
                'classes'   => '',
                'id'        => ''
            ),
            $attributes
        );

        $id = $attributes['id'] != '' ? 'id="' . $attributes['id'] . '"' : '';

        $html = '
            <div ' . $id . ' class="wrapper row' . $attributes['type'] . ' ' . $attributes['classes'] . '">' . do_shortcode( $content ) . '</div>
        ';

        return $html;
    }

}

new Row();