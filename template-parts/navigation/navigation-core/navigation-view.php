

<nav class="nav" id="navigation-anker">


    <div class="main-nav-part">
        <div class="container d-flex justify-content-between align-items-center relative">
            <a class="d-block text-center" href="<?= home_url(); ?>">
                <img class="logo img-fluid mx-auto" src="<?= get_stylesheet_directory_uri() ?>/img/marian_slogan_WEISS.svg" />
            </a>


            <div class="hamburger">
                <a class="main-nav-toggle" id="marian-nav-toggler" href="#main-nav"><i>Menu</i></a>
            </div>

        </div>
    </div>

    <div id="overlay-menu">
        <div class="container">
            <?php
            wp_nav_menu( array(
                'theme_location'    => 'primary',
                'menu_class'        => 'menu-items m-0',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'menu-container',
            ) );
            ?>

            <hr class="d-none d-md-block">

            <div class="menu-items menu-items-small d-none d-md-block">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'depth' => 1,
                    'container' => 'div'
                ));
                ?>
            </div>
        </div>

        <?php get_template_part("template-parts/blocks/marian-sep/marian-sep"); ?>
    </div>



</nav>

<script>

    (function () {

        const toggler = document.getElementById("marian-nav-toggler");
        const overlay = document.getElementById("overlay-menu");

        function toggleMenu() {
            toggler.classList.toggle("active-menu")
            overlay.classList.toggle("active-menu")
        }

        toggler.addEventListener('click', () => {
            toggleMenu();
        })

        // Add Event listener to all li with class menu-item
        const menuItems = document.querySelectorAll(".menu-item");
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                toggleMenu()
            })
        })


    })()

</script>