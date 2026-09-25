<?php
/**
 * DiarnaFacha WordPress Theme Functions and Definitions
 *
 * @package DiarnaFacha
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// 1. Security & Helpers
require_once get_template_directory() . '/inc/security.php';

// 2. Setup & Theme Support
require_once get_template_directory() . '/inc/setup.php';

// 3. Enqueue Styles & Scripts
require_once get_template_directory() . '/inc/enqueue.php';

// 4. Custom Post Types
require_once get_template_directory() . '/inc/post-types.php';

// 5. Custom Taxonomies
require_once get_template_directory() . '/inc/taxonomies.php';

// 6. Meta Boxes
require_once get_template_directory() . '/inc/meta-boxes.php';

// 7. Customizer Options
require_once get_template_directory() . '/inc/customizer.php';

// 8. Admin Dashboard & Demo Setup
require_once get_template_directory() . '/inc/admin.php';

/**
 * Fallback Header Menu if no WordPress menu is assigned yet
 */
function diarnafacha_primary_menu_fallback() {
    $current_url = home_url(add_query_arg(array(), $GLOBALS['wp']->request));
    $page_for_posts = get_option('page_for_posts');
    $blog_url = $page_for_posts ? get_permalink($page_for_posts) : home_url('/blog/');
    $links = array(
        'services' => array('label' => 'خدماتنا', 'url' => home_url('/services/')),
        'gallery'  => array('label' => 'أعمالنا', 'url' => home_url('/gallery/')),
        'about'    => array('label' => 'من نحن', 'url' => home_url('/about/')),
        'process'  => array('label' => 'مراحل العمل', 'url' => home_url('/process/')),
        'articles' => array('label' => 'المقالات', 'url' => $blog_url),
        'faq'      => array('label' => 'الأسئلة', 'url' => home_url('/faq/')),
        'contact'  => array('label' => 'اتصل بنا', 'url' => home_url('/contact/')),
    );
    echo '<nav class="header__nav" aria-label="' . esc_attr__('التنقل الرئيسي', 'diarnafacha') . '">';
    foreach ($links as $slug => $data) {
        $is_active = (strpos($current_url, $slug) !== false) ? ' class="active"' : '';
        echo '<a href="' . esc_url($data['url']) . '"' . $is_active . '>' . esc_html($data['label']) . '</a>';
    }
    echo '</nav>';
}

/**
 * Fallback Mobile Menu
 */
function diarnafacha_mobile_menu_fallback() {
    $page_for_posts = get_option('page_for_posts');
    $blog_url = $page_for_posts ? get_permalink($page_for_posts) : home_url('/blog/');
    $links = array(
        'home'     => array('label' => 'الرئيسية', 'url' => home_url('/')),
        'services' => array('label' => 'خدماتنا', 'url' => home_url('/services/')),
        'gallery'  => array('label' => 'أعمالنا', 'url' => home_url('/gallery/')),
        'about'    => array('label' => 'من نحن', 'url' => home_url('/about/')),
        'process'  => array('label' => 'مراحل العمل', 'url' => home_url('/process/')),
        'articles' => array('label' => 'المقالات والمدونة', 'url' => $blog_url),
        'faq'      => array('label' => 'الأسئلة الشائعة', 'url' => home_url('/faq/')),
        'contact'  => array('label' => 'اتصل بنا', 'url' => home_url('/contact/')),
    );
    echo '<ul>';
    foreach ($links as $data) {
        echo '<li><a href="' . esc_url($data['url']) . '">' . esc_html($data['label']) . '</a></li>';
    }
    echo '</ul>';
}

/**
 * Fallback Footer Services
 */
function diarnafacha_footer_services_fallback() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/services/')) . '">' . esc_html__('تنفيذ الواجهات', 'diarnafacha') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/services/')) . '">' . esc_html__('تركيب الحجر', 'diarnafacha') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/services/')) . '">' . esc_html__('واجهات الفلل', 'diarnafacha') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/services/')) . '">' . esc_html__('واجهات العمائر', 'diarnafacha') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/services/')) . '">' . esc_html__('تجديد الواجهات', 'diarnafacha') . '</a></li>';
    echo '</ul>';
}

/**
 * Fallback Footer Links
 */
function diarnafacha_footer_links_fallback() {
    $page_for_posts = get_option('page_for_posts');
    $blog_url = $page_for_posts ? get_permalink($page_for_posts) : home_url('/blog/');
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . esc_html__('من نحن', 'diarnafacha') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/gallery/')) . '">' . esc_html__('أعمالنا', 'diarnafacha') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/process/')) . '">' . esc_html__('مراحل العمل', 'diarnafacha') . '</a></li>';
    echo '<li><a href="' . esc_url($blog_url) . '">' . esc_html__('المقالات والمعرفة', 'diarnafacha') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/faq/')) . '">' . esc_html__('الأسئلة الشائعة', 'diarnafacha') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/quote/')) . '">' . esc_html__('اطلب عرض سعر', 'diarnafacha') . '</a></li>';
    echo '</ul>';
}
