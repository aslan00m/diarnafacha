<?php
/**
 * Theme Setup and Core Configuration
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('diarnafacha_setup')) {
    function diarnafacha_setup() {
        // Make theme available for translation
        load_theme_textdomain('diarnafacha', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages
        add_theme_support('post-thumbnails');

        // Custom image sizes matching the design layout
        add_image_size('diarna-hero', 2000, 1300, true);
        add_image_size('diarna-project-wide', 1200, 620, true);
        add_image_size('diarna-project-tall', 700, 1400, true);
        add_image_size('diarna-project-card', 800, 550, true);
        add_image_size('diarna-project-square', 700, 700, true);

        // Register navigation menus
        register_nav_menus(array(
            'primary' => esc_html__('القائمة الرئيسية (Header Navigation)', 'diarnafacha'),
            'footer_services' => esc_html__('روابط الخدمات بالفوتر', 'diarnafacha'),
            'footer_links' => esc_html__('روابط سريعة بالفوتر', 'diarnafacha'),
        ));

        // Switch default core markup for search form, comment form, and comments to output valid HTML5
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ));

        // Custom logo support
        add_theme_support('custom-logo', array(
            'height'      => 60,
            'width'       => 260,
            'flex-width'  => true,
            'flex-height' => true,
        ));

        // Wide alignment support for Gutenberg
        add_theme_support('align-wide');
        add_theme_support('responsive-embeds');
    }
}
add_action('after_setup_theme', 'diarnafacha_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function diarnafacha_content_width() {
    $GLOBALS['content_width'] = apply_filters('diarnafacha_content_width', 1220);
}
add_action('after_setup_theme', 'diarnafacha_content_width', 0);

/**
 * Register widget area.
 */
function diarnafacha_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('الشريط الجانبي (Sidebar)', 'diarnafacha'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('أضف الودجات هنا لتظهر في الشريط الجانبي للمقالات.', 'diarnafacha'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'diarnafacha_widgets_init');

/**
 * Filter the except length to 24 words.
 */
function diarnafacha_excerpt_length($length) {
    return 24;
}
add_filter('excerpt_length', 'diarnafacha_excerpt_length', 999);

/**
 * Filter the excerpt "read more" string.
 */
function diarnafacha_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'diarnafacha_excerpt_more');
