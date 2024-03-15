<div class="marian-sep width-<?= get_field('width') ?>" data-color="<?= get_field('color') ?>">

</div>

<script>
    // Document ready
    $(function () {
        function addLines() {
            // Read the width of the container .marian-sep
            var containerWidth = $('.marian-sep').width();

            var lineColor = $('.marian-sep').attr('data-color');

            // Calculate how many times the 5px + 10px each side fit inside
            var numberOfLines = Math.floor(containerWidth / 18);

            // Adds the amount of lines as divs to the container
            for (var i = 0; i < numberOfLines; i++) {
                $('.marian-sep').append('<div class="line" style="background-color:'+ lineColor +' "></div>');
            }
        }

        $('.marian-sep').empty();
        addLines();

        // Recalcuate and reset on every resize
        $(window).resize(function () {
            $('.marian-sep').empty();
            addLines();
        });

    });
</script>