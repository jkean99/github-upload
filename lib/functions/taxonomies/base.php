<?php

add_action( 'init', 'register_taxonomy_slug' );

function register_taxonomy_slug() {

    $labels = array( 
        'name' => _x( 'Plural_name', 'tax_slug' ),
        'singular_name' => _x( '_singular', 'tax_slug' ),
        'search_items' => _x( 'Search Plural_name', 'tax_slug' ),
        'popular_items' => _x( 'Popular Plural_name', 'tax_slug' ),
        'all_items' => _x( 'All Plural_name', 'tax_slug' ),
        'parent_item' => _x( 'Parent _singular', 'tax_slug' ),
        'parent_item_colon' => _x( 'Parent _singular:', 'tax_slug' ),
        'edit_item' => _x( 'Edit _singular', 'tax_slug' ),
        'update_item' => _x( 'Update _singular', 'tax_slug' ),
        'add_new_item' => _x( 'Add New _singular', 'tax_slug' ),
        'new_item_name' => _x( 'New _singular', 'tax_slug' ),
        'separate_items_with_commas' => _x( 'Separate Plural_name with commas', 'tax_slug' ),
        'add_or_remove_items' => _x( 'Add or remove Plural_name', 'tax_slug' ),
        'choose_from_most_used' => _x( 'Choose from the most used Plural_name', 'tax_slug' ),
        'menu_name' => _x( 'Plural_name', 'tax_slug' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => false,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => array( 
            'slug' => 'tax_slug', 
            'with_front' => true,
            'hierarchical' => true
        ),
        'query_var' => true
    );

    register_taxonomy( 'tax_slug', array('cpt_data_name'), $args );
}

?>