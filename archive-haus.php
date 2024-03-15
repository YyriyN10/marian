<?php get_header();
$get_houses = get_posts([
    'numberposts' => -1,
    'post_type' => 'haus',
]);
$roof_types = [];
$roof_pitch = [];
$size_label = [];

foreach ($get_houses as $post) {
    setup_postdata($post);
    if (have_rows('variations', $post->ID)) {
        while (have_rows('variations', $post->ID)) {
            the_row();
            $roof_types[] = get_sub_field('roofType');
            $roof_pitch[] = get_sub_field('roof_pitch');
            $size_label[] = get_sub_field('size_label');
        }
    }
}
wp_reset_postdata();
$roof_types = array_unique($roof_types);
$roof_pitch = array_unique($roof_pitch);
$size_label = array_unique($size_label);

$get_terms = get_terms([
    'taxonomy' => 'typ',
    'hide_empty' => false,
]);
?>

<div class="container">

    <div class="filter-area">

        <div class="quickfilter">

            <div class="clear_filters">
                Filter zurücksetzen
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M3.53552 4.94976L0 8.48528L1.41421 9.89949L4.94974 6.36397L8.48528 9.89952L9.8995 8.4853L6.36395 4.94976L9.8995 1.41421L8.48528 0L4.94974 3.53555L1.41421 2.2769e-05L0 1.41424L3.53552 4.94976Z"
                          fill="#E6E0D5"/>
                </svg>
            </div>

            <?php if (!empty($roof_types)) { ?>
                <div class="filter small_padding">
                    <div class="filter__title">
                        <span>Dachform</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="8.887" height="14.945"
                             viewBox="0 0 8.887 14.945">
                            <path id="icon_arrow" d="M-10079.939,1344.67l6.059,6.058-6.059,6.058"
                                  transform="translate(10081.354 -1343.256)" fill="none" stroke="#e6e0d5"
                                  stroke-linecap="round" stroke-width="2"/>
                        </svg>
                    </div>

                    <div class="menu">
                        <ul>
                            <?php foreach ($roof_types as $roof_type) { ?>
                                <li data-target="<?= strtolower(str_replace(' ', '_', $roof_type)) ?>">
                                    <?= $roof_type ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>

            <?php if (!empty($roof_pitch)) { ?>
                <div class="filter">
                    <div class="filter__title">
                        <span>Dachneigung</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="8.887" height="14.945"
                             viewBox="0 0 8.887 14.945">
                            <path id="icon_arrow" d="M-10079.939,1344.67l6.059,6.058-6.059,6.058"
                                  transform="translate(10081.354 -1343.256)" fill="none" stroke="#e6e0d5"
                                  stroke-linecap="round" stroke-width="2"/>
                        </svg>
                    </div>

                    <div class="menu">
                        <ul>
                            <?php foreach ($roof_pitch as $roof_) { ?>
                                <li data-target="<?= strtolower(str_replace('°', '_pitch', $roof_)) ?>">
                                    <?= $roof_ ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>

            <?php if (!empty($get_terms)) { ?>
                <div class="filter small_padding">
                    <div class="filter__title">
                        <span>Haustyp</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="8.887" height="14.945"
                             viewBox="0 0 8.887 14.945">
                            <path id="icon_arrow" d="M-10079.939,1344.67l6.059,6.058-6.059,6.058"
                                  transform="translate(10081.354 -1343.256)" fill="none" stroke="#e6e0d5"
                                  stroke-linecap="round" stroke-width="2"/>
                        </svg>
                    </div>

                    <div class="menu">
                        <ul>
                            <?php foreach ($get_terms as $get_term) { ?>
                                <li data-target="<?= $get_term->slug ?>">
                                    <?= $get_term->name ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>

            <?php if (!empty($size_label)) { ?>
                <div class="filter">
                    <div class="filter__title">
                        <span>Variante</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="8.887" height="14.945"
                             viewBox="0 0 8.887 14.945">
                            <path id="icon_arrow" d="M-10079.939,1344.67l6.059,6.058-6.059,6.058"
                                  transform="translate(10081.354 -1343.256)" fill="none" stroke="#e6e0d5"
                                  stroke-linecap="round" stroke-width="2"/>
                        </svg>
                    </div>

                    <div class="menu">
                        <ul>
                            <?php foreach ($size_label as $size_labe) { ?>
                                <li data-target="size_<?= strtolower(str_replace('°', '', $size_labe)) ?>">
                                    <?= $size_labe ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>

            <div class="active-filter-wrapper">
                Aktive Filter: <span id="active-filters"></span>
            </div>

        </div>

        <div>
            <a class="btn btn-primary" href="<?= get_home_url('') ?>/compare/">
                Häuser vergleichen
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_iconCarrier">
                        <path d="M6 12H18M18 12L13 7M18 12L13 17" stroke="#E6E0D5" stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </g>
                </svg>
            </a>
        </div>


    </div>


    <?php

    $args = array(
        'post_type' => 'haus',
        'posts_per_page' => -1,
    );
    $loop = new WP_Query($args);

    ?>

    <div class="house-list">
        <div class="row">

            <?php while ($loop->have_posts()): $loop->the_post(); ?>


                <?= get_template_part("template-parts/components/house-preview/house-preview", "wrapper"); ?>


            <?php endwhile; ?>

        </div>
    </div>


</div>


<?php get_footer(); ?>

