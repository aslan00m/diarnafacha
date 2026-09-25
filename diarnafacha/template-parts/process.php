<?php
/**
 * Template part: Execution Process Preview
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$process_page = get_page_by_path('process');
$process_url  = $process_page ? get_permalink($process_page) : home_url('/process/');
?>

<section class="section">
    <div class="container">
        <div class="section-head center" data-reveal>
            <span class="eyebrow"><?php esc_html_e('آلية العمل', 'diarnafacha'); ?></span>
            <h2 class="h2"><?php esc_html_e('من الفكرة إلى الواجهة النهائية', 'diarnafacha'); ?></h2>
            <p class="lead"><?php esc_html_e('مراحل واضحة نمر بها معك خطوة بخطوة لضمان نتيجة تتناسب مع مشروعك.', 'diarnafacha'); ?></p>
        </div>
        <div class="timeline">
            <div class="step" data-reveal>
                <div class="step__num">01</div>
                <h3><?php esc_html_e('التواصل معنا', 'diarnafacha'); ?></h3>
                <p><?php esc_html_e('ابدأ المحادثة عبر واتساب أو الاتصال.', 'diarnafacha'); ?></p>
            </div>
            <div class="step" data-reveal>
                <div class="step__num">02</div>
                <h3><?php esc_html_e('إرسال تفاصيل المشروع', 'diarnafacha'); ?></h3>
                <p><?php esc_html_e('شارك الصور والمخططات ومعلومات الموقع.', 'diarnafacha'); ?></p>
            </div>
            <div class="step" data-reveal>
                <div class="step__num">03</div>
                <h3><?php esc_html_e('دراسة المخططات', 'diarnafacha'); ?></h3>
                <p><?php esc_html_e('مراجعة التصميم وفهم متطلبات الواجهة.', 'diarnafacha'); ?></p>
            </div>
            <div class="step" data-reveal>
                <div class="step__num">04</div>
                <h3><?php esc_html_e('عرض السعر والتنفيذ', 'diarnafacha'); ?></h3>
                <p><?php esc_html_e('عرض واضح، ثم التنفيذ والمتابعة والتسليم.', 'diarnafacha'); ?></p>
            </div>
        </div>
        <div style="text-align:center;margin-top:44px" data-reveal>
            <a href="<?php echo esc_url($process_url); ?>" class="btn btn--outline"><?php esc_html_e('تفاصيل المراحل', 'diarnafacha'); ?></a>
        </div>
    </div>
</section>
