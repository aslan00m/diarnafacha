<?php
/**
 * Security and Helper Functions
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Clean and format phone number for tel: links
 */
function diarnafacha_clean_phone($phone) {
    return preg_replace('/[^0-9+]/', '', $phone);
}

/**
 * Format WhatsApp number (e.g. 966536089153)
 */
function diarnafacha_whatsapp_number($number = '') {
    if (empty($number)) {
        $number = get_theme_mod('diarna_whatsapp', '966536089153');
    }
    $clean = preg_replace('/[^0-9]/', '', $number);
    // Convert 05XXXXXXXX to 9665XXXXXXXX if needed
    if (strpos($clean, '05') === 0) {
        $clean = '966' . substr($clean, 1);
    }
    return $clean;
}

/**
 * Generate WhatsApp chat URL with encoded text
 */
function diarnafacha_whatsapp_url($text = '', $number = '') {
    $phone = diarnafacha_whatsapp_number($number);
    if (empty($text)) {
        $text = 'السلام عليكم، أرغب في الاستفسار عن تنفيذ الحجر والواجهات لمشروعي.';
    }
    return 'https://wa.me/' . $phone . '?text=' . rawurlencode($text);
}

/**
 * Get theme mod with fallback
 */
function diarnafacha_opt($key, $default = '') {
    return get_theme_mod($key, $default);
}

/**
 * Safe SVG Icon rendering helper
 */
function diarnafacha_icon($name, $class = '') {
    $class_attr = $class ? ' class="' . esc_attr($class) . '"' : '';
    switch ($name) {
        case 'building':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V9l9-5 9 5v12"/><path d="M9 21v-8h6v8"/></svg>';
        case 'facade':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"/></svg>';
        case 'villa':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-7 9 7v9a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1z"/></svg>';
        case 'commercial':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M5 21V8h6v13M13 21V4h6v17"/></svg>';
        case 'check':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>';
        case 'arrow-left':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>';
        case 'phone':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3 19.5 19.5 0 01-6-6A19.8 19.8 0 012.1 4.2 2 2 0 014.1 2h3a2 2 0 012 1.7c.1 1 .4 2 .7 2.8a2 2 0 01-.5 2.1L8.1 9.9a16 16 0 006 6l1.3-1.2a2 2 0 012.1-.5c.9.3 1.8.6 2.8.7a2 2 0 011.7 2z"/></svg>';
        case 'whatsapp':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="currentColor"><path d="M20.5 3.5A11.9 11.9 0 0012 0C5.4 0 .1 5.3.1 11.9c0 2.1.5 4.2 1.6 6L0 24l6.3-1.6a11.9 11.9 0 005.7 1.4h.1c6.5 0 11.9-5.3 11.9-11.9 0-3.2-1.2-6.2-3.5-8.4z"/></svg>';
        case 'mail':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 6l-10 7L2 6"/></svg>';
        case 'pin':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>';
        case 'calendar':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>';
        case 'clock':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>';
        case 'user':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>';
        case 'tag':
            return '<svg' . $class_attr . ' viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>';
        default:
            return '';
    }
}

/**
 * Calculate estimated reading time in minutes
 */
function diarnafacha_reading_time($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $content = get_post_field('post_content', $post_id);
    $clean_content = strip_tags(strip_shortcodes($content));
    $word_count = count(preg_split('/\s+/u', $clean_content, -1, PREG_SPLIT_NO_EMPTY));
    $reading_time = ceil($word_count / 160);
    return max(1, $reading_time);
}

/**
 * Remove WordPress generator tag for security
 */
remove_action('wp_head', 'wp_generator');
