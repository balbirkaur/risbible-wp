<?php

// testimonials custom post type.

function testimonials_post_type()
{
    $labels = array(
        'name'               => __('Testimonials'),
        'singular_name'      => __('Testimonial'),
        'add_new'            => __('Add New Testimonial'),
        'add_new_item'       => __('Add New Testimonial'),
        'edit_item'          => __('Edit Testimonial'),
        'new_item'           => __('Add New Testimonial'),
        'view_item'          => __('View Testimonials'),
        'search_items'       => __('Search Testimonials'),
        'not_found'          => __('No Testimonials found'),
        'not_found_in_trash' => __('No Testimonials found in trash')
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
        'rewrite'              => array('slug' => 'testimonials'),
        'has_archive'          => true,
        'menu_position'        => 30,
        'menu_icon'            => 'dashicons-format-quote'
    );
    register_post_type('testimonials', $args);
}

add_action('init', 'testimonials_post_type');

     


// Create one or more meta boxes to be displayed on the post editor screen.

function testimonial_add_post_meta_boxes() {

    add_meta_box(
      'ta-testimonial-metabox',      // Unique ID
      esc_html__( 'testimonial Details', 'More Details about the testimonial' ),    // Title
      'ta_testimonials_meta_box',   // Callback function
      'testimonials',         // Admin page (or post type)
      'side',         // Context
      'high'         // Priority
    );
  }

// Display the post meta box.

function ta_testimonials_meta_box( $post ) { ?>

<?php wp_nonce_field( basename( __FILE__ ), 'ta_testimonial_position_nonce' ); ?>
<p>
    <label for="ta-testimonial-person"><?php _e( "Add Testimonial Person", '' ); ?></label>
    <br />
    <input class="widefat" type="text" name="ta-testimonial-person" id="ta-testimonial-person"
        value="<?php echo esc_attr( get_post_meta( $post->ID, 'ta_testimonial_person', true ) ); ?>" size="30" />
</p>
<p>
    <label for="ta-testimonial-position"><?php _e( "Add Testimonial Position", '' ); ?></label>
    <br />
    <input class="widefat" type="text" name="ta-testimonial-position" id="ta-testimonial-position"
        value="<?php echo esc_attr( get_post_meta( $post->ID, 'ta_testimonial_position', true ) ); ?>" size="30" />
</p>
<?php 
  }


// Meta box setup function.

function ta_testimonial_meta_boxes_setup() {

    /* Add meta boxes on the 'add_meta_boxes' hook. */
    add_action( 'add_meta_boxes', 'testimonial_add_post_meta_boxes' );
  
    /* Save post meta on the 'save_post' hook. */
    add_action( 'save_post', 'ta_save_testimonial_position_meta', 10, 2 );
  }

  /* Save the meta box’s post metadata. */
function ta_save_testimonial_position_meta( $post_id, $post ) {

    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['ta_testimonial_position_nonce'] ) || !wp_verify_nonce( $_POST['ta_testimonial_position_nonce'], basename( __FILE__ ) ) )
      return $post_id;
  
    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );
  
    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
      return $post_id;
  
    /* Get the posted data and sanitize it for use as an HTML class. */
    $new_meta_value_jl = ( isset( $_POST['ta-testimonial-position'] ) ? sanitize_text_field( $_POST['ta-testimonial-position'] ) : '' );
     
    /* Get the meta key. */
    $meta_key_jl = 'ta_testimonial_position';
  
    /* Get the meta value of the custom field key. */
    $meta_value_jl= get_post_meta( $post_id, $meta_key_jl, true );
  
    /* If a new meta value was added and there was no previous value, add it. */
    if ( $new_meta_value_jl && '' == $meta_value_jl )
      add_post_meta( $post_id, $meta_key_jl, $new_meta_value_jl, true );
  
    /* If the new meta value does not match the old value, update it. */
    elseif ( $new_meta_value_jl && $new_meta_value_jl != $meta_value_jl )
      update_post_meta( $post_id, $meta_key_jl, $new_meta_value_jl );
  
    /* If there is no new meta value but an old value exists, delete it. */
    elseif ( '' == $new_meta_value_jl && $meta_value_jl )
      delete_post_meta( $post_id, $meta_key_jl, $meta_value_jl );



    $new_meta_value_ks = ( isset( $_POST['ta-testimonial-person'] ) ? sanitize_text_field( $_POST['ta-testimonial-person'] ) : '' );
      /* Get the meta key. */
    $meta_key_ks = 'ta_testimonial_person';
  
    /* Get the meta value of the custom field key. */
    $meta_value_ks= get_post_meta( $post_id, $meta_key_ks, true );
  
    /* If a new meta value was added and there was no previous value, add it. */
    if ( $new_meta_value_ks && '' == $meta_value_ks )
      add_post_meta( $post_id, $meta_key_ks, $new_meta_value_ks, true );
  
    /* If the new meta value does not match the old value, update it. */
    elseif ( $new_meta_value_ks && $new_meta_value_ks != $meta_value_ks )
      update_post_meta( $post_id, $meta_key_ks, $new_meta_value_ks );
  
    /* If there is no new meta value but an old value exists, delete it. */
    elseif ( '' == $new_meta_value_ks && $meta_value_ks )
      delete_post_meta( $post_id, $meta_key_ks, $meta_value_ks );

  }

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'ta_testimonial_meta_boxes_setup' );
add_action( 'load-post-new.php', 'ta_testimonial_meta_boxes_setup' );
  


// Add testimonial Position colun to the testimonials list table

function add_testimonial_column($columns) {

  $column_meta = array('ta_testimonial_position' => __('Position'));
  $columns     = array_slice( $columns, 0, 3, true ) + $column_meta + array_slice( $columns, 3, NULL, true );
  return $columns;

}
add_filter('manage_testimonials_posts_columns' , 'add_testimonial_column');

add_action( 'manage_testimonials_posts_custom_column', 'show_testimonial_position', 10, 2 );

function show_testimonial_position( $column_name, $post_id ) {
    if ($column_name == 'ta_testimonial_position') {
      $position = get_post_meta( $post_id, 'ta_testimonial_position', true );
      echo  $position;
    }

}

// Make the testimonial Position sortable on the testimonials list table

add_filter( 'manage_edit-testimonials_sortable_columns', 'testimonials_table_sorting' );

function testimonials_table_sorting( $columns ) {
  $columns['ta_testimonial_position'] = 'ta_testimonial_position';
  return $columns;
}

add_filter( 'request', 'testimonials_position_column_orderby' );

function testimonials_position_column_orderby( $vars ) {
    if ( isset( $vars['orderby'] ) && 'ta_testimonial_position' == $vars['orderby'] ) {
        $vars = array_merge( $vars, array(
            'meta_key' => 'ta_testimonial_position',
            'orderby' => 'meta_value'
        ) );
    }

    return $vars;
}