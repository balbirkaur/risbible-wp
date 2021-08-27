<?php

// staff custom post type.

function staff_post_type()
{
    $labels = array(
        'name'               => __('Staff'),
        'singular_name'      => __('Staff'),
        'add_new'            => __('Add New Staff'),
        'add_new_item'       => __('Add New Staff'),
        'edit_item'          => __('Edit Staff'),
        'new_item'           => __('Add New Staff'),
        'view_item'          => __('View Staff'),
        'search_items'       => __('Search Staff'),
        'not_found'          => __('No Staff found'),
        'not_found_in_trash' => __('No Staff found in trash')
    );
    $supports = array(
        'title',
        'editor',
        'thumbnail',
        'revisions'
    );
    $args = array(
        'labels'               => $labels,
        'supports'             => $supports,
        'public'               => true,
        'capability_type'      => 'post',
        'rewrite'              => array('slug' => 'staff'),
        'has_archive'          => true,
        'menu_position'        => 30,
        'menu_icon'            => 'dashicons-format-quote'
    );
    register_post_type('staff', $args);
}

add_action('init', 'staff_post_type');

     
     

    
// create a custom taxonomy name it "type" for your posts

function staff_custom_taxonomy() {
 
  $labels = array(
    'name' => _x('Staff Category', 'taxonomy general name'),
    'singular_name' => _x('Staff Category', 'taxonomy singular name'),
    'search_items' =>  __( 'Search Staff Category' ),
    'all_items' => __( 'All Positions' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Staff Category' ),
  );

  register_taxonomy('staff_category',array('staff'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'staff_category' ),
    'show_in_rest'         => true,
  ));


  $labels2 = array(
    'name' => _x('Staff Tag', 'taxonomy general name'),
    'singular_name' => _x('Staff Tag', 'taxonomy singular name'),
    'search_items' =>  __( 'Search Staff Tag' ),
    'all_items' => __( 'All Positions' ),
    'parent_item' => __( 'Parent Tag' ),
    'parent_item_colon' => __( 'Parent Tag:' ),
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag' ),
    'menu_name' => __( 'Staff Tag' ),
  );

  register_taxonomy('staff_tag',array('staff'), array(
    'hierarchical' => true,
    'labels' => $labels2,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'staff_tag' ),
    'show_in_rest'         => true,
  ));

  
}

add_action('init', 'staff_custom_taxonomy', 0);