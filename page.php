<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

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
                <?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/content-page' );

endwhile; // End of the loop.
?>
            </div>
        </div>
    </div>
    </div>
    </div>









</section>

<?php
get_footer();