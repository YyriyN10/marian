<?php

acf_register_block_type(array(
    'name'              => 'marian-marken',
    'title'             => __('Marian Marken'),
    'description'       => __(''),
    'render_template'   => 'template-parts/blocks/marian-marken/marian-marken.php',
    'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/marian-marken/marian-marken.css',
    'category'          => 'formatting',
    //'icon'              => 'megaphone',
    'keywords'          => array( 'marian', 'block' ),
));
