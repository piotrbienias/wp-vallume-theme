<!doctype html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta charset="<?php bloginfo( 'charset' ); ?>" />

        <meta name="description" content="Keywords">
        <meta name="author" content="Name">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/path/favicon.ico" />
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS2 Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

        <title><?php bloginfo( 'name' ); ?></title>

        <?php wp_head(); ?>
    </head>
    <body id="top" <?php body_class(); ?>>
        <div class="wrapper row0">
            <?php get_template_part( 'template-parts/menu/top' ); ?>
        </div>
        <div class="wrapper row1">
            <?php get_template_part( 'template-parts/menu/main' ); ?>
        </div>