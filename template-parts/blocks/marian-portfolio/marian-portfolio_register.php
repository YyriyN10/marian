<?php

acf_register_block_type(array(
    'name'              => 'marian-portfolio',
    'title'             => __('Marian Portfolio'),
    'description'       => __(''),
    'render_template'   => 'template-parts/blocks/marian-portfolio/marian-portfolio.php',
    'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/marian-portfolio/marian-portfolio.css',
    'category'          => 'formatting',
    //'icon'              => 'megaphone',
    'keywords'          => array( 'marian', 'block' ),
));
