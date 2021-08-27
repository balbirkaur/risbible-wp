<?php

/*Template Name:Home */
get_header();
?> <section>
    <?php echo do_shortcode('[rev_slider alias="main-1"][/rev_slider]');?>
</section>
<section class="home-box">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card-group">
                    <div class="card me-2">
                        <a href="<?php echo get_field('link_1');?>">
                            <div class="card-body"><i aria-hidden="true" class="fas fa-user-friends"></i>
                                <h5 class="card-title"><?php echo get_field('title_1');?></h5>
                                <p class="card-text"><?php echo get_field('description_1');?></p>
                            </div>
                        </a>
                    </div>
                    <div class="card me-2">
                        <a href="<?php echo get_field('link_2');?>">
                            <div class="card-body"><i aria-hidden="true" class="fas fa-book"></i>
                                <h5 class="card-title"><?php echo get_field('title_2');?></h5>
                                <p class="card-text"><?php echo get_field('description_2');?></p>
                            </div>
                        </a>
                    </div>
                    <div class="card me-2">
                        <a href="<?php echo get_field('link_3');?>">
                            <div class="card-body"><i aria-hidden="true" class="fa fa-bell"></i>
                                <h5 class="card-title"><?php echo get_field('title_3');?></h5>
                                <p class="card-text"><?php echo get_field('description_3');?></p>
                            </div>
                        </a>
                    </div>
                    <div class="card me-2">
                        <a href="<?php echo get_field('link_4');?>">
                            <div class="card-body"><i aria-hidden="true" class="far fa-heart"></i>
                                <h5 class="card-title"><?php echo get_field('title_4');?></h5>
                                <p class="card-text"><?php echo get_field('description_4');?></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pt-8">
                <div class="block-info-title pb-2"><?php echo get_field('small_text');?></div>
                <div class="block-info-desc pb-3"><?php echo get_field('big_text');?></div>
                <div class="block-info-btn text-end"><a href="<?php echo get_field('button_link');?>"
                        class="btn btn-green"><?php echo get_field('button_text');?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo get_field('welcome_title');?></h2>
                <p><?php echo get_field('welcome_text');?></p>
            </div>
        </div>
    </div>
</section>
<section class="home-info-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php the_content();?>
            </div>
            <div class="col-md-5 drop-cap-text">
                <?php echo get_field('right_content');?>
            </div>
        </div>
    </div>
</section>
<section class="home-registration">
    <div class="container registration-space">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center left-bck">
                <div class="registration-left">
                    <h2>Online Registration</h2>
                    <form>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Student Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput2">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Preferred Phone Number</label>
                            <input type="text" class="form-control" id="exampleFormControlInput3">
                        </div>
                        <div class="mb-3 registration">
                            <button type="button" class="btn btn-orange">NEXT</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6  d-flex justify-content-center right-bck">
                <div class="registration-right">
                    <h2>Our News</h2>
                    <div class="event-list">
                        <?php
                $args = array(  
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 3, 
                    'orderby' => 'id', 
                    'order' => 'ASC' 
                );
            
                $loop = new WP_Query( $args ); 
                    
                while ( $loop->have_posts() ) : $loop->the_post();              
                    ?>
                        <div class="card flex-row">
                            <?php 
                            
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('thumbnail', array( 'class' => 'card-img-left img-fluid' ));
                            }
                            else {
                                echo '<img src="' . get_stylesheet_directory_uri() 
                                    . '/images/news-thumbnail.jpg" />';
                            }
                            ?>

                            <div class="card-body">
                                <h4 class="card-title h5 h4-sm"><i class="fas fa-caret-right"
                                        aria-hidden="true"></i><span><?php the_time('M j Y'); ?></span><i
                                        class="fas fa-caret-right"
                                        aria-hidden="true"></i><span><?php the_time();?></span>
                                </h4>
                                <p class="card-text"><a
                                        href="<?php echo get_permalink($loop->ID);?>"><?php echo the_title();?></a>
                                </p>
                            </div>
                        </div>
                        <?php
                        endwhile;

                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
