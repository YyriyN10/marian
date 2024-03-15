<?php get_header(); ?>

<div class="container">

    <div class="row align-items-center">
        <div class="col-12 col-sm-8">
            <h1><?= get_the_title() ?></h1>
        </div>

        <div class="col-12 col-sm-4 text-sm-end mb-4 mb-sm-0">
            <a class="btn" id="compare-house-btn">Haus vergleichen</a>
        </div>
    </div>

    <p class="price">Leistungsstufe <span id="house-power-level">A</span> <span id="house-price">0</span></p>

    <div class="house-variations">
        <div class="attribute-set">
            <label for="house-size-list">Hausvariante</label>
            <ul class="options-list" id="house-size-list">
                <!-- options will be populated dynamically via JavaScript -->
            </ul>
        </div>

        <div class="attribute-set">
            <label for="house-roofType-list">Dach&shy;variante</label>
            <ul class="options-list" id="house-roofType-list">
                <!-- options will be populated dynamically via JavaScript -->
            </ul>
        </div>

    </div>
    <div class="col-12 col-md-8">
        <div>
            <?= get_field('text') ?>
        </div>
    </div>
</div>

<div class="d-md-flex mt-5">
    <div class="data-table">
        <table>
            <tr>
                <td>Dachform</td>
                <td id="house-roofType"></td>
            </tr>

            <tr>
                <td>Dachneigung</td>
                <td id="house-roof-pitch"></td>
            </tr>

            <tr>
                <td>Netto Geschoßfläche EG</td>
                <td id="house-net-floor-area-ground-floor"></td>
            </tr>

            <tr>
                <td>Netto Geschoßfläche OG</td>
                <td id="house-net-floor-area-upper-floor"></td>
            </tr>

            <tr>
                <td>Netto Geschoßfläche Gesamt</td>
                <td id="house-size"></td>
            </tr>

            <tr>
                <td>Länge</td>
                <td id="house-length"></td>
            </tr>

            <tr>
                <td>Breite</td>
                <td id="house-width"></td>
            </tr>
        </table>
    </div>

    <div class="image-gallery">
        <div class="swiper-container">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    Hello world
                </div>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<div class="recommended">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <?= get_field('recommender_text', 'option') ?>
            </div>
        </div>

        <?php

        $args = array(
            'post_type' => 'haus',
            'posts_per_page' => 3,
        );
        $loop = new WP_Query($args);

        ?>

        <div class="house-list mt-4">
            <div class="row">

                <?php while ($loop->have_posts()): $loop->the_post(); ?>


                    <?= get_template_part("template-parts/components/house-preview/house-preview", "wrapper"); ?>


                <?php endwhile; ?>

            </div>
        </div>
        
        <?php wp_reset_postdata(); ?>
    </div>


