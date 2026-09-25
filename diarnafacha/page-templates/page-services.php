<?php
/**
 * Template Name: خدماتنا (Services Page)
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$quote_page = get_page_by_path('quote');
$quote_url  = $quote_page ? get_permalink($quote_page) : home_url('/quote/');

$services_query = new WP_Query(array(
    'post_type'      => 'service',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
));
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container page-hero__inner" data-reveal>
            <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
            <span class="eyebrow"><?php esc_html_e('خدمات متخصصة', 'diarnafacha'); ?></span>
            <h1 class="h1"><?php esc_html_e('حلول الحجر والواجهات', 'diarnafacha'); ?><br><?php esc_html_e('لجميع أنواع المشاريع', 'diarnafacha'); ?></h1>
            <p class="lead"><?php esc_html_e('نغطي كافة مراحل تنفيذ الواجهات الحجرية — من دراسة المخططات واختيار الحجر والتشطيب المناسب، حتى التركيب النهائي والتسليم.', 'diarnafacha'); ?></p>
        </div>
    </section>

    <section class="section">
        <div class="container">

            <?php if ($services_query->have_posts()) :
                $counter = 1;
                while ($services_query->have_posts()) : $services_query->the_post();
                    $num_str = sprintf('%02d', $counter++);
                    $sub     = get_post_meta(get_the_ID(), '_service_subtitle', true);
                    $features = get_post_meta(get_the_ID(), '_service_features', true);
                    $thumb   = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1200&q=75';
            ?>
                <article class="service-row" data-reveal>
                    <div>
                        <div class="service-row__num"><?php printf(esc_html__('خدمة %s', 'diarnafacha'), $num_str); ?></div>
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo esc_html($sub ? $sub : get_the_excerpt()); ?></p>
                        
                        <?php if (!empty($features)) :
                            $f_list = explode("\n", str_replace("\r", "", $features));
                        ?>
                            <ul>
                                <?php foreach ($f_list as $f_item) :
                                    $f_item = trim($f_item);
                                    if (empty($f_item)) continue;
                                ?>
                                    <li>
                                        <?php echo diarnafacha_icon('check'); ?>
                                        <span><?php echo esc_html($f_item); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div style="margin-top:28px;display:flex;gap:12px;flex-wrap:wrap;">
                            <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary"><?php esc_html_e('اطلب عرض سعر لهذه الخدمة', 'diarnafacha'); ?></a>
                            <a href="<?php the_permalink(); ?>" class="btn btn--outline"><?php esc_html_e('التفاصيل الفنية', 'diarnafacha'); ?></a>
                        </div>
                    </div>
                    <div class="service-row__media">
                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                    </div>
                </article>
            <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Default Services Rows -->
                <!-- 01 -->
                <article class="service-row" data-reveal>
                    <div>
                        <div class="service-row__num"><?php esc_html_e('خدمة 01', 'diarnafacha'); ?></div>
                        <h2><?php esc_html_e('تنفيذ الواجهات الحجرية', 'diarnafacha'); ?></h2>
                        <p><?php esc_html_e('تنفيذ متكامل للواجهات الحجرية وفق المخططات والتصاميم المعمارية المعتمدة للمشروع، مع مراعاة تفاصيل العزل والتركيب والمناسيب.', 'diarnafacha'); ?></p>
                        <ul>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('مطابقة كاملة لمخططات الواجهات والتفاصيل الإنشائية.', 'diarnafacha'); ?></span></li>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('تركيب بنظام ميكانيكي أو تقليدي بحسب طبيعة المبنى وارتفاعه.', 'diarnafacha'); ?></span></li>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('مراعاة فواصل التمدد والعزل المائي والحراري خلف الحجر.', 'diarnafacha'); ?></span></li>
                        </ul>
                        <div style="margin-top:28px">
                            <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary"><?php esc_html_e('اطلب عرض سعر لهذه الخدمة', 'diarnafacha'); ?></a>
                        </div>
                    </div>
                    <div class="service-row__media">
                        <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1200&q=75" alt="تنفيذ واجهات حجرية للمشاريع السكنية" loading="lazy" decoding="async">
                    </div>
                </article>

                <!-- 02 -->
                <article class="service-row" data-reveal>
                    <div>
                        <div class="service-row__num"><?php esc_html_e('خدمة 02', 'diarnafacha'); ?></div>
                        <h2><?php esc_html_e('واجهات الفلل والمنازل الخاصة', 'diarnafacha'); ?></h2>
                        <p><?php esc_html_e('تنفيذ واجهات الفلل السكنية بأنماط معمارية متعددة — مودرن، كلاسيك، أو نيوكلاسيك — مع اهتمام فائق بتفاصيل المداخل والإطارات والكرانيش.', 'diarnafacha'); ?></p>
                        <ul>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('تصاميم متناسقة تبرز فخامة الفيلا وجمال خطوطها المعمارية.', 'diarnafacha'); ?></span></li>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('دمج الحجر مع عناصر أخرى مثل الزجاج والألمنيوم والخشب المعالج.', 'diarnafacha'); ?></span></li>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('تشطيبات متنوعة: مجلي، بوشارده، مسمسم، أو طبزة.', 'diarnafacha'); ?></span></li>
                        </ul>
                        <div style="margin-top:28px">
                            <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary"><?php esc_html_e('اطلب عرض سعر لواجهة فيلا', 'diarnafacha'); ?></a>
                        </div>
                    </div>
                    <div class="service-row__media">
                        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1200&q=75" alt="واجهة فيلا حجرية بالرياض" loading="lazy" decoding="async">
                    </div>
                </article>

                <!-- 03 -->
                <article class="service-row" data-reveal>
                    <div>
                        <div class="service-row__num"><?php esc_html_e('خدمة 03', 'diarnafacha'); ?></div>
                        <h2><?php esc_html_e('واجهات العمائر والمشاريع الاستثمارية', 'diarnafacha'); ?></h2>
                        <p><?php esc_html_e('تنفيذ واجهات العمائر السكنية والمكتبية بارتفاعاتها المتعددة، مع التركيز على السرعة في الإنجاز والالتزام بالميزانية والمعايير الهندسية.', 'diarnafacha'); ?></p>
                        <ul>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('تركيب ميكانيكي آمن معتمد للارتفاعات العالية والأحمال الثقيلة.', 'diarnafacha'); ?></span></li>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('حلول اقتصادية متينة تحافظ على رونق المبنى وتقلل تكاليف الصيانة.', 'diarnafacha'); ?></span></li>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('جدولة زمنية دقيقة تتوافق مع مراحل المشروع الإنشائي ككل.', 'diarnafacha'); ?></span></li>
                        </ul>
                        <div style="margin-top:28px">
                            <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary"><?php esc_html_e('اطلب عرض سعر لعمارة', 'diarnafacha'); ?></a>
                        </div>
                    </div>
                    <div class="service-row__media">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=1200&q=75" alt="واجهة عمارة سكنية بالحجر" loading="lazy" decoding="async">
                    </div>
                </article>

                <!-- 04 -->
                <article class="service-row" data-reveal>
                    <div>
                        <div class="service-row__num"><?php esc_html_e('خدمة 04', 'diarnafacha'); ?></div>
                        <h2><?php esc_html_e('الواجهات التجارية والمقرات', 'diarnafacha'); ?></h2>
                        <p><?php esc_html_e('تنفيذ واجهات المعارض والمجمعات التجارية والشركات والمطاعم، بما يمنح المبنى هوية بصرية قوية وجاذبة للعملاء مع الالتزام باشتراطات الكود.', 'diarnafacha'); ?></p>
                        <ul>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('واجهات عصرية تعزز قيمة العلامة التجارية للمنشأة.', 'diarnafacha'); ?></span></li>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('تكامل الواجهات الحجرية مع فتحات الزجاج الكبيرة واللوحات الإعلانية.', 'diarnafacha'); ?></span></li>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('تحمل للظروف الجوية والاستخدام الكثيف مع سهولة التنظيف.', 'diarnafacha'); ?></span></li>
                        </ul>
                        <div style="margin-top:28px">
                            <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary"><?php esc_html_e('اطلب عرض سعر لمشروع تجاري', 'diarnafacha'); ?></a>
                        </div>
                    </div>
                    <div class="service-row__media">
                        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=1200&q=75" alt="واجهة مشروع تجاري حجرية" loading="lazy" decoding="async">
                    </div>
                </article>

                <!-- 05 -->
                <article class="service-row" data-reveal>
                    <div>
                        <div class="service-row__num"><?php esc_html_e('خدمة 05', 'diarnafacha'); ?></div>
                        <h2><?php esc_html_e('تجديد وترميم الواجهات القائمة', 'diarnafacha'); ?></h2>
                        <p><?php esc_html_e('إعادة إحياء الواجهات القديمة أو المتهالكة من خلال إزالة التالف، معالجة التشققات، تلميع أو تغيير الحجر، وتحديث الهوية الخارجية للفيلا أو المبنى.', 'diarnafacha'); ?></p>
                        <ul>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('معاينة دقيقة للموقع لتقييم السلامة الإنشائية ومصادر التلف.', 'diarnafacha'); ?></span></li>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('إعادة جلي وتنظيف الحجر واستعادة لونه الطبيعي.', 'diarnafacha'); ?></span></li>
                            <li><?php echo diarnafacha_icon('check'); ?><span><?php esc_html_e('تحديث الواجهة لتواكب التصاميم المعمارية الحديثة بتكلفة مناسبة.', 'diarnafacha'); ?></span></li>
                        </ul>
                        <div style="margin-top:28px">
                            <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary"><?php esc_html_e('اطلب معاينة لتجديد واجهة', 'diarnafacha'); ?></a>
                        </div>
                    </div>
                    <div class="service-row__media">
                        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=75" alt="تجديد وترميم الواجهات القديمة" loading="lazy" decoding="async">
                    </div>
                </article>
            <?php endif; ?>

        </div>
    </section>

    <?php get_template_part('template-parts/final-cta'); ?>

</main>

<?php
get_footer();
