<?php

class Testimonials {

    function __construct() {
        add_shortcode( 'testimonials', array( $this, 'testimonials_shortcode' ) );
    }

    public function testimonials_shortcode( $attributes, $content = null ) {
        $attributes = shortcode_atts(
            array(
                'title'         => 'Our customers reviews',
                'subtitle'      => '',
                'button_url'    => '#',
                'button_title'  => 'View more'
            ),
            $attributes
        );

        $testimonials = get_posts(
            array(
                'post_type'         => 'testimonials',
                'posts_per_page'    => 3
            )
        );

        $html = '
            <section class="hoc container clear testimonials">
                <div class="sectiontitle">
                    <h6 class="heading">' . $attributes['title'] . '</h6>
                    <p>' . $attributes['subtitle'] . '</p>
                </div>  
                <ul class="nospace group btmspace-80">
        ';

        foreach( $testimonials as $index => $testimonial ) {
            $position = get_post_meta( $testimonial->ID, 'position', true );
            $content = apply_filters( 'the_content', $testimonial->post_content );
            $img = get_the_post_thumbnail_url( $testimonial->ID );

            $li_class = $index == 0 ? 'one_third first' : 'one_third';

            $html .= '
                <li class="'. $li_class . '">
                    <blockquote>' . $content . '</blockquote>
                    <figure class="clear">
                        <img style="width: 60px; height: auto;" class="circle" src="' . $img . '" />
                        <figcaption>
                            <h6 class="heading">' . $testimonial->post_title . '</h6>
                            <em>' . $position . '</em>
                        </figcaption>
                    </figure>
                </li>
            ';
        }

        $html .= '</ul></section>';

        return $html;
    }

}

new Testimonials();