<?php

acf_register_block_type(array(
    'name' => 'marian-sep',
    'title' => __('Marian Separator'),
    'description' => __(''),
    'render_template' => 'template-parts/blocks/marian-sep/marian-sep.php',
    'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/marian-sep/marian-sep.css',
    'category' => 'formatting',
    //'icon'              => 'megaphone',
    'keywords' => array('marian', 'block'),
));
