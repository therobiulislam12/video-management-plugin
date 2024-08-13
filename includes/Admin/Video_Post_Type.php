<?php

namespace Video\Management\Admin;

class Video_Post_Type {

    /**
     * Create custom video post type
     * @return void
     */
    public function rvm_video_post_type() {
        $labels = array(
            'name'                  => _x( 'Videos', 'Post Type General Name', 'r_video_management' ),
            'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'r_video_management' ),
            'menu_name'             => __( 'Videos', 'r_video_management' ),
            'name_admin_bar'        => __( 'Video', 'r_video_management' ),
            'archives'              => __( 'Video Archives', 'r_video_management' ),
            'attributes'            => __( 'Item Attributes', 'r_video_management' ),
            'parent_item_colon'     => __( 'Parent Item:', 'r_video_management' ),
            'all_items'             => __( 'All Videos', 'r_video_management' ),
            'add_new_item'          => __( 'Add New Video', 'r_video_management' ),
            'add_new'               => __( 'Add New Video', 'r_video_management' ),
            'new_item'              => __( 'New Video', 'r_video_management' ),
            'edit_item'             => __( 'Edit Video', 'r_video_management' ),
            'update_item'           => __( 'Update Video', 'r_video_management' ),
            'view_item'             => __( 'View Video', 'r_video_management' ),
            'view_items'            => __( 'View Videos', 'r_video_management' ),
            'search_items'          => __( 'Search Video', 'r_video_management' ),
            'not_found'             => __( 'Video Not found', 'r_video_management' ),
            'not_found_in_trash'    => __( 'Video Not found in Trash', 'r_video_management' ),
            'featured_image'        => __( 'Video Thumbnail', 'r_video_management' ),
            'set_featured_image'    => __( 'Set Video Thumbnail', 'r_video_management' ),
            'remove_featured_image' => __( 'Remove Video Thumbnail', 'r_video_management' ),
            'use_featured_image'    => __( 'Use as Video Thumbnail', 'r_video_management' ),
            'insert_into_item'      => __( 'Insert into Video', 'r_video_management' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Video', 'r_video_management' ),
            'items_list'            => __( 'Items list', 'r_video_management' ),
            'items_list_navigation' => __( 'Items list navigation', 'r_video_management' ),
            'filter_items_list'     => __( 'Filter items list', 'r_video_management' ),
        );
        $args = array(
            'label'               => __( 'Video', 'r_video_management' ),
            'description'         => __( 'Video Management Post Type', 'r_video_management' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'thumbnail' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 25,
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'taxonomies'          => array( 'video_category' ),
        );
        register_post_type( 'video', $args );
    }

    public function rvm_video_category() {
        $labels = array(
            'name'                       => _x( 'Video Categories', 'Taxonomy General Name', 'r_video_management' ),
            'singular_name'              => _x( 'Video Category', 'Taxonomy Singular Name', 'r_video_management' ),
            'menu_name'                  => __( 'Video Category', 'r_video_management' ),
            'all_items'                  => __( 'All Categories', 'r_video_management' ),
            'parent_item'                => __( 'Parent Item', 'r_video_management' ),
            'parent_item_colon'          => __( 'Parent Item:', 'r_video_management' ),
            'new_item_name'              => __( 'New Category', 'r_video_management' ),
            'add_new_item'               => __( 'Add New Category', 'r_video_management' ),
            'edit_item'                  => __( 'Edit Category', 'r_video_management' ),
            'update_item'                => __( 'Update Category', 'r_video_management' ),
            'view_item'                  => __( 'View Category', 'r_video_management' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'r_video_management' ),
            'add_or_remove_items'        => __( 'Add or remove Categories', 'r_video_management' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'r_video_management' ),
            'popular_items'              => __( 'Popular Items', 'r_video_management' ),
            'search_items'               => __( 'Search Categories', 'r_video_management' ),
            'not_found'                  => __( 'Category Not Found', 'r_video_management' ),
            'no_terms'                   => __( 'No Categories', 'r_video_management' ),
            'items_list'                 => __( 'Items list', 'r_video_management' ),
            'items_list_navigation'      => __( 'Items list navigation', 'r_video_management' ),
        );
        $args = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => true,
        );
        register_taxonomy( 'video_category', array( 'video' ), $args );
    }
}