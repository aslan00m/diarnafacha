<?php
/**
 * Template Name: مراحل العمل (Process Page)
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$quote_page = get_page_by_path('quote');
$quote_url  = $quote_page ? get_permalink($quote_page) : home_url('/quote/');
$whatsapp   = diarnafacha_opt('diarna_whatsapp', '966536089153');
$wa_url     = diarnafacha_whatsapp_url('', $whatsapp);
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container page-hero__inner" data-reveal>
            <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
            <span class="eyebrow"><?php esc_html_e('منهجية العمل', 'diarnafacha'); ?></span>
            <h1 class="h1"><?php esc_html_e('مراحل تنفيذ واضحة', 'diarnafacha'); ?><br><?php esc_html_e('من الفكرة حتى التسليم', 'diarnafacha'); ?></h1>
            <p class="lead"><?php esc_html_e('نتبع خطوات منظمة تضمن دقة التنفيذ ومطابقة المواصفات مع الالتزام بالوقت والميزانية المحددة.', 'diarnafacha'); ?></p>
        </div>
    </section>

    <!-- Timeline Detailed -->
    <section class="section">
        <div class="container">
            <div class="section-head" data-reveal>
                <span class="eyebrow"><?php esc_html_e('خطوات التنفيذ', 'diarnafacha'); ?></span>
                <h2 class="h2"><?php esc_html_e('كيف نعمل معك في مشروعك؟', 'diarnafacha'); ?></h2>
                <p class="lead"><?php esc_html_e('كل مشروع يبدأ بفهم الاحتياج وينتهي بواجهة متقنة تعكس قيمة المبنى وتصميمه.', 'diarnafacha'); ?></p>
            </div>

            <div class="process-v" data-reveal>
                <div class="process-v__item">
                    <div class="process-v__num">01</div>
                    <div>
                        <h3><?php esc_html_e('التواصل الأولي واستلام البيانات', 'diarnafacha'); ?></h3>
                        <p><?php esc_html_e('يبدأ العمل بالتواصل معنا عبر واتساب أو الاتصال أو تعبئة نموذج طلب السعر. نقوم باستلام المعلومات المبدئية مثل: موقع المشروع، نوع المبنى (فيلا، عمارة، مشروع تجاري)، والمساحة التقريبية للواجهات.', 'diarnafacha'); ?></p>
                    </div>
                </div>

                <div class="process-v__item">
                    <div class="process-v__num">02</div>
                    <div>
                        <h3><?php esc_html_e('مراجعة المخططات والمعاينة الميدانية', 'diarnafacha'); ?></h3>
                        <p><?php esc_html_e('يقوم فريقنا الهندسي بمراجعة المخططات المعمارية وتفاصيل 3D إن وجدت، أو زيارة الموقع للمعاينة وأخذ القياسات الفعلية وفحص حالة الجدران والجسور لتحديد أسلوب التركيب الأنسب (ميكانيكي أو تقليدي).', 'diarnafacha'); ?></p>
                    </div>
                </div>

                <div class="process-v__item">
                    <div class="process-v__num">03</div>
                    <div>
                        <h3><?php esc_html_e('تحديد نوع الحجر وعرض السعر المفصل', 'diarnafacha'); ?></h3>
                        <p><?php esc_html_e('نقترح نوع الحجر المناسب للمشروع (حجر الرياض، حجر حائل، أردني، ترافنتينو...) ونوع التشطيب (بوشارده، مجلي، طبزة، مسمسم). بعد ذلك نقدم عرض سعر شفاف يوضح نطاق العمل، الكميات التقديرية، والمدة الزمنية المتوقعة.', 'diarnafacha'); ?></p>
                    </div>
                </div>

                <div class="process-v__item">
                    <div class="process-v__num">04</div>
                    <div>
                        <h3><?php esc_html_e('اعتماد العقد وتجهيز الموقع', 'diarnafacha'); ?></h3>
                        <p><?php esc_html_e('بعد الموافقة يتم توقيع العقد الرسمي وتحديد الدفعات وجدول العمل. يبدأ فريقنا في تجهيز السقالات، مراجعة نقاط التثبيت، وتجهيز الحديد والإكسسوارات المجلفنة المقاومة للصدأ طبقاً للمواصفات القياسية.', 'diarnafacha'); ?></p>
                    </div>
                </div>

                <div class="process-v__item">
                    <div class="process-v__num">05</div>
                    <div>
                        <h3><?php esc_html_e('التوريد والتركيب بإشراف هندسي', 'diarnafacha'); ?></h3>
                        <p><?php esc_html_e('يتم توريد الحجر بعد فرزه ومعاينته للتأكد من خلوه من العيوب وتوحيد لونه. يبدأ الفنيون في التركيب بدقة مليمترية وضبط ميزان الواجهات والفواصل وفواصل التمدد والعزل تحت إشراف دوري.', 'diarnafacha'); ?></p>
                    </div>
                </div>

                <div class="process-v__item">
                    <div class="process-v__num">06</div>
                    <div>
                        <h3><?php esc_html_e('التشطيب النهائي والتسليم', 'diarnafacha'); ?></h3>
                        <p><?php esc_html_e('تشمل المرحلة الأخيرة غسيل الحجر وتنظيفه، معالجة الفواصل وترويبتها بمواد مقاومة للعوامل الجوية، فك السقالات، والقيام بجولة تسليم نهائية مع العميل للتأكد من رضاه التام عن النتيجة.', 'diarnafacha'); ?></p>
                    </div>
                </div>
            </div>

            <!-- Guarantees Grid -->
            <div style="margin-top:64px" data-reveal>
                <div class="info-strip">
                    <div class="info-strip__item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        <strong><?php esc_html_e('تثبيت ميكانيكي آمن', 'diarnafacha'); ?></strong>
                        <span><?php esc_html_e('إكسسوارات مجلفنة مقاومة للتآكل والأحمال', 'diarnafacha'); ?></span>
                    </div>
                    <div class="info-strip__item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <strong><?php esc_html_e('التزام بالجدول الزمني', 'diarnafacha'); ?></strong>
                        <span><?php esc_html_e('متابعة أسبوعية لنسب الإنجاز والتسليم', 'diarnafacha'); ?></span>
                    </div>
                    <div class="info-strip__item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <strong><?php esc_html_e('مطابقة تامة للتصميم', 'diarnafacha'); ?></strong>
                        <span><?php esc_html_e('تنفيذ يطابق التفاصيل المعمارية المعتمدة', 'diarnafacha'); ?></span>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div style="margin-top:56px" data-reveal>
                <div class="cta-band">
                    <div>
                        <span class="eyebrow"><?php esc_html_e('ابدأ أول خطوة', 'diarnafacha'); ?></span>
                        <h2 class="h2"><?php esc_html_e('جاهز لبدء مرحلة دراسة مشروعك؟', 'diarnafacha'); ?></h2>
                        <p class="lead"><?php esc_html_e('أرسل المخططات عبر واتساب أو احجز معاينة ميدانية لموقعك في الرياض وسنكون بجانبك من الخطوة الأولى.', 'diarnafacha'); ?></p>
                    </div>
                    <div class="cta-band__actions">
                        <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary btn--lg"><?php esc_html_e('اطلب عرض سعر', 'diarnafacha'); ?></a>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn--ghost btn--lg"><?php esc_html_e('تواصل معنا عبر واتساب', 'diarnafacha'); ?></a>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>

<?php
get_footer();
