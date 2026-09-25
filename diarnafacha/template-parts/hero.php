<?php
/**
 * Template part: Hero Section
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$bg_img     = diarnafacha_opt('diarna_hero_bg', 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2000&q=75');
$eyebrow    = diarnafacha_opt('diarna_hero_eyebrow', 'الرياض · المملكة العربية السعودية');
$title      = diarnafacha_opt('diarna_hero_title', 'مقاولات <em>الحجر والواجهات</em><br>باحترافية');
$sub        = diarnafacha_opt('diarna_hero_sub', 'ننفذ الواجهات الحجرية والتشطيبات المعمارية للمشاريع السكنية والتجارية، وفق تصميم المشروع ومتطلباته — من دراسة المخططات حتى التسليم.');
$cta_text   = diarnafacha_opt('diarna_hero_cta_text', 'اطلب عرض سعر');
$cta_url    = diarnafacha_opt('diarna_hero_cta_url');
if (empty($cta_url)) {
    $quote_page = get_page_by_path('quote');
    $cta_url = $quote_page ? get_permalink($quote_page) : home_url('/quote/');
}
$whatsapp   = diarnafacha_opt('diarna_whatsapp', '966536089153');
$wa_url     = diarnafacha_whatsapp_url('', $whatsapp);
?>

<section class="hero">
    <div class="hero__bg">
        <img src="<?php echo esc_url($bg_img); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> - مقاولات الحجر والواجهات" fetchpriority="high" decoding="async" width="2000" height="1300">
    </div>
    <div class="container hero__inner">
        <span class="hero__eyebrow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3 7h7l-5.5 4.5L18 21l-6-4-6 4 1.5-7.5L2 9h7z"/></svg>
            <?php echo esc_html($eyebrow); ?>
        </span>
        <h1><?php echo wp_kses_post($title); ?></h1>
        <p class="hero__sub"><?php echo esc_html($sub); ?></p>
        <div class="hero__cta">
            <a href="<?php echo esc_url($cta_url); ?>" class="btn btn--primary btn--lg">
                <?php echo esc_html($cta_text); ?>
                <?php echo diarnafacha_icon('arrow-left'); ?>
            </a>
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn--ghost btn--lg">
                <?php esc_html_e('تواصل عبر واتساب', 'diarnafacha'); ?>
            </a>
        </div>
        <div class="hero__meta">
            <span>
                <?php echo diarnafacha_icon('pin'); ?>
                <?php esc_html_e('الرياض والمملكة العربية السعودية', 'diarnafacha'); ?>
            </span>
            <span>
                <?php echo diarnafacha_icon('check'); ?>
                <?php esc_html_e('تنفيذ وفق تصميم المشروع', 'diarnafacha'); ?>
            </span>
        </div>
    </div>
    <a href="#about" class="hero__scroll" aria-label="<?php esc_attr_e('انتقل للأسفل', 'diarnafacha'); ?>">
        <span aria-hidden="true"></span><?php esc_html_e('اكتشف', 'diarnafacha'); ?>
    </a>
</section>