</div>


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="<?= get_stylesheet_directory_uri() ?>/includes/lightbox.min.css">
<script src="<?= get_stylesheet_directory_uri() ?>/includes/lightbox.min.js"></script>
<script>

    // Get the house variations data from ACF (assuming you passed it as a JSON string)
    const house_variations = <?php echo json_encode(get_field('variations', get_the_ID())); ?>;

    console.log(house_variations)

    document.addEventListener('DOMContentLoaded', function () {

        // Initialize the Swiper instances
        var swiper = new Swiper('.swiper-container', {
            loop: false,
            speed: 500,
            spaceBetween: 20,
            centeredSlides: false,
            slidesPerView: 1.8,
            allowTouchMove: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        const houseVariations = house_variations; // Your house_variations array

        let currentHouseVariation = null; // Variable to store the current selected house variation

        // Function to update the UI based on the selected option
        function updateUI() {
            if (currentHouseVariation) {
                var selectedSize = currentHouseVariation.size_label;
                var selectedRoofType = currentHouseVariation.roofType;

                // Set the active class for the size and roofType list items that fit the current combination
                var sizeListItems = document.querySelectorAll('#house-size-list li.option-item');
                sizeListItems.forEach(function (item) {
                    item.classList.toggle('active', item.textContent === selectedSize);
                });

                var roofTypeListItems = document.querySelectorAll('#house-roofType-list li.option-item');
                roofTypeListItems.forEach(function (item) {
                    item.classList.toggle('active', item.textContent === selectedRoofType);
                });
                // Add here possible other attributes

                // Update the house attributes
                document.getElementById('house-power-level').textContent = currentHouseVariation.power_level;
                document.getElementById('house-price').textContent = `€ ${currentHouseVariation.price}`;
                document.getElementById('house-roofType').textContent = currentHouseVariation.roofType;
                document.getElementById('house-roof-pitch').textContent = currentHouseVariation.roof_pitch;
                document.getElementById('house-net-floor-area-ground-floor').textContent = currentHouseVariation.net_floor_area_ground_floor;
                document.getElementById('house-net-floor-area-upper-floor').textContent = (Math.round(
                    (
                        currentHouseVariation.size.replace(',','.').replace(/[^0-9.]/g,"")
                        - currentHouseVariation.net_floor_area_ground_floor.replace(',','.').replace(/[^0-9.]/g,"")
                    ) * 100

                    ) / 100
                    + " m²").replace('.',',');
                document.getElementById('house-size').textContent = currentHouseVariation.size;
                document.getElementById('house-length').textContent = currentHouseVariation.length;
                document.getElementById('house-width').textContent = currentHouseVariation.width;

                // Update the slider
                // Reset all slides
                swiper.removeAllSlides();

                // Add the new slides
                currentHouseVariation.pictures.forEach(function (image) {
                    swiper.appendSlide(`
                    <div class="swiper-slide">
                        <a href="${image.image}" data-lightbox="image-set">
                            <img class="w-100" src="${image.image}" />
                        </a>
                    </div>`
                    );
                });

                // Update compare button link
                document.getElementById('compare-house-btn').setAttribute('href', getCompareLinkBy());

                lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true
                });
            }
        }

        function guidGenerator() {
            var S4 = function() {
                return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
            };
            return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
        }

        // Handles the click event on the options list items
        function handleSelection(event) {
            var optionListItem = event.target;

            // Get all variations that match the selected attributes
            const matchingVariations = houseVariations.filter(function (variation) {
                return variation[optionListItem.dataset.attribute] === optionListItem.dataset.value
            });

            // See if we have a match for the current selected variation
            const currentVariationMatch = matchingVariations.find(function (variation) {
                return variation === currentHouseVariation;
            });

            // If there is a match, select it
            if (currentVariationMatch) {
                currentHouseVariation = currentVariationMatch;
            } else {
                // If there is no match, select the first available house in the list
                currentHouseVariation = matchingVariations[0];
            }

            // Update the UI and price based on the selected options
            updateUI();
        }

        // Function to create an option list
        function createOptionList(parentElement, optionsData, attributeName) {
            var uniqueOptions = [...new Set(optionsData.map(option => option[attributeName]))];

            uniqueOptions.forEach(function (option) {
                var optionListItem = document.createElement('li');
                optionListItem.textContent = option;
                optionListItem.classList.add('option-item');
                optionListItem.setAttribute('data-attribute', attributeName);
                optionListItem.setAttribute('data-value', option);
                optionListItem.addEventListener('click', handleSelection);
                parentElement.appendChild(optionListItem);
            });
        }

        // Populate the house size and roofType options dynamically
        createOptionList(document.getElementById('house-size-list'), houseVariations, 'size_label');
        createOptionList(document.getElementById('house-roofType-list'), houseVariations, 'roofType');
        // Add here possible other options

        // Preselect the first house in the list
        function preselectFirstHouse() {
            if(houseVariations && houseVariations.length < 1) {
                return;
            }
            currentHouseVariation = houseVariations[0];
            updateUI();
        }

        /**
         * The compare link is generated with the following schema
         * /compare?preselect=house{house_id}&option={size}_{roofType}
         */
        function getCompareLinkBy() {
            let link = `/compare?preselect=house_<?= get_the_ID() ?>&option=${currentHouseVariation.size_label}_${currentHouseVariation.roofType}`;

            // Replace whitespace with underscore
            link = link.replace(/\s/g, '_');

            return link;
        }

        preselectFirstHouse();


    });
</script>








<?php get_footer(); ?>

