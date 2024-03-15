<?php

/**
 * Includes and Setup
 */
// Include General Configuration
include "includes/general-setup.php";

// Include ACF
include "includes/acf-setup.php";

// Include navigation setup
include "template-parts/navigation/setup.php";

// Register and configure blocks
include "includes/block-setup.php";

// Admin settings
include "includes/admin-area.php";


/**
 * Enqueue theme styles and scripts
 */
function wpdocs_theme_name_scripts()
{
    // Bootstrap
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri().'/sass/bootstrap.min.css');

    // Swiper
    wp_enqueue_style('swiper', get_stylesheet_directory_uri().'/sass/swiper-bundle.min.css');

    // Styles
    wp_enqueue_style('theme-styling', get_stylesheet_uri());

    // Script

    // Swiper
    wp_enqueue_script('swiper', get_template_directory_uri() . '/scripts/swiper-bundle.min.js');

    // Jquery
    wp_enqueue_script('jquery-min-local', get_template_directory_uri() . '/scripts/jquery.min.js');

    // General
    wp_enqueue_script('main', get_template_directory_uri() . '/scripts/main.js', array('jQuery'), '1.0.0', true);

}

add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');


function var_debug($data)
{
    echo '<pre style="background: black; color: white; border: 2px red solid;">';
    var_dump($data);
    echo '</pre>';
}

add_filter('wpcf7_autop_or_not', '__return_false');

function echoPortfolioText() {
    ?>
    <h2><?= get_field('title') ?></h2>
    <hr>
    <p><?= get_field('text') ?></p>
    <?php
}

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {


    if( $args->theme_location == 'footer' )
        return $items;

    // loop
    foreach( $items as &$item ) {

        // vars
        $image = get_field('image', $item);

        $item->title = ' <div class="img-wrapper"> <img src="'.$image.'" class="inline-menu-img" /> </div>' . '<div class="menu-label">' .$item->title .'</div>';

    }

    // return
    return $items;

}