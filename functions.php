<?php

function load_style() {
    wp_enqueue_style('bootstrap.css', get_template_directory_uri() . '/styles/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome.css', get_template_directory_uri() . '/fonts/fontawesome/css/font-awesome.min.css');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/styles/css/owl.carousel.min.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/styles/css/style.css?1');
}

add_action ('wp_enqueue_scripts', 'load_style');

function load_script() {
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/lib/jquery-3.1.1.js');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/lib/bootstrap.min.js');
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/lib/owl.carousel.min.js');
    wp_enqueue_script('main.js', get_template_directory_uri() . '/js/main.js');
}

add_action ('wp_enqueue_scripts', 'load_script');


// Navigation Menus
register_nav_menu ('main-nav', 'header-menu');
register_nav_menu ('foot-nav', 'footer-menu');

//logo
add_theme_support( 'custom-logo' );

// thumbnails support
add_theme_support('post-thumbnails');

// Creates Movie Reviews Custom Post Type
function services_reviews_init() {
    $args = array(
        'label' => 'Services',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'services-reviews'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'services-reviews', $args );
}
add_action( 'init', 'services_reviews_init' );

// Creates Movie Reviews Custom Post Type
function slider_post_type() {
    $args = array(
        'label' => 'Home slider',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'slides'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'slides', $args );
}
add_action( 'init', 'slider_post_type' );


function carousel_slides() {
    $args = array(
        'label' => 'carousel',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'slides-carousel'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'slides-carousel', $args );
}
add_action( 'init', 'carousel_slides' );


function carousel_partners() {
    $args = array(
        'label' => 'partners',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'partners-carousel'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'partners-carousel', $args );
}
add_action( 'init', 'carousel_partners' );



function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content; }

/**
 * Register our sidebars and widgetized areas.
 *
 */
register_sidebar( array(
    'name'          => 'sidebar',
    'id'            => 'main-sidebar',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
    'description'   => 'create widgets here'
) );

register_sidebar( array(
    'name'          => 'foot-sidebar',
    'id'            => 'footer-sidebar',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
    'description'   => 'create widgets here'
) );

//field
function hw_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here

//    social links
    $wp_customize->add_section( 'hw_social_links' , array(
        'title'      => __( 'Social links', 'hw' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'social_links_facebook' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_facebook', array(
        'label'        => __( 'Facebook', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_facebook',
    ) ) );

    $wp_customize->add_setting( 'social_links_twitter' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_twitter', array(
        'label'        => __( 'Twitter', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_twitter',
    ) ) );

    $wp_customize->add_setting( 'social_links_google' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_google', array(
        'label'        => __( 'Google', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_google',
    ) ) );

    $wp_customize->add_setting( 'social_links_youtube' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_youtube', array(
        'label'        => __( 'Youtube', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_youtube',
    ) ) );

    $wp_customize->add_setting( 'social_links_instagram' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_instagram', array(
        'label'        => __( 'Instagram', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_instagram',
    ) ) );

    $wp_customize->add_setting( 'social_links_dribbble' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_dribbble', array(
        'label'        => __( 'Dribbble', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_dribbble',
    ) ) );

    $wp_customize->add_setting( 'social_links_pinterest' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_links_pinterest', array(
        'label'        => __( 'Pinterest', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_pinterest',
    ) ) );

    $wp_customize->add_setting( 'social_links_color' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_links_color', array(
        'label'        => __( 'Social links background color', 'hw' ),
        'section'    => 'hw_social_links',
        'settings'   => 'social_links_color',
    ) ) );

//    sections

    $wp_customize->add_section( 'section_about' , array(
        'title'      => __( 'About us' ),
        'priority'   => 20,
    ) );
    $wp_customize->add_setting( 'about_title' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'about_title', array(
        'label' => 'Section`s title',
        'section' => 'section_about',
        'settings'   => 'about_title',
    ) ) );

    $wp_customize->add_setting( 'about_description' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'about_description', array(
        'label' => 'Section`s description',
        'section' => 'section_about',
        'settings'   => 'about_description',
    ) ) );
