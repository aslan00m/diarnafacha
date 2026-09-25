<?php
/**
 * Template part: About Us Section
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$about_page = get_page_by_path('about');
$about_url  = $about_page ? get_permalink($about_page) : home_url('/about/');
$services_page = get_page_by_path('services');
$services_url  = $services_page ? get_permalink($services_page) : home_url('/services/');
?>

<section class="section" id="about">
    <div class="container">
        <div class="about__grid">
            <div data-reveal>
                <span class="eyebrow"><?php esc_html_e('عن الخدمة', 'diarnafacha'); ?></span>
                <h2 class="h2"><?php esc_html_e('حلول متكاملة', 'diarnafacha'); ?><br><?php esc_html_e('للحجر والواجهات', 'diarnafacha'); ?></h2>
                <p class="lead"><?php esc_html_e('نعمل في تنفيذ وتركيب وتشطيب الواجهات الحجرية للمشاريع السكنية والتجارية. نبدأ بفهم التصميم المعماري ومتطلبات الموقع، ثم نقترح نوع الحجر والتشطيب الأنسب.', 'diarnafacha'); ?></p>
                <ul class="about__list">
                    <li>
                        <?php echo diarnafacha_icon('check'); ?>
                        <span><?php esc_html_e('تنفيذ يلتزم بتفاصيل المخطط والتصميم المعماري.', 'diarnafacha'); ?></span>
                    </li>
                    <li>
                        <?php echo diarnafacha_icon('check'); ?>
                        <span><?php esc_html_e('اختيار الحجر والتشطيب بناءً على مواصفات المشروع.', 'diarnafacha'); ?></span>
                    </li>
                    <li>
                        <?php echo diarnafacha_icon('check'); ?>
                        <span><?php esc_html_e('تواصل مباشر لمتابعة الطلب وتفاصيل التنفيذ.', 'diarnafacha'); ?></span>
                    </li>
                </ul>
                <div style="margin-top:32px;display:flex;gap:12px;flex-wrap:wrap">
                    <a href="<?php echo esc_url($about_url); ?>" class="btn btn--outline"><?php esc_html_e('تعرّف علينا', 'diarnafacha'); ?></a>
                    <a href="<?php echo esc_url($services_url); ?>" class="btn btn--outline"><?php esc_html_e('خدماتنا', 'diarnafacha'); ?></a>
                </div>
            </div>
            <div class="about__media" data-reveal>
                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=75" alt="<?php esc_attr_e('تفاصيل تنفيذ واجهة حجرية لمشروع معماري', 'diarnafacha'); ?>" loading="lazy" decoding="async" width="1200" height="1500">
                <div class="about__badge">
                    <?php echo diarnafacha_icon('building'); ?>
                    <div>
                        <strong><?php esc_html_e('تركيز على الواجهات', 'diarnafacha'); ?></strong>
                        <span><?php esc_html_e('حجر · تشطيب · تنفيذ', 'diarnafacha'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
