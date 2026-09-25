<?php
/**
 * Register Custom Post Types
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

function diarnafacha_register_post_types() {

    // 1. Projects Custom Post Type (معرض الأعمال والمشاريع)
    $project_labels = array(
        'name'               => esc_html__('معرض المشاريع', 'diarnafacha'),
        'singular_name'      => esc_html__('مشروع', 'diarnafacha'),
        'menu_name'          => esc_html__('المشاريع المنفذة', 'diarnafacha'),
        'name_admin_bar'     => esc_html__('مشروع', 'diarnafacha'),
        'add_new'            => esc_html__('إضافة مشروع جديد', 'diarnafacha'),
        'add_new_item'       => esc_html__('إضافة مشروع حجر جديد', 'diarnafacha'),
        'new_item'           => esc_html__('مشروع جديد', 'diarnafacha'),
        'edit_item'          => esc_html__('تعديل المشروع', 'diarnafacha'),
        'view_item'          => esc_html__('عرض المشروع', 'diarnafacha'),
        'all_items'          => esc_html__('جميع المشاريع', 'diarnafacha'),
        'search_items'       => esc_html__('البحث في المشاريع', 'diarnafacha'),
        'not_found'          => esc_html__('لا توجد مشاريع مضافة حتى الآن.', 'diarnafacha'),
        'not_found_in_trash' => esc_html__('سلة المهملات فارغة.', 'diarnafacha')
    );

    register_post_type('project', array(
        'labels'             => $project_labels,
        'description'        => esc_html__('مشاريع الواجهات الحجرية المنفذة', 'diarnafacha'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'projects'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-building',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    ));

    // 2. Services Custom Post Type (خدمات الحجر والواجهات)
    $service_labels = array(
        'name'               => esc_html__('خدماتنا', 'diarnafacha'),
        'singular_name'      => esc_html__('خدمة', 'diarnafacha'),
        'menu_name'          => esc_html__('خدمات الواجهات', 'diarnafacha'),
        'name_admin_bar'     => esc_html__('خدمة', 'diarnafacha'),
        'add_new'            => esc_html__('إضافة خدمة جديدة', 'diarnafacha'),
        'add_new_item'       => esc_html__('إضافة خدمة حجر وواجهات', 'diarnafacha'),
        'new_item'           => esc_html__('خدمة جديدة', 'diarnafacha'),
        'edit_item'          => esc_html__('تعديل الخدمة', 'diarnafacha'),
        'view_item'          => esc_html__('عرض الخدمة', 'diarnafacha'),
        'all_items'          => esc_html__('جميع الخدمات', 'diarnafacha'),
        'search_items'       => esc_html__('البحث في الخدمات', 'diarnafacha'),
        'not_found'          => esc_html__('لم يتم العثور على أي خدمات.', 'diarnafacha'),
    );

    register_post_type('service', array(
        'labels'             => $service_labels,
        'description'        => esc_html__('خدمات توريد وتركيب وتشطيب الحجر', 'diarnafacha'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'services-list'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-hammer',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    ));

    // 3. Testimonials Custom Post Type (آراء العملاء)
    $testimonial_labels = array(
        'name'          => esc_html__('آراء العملاء', 'diarnafacha'),
        'singular_name' => esc_html__('رأي عميل', 'diarnafacha'),
        'menu_name'     => esc_html__('آراء العملاء', 'diarnafacha'),
        'add_new'       => esc_html__('إضافة رأي جديد', 'diarnafacha'),
        'add_new_item'  => esc_html__('إضافة تقييم عميل', 'diarnafacha'),
        'edit_item'     => esc_html__('تعديل التقييم', 'diarnafacha'),
        'all_items'     => esc_html__('جميع الآراء', 'diarnafacha'),
    );

    register_post_type('testimonial', array(
        'labels'        => $testimonial_labels,
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_position' => 7,
        'menu_icon'     => 'dashicons-testimonial',
        'supports'      => array('title', 'editor', 'thumbnail'),
    ));

    // 4. FAQ Custom Post Type (الأسئلة الشائعة)
    $faq_labels = array(
        'name'          => esc_html__('الأسئلة الشائعة', 'diarnafacha'),
        'singular_name' => esc_html__('سؤال شائع', 'diarnafacha'),
        'menu_name'     => esc_html__('الأسئلة الشائعة', 'diarnafacha'),
        'add_new'       => esc_html__('إضافة سؤال جديد', 'diarnafacha'),
        'add_new_item'  => esc_html__('إضافة سؤال وجواب', 'diarnafacha'),
        'edit_item'     => esc_html__('تعديل السؤال', 'diarnafacha'),
        'all_items'     => esc_html__('جميع الأسئلة', 'diarnafacha'),
    );

    register_post_type('faq', array(
        'labels'        => $faq_labels,
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_position' => 8,
        'menu_icon'     => 'dashicons-format-chat',
        'supports'      => array('title', 'editor'),
    ));
}
add_action('init', 'diarnafacha_register_post_types');
