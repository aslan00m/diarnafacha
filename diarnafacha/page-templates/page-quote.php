<?php
/**
 * Template Name: طلب عرض سعر (Quote Page)
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$whatsapp = diarnafacha_opt('diarna_whatsapp', '966536089153');
$wa_url   = diarnafacha_whatsapp_url('السلام عليكم، أرغب في طلب عرض سعر مباشر لمشروع واجهة.', $whatsapp);
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container page-hero__inner" data-reveal>
            <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
            <span class="eyebrow"><?php esc_html_e('تسعير مخصص', 'diarnafacha'); ?></span>
            <h1 class="h1"><?php esc_html_e('اطلب عرض سعر لمشروعك', 'diarnafacha'); ?></h1>
            <p class="lead"><?php esc_html_e('املأ النموذج أدناه بمعلومات مشروعك، وسيقوم مهندسونا بدراسة الطلب والتواصل معك سريعاً عبر واتساب لتقديم دراسة فنية وعرض سعر دقيق.', 'diarnafacha'); ?></p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="quote">

                <!-- Form Left -->
                <form class="form" id="quoteForm" data-reveal>
                    <div class="form__row">
                        <div class="field">
                            <label for="name"><?php esc_html_e('الاسم الكريم', 'diarnafacha'); ?> <span class="req">*</span></label>
                            <input type="text" id="name" placeholder="<?php esc_attr_e('مثال: عبدالله الشمري', 'diarnafacha'); ?>" required>
                        </div>
                        <div class="field">
                            <label for="phone"><?php esc_html_e('رقم الجوال', 'diarnafacha'); ?> <span class="req">*</span></label>
                            <input type="tel" id="phone" placeholder="05xxxxxxxx" required dir="ltr">
                        </div>
                    </div>

                    <div class="form__row">
                        <div class="field">
                            <label for="city"><?php esc_html_e('المدينة / الحي', 'diarnafacha'); ?> <span class="req">*</span></label>
                            <input type="text" id="city" placeholder="<?php esc_attr_e('مثال: الرياض - حي الملقا', 'diarnafacha'); ?>" required>
                        </div>
                        <div class="field">
                            <label for="project"><?php esc_html_e('نوع المشروع', 'diarnafacha'); ?></label>
                            <select id="project">
                                <option value="فيلا خاصة"><?php esc_html_e('فيلا سكنية خاصة', 'diarnafacha'); ?></option>
                                <option value="عمارة سكنية"><?php esc_html_e('عمارة سكنية / مجمع شقق', 'diarnafacha'); ?></option>
                                <option value="مشروع تجاري"><?php esc_html_e('مقر شركة / مجمع تجاري', 'diarnafacha'); ?></option>
                                <option value="تجديد وترميم واجهة"><?php esc_html_e('تجديد أو ترميم واجهة قائمة', 'diarnafacha'); ?></option>
                                <option value="أخرى"><?php esc_html_e('أخرى', 'diarnafacha'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form__row">
                        <div class="field">
                            <label for="service"><?php esc_html_e('الخدمة المطلوبة', 'diarnafacha'); ?></label>
                            <select id="service">
                                <option value="توريد وتركيب كامل"><?php esc_html_e('توريد وتركيب كامل (حجر + مصنعية + تيش ميكانيكي)', 'diarnafacha'); ?></option>
                                <option value="تركيب مصنعية فقط"><?php esc_html_e('تركيب مصنعية فقط (الحجر متوفر)', 'diarnafacha'); ?></option>
                                <option value="توريد حجر فقط"><?php esc_html_e('توريد حجر طبيعي فقط', 'diarnafacha'); ?></option>
                                <option value="معاينة واستشارة فنية"><?php esc_html_e('معاينة موقع واستشارة فنية', 'diarnafacha'); ?></option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="area"><?php esc_html_e('المساحة التقريبية للواجهات (م²)', 'diarnafacha'); ?></label>
                            <input type="text" id="area" placeholder="<?php esc_attr_e('مثال: 450 م²', 'diarnafacha'); ?>">
                        </div>
                    </div>

                    <div class="field field--full" style="margin-bottom:16px">
                        <label for="details"><?php esc_html_e('تفاصيل إضافية عن المشروع', 'diarnafacha'); ?></label>
                        <textarea id="details" placeholder="<?php esc_attr_e('اذكر أي تفاصيل إضافية، مثل نوع الحجر المفضل لديك (حجر الرياض، ترافنتينو...)، هل يوجد مخطط معماري، موعد البدء المتوقع...', 'diarnafacha'); ?>"></textarea>
                    </div>

                    <div class="field field--full" style="margin-bottom:20px">
                        <label><?php esc_html_e('المخططات أو صور الموقع (اختياري)', 'diarnafacha'); ?></label>
                        <label class="file-drop" for="files">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/></svg>
                            <div>
                                <strong><?php esc_html_e('اضغط لاختيار المخططات أو صور الموقع', 'diarnafacha'); ?></strong>
                                <span><?php esc_html_e('يمكنك أيضاً إرسالها مباشرة في محادثة الواتساب', 'diarnafacha'); ?></span>
                            </div>
                            <input type="file" id="files" multiple accept="image/*,.pdf,.dwg">
                        </label>
                        <div class="file-name" id="fileName"></div>
                    </div>

                    <div class="form__submit">
                        <button type="submit" class="btn btn--primary btn--lg btn--block">
                            <?php esc_html_e('إرسال الطلب عبر واتساب', 'diarnafacha'); ?>
                            <?php echo diarnafacha_icon('whatsapp'); ?>
                        </button>
                        
                        <div class="form__alt"><?php esc_html_e('أو تواصل فوراً بدون تعبئة', 'diarnafacha'); ?></div>
                        
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn--outline btn--lg btn--block">
                            <?php esc_html_e('محادثة فورية مع المهندس المختص', 'diarnafacha'); ?>
                        </a>
                    </div>

                    <p class="form__note"><?php esc_html_e('بياناتك ومخططاتك في سرية تامة وتُستخدم فقط لإعداد العرض الفني.', 'diarnafacha'); ?></p>
                </form>

                <!-- Sidebar Right -->
                <aside class="quote__intro" data-reveal>
                    <span class="eyebrow"><?php esc_html_e('لماذا تطلب منا؟', 'diarnafacha'); ?></span>
                    <h2 class="h2"><?php esc_html_e('دراسة فنية متكاملة قبل اعتماد السعر', 'diarnafacha'); ?></h2>
                    <p class="lead"><?php esc_html_e('لا نقدم أرقاماً عشوائية، بل ندرس مساحات واجهاتك واشتراطات الموقع ونقترح الحجر الأنسب لميزانيتك وتصميمك المعماري.', 'diarnafacha'); ?></p>

                    <div class="quote__side">
                        <h3><?php esc_html_e('ماذا تتضمن دراستنا؟', 'diarnafacha'); ?></h3>
                        <ul>
                            <li>
                                <?php echo diarnafacha_icon('check'); ?>
                                <span><?php esc_html_e('حساب كميات تقريبي ودقيق لمساحات الواجهات الحجرية.', 'diarnafacha'); ?></span>
                            </li>
                            <li>
                                <?php echo diarnafacha_icon('check'); ?>
                                <span><?php esc_html_e('تحديد نوع الحجر والتشطيب الملائم للواجهة (سماكة، لون، نقشة).', 'diarnafacha'); ?></span>
                            </li>
                            <li>
                                <?php echo diarnafacha_icon('check'); ?>
                                <span><?php esc_html_e('اقتراح نظام التثبيت الميكانيكي المناسب مع العوازل.', 'diarnafacha'); ?></span>
                            </li>
                            <li>
                                <?php echo diarnafacha_icon('check'); ?>
                                <span><?php esc_html_e('جدول زمني متوقع لجميع مراحل التوريد والتركيب والتسليم.', 'diarnafacha'); ?></span>
                            </li>
                        </ul>
                    </div>

                    <div class="quote__side" style="margin-top:24px">
                        <h3><?php esc_html_e('ضمانات ديارنا الحديثة', 'diarnafacha'); ?></h3>
                        <ul>
                            <li>
                                <?php echo diarnafacha_icon('check'); ?>
                                <span><?php esc_html_e('عقود رسمية ملزمة بكافة التفاصيل والمواصفات الفنية.', 'diarnafacha'); ?></span>
                            </li>
                            <li>
                                <?php echo diarnafacha_icon('check'); ?>
                                <span><?php esc_html_e('فريق فني متمرس وإشراف هندسي مستمر على الموقع.', 'diarnafacha'); ?></span>
                            </li>
                            <li>
                                <?php echo diarnafacha_icon('check'); ?>
                                <span><?php esc_html_e('ضمان شامل على جودة التركيب وسلامة التيش الميكانيكي.', 'diarnafacha'); ?></span>
                            </li>
                        </ul>
                    </div>
                </aside>

            </div>
        </div>
    </section>

</main>

<?php
get_footer();
