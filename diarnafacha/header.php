<?php
/**
 * The Header for DiarnaFacha Theme
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$header_class = is_front_page() ? 'header header--over-hero' : 'header header--inner';
$quote_page = get_page_by_path('quote');
$quote_url  = $quote_page ? get_permalink($quote_page) : home_url('/quote/');
$whatsapp   = diarnafacha_opt('diarna_whatsapp', '966536089153');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta name="theme-color" content="#2B2926" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://images.unsplash.com" crossorigin />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="<?php echo esc_attr($header_class); ?>" id="header">
    <div class="container header__inner">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="brand" aria-label="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <span class="brand__mark" aria-hidden="true">
                    <?php echo diarnafacha_icon('building'); ?>
                </span>
                <span>
                    <span class="brand__name"><?php bloginfo('name'); ?></span><br>
                    <span class="brand__sub"><?php bloginfo('description'); ?></span>
                </span>
            <?php endif; ?>
        </a>

        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => 'nav',
                'container_class'=> 'header__nav',
                'fallback_cb'    => 'diarnafacha_primary_menu_fallback',
                'depth'          => 1,
            ));
        } else {
            diarnafacha_primary_menu_fallback();
        }
        ?>

        <div class="header__cta">
            <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary"><?php esc_html_e('اطلب عرض سعر', 'diarnafacha'); ?></a>
            <button class="header__toggle" id="menuOpen" aria-label="<?php esc_attr_e('فتح القائمة', 'diarnafacha'); ?>" aria-expanded="false">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Navigation Menu Modal -->
<div class="mmenu" id="mmenu" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e('القائمة', 'diarnafacha'); ?>">
    <button class="mmenu__close" id="menuClose" aria-label="<?php esc_attr_e('إغلاق القائمة', 'diarnafacha'); ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M6 6l12 12M18 6L6 18"/></svg>
    </button>

    <?php
    if (has_nav_menu('primary')) {
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container'      => false,
            'fallback_cb'    => 'diarnafacha_mobile_menu_fallback',
            'depth'          => 1,
        ));
    } else {
        diarnafacha_mobile_menu_fallback();
    }
    ?>

    <div class="mmenu__cta">
        <a href="<?php echo esc_url($quote_url); ?>" class="btn btn--primary btn--block btn--lg"><?php esc_html_e('اطلب عرض سعر', 'diarnafacha'); ?></a>
        <a href="<?php echo esc_url(diarnafacha_whatsapp_url('', $whatsapp)); ?>" target="_blank" rel="noopener" class="btn btn--outline btn--block btn--lg" style="border-color:rgba(255,255,255,.3);color:#fff">
            <?php esc_html_e('واتساب', 'diarnafacha'); ?>
        </a>
    </div>
</div>
