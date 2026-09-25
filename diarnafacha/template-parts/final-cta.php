<?php
/**
 * Template part: Final Bottom Call to Action
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$quote_page = get_page_by_path('quote');
$quote_url  = $quote_page ? get_permalink($quote_page) : home_url('/quote/');
$phone      = diarnafacha_opt('diarna_phone', '0536089153');
$whatsapp   = diarnafacha_opt('diarna_whatsapp', '966536089153');
$wa_url     = diarnafacha_whatsapp_url('', $whatsapp);
$phone_clean = diarnafacha_clean_phone($phone);
?>

<section class="final">
    <div class="container">
        <div class="final__inner" data-reveal>
            <span class="eyebrow" style="justify-content:center"><?php esc_html_e('ابدأ الآن', 'diarnafacha'); ?></span>
            <h2><?php echo wp_kses_post(__('واجهتك تبدأ من <em>قرار صحيح</em>', 'diarnafacha')); ?></h2>
            <p><?php esc_html_e('شاركنا تفاصيل مشروعك ودعنا نناقش متطلبات الواجهة والحجر المناسبة له.', 'diarnafacha'); ?></p>
            <div class="final__actions">
                <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary btn--lg"><?php esc_html_e('اطلب عرض سعر', 'diarnafacha'); ?></a>
                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn--ghost btn--lg"><?php esc_html_e('واتساب', 'diarnafacha'); ?></a>
                <a href="tel:<?php echo esc_attr($phone_clean); ?>" class="btn btn--ghost btn--lg"><?php esc_html_e('اتصل الآن', 'diarnafacha'); ?></a>
            </div>
        </div>
    </div>
</section>
