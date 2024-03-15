<?php


/**
 * Closes and opens the container on certain blocks.
 *
 * Because some blocks need to have a full width. We need to close the container before the block
 * content. After the content is displayed, we are going to open the
 * container again for the following blocks.
 *
 * @param $block_content
 * @param $block
 * @return string
 */
function erb_block_wrapper($block_content, $block)
{
    $blocks_that_should_be_full_width = array(
        "acf/marian-hero",
        "acf/marian-sep",
        "acf/marian-marken",
        "acf/marian-stickers",
    );


    if (!in_array($block["blockName"], $blocks_that_should_be_full_width)) {
        return $block_content;
    }

    $content = '</div>';
    $content .= $block_content;
    $content .= '<div class="container">';
    return $content;
}

add_filter('render_block', 'erb_block_wrapper', 10, 2);


add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        $folderpath = get_template_directory() . '/template-parts/blocks/';
        if (is_dir($folderpath)) {
            $files = opendir($folderpath);
            {
                if ($files) {
                    while (($subfolder = readdir($files)) !== FALSE) {
                        if ($subfolder != '.' && $subfolder != '..') {
                            $dirpath = $folderpath . $subfolder . "/";
                            // get files in subdirectories
                            if (is_dir($dirpath)) {
                                $file = opendir($dirpath);
                                {
                                    if ($file) {
                                        // get the name of all files in the subdirectories
                                        while (($filename = readdir($file)) !== FALSE) {
                                            if ($filename != '.' && $filename != '..' && strpos($filename, "_register.php")) {
                                                //echo $dirpath . $filename;
                                                include $dirpath . $filename;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

    }
}

