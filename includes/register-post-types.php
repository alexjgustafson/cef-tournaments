<?php

namespace CEF\Tournaments;

add_action('init', function(){
    register_post_type(
        'tournament',
        [
        'labels'                => [
            'name'                  => __( 'Tournaments', 'cef' ),
            'singular_name'         => __( 'Tournament', 'cef' ),
            'all_items'             => __( 'All Tournaments', 'cef' ),
            'archives'              => __( 'Tournament Archives', 'cef' ),
            'attributes'            => __( 'Tournament Attributes', 'cef' ),
            'insert_into_item'      => __( 'Insert into Tournament', 'cef' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Tournament', 'cef' ),
            'featured_image'        => _x( 'Featured Image', 'tournament', 'cef' ),
            'set_featured_image'    => _x( 'Set featured image', 'tournament', 'cef' ),
            'remove_featured_image' => _x( 'Remove featured image', 'tournament', 'cef' ),
            'use_featured_image'    => _x( 'Use as featured image', 'tournament', 'cef' ),
            'filter_items_list'     => __( 'Filter Tournaments list', 'cef' ),
            'items_list_navigation' => __( 'Tournaments list navigation', 'cef' ),
            'items_list'            => __( 'Tournaments list', 'cef' ),
            'new_item'              => __( 'New Tournament', 'cef' ),
            'add_new'               => __( 'Add New', 'cef' ),
            'add_new_item'          => __( 'Add New Tournament', 'cef' ),
            'edit_item'             => __( 'Edit Tournament', 'cef' ),
            'view_item'             => __( 'View Tournament', 'cef' ),
            'view_items'            => __( 'View Tournaments', 'cef' ),
            'search_items'          => __( 'Search Tournaments', 'cef' ),
            'not_found'             => __( 'No Tournaments found', 'cef' ),
            'not_found_in_trash'    => __( 'No Tournaments found in trash', 'cef' ),
            'parent_item_colon'     => __( 'Parent Tournament:', 'cef' ),
            'menu_name'             => __( 'Tournaments', 'cef' ),
        ],
        'public'                => true,
        'hierarchical'          => false,
        'show_ui'               => true,
        'show_in_nav_menus'     => true,
        'supports'              => [ 'title', 'editor' ],
        'has_archive'           => true,
        'rewrite'               => true,
        'query_var'             => true,
        'menu_position'         => null,
        'menu_icon'             => 'dashicons-awards',
        'show_in_rest'          => true,
        'rest_base'             => 'tournament',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        ],
    );
});


