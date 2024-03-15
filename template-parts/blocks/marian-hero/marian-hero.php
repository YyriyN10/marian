<div class="marian-hero">

    <div class="hero-container">
        <div class="container">
            <div class="col-text">
                <div>
                    <h1><?= get_field('titel') ?></h1>
                    <hr>
                    <p><?= get_field('text') ?></p>
                </div>
                <a id="we-are-hiring" target="_blank" href="<?= get_field('hiring_link') ?>">
                    We <br>
                    are hi! <br>
                    ring.
                </a>
            </div>

            <div class="col-img has-background-image" style="background-image: url('<?= get_field('image') ?>')">
            </div>
        </div>
    </div>
    <div class="container my-5 logoleiste">
        <div class="logos d-flex justify-content-center">
            <?php while (have_rows('logos')): the_row(); ?>
                <img class="logo" src="<?= get_sub_field('logo') ?>" />
            <?php endwhile; ?>
        </div>
    </div>


</div>