<?php

    add_action( 'init', 'register_custom_post_type' );

    function register_custom_post_type() {
        $labels = array( 
            'name' => _x( 'CPT_DISPLAY_NAME', 'cpt_data_name' ),
            'singular_name' => _x( 'CPT_DISPLAY_NAME', 'cpt_data_name' ),
            'add_new' => _x( 'Add New', 'cpt_data_name' ),
            'add_new_item' => _x( 'Add New CPT_SINGULAR_NAME', 'cpt_data_name' ),
            'edit_item' => _x( 'Edit CPT_SINGULAR_NAME', 'cpt_data_name' ),
            'new_item' => _x( 'New CPT_SINGULAR_NAME', 'cpt_data_name' ),
            'view_item' => _x( 'View CPT_SINGULAR_NAME', 'cpt_data_name' ),
            'search_items' => _x( 'Search CPT_DISPLAY_NAME', 'cpt_data_name' ),
            'not_found' => _x( 'No CPT_DISPLAY_NAME found', 'cpt_data_name' ),
            'not_found_in_trash' => _x( 'No CPT_DISPLAY_NAME found in Trash', 'cpt_data_name' ),
            'parent_item_colon' => _x( 'Parent CPT_SINGULAR_NAME:', 'cpt_data_name' ),
            'menu_name' => _x( 'CPT_DISPLAY_NAME', 'cpt_data_name' ),
        );
        $args = array( 
            'labels' => $labels,
            'hierarchical' => false,
            
            'supports' => array( 'title', 'editor', 'thumbnail', 'tags', 'excerpt' ),
            
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 17,
            
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true, //Turn this to false if you do not want an archive page
            'query_var' => true,
            'can_export' => true,
            'rewrite' => array('slug' => 'cpt_data_name'),
            'capability_type' => 'post'
        );
        register_post_type( 'cpt_data_name', $args );
    }

?>