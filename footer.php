<footer id="marian-footer">

    <?php get_template_part("template-parts/blocks/marian-sep/marian-sep"); ?>


    <div class="container">

        <div class="row my-5">
            <div class="col-12 col-md-4">
                <div class="marian-text-block">
                    <h2><?= get_field('verbindung_title', 'option') ?></h2>
                    <hr class="verbindung-hr">
                    <p><?= get_field('verbindung_text', 'option') ?></p>
                </div>
            </div>

            <div class="col-12 col-md-8 mt-5 mt-md-0">
                <div class="row">
                    <div class="col-4">
                        <a href="<?= get_field('email_link', 'option') ?>" class="contact-circle" id="mail">
                            <img class="bg-img" src="<?= get_stylesheet_directory_uri() ?>/img/K_Yellow_.svg" />
                            <img class="icon" src="<?= get_stylesheet_directory_uri() ?>/img/icon_mail.svg" />
                        </a>
                    </div>
                    <div class="col-4 offset-md-1">
                        <a target="_blank" href="<?= get_field('instagram_link', 'option') ?>" class="contact-circle" id="instagram">
                            <img class="bg-img" src="<?= get_stylesheet_directory_uri() ?>/img/label_instagram.svg" />
                            <img class="icon" src="<?= get_stylesheet_directory_uri() ?>/img/icon_instagram.svg" />
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <?php get_template_part("template-parts/blocks/marian-sep/marian-sep"); ?>

    <div class="container">

        <div class="row my-5 position-relative">
            <div class="col-12 col-md-4">
                <div class="marian-text-block">
                    <h2><?= get_field('footer_titel', 'option'); ?></h2>
                    <hr>
                    <p><?= get_field('footer_text', 'option') ?></p>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12"><h3><?= get_field('titel_adressen', 'option') ?></h3></div>
        </div>

        <div class="row mt-3">
            <div class="col-12 col-md-4">
                <a target="_blank" href="<?= get_field('standortlink_1', 'option') ?>">
                    <img class="w-100 mb-4" src="<?= get_field('standortfoto_1', 'option') ?>" />
                </a>

                <address>
                    <?= get_field('adresse_1', 'option') ?>
                </address>
            </div>

            <div class="col-12 col-md-4">
                <a target="_blank" href="<?= get_field('standortlink_2', 'option') ?>">
                    <img class="w-100 mb-4" src="<?= get_field('standortfoto_2', 'option') ?>" />
                </a>
                <address>
                    <?= get_field('adresse_2', 'option') ?>
                </address>
            </div>

            <div class="col-12 col-md-4">
                <a target="_blank" href="<?= get_field('standortlink_3', 'option') ?>">
                    <img class="w-100 mb-4" src="<?= get_field('standortfoto_3', 'option') ?>" />
                </a>
                <address>
                    <?= get_field('adresse_3', 'option') ?>
                </address>
            </div>
        </div>

        <div class="row my-3 my-md-5 align-items-end">
            <div class="col-12 col-md-6" id="firmenbuch">
                <p>
                    <?= get_field('textbox_below', 'option') ?>
                </p>
            </div>

            <div class="col-12 col-md-6">

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'depth' => 1,
                    'container' => 'div'
                ));
                ?>
            </div>
        </div>
    </div>

    <?php include "template-parts/blocks/marian-sep/marian-sep.php"?>

    <div id="sep-holder">
        <div id="sep-1">
            <?php get_template_part("template-parts/blocks/marian-sep/marian-sep"); ?>
        </div>

        <div id="sep-2">
            <?php get_template_part("template-parts/blocks/marian-sep/marian-sep"); ?>
        </div>
    </div>


    <img id="hero-circle" class="" src="<?= get_stylesheet_directory_uri() ?>/img/circles/c_service.svg" />

    <img id="leistungen-circle" src="<?= get_template_directory_uri() ?>/img/circles/c-gluecklich.svg" />

    <img id="marken-circle" src="<?= get_template_directory_uri() ?>/img/circles/c_spoton.svg" />

    <img id="employee-circle" src="<?= get_template_directory_uri() ?>/img/circles/c_iQ.svg" />

    <img id="footer-circle" src="<?= get_template_directory_uri() ?>/img/circles/c_klicks.svg" />


</footer>


