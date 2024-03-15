<?php

acf_register_block_type(array(
    'name'              => 'marian-mitarbeiter',
    'title'             => __('Marian Mitarbeiter'),
    'description'       => __(''),
    'render_template'   => 'template-parts/blocks/marian-mitarbeiter/marian-mitarbeiter.php',
    'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/marian-mitarbeiter/marian-mitarbeiter.css',
    'category'          => 'formatting',
    'keywords'          => array( 'marian', 'block' ),
));
