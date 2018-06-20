<div id="topbar" class="hoc clear">
    <div class="fl_left">
        <?php

            wp_nav_menu(
                array(
                    'theme_location'    => 'top-menu',
                    'menu_class'        => 'nospace',
                    'container'         => 'ul'
                )
            );

        ?>
    </div>
</div>