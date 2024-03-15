<section class="marian-mitarbeiter" id="marian-mitarbeiter">
    <div class="text">
        <div class="search-wrapper">
            <h2><?= get_field('title') ?></h2>

            <div class="input-wrapper">
                <input type="text" id="filter" placeholder="Suchen">
                <img src="<?= get_stylesheet_directory_uri() ?>/img/icon_search.svg" />
            </div>

        </div>

        <hr class="mitarbeiter-hr">
        <p><?= get_field('text') ?></p>

    </div>

    <?php if (!is_admin()): ?>
        <div class="scrollbar-container">
            <div class="swiper-scrollbar"></div>
        </div>


        <div class="swiper-container swiper-employees">

        <div class="swiper-wrapper">
            <?php while (have_rows('employees')): the_row(); ?>
                <div class="swiper-slide employee-slide" data-name="<?= get_sub_field('name') ?>" data-position="<?= get_sub_field('position') ?>">
                    <div class="single-employee">
                        <img src="<?= get_sub_field('image') ?>" class="img-fluid" />

                        <div class="black-overlay"></div>

                        <div class="lines-container">
                            <div class="lines"></div>
                            <div class="lines"></div>
                            <div class="lines"></div>
                            <div class="lines"></div>
                            <div class="lines"></div>
                            <div class="lines"></div>
                        </div>


                        <div class="name"><?= get_sub_field('name') ?></div>
                        <div class="position"><?= get_sub_field('position') ?></div>
                        <div class="quote"><?= get_sub_field('quote'); ?></div>

                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php endif; ?>
</section>

<script src="<?= get_stylesheet_directory_uri() ?>/scripts/typed.umd.js"></script>

<script>

    document.getElementById('filter').addEventListener('input', function() {
        var filterValue = this.value.toLowerCase();
        var items = document.querySelectorAll('.employee-slide');

        items.forEach(function (item) {
            let itemName = item.getAttribute('data-name').toLowerCase();
            let position = item.getAttribute('data-position').toLowerCase();
            if (itemName.includes(filterValue) || position.includes(filterValue)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });

        // Reinitialize the Swiper after filtering
        // Slide to the first slide after filtering
        swiper.slideTo(0);

        // Update the Swiper instance
        swiper.update();
    });

    // On init
    document.addEventListener('DOMContentLoaded', function() {

        // Initialize the Swiper instances
        const swiper = new Swiper('.swiper-employees', {
            loop: false,
            spaceBetween: 20,
            centeredSlides: false,
            slidesPerView: 1.5,
            allowTouchMove: true,
            breakpoints: {
                650: {
                    slidesPerView: 2.5
                },
                1000: {
                    slidesPerView: 3.5
                }
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
                dragSize: 10
            }
        });

        swiper.slideTo(0);

        const departments = [
            'Geschäftsleitung',
            'Werbemitteleinkauf',
            'Qualitätsmanagement',
            'Office',
            'IT',
            'Fotostudio',
            'Bildbearbeitung',
            'Produktion/Logistik',
            'Grafik REWE Group & Brands',
            'Grafik ADEG',
            'Grafik BILLA',
            'Grafik BIPa',
            'Grafik PENNY'
        ];

        // Type animation for placeholder
        var typed = new Typed('#filter', {
            strings: departments,
            loop: true,
            typeSpeed: 50,
            attr: 'placeholder',
        });

        function renderLinesForEmployees() {
            var employees = document.querySelectorAll('.single-employee');
            employees.forEach(function (employee) {
                var lines = employee.querySelectorAll('.lines');

                // Read the width of the img
                var imageWidth = employee.querySelector('img').width;

                var numberOfLines = Math.floor(imageWidth / 4);

                // Calculate line height = image height / 6

                // Adds the amount of lines as divs to each lines element
                for (var i = 0; i < numberOfLines; i++) {
                    lines.forEach(function (line) {
                        line.innerHTML += '<div class="line"></div>';
                    });
                }
            });
        }

        // Render the lines for the employees swiper was loaded
        window.setTimeout(function () {
            renderLinesForEmployees();
        }, 1000);

        // Render on each resize
        /*
        window.addEventListener('resize', function() {

            // Remove all lines
            var lines = document.querySelectorAll('.line');
            lines.forEach(function (line) {
                line.remove();
            });

            renderLinesForEmployees();
        });
        */
    });




</script>