<?php
/**
 * Template Name: Home Page
 * 
 * @package WordPress
 * @subpackage Vallume
 */

get_header();

?>

<div class="wrapper bgded overlay" style="background-image: url('<?php echo get_option('home_page_background_img'); ?>'">

    <div id="pageintro" class="hoc clear">
        <article>
            <p><?php echo esc_attr( get_option( 'home_page_subtitle') ); ?></p>
            <h3 class="heading"><?php echo esc_attr( get_option( 'home_page_title' ) ); ?></h3>
            <footer>
                <ul class="nospace inline pushright">
                    <li><a class="btn" href="#"><?php echo esc_attr( get_option( 'home_page_left_button_title' ) ); ?></a>
                    <li><a class="btn inverse" href="#"><?php echo esc_attr( get_option( 'home_page_right_button_title' ) ); ?></a>
                </ul>
            </footer>
        </article>
    </div>

</div>

<?php get_footer(); ?>