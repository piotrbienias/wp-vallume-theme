<?php


class LatestPostsWidget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'latest_posts_widget',
            esc_html__( 'Latest posts', 'vallume' ),
            array( 'description' => esc_html__( 'Vallume - Latest posts', 'vallume' ) )
        );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        if ( !empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        echo 'Hello!';

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Latest posts', 'vallume' );

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">Title</label>
            <input
                class="widefat"
                id="<?php echo esc_attr( $this->get_field_id('title') ); ?>"
                name="<?php echo esc_attr( $this->get_field_name('title') ); ?>"
                type="text"
                value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

        return $instance;
    }

}

function register_latest_posts_widget() {
    register_widget( 'LatestPostsWidget' );
}
add_action( 'widgets_init', 'register_latest_posts_widget' );