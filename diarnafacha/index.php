<?php
/**
 * The main template file / Blog Posts Index
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$page_for_posts_id = get_option('page_for_posts');
$blog_title = $page_for_posts_id ? get_the_title($page_for_posts_id) : esc_html__('مقالات ومدونة الواجهات المعمارية', 'diarnafacha');
$categories = get_categories(array('hide_empty' => false));
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container page-hero__inner" data-reveal>
            <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
            <span class="eyebrow"><?php esc_html_e('المعرفة والمدونة', 'diarnafacha'); ?></span>
            <h1 class="h1"><?php echo esc_html($blog_title); ?></h1>
            <p class="lead"><?php esc_html_e('مقالات متخصصة، دراسات مقارنة، وأحدث النصائح في تنفيذ وتشطيب واجهات الحجر الطبيعي والمودرن وفق كود البناء السعودي.', 'diarnafacha'); ?></p>
        </div>
    </section>

    <section class="section">
        <div class="container">

            <?php if (!empty($categories) && !is_wp_error($categories)) : ?>
                <div class="filters" role="tablist" aria-label="<?php esc_attr_e('تصنيفات المقالات', 'diarnafacha'); ?>" data-reveal style="margin-bottom:36px;">
                    <a href="<?php echo esc_url($page_for_posts_id ? get_permalink($page_for_posts_id) : home_url('/blog/')); ?>" class="filter active">
                        <?php esc_html_e('كافة المقالات', 'diarnafacha'); ?>
                    </a>
                    <?php foreach ($categories as $cat) : ?>
                        <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="filter">
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

                <div style="margin-top:48px;text-align:center;">
                    <?php get_template_part('template-parts/sections/pagination'); ?>
                </div>
            <?php else : ?>
                <div style="text-align:center;padding:60px 20px;background:#fff;border-radius:var(--radius);max-width:700px;margin:0 auto;box-shadow:var(--shadow-sm);">
                    <h2><?php esc_html_e('لا توجد مقالات منشورة بعد.', 'diarnafacha'); ?></h2>
                    <p style="color:#6E6859;margin:12px 0 24px;"><?php esc_html_e('يمكنك إضافة مقالات جديدة من لوحة التحكم (مقالات > أضف مقالاً جديداً) أو توليد المحتوى التجريبي من لوحة القالب.', 'diarnafacha'); ?></p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary"><?php esc_html_e('العودة للرئيسية', 'diarnafacha'); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part('template-parts/final-cta'); ?>

</main>

<?php
get_footer();
