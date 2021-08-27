<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,700&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body class="home-background">

    <header>
        <!--=========-TOP_BAR============-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img class="img-fluid"
                        src="<?php echo get_stylesheet_directory_uri();?>/images/logo.jpg"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php if ( function_exists('wp_nav_menu') ) { 
					 wp_nav_menu( array( 'theme_location'=>'primary',   'container' => 'ul','menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0 upper-menu','menu'=>'top_nav')); }
				
                ?>

                    <a href="<?php echo get_permalink('5703');?>" class="btn btn-orange">ENROLL</a>
                    <a href="<?php echo get_permalink('1345');?>" class="btn btn-darkblue">CONTACT</a>

                    <div class="social-block d-flex">
                        <?php
					if (get_theme_mod('facebook_settings') != '') {
						$facebook_settings = get_theme_mod('facebook_settings');
                        ?>
                        <a target="_blank" href="<?php echo $facebook_settings;?>"
                            class="nav-item nav-link social-item"><i class="fab fa-facebook-f"
                                aria-hidden="true"></i></a>
                        <?php
                        } ?>
                        <?php
					if (get_theme_mod('twitter_settings') != '') {
						$twitter_settings = get_theme_mod('twitter_settings');
                        ?>
                        <a target="_blank" href="<?php echo $twitter_settings;?>"
                            class="nav-item nav-link social-item"><i aria-hidden="true" class="fab fa-twitter"></i></a>
                        <?php
                        } ?>
                        <?php
					if (get_theme_mod('linkedin_settings') != '') {
						$linkedin_settings = get_theme_mod('linkedin_settings');
                        ?>
                        <a target="_blank" href="<?php echo $linkedin_settings;?>"
                            class="nav-item nav-link social-item"><i aria-hidden="true" class="fab fa-linkedin"></i></a>
                        <?php
                        } ?>

                    </div>
                </div>
            </div>
        </nav>
    </header>