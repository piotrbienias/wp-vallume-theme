<?php

class VallumeHelper {

    public static function render_simple_input_field($args) {
        ?>
        <input
            type="text"
            name="<?php echo $args[0]; ?>"
            size="50"
            value="<?php echo esc_attr( get_option( $args[0] ) ); ?>">
        <?php
    }

}