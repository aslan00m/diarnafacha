<?php
/**
 * Register Custom Taxonomies
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

function diarnafacha_register_taxonomies() {

    // Taxonomy: Project Categories (تصنيفات المشاريع)
    $project_cat_labels = array(
        'name'              => esc_html__('تصنيفات المشاريع', 'diarnafacha'),
        'singular_name'     => esc_html__('تصنيف المشروع', 'diarnafacha'),
        'search_items'      => esc_html__('البحث في التصنيفات', 'diarnafacha'),
        'all_items'         => esc_html__('جميع التصنيفات', 'diarnafacha'),
        'parent_item'       => esc_html__('التصنيف الأب', 'diarnafacha'),
        'parent_item_colon' => esc_html__('التصنيف الأب:', 'diarnafacha'),
        'edit_item'         => esc_html__('تعديل التصنيف', 'diarnafacha'),
        'update_item'       => esc_html__('تحديث التصنيف', 'diarnafacha'),
        'add_new_item'      => esc_html__('إضافة تصنيف مشروع جديد', 'diarnafacha'),
        'new_item_name'     => esc_html__('اسم التصنيف الجديد', 'diarnafacha'),
        'menu_name'         => esc_html__('تصنيفات المشاريع', 'diarnafacha'),
    );

    register_taxonomy('project_category', array('project'), array(
        'hierarchical'      => true,
        'labels'            => $project_cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-category'),
        'show_in_rest'      => true,
    ));

    // Taxonomy: Service Categories
    $service_cat_labels = array(
        'name'          => esc_html__('تصنيفات الخدمات', 'diarnafacha'),
        'singular_name' => esc_html__('تصنيف الخدمة', 'diarnafacha'),
        'menu_name'     => esc_html__('تصنيفات الخدمات', 'diarnafacha'),
    );

    register_taxonomy('service_category', array('service'), array(
        'hierarchical'      => true,
        'labels'            => $service_cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'service-category'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'diarnafacha_register_taxonomies');
