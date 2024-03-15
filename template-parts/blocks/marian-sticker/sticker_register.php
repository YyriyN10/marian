<?php

acf_register_block_type(array(
    'name' => 'marian-stickers',
    'title' => __('Marian Stickers'),
    'description' => __(''),
    'render_template' => 'template-parts/blocks/marian-sticker/sticker.php',
    'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/marian-sticker/marian-sticker.css',
    'category' => 'formatting',
    'keywords' => array('marian', 'block'),
));
