<?php
/**
 * Breadcrumbs Component
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="breadcrumbs">
    <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('الرئيسية', 'diarnafacha'); ?></a>
    <span>/</span>
    <?php if (is_page()) : ?>
        <span><?php the_title(); ?></span>
    <?php elseif (is_singular('project')) : ?>
        <a href="<?php echo esc_url(home_url('/gallery/')); ?>"><?php esc_html_e('معرض الأعمال', 'diarnafacha'); ?></a>
        <span>/</span>
        <span><?php the_title(); ?></span>
    <?php elseif (is_singular('service')) : ?>
        <a href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('الخدمات', 'diarnafacha'); ?></a>
        <span>/</span>
        <span><?php the_title(); ?></span>
    <?php elseif (is_archive()) : ?>
        <span><?php the_archive_title(); ?></span>
    <?php elseif (is_search()) : ?>
        <span><?php printf(esc_html__('نتائج البحث: %s', 'diarnafacha'), get_search_query()); ?></span>
    <?php elseif (is_404()) : ?>
        <span><?php esc_html_e('الصفحة غير موجودة', 'diarnafacha'); ?></span>
    <?php else : ?>
        <span><?php wp_title(''); ?></span>
    <?php endif; ?>
</div>