<script>

    function setHrLength() {
        // Get all hr elements on the page
        const hrElements = document.querySelectorAll('hr');

        // Loop through each hr element
        hrElements.forEach(hr => {
            // Get the previous sibling of hr, assuming it's an h2 element
            const hElement = hr.previousElementSibling;

            // Check if the previous sibling is an h2 element
            if (hElement && (hElement.tagName.toLowerCase() === 'h2' || hElement.tagName.toLowerCase() === 'h1')) {
                // Measure the width of the h2 element
                const hWidth = hElement.getBoundingClientRect().width;

                // Get text of hElement
                const hText = hElement.innerText;

                // Filter for the last row of the text
                const lastRow = hText.split('\n').pop();

                // Calculate width of text
                const textWidth = getTextWidth(lastRow, '42px Bitter')

                // Handle special cases
                if(hr.classList.contains('verbindung-hr')) {
                    hr.style.width = `${textWidth - 24}px`;
                    return;
                }

                if(hr.classList.contains('mitarbeiter-hr')) {
                    console.log(textWidth)
                    hr.style.width = `${textWidth - 10}px`;
                    return;
                }

                // Set the width of the hr element to the width of the h2 element
                hr.style.width = `${textWidth}px`;
            } else {
                // Special for the mitarbeiter section
                if(hElement && hElement.classList.contains('search-wrapper')) {

                    // Get h2 element in div
                    let heading = hElement.querySelector('h2');
                    const hWidth = heading.getBoundingClientRect().width;
                    hr.style.width = `${hWidth - 5}px`;
                }

            }
        });
    }

    /**
     * Uses canvas.measureText to compute and return the width of the given text of given font in pixels.
     *
     * @param {String} text The text to be rendered.
     * @param {String} font The css font descriptor that text is to be rendered with (e.g. "bold 14px verdana").
     *
     * @see https://stackoverflow.com/questions/118241/calculate-text-width-with-javascript/21015393#21015393
     */
    function getTextWidth(text, font) {
        // re-use canvas object for better performance
        const canvas = getTextWidth.canvas || (getTextWidth.canvas = document.createElement("canvas"));
        const context = canvas.getContext("2d");
        context.font = font;
        const metrics = context.measureText(text);
        return metrics.width;
    }

    function isMouseOverElement(event, element) {

        // Act different if element is an array
        if(element.length > 0) {
            // Loop through it
            for(let i = 0; i < element.length; i++) {
                // If one is true return true
                if(isMouseOverElement(event, element[i])) {
                    return true;
                }
            }
            return false
        }

        var rect = element.getBoundingClientRect();

        return (
            event.clientX >= rect.left &&
            event.clientX <= rect.right &&
            event.clientY >= rect.top &&
            event.clientY <= rect.bottom
        );
    }

    function initCursor() {
        var image = document.getElementById('hero-circle');

        // Get the section element
        var mitarbeiterSection = document.getElementById('marian-mitarbeiter');
        var leistungenSection = document.getElementsByClassName('marian-portfolio');
        var markenSection = document.getElementById('kunden');
        var footer = document.getElementById('marian-footer');

        function updateCursorCircle(e) {
            // Make a noticable lag
            setTimeout(function () {

                if (mitarbeiterSection && isMouseOverElement(e, mitarbeiterSection)) {
                    image.style.display = 'none';
                    image = document.getElementById('employee-circle');
                    image.style.display = 'block';
                } else if (footer && isMouseOverElement(e, footer)) {
                    image.style.display = 'none';
                    image = document.getElementById('footer-circle');
                    image.style.display = 'block';
                } else if (leistungenSection && isMouseOverElement(e, leistungenSection)) {
                    image.style.display = 'none';
                    image = document.getElementById('leistungen-circle');
                    image.style.display = 'block';
                } else if (markenSection && isMouseOverElement(e, markenSection)) {
                    image.style.display = 'none';
                    image = document.getElementById('marken-circle');
                    image.style.display = 'block';
                } else {
                    image.style.display = 'none';
                    image = document.getElementById('hero-circle');
                    image.style.display = 'block';
                }

                // Centered horizontally only
                image.style.left = (e.pageX - 20) + 'px';
                image.style.top = (e.pageY + 20) + 'px';

            }, 100);
        }

        window.addEventListener("mousemove", e => {
            updateCursorCircle(e);
        })

        window.addEventListener("wheel", e => {
            updateCursorCircle(e);
        })

    }

    (function () {
        initCursor();

        // set timeout for 100ms before calling
        setTimeout(function () {
            setHrLength();
        }, 100);

    })();


</script>

<?php wp_footer(); ?>

</body>
</html>
