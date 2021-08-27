<?php

/*Template Name:Staff */
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
<section class="page-box media-cat">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 ">
                <?php 
                $store_staff = array();
                $taxonomies = get_terms( array('taxonomy' => 'staff_category','orderby' => 'id',
            'order' => 'DESC') );
                     if ( !empty($taxonomies) ) :
                        ?>

                <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">

                    <?php
                              $taxo_schedule_count = 1;
                              foreach( $taxonomies as $category ) { 
                                 if($taxo_schedule_count==1){$color_class=" active";}
                                 else{$color_class="";}
                                 ?>
                    <!-- <a class="nav-item nav-link active" id="<?php echo $category->slug;?>-tab" data-toggle="tab"
                                        href="#<?php echo $category->slug;?>" role="tab" aria-controls="<?php echo $category->slug;?>"
                                        aria-selected="true"><?php echo $category->name;?></a>-->
                    <li class="nav-item nav-link" role="presentation"> <a
                            class="nav-item nav-link <?php echo $color_class;?>" id="<?php echo $category->slug;?>-tab"
                            data-bs-toggle="tab" data-bs-target="#<?php echo $category->slug;?>" role="tab"
                            aria-controls="<?php echo $category->slug;?>"
                            aria-selected="true"><?php echo $category->name;?></a></li>
                    <?php 
                         array_push($store_staff,$category->term_id);
                        $taxo_schedule_count++;
                              } 
                              
                             
                              ?>
                </ul>

                <div class="tab-content bg-light" id="myTabContent">



                    <?php
                              $taxo_schedule = 1;
                              foreach( $taxonomies as $category2 ) {  
                               $category_id =  $category2->term_id;
                               $category_slug =  $category2->slug;
                               $first_tab = ($taxo_schedule=="1") ?"show active":"";
                               ?>

                    <div class="tab-pane fade <?php echo $first_tab;?>" id="<?php echo $category_slug;?>"
                        role="tabpanel" aria-labelledby="<?php echo $category_slug;?>-tab">

                        <div class="container">
                            <div class="row">
                                <?php
                                    /**
                                     * Setup query to show the ‘services’ post type with ‘8’ posts.
                                     * Output the title with an excerpt.
                                     */
                                        $args = array(  
                                            'post_type' => 'staff',
                                            'post_status' => 'publish',
                                            'orderby' => 'title', 
                                            'order' => 'ASC', 
                                            'tax_query' => array(
                                                'relation' => 'AND', 
                                          
                                                array(
                                                   'taxonomy' => 'staff_category',
                                                   'field'    => 'term_id',
                                                   'terms'    => $category_id
                                                )                                    
                                               
                                             )
                                        );

                                        $loop = new WP_Query( $args ); 
                                            
                                        while ( $loop->have_posts() ) : $loop->the_post(); 
                                        
                                        ?>

                                <div class=" col-md-12 col-lg-12 staff-block  ftco-animate">
                                    <div class="staff-entry bg-light pb-4 text-left">
                                        <div>
                                            <h3 class="mb-3"><?php print the_title();?></h3>

                                        </div>


                                        <?php 
                            
                           /* if ( has_post_thumbnail() ) {
                                the_post_thumbnail('staff-size', array( 'class' => 'float-left img-fluid"' ));
                            }
                            else { 
                                echo '<img class="img-fluid"" src="' . get_stylesheet_directory_uri() 
                                    . '/images/news-thumbnail.jpg" />';
                            }*/
                            ?>

                                        <div class="staff-content">
                                            <?php print the_content();?>
                                        </div>

                                    </div>
                                </div>

                                <?php
                                   $taxo_schedule++;
                            endwhile;

                            wp_reset_postdata();        
                                ?>
                            </div>
                        </div>



                    </div>
                    <?php
                              }
                              ?>

                </div>
                <?php endif;?>
            </div>
        </div>
    </div>





</section>


<?php
get_footer();
?>