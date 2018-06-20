<?php

function testimonial_post_type() {
    
    $labels = array(
        'name'          => 'Testimonials',
        'singular_name' => 'Testimonial',
        'menu_name'     => 'Testimonials',
        'all_items'     => 'All testimonials',
        'view_item'     => 'View testimonial',
        'add_new_item'  => 'Add new testimonial',
        'add_new'       => 'Add new',
        'edit_item'     => 'Edit testimonial',
        'update_item'   => 'Update testimonial',
        'search_items'  => 'Search testimonial',
        'not_found'     => 'Not found'
    );

    $args = array(
        'label'         => 'testimonials',
        'labels'        => $labels,
        'supports'      => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),
        'hierarchical'  => false,
        'public'        => true,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'has_archive'   => false,
        'capability_type'   => 'post'
    );

    register_post_type( 'testimonials', $args );

}
add_action( 'init', 'testimonial_post_type', 0 );