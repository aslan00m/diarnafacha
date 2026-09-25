<?php
/**
 * Template part: Projects / Gallery Preview
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$gallery_page = get_page_by_path('gallery');
$gallery_url  = $gallery_page ? get_permalink($gallery_page) : home_url('/gallery/');

$projects_query = new WP_Query(array(
    'post_type'      => 'project',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
));
?>

<section class="section section--tint">
    <div class="container">
        <div class="section-head center" data-reveal>
            <span class="eyebrow"><?php esc_html_e('أعمالنا', 'diarnafacha'); ?></span>
            <h2 class="h2"><?php esc_html_e('واجهات تعكس شخصية المبنى', 'diarnafacha'); ?></h2>
            <p class="lead"><?php esc_html_e('نماذج مختارة توضح أساليب مختلفة في تنفيذ الواجهات الحجرية.', 'diarnafacha'); ?></p>
        </div>

        <div class="gallery" data-reveal>
            <?php if ($projects_query->have_posts()) : ?>
                <?php while ($projects_query->have_posts()) : $projects_query->the_post();
                    $layout = get_post_meta(get_the_ID(), '_project_grid_layout', true);
                    $class = 'gitem';
                    if ($layout === 'wide') $class .= ' gitem--wide';
                    if ($layout === 'tall') $class .= ' gitem--tall';
                    $thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=70';
                ?>
                    <figure class="<?php echo esc_attr($class); ?>">
                        <a href="<?php the_permalink(); ?>" style="display:block;width:100%;height:100%;">
                            <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                        </a>
                    </figure>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Default Portfolio Showcase -->
                <figure class="gitem gitem--wide">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=70" alt="واجهة فيلا حجرية حديثة" loading="lazy" decoding="async" width="1200" height="620">
                </figure>
                <figure class="gitem">
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=700&q=70" alt="واجهة فيلا حجرية" loading="lazy" decoding="async" width="700" height="700">
                </figure>
                <figure class="gitem gitem--tall">
                    <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=700&q=70" alt="واجهة عمارة سكنية" loading="lazy" decoding="async" width="700" height="1400">
                </figure>
                <figure class="gitem">
                    <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=700&q=70" alt="واجهة مشروع تجاري" loading="lazy" decoding="async" width="700" height="700">
                </figure>
            <?php endif; ?>
        </div>

        <div style="text-align:center;margin-top:40px" data-reveal>
            <a href="<?php echo esc_url($gallery_url); ?>" class="btn btn--outline"><?php esc_html_e('زيارة المعرض', 'diarnafacha'); ?></a>
        </div>
    </div>
</section>
