<?php
/**
 * Service Card Component
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$icon_type = get_post_meta(get_the_ID(), '_service_icon', true);
if (!$icon_type) $icon_type = 'facade';
$sub = get_post_meta(get_the_ID(), '_service_subtitle', true);
if (!$sub) $sub = get_the_excerpt();
$thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'diarna-project-card') : 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=800&q=70';
?>

<article class="card" data-reveal>
    <div class="card__media">
        <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async" width="800" height="550">
    </div>
    <div class="card__body">
        <div class="card__icon" aria-hidden="true">
            <?php echo diarnafacha_icon($icon_type); ?>
        </div>
        <h3><?php the_title(); ?></h3>
        <p><?php echo esc_html($sub); ?></p>
        <a href="<?php the_permalink(); ?>" class="card__link">
            <?php esc_html_e('التفاصيل', 'diarnafacha'); ?>
            <?php echo diarnafacha_icon('arrow-left'); ?>
        </a>
    </div>
</article>
