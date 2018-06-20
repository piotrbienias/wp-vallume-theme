<?php

class Introblocks {

    function __construct() {
        add_shortcode( 'introblocks', array( $this, 'introblocks_shortcode' ) );
        add_shortcode( 'introblock', array( $this, 'introblock_shortcode' ) );
    }

    public function introblocks_shortcode( $attributes, $content = null ) {
        $attributes = shortcode_atts(
            array(
                'title'         => '',
                'subtitle'      => '',
                'button_title'  => 'Click me!',
                'button_url'    => '#'
            ),
            $attributes
        );

        $html = '
                <section id="introblocks">
                    <div class="sectiontitle">
                        <h6 class="heading">' . $attributes['title'] . '</h6>
                        <p>' . $attributes['subtitle'] . '</p>
                    </div>
                    <ul class="nospace btmspace-80 group">
                        ' . do_shortcode( $content ) . '
                    </ul>
                    <p class="center">
                        <a class="btn" href="' . $attributes['button_url'] . '">' . $attributes['button_title'] . '</a>
                    </p>
                </section>
        ';

        return $html;
    }

    public function introblock_shortcode( $attributes, $content = null ) {
        $attributes = shortcode_atts(
            array(
                'title'     => '',
                'text'      => '',
                'i_class'   => '',
                'url'       => '#',
                'first'     => '0'
            ),
            $attributes
        );

        $li_class = $attributes['first'] == '1' ? 'first' : '';

        $html = '
            <li class="one_third ' . $li_class . '">
                <article>
                    <i class="' . $attributes['i_class'] . '"></i>
                    <h6 class="heading font-x1">
                        <a href="' . $attributes['url'] . '">' . $attributes['title'] . '</a>
                    </h6>
                    <p>' . $attributes['text'] . '</p>
                </article>
            </li>
        ';

        return $html;
    }

}

new Introblocks();