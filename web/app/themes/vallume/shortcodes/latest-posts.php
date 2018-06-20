<?php

class LatestPosts {

    function __construct() {
        add_shortcode( 'latest_posts', array( $this, 'latest_posts_shortcode' ) );
    }

    public function latest_posts_shortcode( $attributes, $content = null ) {
        $attributes = shortcode_atts(
            array(
                'title'     => 'Latest posts',
                'subtitle'  => '',
                'post_type' => 'post'
            ),
            $attributes
        );

        $posts = get_posts(
            array(
                'post_type'         => $attributes['post_type'],
                'posts_per_page'    => 3
            )
        );

        $html = '
            <section>
                <div class="sectiontitle">
                    <h6 class="heading">' . $attributes['title'] . '</h6>
                    <p>' . $attributes['subtitle'] . '</p>
                </div>
                <ul class="nospace group overview">
        ';

        foreach( $posts as $post ) {
            $post_url = get_permalink( $post->ID );
            $img_url = get_the_post_thumbnail_url( $post->ID );
            $text = apply_filters( 'the_content', $post->post_excerpt );

            $html .= '
                <li class="one_third">
                    <figure>
                        <a href="' . $post_url . '">
                            <img src="' . $img_url . '" />
                        </a>
                        <figcaption>
                            <h6 class="heading">
                                <a href="' . $post_url . '">' . $post->post_title . '</a>
                            </h6>
                            <p>' . $text . '</p>
                        </figcaption>
                    </figure>
                </li>
            ';
        }

        $html .= '</ul></section>';

        return $html;
    }

}

new LatestPosts();