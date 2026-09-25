<?php
/**
 * The template for displaying Services Archive
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container page-hero__inner" data-reveal>
            <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
            <span class="eyebrow"><?php esc_html_e('خدمات متخصصة', 'diarnafacha'); ?></span>
            <h1 class="h1"><?php esc_html_e('حلول الحجر والواجهات', 'diarnafacha'); ?><br><?php esc_html_e('لجميع أنواع المشاريع', 'diarnafacha'); ?></h1>
            <p class="lead"><?php esc_html_e('نقدم خدمات متكاملة لتنفيذ وتركيب وتشطيب الواجهات الحجرية للمشاريع السكنية والتجارية في الرياض، مع الالتزام بأدق المخططات والمعايير الهندسية.', 'diarnafacha'); ?></p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="grid-3">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/sections/card-service'); ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <!-- Default Services Grid -->
                    <article class="card" data-reveal>
                        <div class="card__media"><img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=800&q=70" alt="تنفيذ الواجهات الحجرية" loading="lazy" decoding="async" width="800" height="550"></div>
                        <div class="card__body">
                            <div class="card__icon" aria-hidden="true"><?php echo diarnafacha_icon('facade'); ?></div>
                            <h3><?php esc_html_e('تنفيذ الواجهات الحجرية', 'diarnafacha'); ?></h3>
                            <p><?php esc_html_e('تنفيذ متكامل للواجهات وفق المخططات والتصميم المعماري للمشروع.', 'diarnafacha'); ?></p>
                        </div>
                    </article>
                    <article class="card" data-reveal>
                        <div class="card__media"><img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=800&q=70" alt="واجهات الفلل الحجرية" loading="lazy" decoding="async" width="800" height="550"></div>
                        <div class="card__body">
                            <div class="card__icon" aria-hidden="true"><?php echo diarnafacha_icon('villa'); ?></div>
                            <h3><?php esc_html_e('واجهات الفلل', 'diarnafacha'); ?></h3>
                            <p><?php esc_html_e('تنفيذ واجهات حجرية للفلل والمنازل الخاصة بتفاصيل معمارية راقية.', 'diarnafacha'); ?></p>
                        </div>
                    </article>
                    <article class="card" data-reveal>
                        <div class="card__media"><img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=800&q=70" alt="الواجهات التجارية" loading="lazy" decoding="async" width="800" height="550"></div>
                        <div class="card__body">
                            <div class="card__icon" aria-hidden="true"><?php echo diarnafacha_icon('commercial'); ?></div>
                            <h3><?php esc_html_e('الواجهات التجارية', 'diarnafacha'); ?></h3>
                            <p><?php esc_html_e('واجهات حجرية للمباني الإدارية والمعارض والمراكز التجارية.', 'diarnafacha'); ?></p>
                        </div>
                    </article>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/final-cta'); ?>

</main>

<?php
get_footer();
