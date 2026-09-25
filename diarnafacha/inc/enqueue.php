<?php
/**
 * Enqueue scripts and styles.
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

function diarnafacha_scripts() {
    $theme_version = wp_get_theme()->get('Version');

    // Google Fonts - IBM Plex Sans Arabic
    wp_enqueue_style(
        'diarnafacha-google-fonts',
        'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Main design system CSS
    wp_enqueue_style(
        'diarnafacha-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        $theme_version
    );

    // Theme Root style.css
    wp_enqueue_style(
        'diarnafacha-style',
        get_stylesheet_uri(),
        array('diarnafacha-main'),
        $theme_version
    );

    // Theme JS
    wp_enqueue_script(
        'diarnafacha-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        $theme_version,
        true // in footer
    );

    // Pass dynamic variables to script
    wp_localize_script('diarnafacha-script', 'diarnaData', array(
        'ajaxUrl'       => admin_url('admin-ajax.php'),
        'nonce'         => wp_create_nonce('diarna_quote_nonce'),
        'whatsappPhone' => diarnafacha_whatsapp_number(),
        'siteUrl'       => home_url('/'),
    ));

    // Comments reply script on single pages
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'diarnafacha_scripts');
