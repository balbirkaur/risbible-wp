<?php
add_action('customize_register', 'my_customize_register_func');

function my_customize_register_func($wp_customize)
{

    // Add Customize Section
    $wp_customize->add_section('pdn_footer_section', array(
        'title' => 'Footer',
        'description'   => 'Update footer image'
    ));

    $wp_customize->add_setting('pdn_footer_img_settings', array(
        //default value
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pdn_footer_img_control', array(
        'label' => 'Edit Footer Image',
        'settings'  => 'pdn_footer_img_settings',
        'section'   => 'pdn_footer_section'
    )));

    $wp_customize->add_setting('twitter_settings', array(
        'capability' => 'edit_theme_options',
        'default' => 'https://twitter.com/RISBIBLE',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('twitter_settings', array(
        'type' => 'text',
        'section' => 'pdn_footer_section', // Add a default or your own section
        'label' => __('Twitter Link'),
        'description' => __('This is a twitter link.'),
    ));



    $wp_customize->add_setting('facebook_settings', array(
        'capability' => 'edit_theme_options',
        'default' => 'https://www.facebook.com/RIsbible',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('facebook_settings', array(
        'type' => 'text',
        'section' => 'pdn_footer_section', // Add a default or your own section
        'label' => __('Facebook Link'),
        'description' => __('This is a Facebook link.'),
    ));
    
    $wp_customize->add_setting('linkedin_settings', array(
        'capability' => 'edit_theme_options',
        'default' => 'https://www.linkedin.com',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('linkedin_settings', array(
        'type' => 'text',
        'section' => 'pdn_footer_section', // Add a default or your own section
        'label' => __('LinkedIn Link'),
        'description' => __('This is a LinkedIn link.'),
    ));
 
}