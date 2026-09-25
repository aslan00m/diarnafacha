<?php
/**
 * Template Name: الأسئلة الشائعة (FAQ Page)
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$whatsapp = diarnafacha_opt('diarna_whatsapp', '966536089153');
$wa_url   = diarnafacha_whatsapp_url('', $whatsapp);

$faq_query = new WP_Query(array(
    'post_type'      => 'faq',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
));
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container page-hero__inner" data-reveal>
            <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
            <span class="eyebrow"><?php esc_html_e('إجابات وتوضيحات', 'diarnafacha'); ?></span>
            <h1 class="h1"><?php esc_html_e('الأسئلة الأكثر شيوعاً', 'diarnafacha'); ?><br><?php esc_html_e('عن مقاولات الحجر والواجهات', 'diarnafacha'); ?></h1>
            <p class="lead"><?php esc_html_e('جمعنا لك أهم الأسئلة التي يطرحها عملاؤنا لمساعدتك على اتخاذ القرار الصحيح في مشروع واجهتك.', 'diarnafacha'); ?></p>
        </div>
    </section>

    <!-- FAQ Accordion -->
    <section class="section">
        <div class="container">
            <div class="faq" data-reveal>

                <?php if ($faq_query->have_posts()) :
                    $i = 0;
                    while ($faq_query->have_posts()) : $faq_query->the_post();
                        $i++;
                        $is_open = ($i === 1) ? ' open' : '';
                        $aria_exp = ($i === 1) ? 'true' : 'false';
                        $max_h   = ($i === 1) ? ' style="max-height:300px"' : '';
                ?>
                    <div class="faq__item<?php echo esc_attr($is_open); ?>">
                        <button class="faq__btn" aria-expanded="<?php echo esc_attr($aria_exp); ?>">
                            <span><?php the_title(); ?></span>
                            <span class="faq__icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg>
                            </span>
                        </button>
                        <div class="faq__answer"<?php echo $max_h; ?>>
                            <p><?php echo esc_html(get_the_content()); ?></p>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                    <!-- Default Initial 8 FAQs -->
                    <div class="faq__item open">
                        <button class="faq__btn" aria-expanded="true">
                            <span><?php esc_html_e('ما الفرق بين التركيب الميكانيكي والتركيب بالخلطة الأسمنتية؟', 'diarnafacha'); ?></span>
                            <span class="faq__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg></span>
                        </button>
                        <div class="faq__answer" style="max-height:300px">
                            <p><?php esc_html_e('التركيب الميكانيكي يعتمد على زوايا ومسامير معدنية مجلفنة تثبت الحجر في الجدار مباشرة تاركة فراغاً هوائياً يعمل كعازل حراري طبيعي، وهو النظام الأحدث والأكثر أماناً خاصة في الارتفاعات والأحجار الثقيلة. أما التركيب بالخلطة فيعتمد على المونة الأسمنتية ويصلح للارتفاعات المنخفضة، لكن الميكانيكي هو الموصى به دائماً وفق كود البناء السعودي.', 'diarnafacha'); ?></p>
                        </div>
                    </div>

                    <div class="faq__item">
                        <button class="faq__btn" aria-expanded="false">
                            <span><?php esc_html_e('ما هو نوع الحجر الأنسب لواجهات الفلل في الرياض؟', 'diarnafacha'); ?></span>
                            <span class="faq__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg></span>
                        </button>
                        <div class="faq__answer">
                            <p><?php esc_html_e('يعد حجر الرياض (البيج والأبيض والكريمي) الخيار الأكثر شيوعاً لمقاومته العالية لحرارة وشمس نجد ولأصالته. كما يفضل الكثيرون حجر الترافنتينو للواجهات المودرن الفاخرة، أو الحجر الأردني لجودته العالية وتعدد تدرجاته. يعتمد الاختيار أيضاً على الطابع المعماري والميزانية.', 'diarnafacha'); ?></p>
                        </div>
                    </div>

                    <div class="faq__item">
                        <button class="faq__btn" aria-expanded="false">
                            <span><?php esc_html_e('كم يستغرق تنفيذ واجهة فيلا حجرية؟', 'diarnafacha'); ?></span>
                            <span class="faq__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg></span>
                        </button>
                        <div class="faq__answer">
                            <p><?php esc_html_e('تتراوح المدة عادة للفيلا السكنية المتوسطة بين 30 إلى 60 يوماً عمل، بحسب مساحة الواجهات وتفاصيل الزخارف والكرانيش ونوعية التثبيت. نحدد المدة بدقة في جدول زمني قبل توقيع العقد.', 'diarnafacha'); ?></p>
                        </div>
                    </div>

                    <div class="faq__item">
                        <button class="faq__btn" aria-expanded="false">
                            <span><?php esc_html_e('هل تقدمون ضماناً على أعمال الحجر والتركيب؟', 'diarnafacha'); ?></span>
                            <span class="faq__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg></span>
                        </button>
                        <div class="faq__answer">
                            <p><?php esc_html_e('نعم، نقدم ضماناً معتمداً في العقد على سلامة التثبيت الميكانيكي ومقاومة الإكسسوارات للصدأ وجودة الحجر المورد وخلوه من التشققات والفجوات غير الطبيعية، لضمان راحة بالك التامة.', 'diarnafacha'); ?></p>
                        </div>
                    </div>

                    <div class="faq__item">
                        <button class="faq__btn" aria-expanded="false">
                            <span><?php esc_html_e('كيف يتم حساب تكلفة الواجهة الحجرية للمشروع؟', 'diarnafacha'); ?></span>
                            <span class="faq__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg></span>
                        </button>
                        <div class="faq__answer">
                            <p><?php esc_html_e('تحسب التكلفة بناءً على: مساحة الواجهة الصافية (بالمتر المربع)، نوع الحجر ومصدره وسماكته، نوع التشطيب المطلوب (مجلي، بوشارده، طبزة)، ونظام التثبيت، بالإضافة إلى التفاصيل الخاصة كالكرانيش وإطارات النوافذ والأعمدة.', 'diarnafacha'); ?></p>
                        </div>
                    </div>

                    <div class="faq__item">
                        <button class="faq__btn" aria-expanded="false">
                            <span><?php esc_html_e('هل يمكن تنفيذ واجهة حجرية لفيلا قديمة قائمة (ترميم)؟', 'diarnafacha'); ?></span>
                            <span class="faq__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg></span>
                        </button>
                        <div class="faq__answer">
                            <p><?php esc_html_e('بالتأكيد. نقوم بمعاينة المبنى وفحص قدرة الجدران على تحمل الوزن، ونقدم حلول تركيب ميكانيكي آمنة مع إمكانية إزالة اللياسة أو الدهان القديم وتثبيت الواجهة الحجرية الجديدة لتتحول الفيلا إلى مظهر حديث كلياً.', 'diarnafacha'); ?></p>
                        </div>
                    </div>

                    <div class="faq__item">
                        <button class="faq__btn" aria-expanded="false">
                            <span><?php esc_html_e('هل يتطلب المشروع وجود مخطط معماري مسبق؟', 'diarnafacha'); ?></span>
                            <span class="faq__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg></span>
                        </button>
                        <div class="faq__answer">
                            <p><?php esc_html_e('إذا كان لديك مخطط جاهز فهذا ممتاز ويسرع دراسة العرض بدقة. وإذا لم يتوفر مخطط نهائي، يمكننا زيارة الموقع للمعاينة ورفع القياسات وتقديم اقتراحات لتصميم الواجهة بما يتناسب مع رغبتك.', 'diarnafacha'); ?></p>
                        </div>
                    </div>

                    <div class="faq__item">
                        <button class="faq__btn" aria-expanded="false">
                            <span><?php esc_html_e('ما هي آلية الدفعات المتبعة في العقود؟', 'diarnafacha'); ?></span>
                            <span class="faq__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg></span>
                        </button>
                        <div class="faq__answer">
                            <p><?php esc_html_e('تُقسم الدفعات على مراحل إنجاز واضحة ومربوطة بنسب التنفيذ الفعلي في الموقع (دفعة مقدمة، دفعة عند وصول الدفعة الأولى من الحجر، دفعات مرتبطة بمراحل التركيب، ودفعة ختامية عند التسليم النهائي).', 'diarnafacha'); ?></p>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

            <!-- Need more info -->
            <div style="margin-top:64px;text-align:center" data-reveal>
                <p style="font-size:16px;color:var(--c-muted);margin-bottom:18px"><?php esc_html_e('لم تجد إجابة لسؤالك؟ فريقنا يسعد بالرد على جميع استفساراتك مباشرة.', 'diarnafacha'); ?></p>
                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn--primary btn--lg">
                    <?php esc_html_e('اسألنا عبر واتساب', 'diarnafacha'); ?>
                </a>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/final-cta'); ?>

</main>

<?php
get_footer();
