<?php

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once 'class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Register all theme navigations
 */
function register_navigations()
{
	register_nav_menu("primary", __("Hauptnavigation"));
	register_nav_menu("footer", __("Footer"));
}
add_action("init", "register_navigations");