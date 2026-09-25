<?php
/**
 * The template for displaying archive pages
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
            <span class="eyebrow"><?php esc_html_e('الأرشيف', 'diarnafacha'); ?></span>
            <h1 class="h1"><?php the_archive_title(); ?></h1>
            <?php if (get_the_archive_description()) : ?>
                <p class="lead"><?php the_archive_description(); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <?php
            $categories = get_categories(array('hide_empty' => false));
            $current_cat_id = is_category() ? get_queried_object_id() : 0;
            $page_for_posts_id = get_option('page_for_posts');
            $blog_url = $page_for_posts_id ? get_permalink($page_for_posts_id) : home_url('/blog/');

            if (!empty($categories) && !is_wp_error($categories) && (is_category() || is_tag() || is_date() || is_author())) : ?>
                <div class="filters" role="tablist" aria-label="<?php esc_attr_e('تصنيفات المقالات', 'diarnafacha'); ?>" data-reveal style="margin-bottom:36px;">
                    <a href="<?php echo esc_url($blog_url); ?>" class="filter <?php echo !$current_cat_id ? 'active' : ''; ?>">
                        <?php esc_html_e('كافة المقالات', 'diarnafacha'); ?>
                    </a>
                    <?php foreach ($categories as $cat) : ?>
                        <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="filter <?php echo ($current_cat_id === $cat->term_id) ? 'active' : ''; ?>">
                            <?php echo esc_html($cat->name); ?> (<?php echo esc_html($cat->count); ?>)
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (have_posts()) : ?>
                <div class="grid-3">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/sections/card-post'); ?>
                    <?php endwhile; ?>
                </div>

                <div style="margin-top:40px;text-align:center;">
                    <?php get_template_part('template-parts/sections/pagination'); ?>
                </div>
            <?php else : ?>
                <div style="text-align:center;padding:60px 20px;">
                    <h2><?php esc_html_e('لا توجد عناصر لعرضها في هذا القسم.', 'diarnafacha'); ?></h2>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary" style="margin-top:20px;"><?php esc_html_e('العودة للرئيسية', 'diarnafacha'); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part('template-parts/final-cta'); ?>

</main>

<?php
get_footer();