</section>
<section class=" home-courses">
    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="col-md-12 ">
                <h2>Latest Courses</h2>
            </div>
            <div class="col-md-12">

                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center pt-md-0 pt-4">
                                <img class="img-fluid"
                                    src="<?php echo get_stylesheet_directory_uri();?>/images/courses.jpg">
                            </div>
                            <h5 class="card-title pt-3 pb-3 pb-1 text-center">Card
                                title</h5>
                            <div class="container card-bottom">
                                <div class="row align-items-center">
                                    <div class="col-8 lesson-count">2 Lessons</div>
                                    <div class="col-4 text-center lesson-view">
                                        <span>View</span> <i class="fas fa-caret-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center pt-md-0 pt-4">
                                <img class="img-fluid"
                                    src="<?php echo get_stylesheet_directory_uri();?>/images/courses.jpg">
                            </div>
                            <h5 class="card-title pt-3 pb-3 pb-1 text-center">Card
                                title</h5>
                            <div class="container card-bottom">
                                <div class="row align-items-center">
                                    <div class="col-8 lesson-count">2 Lessons</div>
                                    <div class="col-4 text-center lesson-view">
                                        <span>View</span> <i class="fas fa-caret-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center pt-md-0 pt-4">
                                <img class="img-fluid"
                                    src="<?php echo get_stylesheet_directory_uri();?>/images/courses.jpg">
                            </div>
                            <h5 class="card-title pt-3 pb-3 pb-1 text-center">Card
                                title</h5>
                            <div class="container card-bottom">
                                <div class="row align-items-center">
                                    <div class="col-8 lesson-count">2 Lessons</div>
                                    <div class="col-4 text-center lesson-view">
                                        <span>View</span> <i class="fas fa-caret-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center pt-md-0 pt-4">
                                <img class="img-fluid"
                                    src="<?php echo get_stylesheet_directory_uri();?>/images/courses.jpg">
                            </div>
                            <h5 class="card-title pt-3 pb-3 pb-1 text-center">Card
                                title</h5>
                            <div class="container card-bottom">
                                <div class="row align-items-center">
                                    <div class="col-8 lesson-count">2 Lessons</div>
                                    <div class="col-4 text-center lesson-view">
                                        <span>View</span> <i class="fas fa-caret-right" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<section class="all-courses">
    <div class="container">
        <div class="row d-flex justify-content-center ">
            <div class="col-9">
                <div class="courses-view pt-5 d-flex justify-content-center"><button type="button"
                        class="btn btn-dark"><span>All
                            Courses</span><i class="fas fa-caret-right" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="home-testimonial">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center testimonial-pos">
            <div class="col-md-12 pt-4  d-flex justify-content-center">
                <h3>Testimonials</h3>
            </div>
            <div class="col-md-12  d-flex justify-content-center">
                <h2>Explore the students experience</h2>
                <h4><a href="<?php echo get_permalink('5912');?>">View All</a>
                </h4>
            </div>
        </div>
        <section class="home-testimonial-bottom">
            <div class="container testimonial-inner">
                <div class="row d-flex justify-content-center">
                    <?php
                $args = array(  
                    'post_type' => 'testimonials',
                    'post_status' => 'publish',
                    'posts_per_page' => 3, 
                    'orderby' => 'id', 
                    'order' => 'ASC' 
                );
            
                $loop = new WP_Query( $args );                    
                while ( $loop->have_posts() ) : $loop->the_post();              
                   
                    ?>
                    <div class=" col-md-4 style-3">
                        <div class="tour-item ">
                            <div class="tour-desc bg-white">
                                <div class="tour-text color-grey-3 text-center">
                                    <?php echo get_the_content($post->ID);?></div>
                                <div class="d-flex justify-content-center pt-2 pb-2">
                                    <?php 
                            
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('thumbnail', array( 'class' => 'tm-people img-fluid' ));
                            }
                            else { 
                                echo '<img class="tm-people" src="' . get_stylesheet_directory_uri() 
                                    . '/images/news-thumbnail.jpg" />';
                            }
                            ?>

                                </div>
                                <div class="link-name d-flex justify-content-center">
                                    <?php echo esc_attr( get_post_meta( $post->ID, 'ta_testimonial_person', true ) ); ?>
                                </div>
                                <div class="link-position d-flex justify-content-center">
                                    <?php echo esc_attr( get_post_meta( $post->ID, 'ta_testimonial_position', true ) ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>


                </div>

            </div>

        </section>

</section>
<?php
get_footer();
?>