//    new section
    $wp_customize->add_section( 'section_services' , array(
        'title'      => __( 'Services-section' ),
        'priority'   => 20,
    ) );
    $wp_customize->add_setting( 'services_title' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'services_title', array(
        'label' => 'Section`s title',
        'section' => 'section_services',
        'settings'   => 'services_title',
    ) ) );
    $wp_customize->add_setting( 'services_description' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'services_description', array(
        'label' => 'Section`s title',
        'section' => 'section_services',
        'settings'   => 'services_description',
    ) ) );

//new section
    $wp_customize->add_section( 'section_clients' , array(
        'title'      => __( 'Clients-section' ),
        'priority'   => 20,
    ) );
    $wp_customize->add_setting( 'clients_title' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'clients_title', array(
        'label' => 'Section`s title',
        'section' => 'section_clients',
        'settings'   => 'clients_title',
    ) ) );
    $wp_customize->add_setting( 'clients_description' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'clients_description', array(
        'label' => 'Section`s title',
        'section' => 'section_clients',
        'settings'   => 'clients_description',
    ) ) );


//    new section
    $wp_customize->add_section( 'section_news' , array(
        'title'      => __( 'News-section' ),
        'priority'   => 20,
    ) );
    $wp_customize->add_setting( 'news_title' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_title', array(
        'label' => 'Section`s title',
        'section' => 'section_news',
        'settings'   => 'news_title',
    ) ) );
    $wp_customize->add_setting( 'news_description' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'news_description', array(
        'label' => 'Section`s description',
        'section' => 'section_news',
        'settings'   => 'news_description',
    ) ) );

    //    new section
    $wp_customize->add_section( 'section_partners' , array(
        'title'      => __( 'Partners-section' ),
        'priority'   => 20,
    ) );
    $wp_customize->add_setting( 'partners_title' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_title', array(
        'label' => 'Section`s title',
        'section' => 'section_partners',
        'settings'   => 'partners_title',
    ) ) );
    $wp_customize->add_setting( 'partners_description' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'partners_description', array(
        'label' => 'Section`s description',
        'section' => 'section_partners',
        'settings'   => 'partners_description',
    ) ) );

    //    new section
    $wp_customize->add_section( 'section_single' , array(
        'title'      => __( 'Single-section' ),
        'priority'   => 20,
    ) );
    $wp_customize->add_setting( 'single_title' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_title', array(
        'label' => 'Section`s title',
        'section' => 'section_single',
        'settings'   => 'single_title',
    ) ) );
    $wp_customize->add_setting( 'single_text-1' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_text-1', array(
        'label' => 'Section`s content-1',
        'section' => 'section_single',
        'settings'   => 'single_text-1',
    ) ) );
    $wp_customize->add_setting( 'single_text-read' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_text-read', array(
        'label' => 'Section`s content-important',
        'section' => 'section_single',
        'settings'   => 'single_text-read',
    ) ) );
    $wp_customize->add_setting( 'single_text-2' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_text-2', array(
        'label' => 'Section`s content-2',
        'section' => 'section_single',
        'settings'   => 'single_text-2',
    ) ) );
    $wp_customize->add_setting( 'admins-content' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'admins-content', array(
        'label' => 'Section`s admin`s content',
        'section' => 'section_single',
        'settings'   => 'admins-content',
    ) ) );

}
add_action( 'customize_register', 'hw_customize_register' );


add_filter( 'comment_form_fields', 'order_comment_form_fields' );



/// Pagination blog page



//Popular post
function setPostViews($postID) {
    $count_key = post_views_count;
    $count = get_post_meta($postID, $count_key, true);
    if($count==»){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, 0);
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
function getPostViews($postID)
{
    $count_key = post_views_count;
    $count = get_post_meta($postID, $count_key, true);
    if ($count == ») {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, 0);
        return "0";
    }
    return $count;
}