<?php /* Template Name: Compare House */
get_header();

// posts array
$my_posts = get_posts(array(
    'numberposts' => -1,
    'orderby' => 'date',
    'post_type' => 'haus',
));

?>

    <section class="compare">
        <div class="container">
            <div class="top_info_holder">
                <h2>
                    <?php the_field('title')?>
                </h2>
                <div class="subtitle">
                    <?php the_field('sub_title')?>
                </div>
                <div class="description">
                    <?php the_field('description')?>
                </div>
            </div>

            <div class="compare_holder">
                <div class="single_house_holder">
                    <div class="dropdown">
                        <div class="name_holder">
                            <span><?= get_the_title($my_posts[0]->ID) ?> </span>
                            <div>
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.82082 1.9104L5 5.73122L1.17918 1.9104L0 3.08954L5 8.08954L10 3.08954L8.82082 1.9104Z"
                                          fill="#6C6C6C"/>
                                </svg>
                            </div>
                        </div>
                        <div class="menu_hidden">
                            <?php foreach ($my_posts as $post) {
                                $variations = get_field('variations', $post->ID);
                                ?>
                                <div class="single_house_name">
                                    <span><?= get_the_title($post->ID); ?></span>
                                    <ul class="variations_holder">
                                        <?php foreach ($variations as $variation) {
                                            $size_label = $variation['size_label'];
                                            $size_label = str_replace(' ', '_', $size_label);
                                            $roof_type = $variation['roofType'];
                                            $roof_type = str_replace(' ', '_', $roof_type); ?>
                                            <li class="single_house_name_list" data-target="house_<?= $post->ID; ?>"
                                                data-option="<?= $size_label ?>_<?= $roof_type ?>">
                                                <?= $variation['size_label'] ?> - <?= $variation['roofType']; ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="house_preview_holder">
                        <?php
                        $i = 1;
                        foreach ($my_posts as $post) {
                            $house_image = get_the_post_thumbnail_url($post->ID); ?>

                            <div class="<?= ($i === 1) ? 'active' : ''; ?> house_holder house_<?= $post->ID; ?>">
                                <div class="image">
                                    <img src="<?= $house_image; ?>" alt="<?php the_title(); ?>">
                                </div>
                                <?php
                                if (have_rows('variations', $post->ID)) {
                                    $k = 1;
                                    while (have_rows('variations', $post->ID)) {
                                        the_row();
                                        $size_label = get_sub_field('size_label');
                                        $size_label = str_replace(' ', '_', $size_label);
                                        $roof_type = get_sub_field('roofType');
                                        $roof_type = str_replace(' ', '_', $roof_type);
                                        ?>
                                        <div class="spec_table <?= ($k === 1) ? 'active' : ''; ?> <?= $size_label; ?>_<?= $roof_type; ?>">
                                            <div class="single_option">
                                                <div class="title">
                                                    Preis
                                                </div>
                                                <div class="info">
                                                    <?php echo formatEuro(get_sub_field('price')); ?>
                                                </div>
                                            </div>
                                            <div class="single_option">
                                                <div class="title">
                                                    Dachform
                                                </div>
                                                <div class="info">
                                                    <?php the_sub_field('roofType'); ?>
                                                </div>
                                            </div>
                                            <div class="single_option">
                                                <div class="title">
                                                    Dachneigung
                                                </div>
                                                <div class="info">
                                                    <?php the_sub_field('roof_pitch'); ?>
                                                </div>
                                            </div>
                                            <div class="single_option">
                                                <div class="title">
                                                    Netto Geschoßfläche EG
                                                </div>
                                                <div class="info">
                                                    <?php the_sub_field('net_floor_area_ground_floor'); ?>
                                                </div>
                                            </div>
                                            <div class="single_option">
                                                <div class="title">
                                                    Netto Geschoßfläche Gesamt
                                                </div>
                                                <div class="info">
                                                    <?php the_sub_field('size'); ?>
                                                </div>
                                            </div>
                                            <div class="single_option">
                                                <div class="title">
                                                    Länge
                                                </div>
                                                <div class="info">
                                                    <?php the_sub_field('length'); ?>
                                                </div>
                                            </div>
                                            <div class="single_option">
                                                <div class="title">
                                                    Breite
                                                </div>
                                                <div class="info">
                                                    <?php the_sub_field('width'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $k++;
                                    }
                                } ?>
                            </div>


                            <?php
                            $i++;
                        } ?>
                    </div>
                </div>

                <div class="single_house_holder">
                    <div class="dropdown">
                        <div class="name_holder">
                            <span><?= get_the_title($my_posts[0]->ID) ?></span>
                            <div>
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.82082 1.9104L5 5.73122L1.17918 1.9104L0 3.08954L5 8.08954L10 3.08954L8.82082 1.9104Z"
                                          fill="#6C6C6C"/>
                                </svg>
                            </div>
                        </div>
                        <div class="menu_hidden">
                            <?php foreach ($my_posts as $post) {
                                $variations = get_field('variations', $post->ID);
                                ?>
                                <div class="single_house_name">
                                    <span><?= get_the_title($post->ID); ?></span>
                                    <ul class="variations_holder">
                                        <?php foreach ($variations as $variation) {
                                            $size_label = $variation['size_label'];
                                            $size_label = str_replace(' ', '_', $size_label);
                                            $roof_type = $variation['roofType'];
                                            $roof_type = str_replace(' ', '_', $roof_type); ?>
                                            <li class="single_house_name_list" data-target="house_<?= $post->ID; ?>"
                                                data-option="<?= $size_label ?>_<?= $roof_type ?>">
                                                <?= $variation['size_label'] ?> - <?= $variation['roofType']; ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="house_preview_holder">
                        <?php
                        $i = 1;
                        foreach ($my_posts as $post) {
                            $house_image = get_the_post_thumbnail_url($post->ID); ?>

                            <div class="<?= ($i === 1) ? 'active' : ''; ?> house_holder house_<?= $post->ID; ?>">
                                <div class="image">
                                    <img src="<?= $house_image; ?>" alt="<?php the_title(); ?>">
                                </div>
                                <?php
                                if (have_rows('variations', $post->ID)) {
                                    $k = 1;
                                    while (have_rows('variations', $post->ID)) {
                                        the_row();
                                        $size_label = get_sub_field('size_label');
                                        $size_label = str_replace(' ', '_', $size_label);
                                        $roof_type = get_sub_field('roofType');
                                        $roof_type = str_replace(' ', '_', $roof_type);
                                        ?>
                                        <div class="spec_table <?= ($k === 1) ? 'active' : ''; ?> <?= $size_label; ?>_<?= $roof_type; ?>">
                                            <div class="single_option">
                                                <div class="title">
                                                    Preis
                                                </div>
                                                <div class="info">
                                                    <?php echo formatEuro(get_sub_field('price')); ?>
                                                </div>
                                            </div>
                                            <div class="single_option">
                                                <div class="title">
                                                    Dachform
                                                </div>
                                                <div class="info">
                                                    <?php the_sub_field('roofType'); ?>
                                                </div>
                                            </div>
                                            <div class="single_option">
                                                <div class="title">
                                                    Dachneigung
                                                </div>
                                                <div class="info">
                                                    <?php the_sub_field('roof_pitch'); ?>
                                                </div>
                                            </div>
                                            <div class="single_option">
                                                <div class="title">
                                                    Netto Geschoßfläche EG
                                                </div>
                                                <div class="info">
                                                    <?php the_sub_field('net_floor_area_ground_floor'); ?>
                                                </div>
                                            </div>
                                            <div class="single_option">
                                                <div class="title">
                                                    Netto Geschoßfläche Gesamt
                                                </div>
                                                <div class="info">
                                                    <?php the_sub_field('size'); ?>
                                                </div>
                                            </div>
                                            <div class="single_option">
                                                <div class="title">
                                                    Länge
                                                </div>
                                                <div class="info">
                                                    <?php the_sub_field('length'); ?>
                                                </div>
                                            </div>
                                            <div class="single_option">
                                                <div class="title">
                                                    Breite
                                                </div>
                                                <div class="info">
                                                    <?php the_sub_field('width'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $k++;
                                    }
                                } ?>
                            </div>


                            <?php
                            $i++;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
get_footer();

