<?php
/**
 * The template for displaying all pages
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">

    <?php while (have_posts()) : the_post(); ?>

        <section class="page-hero">
            <div class="container page-hero__inner" data-reveal>
                <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
                <h1 class="h1"><?php the_title(); ?></h1>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
                    <div style="background:#fff;border-radius:var(--radius);padding:clamp(24px, 4vw, 48px);box-shadow:var(--shadow-sm);line-height:1.9;">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('الصفحات:', 'diarnafacha'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                </article>
            </div>
        </section>

    <?php endwhile; ?>

    <?php get_template_part('template-parts/final-cta'); ?>

</main>

<?php
get_footer();
