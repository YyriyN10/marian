<?php
/**
 * Everything related to the admin dashboard
 */

/**
 * TODO check
 * Add custom styled in the admin area
 */
function am_enqueue_admin_styles(){
    // register bootstrap grid for better styling of the gutenberg blocks in editor.
    wp_register_style( 'am_admin_bootstrap', get_template_directory_uri() . '/sass/bootstrap-grid.css' );
    wp_enqueue_style( 'am_admin_bootstrap');
    wp_register_style( 'am_admin_main_css', get_template_directory_uri() . '/sass/main.css' );
    wp_enqueue_style( 'am_admin_main_css');
}
//add_action( 'admin_enqueue_scripts', 'am_enqueue_admin_styles' );


/**
 * Change the width of the gutenberg editor
 */
function gb_gutenberg_admin_styles() {
    echo '
        <style>
            /* Main column width */
            .wp-block {
                max-width: 1100px;
            }
 
            /* Width of "wide" blocks */
            .wp-block[data-align="wide"] {
                max-width: none;
            }
 
            /* Width of "full-wide" blocks */
            .wp-block[data-align="full"] {
                max-width: none;
            }	
        </style>
    ';
}
//add_action('admin_head', 'gb_gutenberg_admin_styles');