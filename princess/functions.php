<?php

function mysiteart_theme_support(){
    //adds dynamic title tag support
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    add_theme_support('post-thumbnails');

}
add_action( 'after_setup_theme', 'mysiteart_theme_support');


function mysiteart_menus(){
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"

    );

    register_nav_menus( $locations );
}
add_action( 'init', "mysiteart_menus");






function mysiteart_register_styles(){
    $vesion = wp_get_theme()->get('version');
    wp_enqueue_style('mysiteart-style', get_template_directory_uri() . '/style.css', array('mysiteart-bootstrap'), $vesion, 'all');
    wp_enqueue_style('mysiteart-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1', 'all');
    wp_enqueue_style('mysiteart-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');

}
add_action('wp_enqueue_scripts', 'mysiteart_register_styles');


function mysiteart_register_scripts(){
    wp_enqueue_script( 'mysiteart-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
    wp_enqueue_script( 'mysiteart-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
    wp_enqueue_script( 'mysiteart-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
    wp_enqueue_script( 'mysiteart-main', get_template_directory_uri().'/assets/js/main.js', array(), '1.0', true);

}
add_action('wp_enqueue_scripts', 'mysiteart_register_scripts');


function mysiteart_widget_areas(){
    
    register_sidebar(
        array(

            'before_title' => '',
            'after_title' => '<>',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
        );

        register_sidebar(
            array(
    
                'before_title' => '',
                'after_title' => '',
                'before_widget' => '',
                'after_widget' => '',
                'name' => 'Footer Area',
                'id' => 'Footer-1',
                'description' => 'Footer Widget Area'
            )
            );
    
}

add_action('widgets_init','mysiteart_widget_areas');
?>