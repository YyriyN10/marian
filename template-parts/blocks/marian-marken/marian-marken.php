<section class="marian-marken" id="kunden">

    <div class="container">
        <div class="text">
            <h2><?= get_field('title') ?></h2>
            <hr>
            <p><?= get_field('text') ?></p>
        </div>


        <div class="brand-container align-items-center ">
            <div class="swiper-container swiper-marken">
                <div class="swiper-wrapper">
                    <?php $count = 0; ?>
                    <?php while (have_rows('brands')): the_row(); ?>

                        <?php if($count == 0) echo '<div class="swiper-slide">' ?>
                        <?php $count = $count + 1 ?>

                        <div class="brand-wrapper">
                            <img src="<?= get_sub_field('brand'); ?>" class="img-fluid" />
                        </div>


                        <?php if($count == 1) echo '</div>' ?>
                        <?php if($count == 1) $count = 0 ?>


                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    const swiperMarken = new Swiper('.swiper-marken', {
        loop: true,
        spaceBetween: 70,
        centeredSlides: false,
        speed: 5500,
        slidesPerView: 4,
        allowTouchMove: true,
        breakpoints: {
            650: {
                slidesPerView: 5
            },
            1000: {
                slidesPerView: 6
            }
        },
        autoplay: {
            delay: 1, // Autoplay delay in milliseconds (3 seconds in this example)
            disableOnInteraction: false, // Autoplay continues even when the user interacts with the slider
        },
    });
</script>