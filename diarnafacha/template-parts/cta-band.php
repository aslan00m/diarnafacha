<?php
/**
 * Template part: CTA Band Section
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$quote_page = get_page_by_path('quote');
$quote_url  = $quote_page ? get_permalink($quote_page) : home_url('/quote/');
$whatsapp   = diarnafacha_opt('diarna_whatsapp', '966536089153');
$wa_url     = diarnafacha_whatsapp_url('', $whatsapp);
?>

<section class="section" style="padding-block:0">
    <div class="container">
        <div class="cta-band" data-reveal>
            <div>
                <span class="eyebrow"><?php esc_html_e('الخطوة التالية', 'diarnafacha'); ?></span>
                <h2 class="h2"><?php esc_html_e('لديك مشروع واجهة؟', 'diarnafacha'); ?></h2>
                <p class="lead"><?php esc_html_e('أرسل لنا تفاصيل المشروع، وسنتواصل معك لمعرفة المتطلبات ومناقشة الحل المناسب.', 'diarnafacha'); ?></p>
            </div>
            <div class="cta-band__actions">
                <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary btn--lg"><?php esc_html_e('اطلب عرض سعر', 'diarnafacha'); ?></a>
                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn--ghost btn--lg"><?php esc_html_e('واتساب', 'diarnafacha'); ?></a>
            </div>
        </div>
    </div>
</section>
