<?php
/**
 * The template for displaying the front page / home
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">

    <?php
    // Hero Section
    get_template_part('template-parts/hero');

    // About Section Preview
    get_template_part('template-parts/about');

    // Services Section Preview
    get_template_part('template-parts/services');

    // Why Choose Us Section
    get_template_part('template-parts/why');

    // Process Timeline Preview
    get_template_part('template-parts/process');

    // Projects / Gallery Preview
    get_template_part('template-parts/projects');

    // Client Testimonials
    get_template_part('template-parts/testimonials');

    // Articles / Blog Section (WordPress Posts)
    get_template_part('template-parts/articles');

    // Mid CTA Band
    get_template_part('template-parts/cta-band');

    // Final CTA Section
    get_template_part('template-parts/final-cta');
    ?>

</main>

<?php
get_footer();
