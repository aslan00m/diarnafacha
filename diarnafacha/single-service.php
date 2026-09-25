<?php
/**
 * The template for displaying a single Service
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) : the_post();
    $subtitle = get_post_meta(get_the_ID(), '_service_subtitle', true);
    $icon     = get_post_meta(get_the_ID(), '_service_icon', true);
    if (!$icon) $icon = 'facade';
    $features = get_post_meta(get_the_ID(), '_service_features', true);
    $wa_msg   = get_post_meta(get_the_ID(), '_service_wa_msg', true);
    if (empty($wa_msg)) {
        $wa_msg = sprintf(__('السلام عليكم، أرغب في الاستفسار عن خدمة (%s)', 'diarnafacha'), get_the_title());
    }
    $whatsapp = diarnafacha_opt('diarna_whatsapp', '966536089153');
    $wa_url   = diarnafacha_whatsapp_url($wa_msg, $whatsapp);
    $thumb    = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1200&q=75';
    $quote_page = get_page_by_path('quote');
    $quote_url  = $quote_page ? get_permalink($quote_page) : home_url('/quote/');
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container page-hero__inner" data-reveal>
            <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
            <span class="eyebrow"><?php esc_html_e('خدمات الواجهات والحجر', 'diarnafacha'); ?></span>
            <h1 class="h1"><?php the_title(); ?></h1>
            <?php if ($subtitle) : ?>
                <p class="lead"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div style="display:grid;grid-template-columns:1.8fr 1.2fr;gap:clamp(24px, 4vw, 48px);" data-reveal>
                <div>
                    <div style="border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow-md);margin-bottom:32px;">
                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" style="width:100%;max-height:480px;object-fit:cover;">
                    </div>

                    <div style="background:#fff;border-radius:var(--radius);padding:clamp(24px, 4vw, 36px);box-shadow:var(--shadow-sm);line-height:1.9;">
                        <h2 class="h2" style="font-size:22px;margin-bottom:16px;"><?php esc_html_e('تفاصيل ومميزات الخدمة', 'diarnafacha'); ?></h2>
                        <?php the_content(); ?>
                        <?php if (empty(get_the_content())) : ?>
                            <p><?php esc_html_e('نقدم في ديارنا الحديثة هذه الخدمة للمشاريع السكنية والتجارية مع التركيز على دقة المخططات الهندسية وأعلى معايير السلامة والجودة والتشطيب الفاخر.', 'diarnafacha'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div>
                    <?php if (!empty($features)) :
                        $features_arr = explode("\n", str_replace("\r", "", $features));
                    ?>
                        <div style="background:#F6F3EE;border:1px solid var(--c-line);border-radius:var(--radius);padding:32px;margin-bottom:24px;">
                            <h3 style="color:#2B2926;font-size:18px;margin-bottom:20px;display:flex;align-items:center;gap:10px;">
                                <span style="color:#B08347;"><?php echo diarnafacha_icon('check'); ?></span>
                                <?php esc_html_e('أبرز مميزات الخدمة', 'diarnafacha'); ?>
                            </h3>
                            <ul class="about__list">
                                <?php foreach ($features_arr as $feat) :
                                    $feat = trim($feat);
                                    if (empty($feat)) continue;
                                ?>
                                    <li>
                                        <?php echo diarnafacha_icon('check'); ?>
                                        <span><?php echo esc_html($feat); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div style="background:#2B2926;color:#fff;border-radius:var(--radius);padding:32px;box-shadow:var(--shadow-md);">
                        <h3 style="color:#D6B47D;font-size:20px;margin-bottom:12px;"><?php esc_html_e('هل ترغب في طلب هذه الخدمة؟', 'diarnafacha'); ?></h3>
                        <p style="font-size:14px;line-height:1.8;color:#ccc;margin-bottom:24px;">
                            <?php esc_html_e('أرسل لنا متطلبات مشروعك وسيقوم مهندسونا بتقديم دراسة وعرض سعر مخصص.', 'diarnafacha'); ?>
                        </p>
                        <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary btn--block btn--lg" style="margin-bottom:12px;">
                            <?php esc_html_e('طلب عرض سعر الآن', 'diarnafacha'); ?>
                        </a>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn--ghost btn--block btn--lg">
                            <?php esc_html_e('مراسلة مباشرة عبر واتساب', 'diarnafacha'); ?>
                        </a>
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
