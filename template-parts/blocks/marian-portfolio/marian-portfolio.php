<?php $position = get_field('position') ?>
<?php $id = random_int(1, 9999) ?>
<div class="marian-portfolio" id="leistungen">


    <!-- Mobile Layout -->
    <div class="d-md-none col-md text-col mt-5">
        <?php echoPortfolioText(); ?>
    </div>

    <div class="d-md-none swiper-container swiper-portfolio">

        <div class="bar-container">
            <div class="progress-container">
                <!-- Progress bar -->
                <div id="bar-1-<?=$id?>" class="progress-bar"></div>
            </div>

            <div class="progress-container">
                <!-- Progress bar -->
                <div id="bar-2-<?=$id?>" class="progress-bar"></div>
            </div>
        </div>


        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img class="img-fluid" src="<?= get_field('image_1') ?>" />
            </div>

            <div class="swiper-slide">
                <img class="img-fluid" src="<?= get_field('image_2') ?>" />
            </div>
        </div>
    </div>

    <?php if (!is_admin()): ?>
        <div class="row align-items-center d-none d-md-flex">

        <!-- Desktop Layout -->
        <?php if ($position == 1): ?>
            <div class="d-none d-md-block col-md text-col">
                <?php echoPortfolioText(); ?>
            </div>
        <?php endif; ?>

        <div class="col-md">
            <img class="img-fluid" src="<?= get_field('image_1') ?>" />
        </div>

        <?php if ($position == 2): ?>
            <div class="d-none d-md-block col-md text-col">
                <?php echoPortfolioText(); ?>
            </div>
        <?php endif; ?>

        <div class="col-md">
            <img class="img-fluid" src="<?= get_field('image_2') ?>" />
        </div>

        <?php if ($position == 3): ?>
            <div class="d-none d-md-block col-md text-col">
                <?php echoPortfolioText(); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {

        var slideSpeed = 3000;

        var portfolioSwiper = new Swiper('.swiper-portfolio', {
            loop: false,
            spaceBetween: 20,
            centeredSlides: false,
            slidesPerView: 1,
            allowTouchMove: true,
            speed: 200,
            autoplay: {
                delay: slideSpeed,
                disableOnInteraction: false, // Autoplay continues even when the user interacts with the slider
            }
        });


        // Get the progress bar element
        var progressBar1 = document.querySelector('#bar-1-<?=$id?>');
        var progressBar2 = document.querySelector('#bar-2-<?=$id?>');


        // Reset both progress bars to 0
        function resetProgressBar1() {
            // Disable animation
            progressBar1.style.transition = 'none';
            progressBar1.style.width = 0;

        }

        function resetProgressBar2() {
            // Disable animation
            progressBar2.style.transition = 'none';
            progressBar2.style.width = 0;
        }

        // Start the animation
        function startProgressbar() {

            resetProgressBar2()

            progressBar1.style.transition = `width ${slideSpeed}ms linear`;
            progressBar1.style.width = '100%';

            // Progress bar 2 starts after progress bar 1 finishes
            setTimeout(() => {
                resetProgressBar1()
                progressBar2.style.transition = `width ${slideSpeed}ms linear`;
                progressBar2.style.width = '100%';

            }, slideSpeed + 200);
        }

        // Reset on first load
        resetProgressBar1();
        resetProgressBar2();

        // Start and loop infinitely
        startProgressbar();

        setInterval(() => {
            startProgressbar();
        }, (slideSpeed * 2) + 200);

    });
</script>

