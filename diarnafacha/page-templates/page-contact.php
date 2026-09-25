<?php
/**
 * Template Name: اتصل بنا (Contact Page)
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone     = diarnafacha_opt('diarna_phone', '0536089153');
$whatsapp  = diarnafacha_opt('diarna_whatsapp', '966536089153');
$email     = diarnafacha_opt('diarna_email', 'Re@tajeermodat.com');
$address   = diarnafacha_opt('diarna_address', 'الرياض، المملكة العربية السعودية');
$wa_url    = diarnafacha_whatsapp_url('', $whatsapp);
$phone_clean = diarnafacha_clean_phone($phone);
$quote_page = get_page_by_path('quote');
$quote_url  = $quote_page ? get_permalink($quote_page) : home_url('/quote/');
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container page-hero__inner" data-reveal>
            <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
            <span class="eyebrow"><?php esc_html_e('قنوات التواصل', 'diarnafacha'); ?></span>
            <h1 class="h1"><?php esc_html_e('يسعدنا تواصلكم ومناقشة مشروعكم', 'diarnafacha'); ?></h1>
            <p class="lead"><?php esc_html_e('فريقنا الهندسي جاهز لاستقبال استفساراتكم حول الواجهات الحجرية والترتيب لمعاينة ميدانية في مدينة الرياض.', 'diarnafacha'); ?></p>
        </div>
    </section>

    <section class="section">
        <div class="container">

            <!-- Contact Cards Grid -->
            <div class="contact-cards" data-reveal>

                <div class="contact-card">
                    <div class="contact-card__icon">
                        <?php echo diarnafacha_icon('whatsapp'); ?>
                    </div>
                    <h3><?php esc_html_e('المحادثة الفورية عبر واتساب', 'diarnafacha'); ?></h3>
                    <p><?php esc_html_e('القناة الأسرع لإرسال المخططات والصور وتحديد موعد المعاينة الميدانية.', 'diarnafacha'); ?></p>
                    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="val" dir="ltr"><?php echo esc_html($phone); ?></a>
                    <span style="font-size:13px;color:var(--c-accent);font-weight:600"><?php esc_html_e('متواجدون للرد السريع', 'diarnafacha'); ?></span>
                </div>

                <div class="contact-card">
                    <div class="contact-card__icon">
                        <?php echo diarnafacha_icon('phone'); ?>
                    </div>
                    <h3><?php esc_html_e('الاتصال المباشر', 'diarnafacha'); ?></h3>
                    <p><?php esc_html_e('تحدث مباشرة مع مسؤول مشاريع الحجر لمناقشة المتطلبات والمواعيد.', 'diarnafacha'); ?></p>
                    <a href="tel:<?php echo esc_attr($phone_clean); ?>" class="val" dir="ltr"><?php echo esc_html($phone); ?></a>
                    <span style="font-size:13px;color:var(--c-muted)"><?php esc_html_e('السبت – الخميس: 8:00 ص – 8:00 م', 'diarnafacha'); ?></span>
                </div>

                <div class="contact-card">
                    <div class="contact-card__icon">
                        <?php echo diarnafacha_icon('mail'); ?>
                    </div>
                    <h3><?php esc_html_e('البريد الإلكتروني الرسمي', 'diarnafacha'); ?></h3>
                    <p><?php esc_html_e('للمناقصات وجداول الكميات والمراسلات الرسمية للمشاريع الكبيرة والشركات.', 'diarnafacha'); ?></p>
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="val" dir="ltr"><?php echo esc_html($email); ?></a>
                    <span style="font-size:13px;color:var(--c-muted)"><?php esc_html_e('يتم الرد خلال 24 ساعة', 'diarnafacha'); ?></span>
                </div>

                <div class="contact-card">
                    <div class="contact-card__icon">
                        <?php echo diarnafacha_icon('pin'); ?>
                    </div>
                    <h3><?php esc_html_e('الموقع ومناطق الخدمة', 'diarnafacha'); ?></h3>
                    <p><?php esc_html_e('الرياض، المملكة العربية السعودية. نغطي كافة أحياء الرياض والمناطق المجاورة للمشاريع السكنية والتجارية.', 'diarnafacha'); ?></p>
                    <span class="val" style="font-size:16px"><?php echo esc_html($address); ?></span>
                    <span style="font-size:13px;color:var(--c-muted)"><?php esc_html_e('خدمة ميدانية لكافة أحياء الرياض', 'diarnafacha'); ?></span>
                </div>

            </div>

            <!-- Quick CTA banner -->
            <div style="margin-top:64px" data-reveal>
                <div class="cta-band">
                    <div>
                        <span class="eyebrow"><?php esc_html_e('عرض سعر فوري', 'diarnafacha'); ?></span>
                        <h2 class="h2"><?php esc_html_e('ترغب في تعبئة تفاصيل مشروعك مباشرة؟', 'diarnafacha'); ?></h2>
                        <p class="lead"><?php esc_html_e('انتقل إلى صفحة طلب عرض السعر وحدد نوع المشروع والمساحة للحصول على تقرير مفصل.', 'diarnafacha'); ?></p>
                    </div>
                    <div class="cta-band__actions">
                        <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary btn--lg"><?php esc_html_e('الانتقال لنموذج التسعير', 'diarnafacha'); ?></a>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn--ghost btn--lg"><?php esc_html_e('محادثة واتساب', 'diarnafacha'); ?></a>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>

<?php
get_footer();
