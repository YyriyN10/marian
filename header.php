<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- OneTrust Cookies Consent Notice start for www.marian.co.at -->
    <script src="https://cdn.cookielaw.org/scripttemplates/otSDKStub.js"  type="text/javascript" charset="UTF-8" data-domain-script="62625500-41c0-4cd3-a643-f1ffda0a4baa-test"></script>
    <script type="text/javascript">
        function OptanonWrapper() { }
    </script>
    <!-- OneTrust Cookies Consent Notice end for www.marian.co.at -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php get_template_part("template-parts/navigation/navigation-core/navigation", "view"); ?>

