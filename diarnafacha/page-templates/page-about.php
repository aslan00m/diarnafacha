<?php
/**
 * Template Name: من نحن (About Us)
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$quote_page = get_page_by_path('quote');
$quote_url  = $quote_page ? get_permalink($quote_page) : home_url('/quote/');
?>

<main id="primary" class="site-main">

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container page-hero__inner" data-reveal>
            <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
            <span class="eyebrow"><?php esc_html_e('عن ديارنا الحديثة', 'diarnafacha'); ?></span>
            <h1 class="h1"><?php esc_html_e('خبرة معمارية وحرفية دقيقة', 'diarnafacha'); ?><br><?php esc_html_e('في مقاولات الحجر', 'diarnafacha'); ?></h1>
            <p class="lead"><?php esc_html_e('نحن في شركة ديارنا الحديثة للاستثمار نكرس جهودنا لتقديم أعلى مستويات الجودة في تنفيذ وتشطيب الواجهات الحجرية للمشاريع السكنية والتجارية في الرياض وكافة مناطق المملكة.', 'diarnafacha'); ?></p>
        </div>
    </section>

    <!-- About Detail -->
    <section class="section">
        <div class="container">
            <div class="about__grid">
                <div data-reveal>
                    <span class="eyebrow"><?php esc_html_e('رؤيتنا ورسالتنا', 'diarnafacha'); ?></span>
                    <h2 class="h2"><?php esc_html_e('نحو واجهات تدوم لأجيال', 'diarnafacha'); ?></h2>
                    <p class="lead"><?php esc_html_e('الواجهة هي أول ما يُرى من المبنى وآخر ما يُنسى، وهي خط الدفاع الأول ضد العوامل الجوية والحرارية. لذلك نرى في الحجر الطبيعي الخيار الأمثل الذي يجمع بين الأصالة والاستدامة والجمال.', 'diarnafacha'); ?></p>
                    <p style="margin-top:14px;color:var(--c-muted);font-size:15px;line-height:1.85"><?php esc_html_e('نعتمد في تنفيذنا على فريق من الفنيين والمهندسين ذوي الخبرة الطويلة في أعمال الحجر والواجهات، ملتزمين بالكود السعودي للبناء وأدق معايير السلامة والتثبيت الهندسي.', 'diarnafacha'); ?></p>
                    
                    <ul class="about__list">
                        <li>
                            <?php echo diarnafacha_icon('check'); ?>
                            <span><?php esc_html_e('اختيار خامات الحجر من أفضل المحاجر المعتمدة.', 'diarnafacha'); ?></span>
                        </li>
                        <li>
                            <?php echo diarnafacha_icon('check'); ?>
                            <span><?php esc_html_e('طرق تثبيت ميكانيكية متطورة ومقاومة للعوامل المناخية.', 'diarnafacha'); ?></span>
                        </li>
                        <li>
                            <?php echo diarnafacha_icon('check'); ?>
                            <span><?php esc_html_e('إشراف مستمر على كل مرحلة لضمان مطابقة التصميم بدقة.', 'diarnafacha'); ?></span>
                        </li>
                    </ul>
                </div>
                <div class="about__media" data-reveal>
                    <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=75" alt="<?php esc_attr_e('فريق عمل ديارنا الحديثة للحجر والواجهات', 'diarnafacha'); ?>" loading="lazy" decoding="async">
                    <div class="about__badge">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <div>
                            <strong><?php esc_html_e('التزام بالجودة', 'diarnafacha'); ?></strong>
                            <span><?php esc_html_e('دقة في القياسات والتشطيب', 'diarnafacha'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stone Types -->
    <section class="section section--tint">
        <div class="container">
            <div class="section-head center" data-reveal>
                <span class="eyebrow"><?php esc_html_e('خاماتنا المختارة', 'diarnafacha'); ?></span>
                <h2 class="h2"><?php esc_html_e('أنواع الحجر المعتمدة', 'diarnafacha'); ?></h2>
                <p class="lead"><?php esc_html_e('نوفر ونركب تشكيلة واسعة من أجود أنواع الحجر الطبيعي الملائم لطقس المملكة العربية السعودية.', 'diarnafacha'); ?></p>
            </div>

            <div class="stones__grid" data-reveal>
                <div class="stone">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=600&q=70" alt="<?php esc_attr_e('حجر الرياض الطبيعي', 'diarnafacha'); ?>" loading="lazy" decoding="async">
                    <div class="stone__label">
                        <strong><?php esc_html_e('حجر الرياض', 'diarnafacha'); ?></strong>
                        <span><?php esc_html_e('أبيض، كريمي، أصفر', 'diarnafacha'); ?></span>
                    </div>
                </div>
                <div class="stone">
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=600&q=70" alt="<?php esc_attr_e('حجر حائل الطبيعي', 'diarnafacha'); ?>" loading="lazy" decoding="async">
                    <div class="stone__label">
                        <strong><?php esc_html_e('حجر حائل', 'diarnafacha'); ?></strong>
                        <span><?php esc_html_e('أحمر وبيج مميز', 'diarnafacha'); ?></span>
                    </div>
                </div>
                <div class="stone">
                    <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=600&q=70" alt="<?php esc_attr_e('حجر أردني للواجهات', 'diarnafacha'); ?>" loading="lazy" decoding="async">
                    <div class="stone__label">
                        <strong><?php esc_html_e('الحجر الأردني', 'diarnafacha'); ?></strong>
                        <span><?php esc_html_e('رويشد، معان، صحراوي', 'diarnafacha'); ?></span>
                    </div>
                </div>
                <div class="stone">
                    <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=600&q=70" alt="<?php esc_attr_e('حجر ترافنتينو فاخر', 'diarnafacha'); ?>" loading="lazy" decoding="async">
                    <div class="stone__label">
                        <strong><?php esc_html_e('ترافنتينو', 'diarnafacha'); ?></strong>
                        <span><?php esc_html_e('بيج ورمادي كلاسيكي', 'diarnafacha'); ?></span>
                    </div>
                </div>
                <div class="stone">
                    <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=600&q=70" alt="<?php esc_attr_e('حجر رخامي وحجر طبيعي متنوع', 'diarnafacha'); ?>" loading="lazy" decoding="async">
                    <div class="stone__label">
                        <strong><?php esc_html_e('حجر إيراني ومستورد', 'diarnafacha'); ?></strong>
                        <span><?php esc_html_e('تشكيلات فاخرة متخصصة', 'diarnafacha'); ?></span>
                    </div>
                </div>
            </div>

            <div class="stones__note" data-reveal>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <span><?php esc_html_e('نوفر عينات حجرية طبيعية لمعاينتها في موقع المشروع أو في مقرنا قبل اعتماد أمر التوريد والتركيب، ونوضح للعميل مزايا كل نوع من حيث مقاومة الحرارة وامتصاص الماء.', 'diarnafacha'); ?></span>
            </div>
        </div>
    </section>

    <!-- Values -->
    <section class="section section--dark">
        <div class="container">
            <div class="section-head center" data-reveal>
                <span class="eyebrow"><?php esc_html_e('قيمنا الأساسية', 'diarnafacha'); ?></span>
                <h2 class="h2" style="color:#fff"><?php esc_html_e('المعايير التي نبني عليها كل مشروع', 'diarnafacha'); ?></h2>
                <p class="lead"><?php esc_html_e('ثقة عملائنا هي استثمارنا الحقيقي، لذلك نلتزم بمبادئ واضحة في كل عقد ننفذه.', 'diarnafacha'); ?></p>
            </div>
            <div class="why__grid">
                <div class="why__item" data-reveal>
                    <div class="why__num">01</div>
                    <h3><?php esc_html_e('الأمان الإنشائي', 'diarnafacha'); ?></h3>
                    <p><?php esc_html_e('نستخدم أفضل أنظمة التيش والمشابك المعدنية المقاومة للصدأ المجلفنة والمطابقة للمواصفات.', 'diarnafacha'); ?></p>
                </div>
                <div class="why__item" data-reveal>
                    <div class="why__num">02</div>
                    <h3><?php esc_html_e('الدقة في المواعيد', 'diarnafacha'); ?></h3>
                    <p><?php esc_html_e('وضع جدول زمني واقعي والالتزام بتسليم مراحل العمل في تواريخها المحددة دون تأخير.', 'diarnafacha'); ?></p>
                </div>
                <div class="why__item" data-reveal>
                    <div class="why__num">03</div>
                    <h3><?php esc_html_e('الشفافية الكاملة', 'diarnafacha'); ?></h3>
                    <p><?php esc_html_e('عقود واضحة البنود وتفاصيل محددة لأنواع الحجر وسماكاته والمصنعيات بدون تكاليف خفية.', 'diarnafacha'); ?></p>
                </div>
            </div>
            <div style="text-align:center;margin-top:44px" data-reveal>
                <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary btn--lg"><?php esc_html_e('اطلب عرض سعر لمشروعك', 'diarnafacha'); ?></a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
