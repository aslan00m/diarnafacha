<?php
/**
 * Template part: Homepage Articles / Blog Section
 *
 * Fully integrated with WordPress Posts settings (Reading Settings, Categories, Excerpt, Customizer).
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

// Customizer Visibility Check
$is_enabled = diarnafacha_opt('diarna_enable_blog_section', true);
if (!$is_enabled) {
    return;
}

// Section Headers
$eyebrow  = diarnafacha_opt('diarna_blog_eyebrow', 'المدونة والمعرفة');
$title    = diarnafacha_opt('diarna_blog_title', 'مقالات ودراسات الواجهات المعمارية');
$sub      = diarnafacha_opt('diarna_blog_sub', 'أحدث المقالات والنصائح التخصصية في اختيار خامات الحجر، تقنيات التركيب الميكانيكي، واشتراطات كود البناء السعودي.');
$btn_text = diarnafacha_opt('diarna_blog_btn_text', 'تصفح كافة المقالات');

// Posts count: Customizer override or WordPress Settings > Reading (posts_per_page)
$custom_count = intval(diarnafacha_opt('diarna_blog_count', 3));
$posts_per_page = ($custom_count > 0) ? $custom_count : intval(get_option('posts_per_page', 3));

// Native WordPress page for posts URL (Settings > Reading > صفحة المقالات)
$page_for_posts_id = get_option('page_for_posts');
$blog_url = $page_for_posts_id ? get_permalink($page_for_posts_id) : home_url('/blog/');

// Query Latest WordPress Posts
$blog_query = new WP_Query(array(
    'post_type'           => 'post',
    'posts_per_page'      => $posts_per_page,
    'post_status'         => 'publish',
    'ignore_sticky_posts' => 1,
));
?>

<section class="section section--articles" id="articles">
    <div class="container">
        <div class="section-head center" data-reveal>
            <span class="eyebrow"><?php echo esc_html($eyebrow); ?></span>
            <h2 class="h2"><?php echo esc_html($title); ?></h2>
            <p class="lead"><?php echo esc_html($sub); ?></p>
        </div>

        <div class="grid-3">
            <?php if ($blog_query->have_posts()) : ?>
                <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <?php get_template_part('template-parts/sections/card-post'); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Default Fallback Articles (for fresh WordPress installs before seeding posts) -->
                <article class="card card--post" data-reveal>
                    <div class="card__media">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=70" alt="دليلك الشامل لاختيار حجر واجهات الفلل بالرياض" loading="lazy" decoding="async" width="800" height="550">
                        <span class="card__badge"><?php esc_html_e('نصائح وإرشادات', 'diarnafacha'); ?></span>
                    </div>
                    <div class="card__body">
                        <div class="card__meta">
                            <span class="meta-item"><?php echo diarnafacha_icon('calendar'); ?> <?php echo date_i18n(get_option('date_format')); ?></span>
                            <span class="meta-sep">·</span>
                            <span class="meta-item"><?php echo diarnafacha_icon('clock'); ?> 5 دقائق قراءة</span>
                        </div>
                        <h3 class="card__title"><a href="<?php echo esc_url($blog_url); ?>"><?php esc_html_e('دليلك الشامل لاختيار حجر واجهات الفلل في الرياض', 'diarnafacha'); ?></a></h3>
                        <p class="card__desc"><?php esc_html_e('مقارنة تفصيلية بين حجر الرياض الطبيعي والترافنتينو والحجر الأردني ومقاومتها لحرارة الصيف والمناخ الصحراوي.', 'diarnafacha'); ?></p>
                        <a href="<?php echo esc_url($blog_url); ?>" class="card__link">
                            <span><?php esc_html_e('اقرأ المقال بالكامل', 'diarnafacha'); ?></span>
                            <?php echo diarnafacha_icon('arrow-left'); ?>
                        </a>
                    </div>
                </article>

                <article class="card card--post" data-reveal>
                    <div class="card__media">
                        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=800&q=70" alt="التركيب الميكانيكي مقابل الخلطة الأسمنتية" loading="lazy" decoding="async" width="800" height="550">
                        <span class="card__badge"><?php esc_html_e('مقارنات فنية', 'diarnafacha'); ?></span>
                    </div>
                    <div class="card__body">
                        <div class="card__meta">
                            <span class="meta-item"><?php echo diarnafacha_icon('calendar'); ?> <?php echo date_i18n(get_option('date_format')); ?></span>
                            <span class="meta-sep">·</span>
                            <span class="meta-item"><?php echo diarnafacha_icon('clock'); ?> 4 دقائق قراءة</span>
                        </div>
                        <h3 class="card__title"><a href="<?php echo esc_url($blog_url); ?>"><?php esc_html_e('التركيب الميكانيكي مقابل الخلطة: أيهما أفضل لواجهتك؟', 'diarnafacha'); ?></a></h3>
                        <p class="card__desc"><?php esc_html_e('دراسة هندسية توضح متى يكون التيش والزوايا الميكانيكية إلزامية، وفروقات الأمان والعزل الحراري وسرعة التنفيذ.', 'diarnafacha'); ?></p>
                        <a href="<?php echo esc_url($blog_url); ?>" class="card__link">
                            <span><?php esc_html_e('اقرأ المقال بالكامل', 'diarnafacha'); ?></span>
                            <?php echo diarnafacha_icon('arrow-left'); ?>
                        </a>
                    </div>
                </article>

                <article class="card card--post" data-reveal>
                    <div class="card__media">
                        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=800&q=70" alt="اشتراطات كود البناء السعودي للواجهات الحجرية" loading="lazy" decoding="async" width="800" height="550">
                        <span class="card__badge"><?php esc_html_e('كود البناء', 'diarnafacha'); ?></span>
                    </div>
                    <div class="card__body">
                        <div class="card__meta">
                            <span class="meta-item"><?php echo diarnafacha_icon('calendar'); ?> <?php echo date_i18n(get_option('date_format')); ?></span>
                            <span class="meta-sep">·</span>
                            <span class="meta-item"><?php echo diarnafacha_icon('clock'); ?> 6 دقائق قراءة</span>
                        </div>
                        <h3 class="card__title"><a href="<?php echo esc_url($blog_url); ?>"><?php esc_html_e('أهم اشتراطات كود البناء السعودي في تنفيذ الواجهات', 'diarnafacha'); ?></a></h3>
                        <p class="card__desc"><?php esc_html_e('المعايير المعتمدة لارتفاعات الألواح الحجرية، سماكات الصوف الصخري العازل، ومقاومة الرياح واشتراطات السلامة.', 'diarnafacha'); ?></p>
                        <a href="<?php echo esc_url($blog_url); ?>" class="card__link">
                            <span><?php esc_html_e('اقرأ المقال بالكامل', 'diarnafacha'); ?></span>
                            <?php echo diarnafacha_icon('arrow-left'); ?>
                        </a>
                    </div>
                </article>
            <?php endif; ?>
        </div>

        <div style="text-align:center;margin-top:40px" data-reveal>
            <a href="<?php echo esc_url($blog_url); ?>" class="btn btn--outline">
                <?php echo esc_html($btn_text); ?>
                <?php echo diarnafacha_icon('arrow-left'); ?>
            </a>
        </div>
    </div>
</section>
