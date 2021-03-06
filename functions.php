<?php

function tillas_theme_support(){
// add title
    add_theme_support( 'title-tag');
    // add logo customization 
    add_theme_support('custom-logo');

    // add thumpnail suport to posts
    add_theme_support( 'post-thumbnails' );
}

add_action('after_setup_theme', 'tillas_theme_support');

function tillas_menus(){
    $locations  = array(
        "primary" => "Desktop primary left sidebar",
        "footer" => "Footer Menu"
    );

    register_nav_menus($locations);
}

add_action('init', 'tillas_menus');

function tillas_register_styles(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('tillas-style', get_template_directory_uri() . "/style.css", array("tillas-bootsrtap") , $version, "all");
    wp_enqueue_style('tillas-bootsrtap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" , array() , "4.4.1", "all");
    wp_enqueue_style('tillas-awesomefont', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array() , "5.13.0", "all");

}

add_action('wp_enqueue_scripts', 'tillas_register_styles');


function tillas_register_scripts(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('tillas-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", 
    array() , "3.4.1", true);
    wp_enqueue_script('tillas-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", 
    array() , "1.16.0", true);
    wp_enqueue_script('tillas-bootsrtap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", 
    array() , "4.4.1", true);
    wp_enqueue_script('tillas-main', get_template_directory_uri(  ) . "/assets/js/main.js", 
    array() , $version, true);
   
        
}

add_action('wp_enqueue_scripts', 'tillas_register_scripts');


// add widget areas
function tillas_widget_areas(){
    
    register_sidebar( 
    
        array(
            'id' => 'sidebar-1',
            'name' => 'SideBar Areas',
            'description' => 'SideBar Widget Area',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''
        ));

        register_sidebar( 
    
            array(
                'id' => 'footer-1',
                'name' => 'Footer Areas',
                'description' => 'Fouter Widget Area',
                'before_title' => '',
                'after_title' => '',
                'before_widget' => '',
                'after_widget' => ''
            ));
}

add_action('widgets_init', 'tillas_widget_areas');

?>