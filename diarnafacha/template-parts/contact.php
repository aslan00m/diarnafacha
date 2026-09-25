<?php
/**
 * Template part: Contact Section
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$phone     = diarnafacha_opt('diarna_phone', '0536089153');
$whatsapp  = diarnafacha_opt('diarna_whatsapp', '966536089153');
$email     = diarnafacha_opt('diarna_email', 'Re@tajeermodat.com');
$address   = diarnafacha_opt('diarna_address', 'الرياض، المملكة العربية السعودية');
$wa_url    = diarnafacha_whatsapp_url('', $whatsapp);
$phone_clean = diarnafacha_clean_phone($phone);
?>

<div class="contact-grid">
    <div class="contact-card" data-reveal>
        <div class="contact-card__icon"><?php echo diarnafacha_icon('phone'); ?></div>
        <h3><?php esc_html_e('الاتصال الهاتفي', 'diarnafacha'); ?></h3>
        <p><?php esc_html_e('تواصل معنا مباشرة عبر الهاتف لأي استفسار أو حجز موعد.', 'diarnafacha'); ?></p>
        <a href="tel:<?php echo esc_attr($phone_clean); ?>" class="contact-card__link" dir="ltr"><?php echo esc_html($phone); ?></a>
    </div>

    <div class="contact-card" data-reveal>
        <div class="contact-card__icon"><?php echo diarnafacha_icon('whatsapp'); ?></div>
        <h3><?php esc_html_e('واتساب المباشر', 'diarnafacha'); ?></h3>
        <p><?php esc_html_e('أرسل مخططات مشروعك وصور الموقع لنرد عليك بعرض سعر سريع.', 'diarnafacha'); ?></p>
        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="contact-card__link" dir="ltr"><?php echo esc_html($phone); ?></a>
    </div>

    <div class="contact-card" data-reveal>
        <div class="contact-card__icon"><?php echo diarnafacha_icon('mail'); ?></div>
        <h3><?php esc_html_e('البريد الإلكتروني', 'diarnafacha'); ?></h3>
        <p><?php esc_html_e('لمناقصات المشاريع وعروض الأسعار الرسمية والشركات.', 'diarnafacha'); ?></p>
        <a href="mailto:<?php echo esc_attr($email); ?>" class="contact-card__link" dir="ltr"><?php echo esc_html($email); ?></a>
    </div>

    <div class="contact-card" data-reveal>
        <div class="contact-card__icon"><?php echo diarnafacha_icon('pin'); ?></div>
        <h3><?php esc_html_e('المقر الرئيسي', 'diarnafacha'); ?></h3>
        <p><?php esc_html_e('خدماتنا تغطي كامل مدينة الرياض والمناطق المجاورة.', 'diarnafacha'); ?></p>
        <span class="contact-card__link"><?php echo esc_html($address); ?></span>
    </div>
</div>
