<?php /* Template Name: Karriere */
get_header();
?>
<div class="container my-5">
    <div class="col-12 col-md-9 pre-text">
        <h2><?= get_field('titel') ?></h2>
        <hr>
        <p><?= get_field('text') ?></p>
    </div>
</div>


<?php get_template_part("template-parts/blocks/marian-sep/marian-sep"); ?>

<section class="container jobs">
    <div class="row">
        <?php while (have_rows('jobs')): the_row(); ?>
            <div class="col-12 col-md-4 mb-5 single-job">
                <h2><?= get_sub_field('job_name') ?></h2>
                <hr>
                <p><?= get_sub_field('text') ?></p>

                <a href="<?= get_sub_field('link') ?>" class="learn-more">
                    <div class="label">Mehr Erfahren</div>
                    <div class="lines"></div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        function renderLinesForLinks() {
            var jobs = document.querySelectorAll('.single-job');
            jobs.forEach(function (employee) {
                var lines = employee.querySelectorAll('.lines');

                // Read the width of the link
                var imageWidth = employee.querySelector('.learn-more').offsetWidth;

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

        // Render the lines for the employees
        renderLinesForLinks();

        // Render on each resize
        window.addEventListener('resize', function() {

            // Remove all lines
            var lines = document.querySelectorAll('.line');
            lines.forEach(function (line) {
                line.remove();
            });

            renderLinesForLinks();
        });
    });
</script>



<?php
get_footer();

