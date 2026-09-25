<?php
/**
 * Template part: Why Choose Us Section
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$about_page = get_page_by_path('about');
$about_url  = $about_page ? get_permalink($about_page) : home_url('/about/');
?>

<section class="section section--dark">
    <div class="container">
        <div class="section-head center" data-reveal>
            <span class="eyebrow"><?php esc_html_e('الفروقات', 'diarnafacha'); ?></span>
            <h2 class="h2" style="color:#fff"><?php esc_html_e('لماذا ديارنا الحديثة؟', 'diarnafacha'); ?></h2>
            <p class="lead"><?php esc_html_e('نتعامل مع كل مشروع كحالة مستقلة، بمعايير واضحة من الفكرة حتى التسليم.', 'diarnafacha'); ?></p>
        </div>
        <div class="why__grid">
            <div class="why__item" data-reveal>
                <div class="why__num">01</div>
                <h3><?php esc_html_e('تنفيذ حسب التصميم', 'diarnafacha'); ?></h3>
                <p><?php esc_html_e('نراعي تفاصيل التصميم ومتطلبات المشروع خلال مراحل التنفيذ.', 'diarnafacha'); ?></p>
            </div>
            <div class="why__item" data-reveal>
                <div class="why__num">02</div>
                <h3><?php esc_html_e('اهتمام بالتفاصيل', 'diarnafacha'); ?></h3>
                <p><?php esc_html_e('الواجهة تعتمد على جودة التفاصيل بقدر اعتمادها على نوع الحجر.', 'diarnafacha'); ?></p>
            </div>
            <div class="why__item" data-reveal>
                <div class="why__num">03</div>
                <h3><?php esc_html_e('حلول حسب المشروع', 'diarnafacha'); ?></h3>
                <p><?php esc_html_e('لا نفرض خياراً واحداً على جميع المشاريع.', 'diarnafacha'); ?></p>
            </div>
            <div class="why__item" data-reveal>
                <div class="why__num">04</div>
                <h3><?php esc_html_e('تنظيم مراحل التنفيذ', 'diarnafacha'); ?></h3>
                <p><?php esc_html_e('من دراسة المتطلبات حتى التنفيذ والتسليم.', 'diarnafacha'); ?></p>
            </div>
            <div class="why__item" data-reveal>
                <div class="why__num">05</div>
                <h3><?php esc_html_e('تواصل مباشر', 'diarnafacha'); ?></h3>
                <p><?php esc_html_e('سهولة إرسال تفاصيل المشروع والاستفسار عبر واتساب.', 'diarnafacha'); ?></p>
            </div>
            <div class="why__item" data-reveal>
                <div class="why__num">06</div>
                <h3><?php esc_html_e('وضوح في عرض السعر', 'diarnafacha'); ?></h3>
                <p><?php esc_html_e('توضيح نطاق العمل والمتطلبات قبل التنفيذ.', 'diarnafacha'); ?></p>
            </div>
        </div>
        <div style="text-align:center;margin-top:44px" data-reveal>
            <a href="<?php echo esc_url($about_url); ?>" class="btn btn--ghost"><?php esc_html_e('المزيد عن الشركة', 'diarnafacha'); ?></a>
        </div>
    </div>
</section>
