<?php
/**
 * The template for displaying a single Project
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) : the_post();
    $location   = get_post_meta(get_the_ID(), '_project_location', true);
    $stone_type = get_post_meta(get_the_ID(), '_project_stone_type', true);
    $year       = get_post_meta(get_the_ID(), '_project_year', true);
    $area       = get_post_meta(get_the_ID(), '_project_area', true);
    $thumb      = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1600&q=80';
    $whatsapp   = diarnafacha_opt('diarna_whatsapp', '966536089153');
    $wa_msg     = sprintf(__('السلام عليكم، أرغب في الاستفسار عن تنفيذ مشروع واجهة مماثل لمشروع (%s)', 'diarnafacha'), get_the_title());
    $wa_url     = diarnafacha_whatsapp_url($wa_msg, $whatsapp);
    $quote_page = get_page_by_path('quote');
    $quote_url  = $quote_page ? get_permalink($quote_page) : home_url('/quote/');
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container page-hero__inner" data-reveal>
            <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
            <span class="eyebrow"><?php esc_html_e('تفاصيل المشروع', 'diarnafacha'); ?></span>
            <h1 class="h1"><?php the_title(); ?></h1>
            <?php if ($location) : ?>
                <p class="lead" style="display:flex;align-items:center;gap:8px;">
                    <?php echo diarnafacha_icon('pin'); ?>
                    <?php echo esc_html($location); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <!-- Project Media Header -->
            <div style="border-radius:var(--radius-lg);overflow:hidden;box-shadow:var(--shadow-lg);margin-bottom:48px;" data-reveal>
                <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" style="width:100%;max-height:700px;object-fit:cover;">
            </div>

            <div style="display:grid;grid-template-columns:2fr 1fr;gap:clamp(24px, 4vw, 48px);" data-reveal>
                <!-- Project Description -->
                <div style="background:#fff;border-radius:var(--radius);padding:clamp(24px, 4vw, 40px);box-shadow:var(--shadow-sm);">
                    <h2 class="h2" style="font-size:24px;margin-bottom:20px;"><?php esc_html_e('نطاق العمل ومواصفات الواجهة', 'diarnafacha'); ?></h2>
                    <div style="line-height:1.9;color:#3A3733;">
                        <?php the_content(); ?>
                        <?php if (empty(get_the_content())) : ?>
                            <p><?php esc_html_e('تم تنفيذ هذا المشروع وفق أعلى معايير الجودة المعمارية وكود البناء السعودي. شملت الأعمال دراسة المخططات واختيار أجود أحجار الواجهات والتركيب الميكانيكي الدقيق مع ضمان العزل الحراري التام.', 'diarnafacha'); ?></p>
                        <?php endif; ?>
                    </div>

                    <div style="margin-top:36px;display:flex;gap:16px;flex-wrap:wrap;">
                        <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary btn--lg">
                            <?php esc_html_e('اطلب عرض سعر لمشروعك', 'diarnafacha'); ?>
                            <?php echo diarnafacha_icon('arrow-left'); ?>
                        </a>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn--ghost btn--lg">
                            <?php esc_html_e('استفسر عن هذا المشروع عبر واتساب', 'diarnafacha'); ?>
                        </a>
                    </div>
                </div>

                <!-- Project Specs Card -->
                <div>
                    <div style="background:#2B2926;color:#EFEAE1;border-radius:var(--radius);padding:32px;box-shadow:var(--shadow-md);">
                        <h3 style="color:#D6B47D;font-size:20px;margin-bottom:24px;padding-bottom:12px;border-bottom:1px solid rgba(255,255,255,0.15);">
                            <?php esc_html_e('بيانات المشروع الفنية', 'diarnafacha'); ?>
                        </h3>

                        <ul style="display:grid;gap:18px;font-size:15px;">
                            <?php if ($stone_type) : ?>
                                <li>
                                    <span style="color:#B08347;display:block;font-size:13px;"><?php esc_html_e('نوع الحجر وطريقة التركيب:', 'diarnafacha'); ?></span>
                                    <strong><?php echo esc_html($stone_type); ?></strong>
                                </li>
                            <?php endif; ?>

                            <?php if ($location) : ?>
                                <li>
                                    <span style="color:#B08347;display:block;font-size:13px;"><?php esc_html_e('الموقع الجغرافي:', 'diarnafacha'); ?></span>
                                    <strong><?php echo esc_html($location); ?></strong>
                                </li>
                            <?php endif; ?>

                            <?php if ($area) : ?>
                                <li>
                                    <span style="color:#B08347;display:block;font-size:13px;"><?php esc_html_e('المساحة الإجمالية للواجهات:', 'diarnafacha'); ?></span>
                                    <strong><?php echo esc_html($area); ?></strong>
                                </li>
                            <?php endif; ?>

                            <?php if ($year) : ?>
                                <li>
                                    <span style="color:#B08347;display:block;font-size:13px;"><?php esc_html_e('تاريخ وسنة التنفيذ:', 'diarnafacha'); ?></span>
                                    <strong><?php echo esc_html($year); ?></strong>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/final-cta'); ?>

</main>

<?php
endwhile;

get_footer();
