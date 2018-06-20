<?php

class CallToAction {

    function __construct() {
        add_shortcode( 'call_to_action', array( $this, 'call_to_action_shortcode' ) );
    }

    public function call_to_action_shortcode( $attributes, $content = null ) {
        $attributes = shortcode_atts(
            array(
                'title'         => 'Check it out!',
                'button_title'  => 'Click me!',
                'button_url'    => '#',
                'img'           => '',
                'classes'       => 'wrapper bgded overlay',
                'id'            => ''
            ),
            $attributes
        );

        $id = $attributes['id'] != '' ? 'id="' . $attributes['id'] . '"' : '';

        $html = '
            <div ' . $attributes['id'] . ' class="' . $attributes['classes'] . '" style="background-image: url(\'' . $attributes['img'] . '\');">
                <article class="hoc cta clear">
                    <h6 class="three_quarter first">' . $attributes['title'] . '</h6>
                    <footer class="one_quarter">
                        <a class="btn" href="' . $attributes['button_url'] . '">' . $attributes['button_title'] . ' »</a>
                    </footer>
                </article>
            </div>
        ';

        return $html;
    }

}

new CallToAction();