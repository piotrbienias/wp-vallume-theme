<header id="header" class="hoc clear">
    <div id="logo" class="fl_left">
        <h1>
            <a href="<?php get_site_url(); ?>">Vallume</a>
        </h1>
    </div>
    <nav id="mainav" class="fl_right">
        <?php
            wp_nav_menu(
                array(
                    'theme_location'    => 'main-menu',
                    'menu_class'        => 'clear',
                    'container'         => 'ul'
                )
            );
        ?>
    </nav>
</header>