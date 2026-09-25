<?php
/**
 * Template part: Services Section
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$services_page = get_page_by_path('services');
$services_url  = $services_page ? get_permalink($services_page) : home_url('/services/');

// Query CPT Services
$services_query = new WP_Query(array(
    'post_type'      => 'service',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
));
?>

<section class="section section--tint" id="services">
    <div class="container">
        <div class="section-head center" data-reveal>
            <span class="eyebrow"><?php esc_html_e('الخدمات', 'diarnafacha'); ?></span>
            <h2 class="h2"><?php esc_html_e('خدمات الحجر والواجهات', 'diarnafacha'); ?></h2>
            <p class="lead"><?php esc_html_e('خدمات متخصصة تغطي تنفيذ الواجهات الحجرية وتشطيبها للمشاريع السكنية والتجارية، مع مراعاة طبيعة كل مشروع.', 'diarnafacha'); ?></p>
        </div>

        <div class="grid-3">
            <?php if ($services_query->have_posts()) : ?>
                <?php while ($services_query->have_posts()) : $services_query->the_post();
                    $icon_type = get_post_meta(get_the_ID(), '_service_icon', true);
                    if (!$icon_type) $icon_type = 'facade';
                    $sub = get_post_meta(get_the_ID(), '_service_subtitle', true);
                    if (!$sub) $sub = get_the_excerpt();
                    $thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'diarna-project-card') : 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=800&q=70';
                ?>
                    <article class="card" data-reveal>
                        <div class="card__media">
                            <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async" width="800" height="550">
                        </div>
                        <div class="card__body">
                            <div class="card__icon" aria-hidden="true">
                                <?php echo diarnafacha_icon($icon_type); ?>
                            </div>
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo esc_html($sub); ?></p>
                            <a href="<?php the_permalink(); ?>" class="card__link">
                                <?php esc_html_e('التفاصيل', 'diarnafacha'); ?>
                                <?php echo diarnafacha_icon('arrow-left'); ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Default Architectural Services Fallback -->
                <article class="card" data-reveal>
                    <div class="card__media"><img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=800&q=70" alt="تنفيذ الواجهات الحجرية وفق المخططات المعمارية" loading="lazy" decoding="async" width="800" height="550"></div>
                    <div class="card__body">
                        <div class="card__icon" aria-hidden="true"><?php echo diarnafacha_icon('facade'); ?></div>
                        <h3><?php esc_html_e('تنفيذ الواجهات الحجرية', 'diarnafacha'); ?></h3>
                        <p><?php esc_html_e('تنفيذ الواجهات وفق المخططات والتصميم المعماري للمشروع.', 'diarnafacha'); ?></p>
                        <a href="<?php echo esc_url($services_url); ?>" class="card__link"><?php esc_html_e('التفاصيل', 'diarnafacha'); ?> <?php echo diarnafacha_icon('arrow-left'); ?></a>
                    </div>
                </article>

                <article class="card" data-reveal>
                    <div class="card__media"><img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=800&q=70" alt="واجهات الفلل الحجرية" loading="lazy" decoding="async" width="800" height="550"></div>
                    <div class="card__body">
                        <div class="card__icon" aria-hidden="true"><?php echo diarnafacha_icon('villa'); ?></div>
                        <h3><?php esc_html_e('واجهات الفلل', 'diarnafacha'); ?></h3>
                        <p><?php esc_html_e('تنفيذ واجهات حجرية للفلل والمنازل الخاصة.', 'diarnafacha'); ?></p>
                        <a href="<?php echo esc_url($services_url); ?>" class="card__link"><?php esc_html_e('التفاصيل', 'diarnafacha'); ?> <?php echo diarnafacha_icon('arrow-left'); ?></a>
                    </div>
                </article>

                <article class="card" data-reveal>
                    <div class="card__media"><img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=800&q=70" alt="واجهات حجرية للمشاريع التجارية" loading="lazy" decoding="async" width="800" height="550"></div>
                    <div class="card__body">
                        <div class="card__icon" aria-hidden="true"><?php echo diarnafacha_icon('commercial'); ?></div>
                        <h3><?php esc_html_e('الواجهات التجارية', 'diarnafacha'); ?></h3>
                        <p><?php esc_html_e('تنفيذ واجهات للمشاريع والمنشآت التجارية.', 'diarnafacha'); ?></p>
                        <a href="<?php echo esc_url($services_url); ?>" class="card__link"><?php esc_html_e('التفاصيل', 'diarnafacha'); ?> <?php echo diarnafacha_icon('arrow-left'); ?></a>
                    </div>
                </article>
            <?php endif; ?>
        </div>

        <div style="text-align:center;margin-top:40px" data-reveal>
            <a href="<?php echo esc_url($services_url); ?>" class="btn btn--outline"><?php esc_html_e('جميع الخدمات', 'diarnafacha'); ?></a>
        </div>
    </div>
</section>
