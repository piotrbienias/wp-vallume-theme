<?php

get_header();
while( have_posts() ):
    the_post();

?>

<div class="wrapper bgded overlay" style="background-color: rgba(0,0,0,.5);">

    <h6 style="text-align: center; padding: 20px;" class="heading"><?php echo the_title(); ?></h6>

</div>

<div class="wrapper row3">

    <main class="hoc container clear">

        <div class="content three_quarter first">
            <p style="text-align: center; margin-bottom: 45px; padding-left: 20px; padding-right: 20px;">
                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" />
            </p>
            <?php echo the_content(); ?>
        </div>

        <div class="sidebar one_quarter">
            <?php dynamic_sidebar( 'sidebar' ); ?>
        </div>

    </main>

</div>

<?php

endwhile;

get_footer();