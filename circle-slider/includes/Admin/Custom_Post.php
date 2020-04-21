<?php

namespace Circle\Slider\Admin;


/**
 * Class Custom_Post
 * @package Circle\Slider\Admin
 */
class Custom_Post {

    /**
     * Custom_Post constructor.
     */
    function __construct() {
        add_action('init', [$this, 'init_custom_post']);
    }

    /**
     * Custom post register
     */
    public function init_custom_post() {
        /**
         * Post type Circle Slider
         */
        $labels = array(
            'name'                  => _x('Circle Slider', 'Post Type General Name', 'circle-slider'),
            'singular_name'         => _x('Circle Slider', 'Post Type Singular Name', 'circle-slider'),
            'menu_name'             => __('Circle Sliders', 'circle-slider'),
            'name_admin_bar'        => __('Circle Slider', 'circle-slider'),
            'archives'              => __('Circle Slider Archives', 'circle-slider'),
            'attributes'            => __('Circle Slider Attributes', 'circle-slider'),
            'parent_item_colon'     => __('Parent Item:', 'circle-slider'),
            'all_items'             => __('All Circle Item', 'circle-slider'),
            'add_new_item'          => __('Add New Circle Item', 'circle-slider'),
            'add_new'               => __('Add New Circle Item', 'circle-slider'),
            'new_item'              => __('New Circle Item', 'circle-slider'),
            'edit_item'             => __('Edit Circle Item', 'circle-slider'),
            'update_item'           => __('Update Circle Item', 'circle-slider'),
            'view_item'             => __('View Circle Item', 'circle-slider'),
            'view_items'            => __('View Circle Item', 'circle-slider'),
            'search_items'          => __('Search Circle Item', 'circle-slider'),
            'not_found'             => __('Not found', 'circle-slider'),
            'not_found_in_trash'    => __('Not found in Trash', 'circle-slider'),
            'featured_image'        => __('Featured Image', 'circle-slider'),
            'set_featured_image'    => __('Set featured image', 'circle-slider'),
            'remove_featured_image' => __('Remove featured image', 'circle-slider'),
            'use_featured_image'    => __('Use as featured image', 'circle-slider'),
            'insert_into_item'      => __('Insert into item', 'circle-slider'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'circle-slider'),
            'items_list'            => __('Sections list', 'circle-slider'),
            'items_list_navigation' => __('Sections list navigation', 'circle-slider'),
            'filter_items_list'     => __('Filter sections list', 'circle-slider'),
        );
        $args   = array(
            'label'               => __('Circle Slider', 'circle-slider'),
            'description'         => __('Circle Sliders', 'circle-slider'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'thumbnail'),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-slides',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
        register_post_type('circle_slider', $args);
    }


}