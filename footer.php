<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?> <footer>
    <div class="container">
        <div class="row  footer-1">

            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>

            <?php dynamic_sidebar( 'footer-1' ); ?>

            <?php endif; ?>


            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>

            <?php dynamic_sidebar( 'footer-2' ); ?>

            <?php endif; ?>

            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>

            <?php dynamic_sidebar( 'footer-3' ); ?>

            <?php endif; ?>

        </div>
    </div>

    <div class="container-fluid">

        <div class="row  footer-2">
            <div class="col-md-12 text-center mt-4 mb-4">
                <?php if ( is_active_sidebar( 'footer-bottom' ) ) : ?>
                <div id="secondary" class="widget-area" role="complementary">
                    <?php dynamic_sidebar( 'footer-bottom' ); ?>
                </div>
                <?php endif; ?>


            </div>

        </div>

</footer>
<?php wp_footer(); ?>

</body>

</html>