<?php
/**
 * Template Name: معرض الأعمال (Gallery Page)
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$terms = get_terms(array(
    'taxonomy'   => 'project_category',
    'hide_empty' => false,
));

$projects_query = new WP_Query(array(
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
));
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container page-hero__inner" data-reveal>
            <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
            <span class="eyebrow"><?php esc_html_e('أعمالنا المنفذة', 'diarnafacha'); ?></span>
            <h1 class="h1"><?php esc_html_e('معرض مشاريع الحجر والواجهات', 'diarnafacha'); ?></h1>
            <p class="lead"><?php esc_html_e('نماذج مختارة من أعمال تنفيذ الواجهات الحجرية للفلل والعمائر السكنية والمشاريع التجارية، بأنماط وتطبيقات مختلفة تعكس دقة التنفيذ.', 'diarnafacha'); ?></p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <!-- Filter Tabs -->
            <div class="filters" role="tablist" aria-label="<?php esc_attr_e('تصنيفات المعرض', 'diarnafacha'); ?>" data-reveal>
                <button class="filter active" data-filter="all" role="tab" aria-selected="true"><?php esc_html_e('الكل', 'diarnafacha'); ?></button>
                <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
                    <?php foreach ($terms as $term) : ?>
                        <button class="filter" data-filter="<?php echo esc_attr($term->slug); ?>" role="tab" aria-selected="false"><?php echo esc_html($term->name); ?></button>
                    <?php endforeach; ?>
                <?php else : ?>
                    <button class="filter" data-filter="villas" role="tab" aria-selected="false"><?php esc_html_e('واجهات الفلل', 'diarnafacha'); ?></button>
                    <button class="filter" data-filter="buildings" role="tab" aria-selected="false"><?php esc_html_e('العمائر السكنية', 'diarnafacha'); ?></button>
                    <button class="filter" data-filter="commercial" role="tab" aria-selected="false"><?php esc_html_e('المشاريع التجارية', 'diarnafacha'); ?></button>
                    <button class="filter" data-filter="renovation" role="tab" aria-selected="false"><?php esc_html_e('تجديد الواجهات', 'diarnafacha'); ?></button>
                <?php endif; ?>
            </div>

            <!-- Gallery Grid -->
            <div class="gallery" id="gallery-grid" data-reveal>
                <?php if ($projects_query->have_posts()) : ?>
                    <?php while ($projects_query->have_posts()) : $projects_query->the_post(); ?>
                        <?php get_template_part('template-parts/sections/card-project'); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                    <!-- Default Initial Gallery Items -->
                    <figure class="gitem gitem--wide" data-cat="villas">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=70" alt="واجهة فيلا حجرية حديثة" loading="lazy" decoding="async" width="1200" height="620">
                    </figure>
                    <figure class="gitem" data-cat="villas">
                        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=700&q=70" alt="واجهة فيلا حجرية" loading="lazy" decoding="async" width="700" height="700">
                    </figure>
                    <figure class="gitem gitem--tall" data-cat="buildings">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=700&q=70" alt="واجهة عمارة سكنية" loading="lazy" decoding="async" width="700" height="1400">
                    </figure>
                    <figure class="gitem" data-cat="commercial">
                        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=700&q=70" alt="واجهة مشروع تجاري" loading="lazy" decoding="async" width="700" height="700">
                    </figure>
                    <figure class="gitem" data-cat="renovation">
                        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=700&q=70" alt="تجديد واجهة حجرية" loading="lazy" decoding="async" width="700" height="700">
                    </figure>
                    <figure class="gitem gitem--wide" data-cat="villas">
                        <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1200&q=70" alt="واجهة فيلا مودرن" loading="lazy" decoding="async" width="1200" height="620">
                    </figure>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/final-cta'); ?>

</main>

<?php
get_footer();
