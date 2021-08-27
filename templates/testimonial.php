<?php

/*Template Name:Testimonial */
get_header();
?>
<section class="home-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php the_title();?></h2>

            </div>
        </div>
    </div>
</section>
<section class="page-box">


    <div class="container">
        <div class="row">
            <div class="col-md-12  d-flex justify-content-center">
                <div class="page-title">

                    <div class="event-list">
                        <?php
                $args = array(  
                    'post_type' => 'testimonials',
                    'post_status' => 'publish',
                    'orderby' => 'id', 
                    'order' => 'ASC' 
                );
            
                $loop = new WP_Query( $args );                    
                while ( $loop->have_posts() ) : $loop->the_post();              
                   
                    ?>

                        <div class="card flex-row">



                            <?php 
                            
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('thumbnail', array( 'class' => 'card-img-left img-fluid"' ));
                            }
                            else { 
                                echo '<img class="card-img-left img-fluid"" src="' . get_stylesheet_directory_uri() 
                                    . '/images/news-thumbnail.jpg" />';
                            }
                            ?>
                            <div class="card-body">
                                <h4 class="card-title h5 h4-sm">
                                    <?php echo esc_attr( get_post_meta( $post->ID, 'ta_testimonial_person', true ) ); ?>
                                </h4>
                                <h4 class="card-title h5 h4-sm">
                                    <?php echo esc_attr( get_post_meta( $post->ID, 'ta_testimonial_position', true ) ); ?>
                                </h4>
                                <p class="card-text"> <?php echo get_the_content($post->ID);?>
                                </p>
                            </div>
                        </div> <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>









</section>


<?php
get_footer();
?>