<?php
/**
 * WordPress Theme Customizer Integration
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

function diarnafacha_customize_register($wp_customize) {

    // Main Theme Panel
    $wp_customize->add_panel('diarna_theme_panel', array(
        'title'       => esc_html__('إعدادات وهوية ديارنا الحديثة', 'diarnafacha'),
        'description' => esc_html__('تحكم في كافة بيانات الاتصال، نصوص الهيرو، روابط التواصل، والفوتر.', 'diarnafacha'),
        'priority'    => 25,
    ));

    // ========================================================
    // 1. Contact Information Section
    // ========================================================
    $wp_customize->add_section('diarna_contact_section', array(
        'title'    => esc_html__('بيانات الاتصال والتواصل', 'diarnafacha'),
        'panel'    => 'diarna_theme_panel',
        'priority' => 10,
    ));

    // Phone
    $wp_customize->add_setting('diarna_phone', array(
        'default'           => '0536089153',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('diarna_phone', array(
        'label'    => esc_html__('رقم الهاتف / الجوال', 'diarnafacha'),
        'section'  => 'diarna_contact_section',
        'type'     => 'text',
    ));

    // WhatsApp
    $wp_customize->add_setting('diarna_whatsapp', array(
        'default'           => '966536089153',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('diarna_whatsapp', array(
        'label'       => esc_html__('رقم الواتساب (بالصيغة الدولية بدون +)', 'diarnafacha'),
        'description' => esc_html__('مثال: 966536089153', 'diarnafacha'),
        'section'     => 'diarna_contact_section',
        'type'        => 'text',
    ));

    // Email
    $wp_customize->add_setting('diarna_email', array(
        'default'           => 'Re@tajeermodat.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('diarna_email', array(
        'label'    => esc_html__('البريد الإلكتروني', 'diarnafacha'),
        'section'  => 'diarna_contact_section',
        'type'     => 'email',
    ));

    // Address
    $wp_customize->add_setting('diarna_address', array(
        'default'           => 'الرياض، المملكة العربية السعودية',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('diarna_address', array(
        'label'    => esc_html__('عنوان المقر / المدينة', 'diarnafacha'),
        'section'  => 'diarna_contact_section',
        'type'     => 'text',
    ));

    // ========================================================
    // 2. Hero Section
    // ========================================================
    $wp_customize->add_section('diarna_hero_section', array(
        'title'    => esc_html__('قسم الهيرو الرئيسي (Hero)', 'diarnafacha'),
        'panel'    => 'diarna_theme_panel',
        'priority' => 20,
    ));

    // Eyebrow
    $wp_customize->add_setting('diarna_hero_eyebrow', array(
        'default'           => 'الرياض · المملكة العربية السعودية',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('diarna_hero_eyebrow', array(
        'label'   => esc_html__('النص التعريفي العلوي (Eyebrow)', 'diarnafacha'),
        'section' => 'diarna_hero_section',
        'type'    => 'text',
    ));

    // Title
    $wp_customize->add_setting('diarna_hero_title', array(
        'default'           => 'مقاولات <em>الحجر والواجهات</em><br>باحترافية',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('diarna_hero_title', array(
        'label'       => esc_html__('العنوان الرئيسي (يدعم الوسوم مثل <em> و <br>)', 'diarnafacha'),
        'section'     => 'diarna_hero_section',
        'type'        => 'textarea',
    ));

    // Subtitle
    $wp_customize->add_setting('diarna_hero_sub', array(
        'default'           => 'ننفذ الواجهات الحجرية والتشطيبات المعمارية للمشاريع السكنية والتجارية، وفق تصميم المشروع ومتطلباته — من دراسة المخططات حتى التسليم.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('diarna_hero_sub', array(
        'label'   => esc_html__('الوصف التوضيحي للهيرو', 'diarnafacha'),
        'section' => 'diarna_hero_section',
        'type'    => 'textarea',
    ));

    // Hero Background Image
    $wp_customize->add_setting('diarna_hero_bg', array(
        'default'           => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2000&q=75',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'diarna_hero_bg', array(
        'label'    => esc_html__('صورة خلفية الهيرو', 'diarnafacha'),
        'section'  => 'diarna_hero_section',
    )));

    // Hero CTA Button Text
    $wp_customize->add_setting('diarna_hero_cta_text', array(
        'default'           => 'اطلب عرض سعر',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('diarna_hero_cta_text', array(
        'label'   => esc_html__('نص الزر الرئيسي (Primary CTA)', 'diarnafacha'),
        'section' => 'diarna_hero_section',
        'type'    => 'text',
    ));

    // Hero CTA Button URL
    $wp_customize->add_setting('diarna_hero_cta_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('diarna_hero_cta_url', array(
        'label'       => esc_html__('رابط الزر الرئيسي (اتركه فارغاً للتوجيه لصفحة طلب العرض)', 'diarnafacha'),
        'section'     => 'diarna_hero_section',
        'type'        => 'text',
    ));

    // ========================================================
    // 3. Floating Buttons & Mobile
    // ========================================================
    $wp_customize->add_section('diarna_floating_section', array(
        'title'    => esc_html__('الأزرار العائمة وشريط الهاتف', 'diarnafacha'),
        'panel'    => 'diarna_theme_panel',
        'priority' => 30,
    ));

    $wp_customize->add_setting('diarna_enable_wa_float', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('diarna_enable_wa_float', array(
        'label'   => esc_html__('تفعيل زر الواتساب العائم في زاوية الشاشة', 'diarnafacha'),
        'section' => 'diarna_floating_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('diarna_enable_mobile_bar', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('diarna_enable_mobile_bar', array(
        'label'   => esc_html__('تفعيل شريط الاتصال السريع أسفل شاشات الجوال', 'diarnafacha'),
        'section' => 'diarna_floating_section',
        'type'    => 'checkbox',
    ));

    // ========================================================
    // 4. Blog / Articles Section
    // ========================================================
    $wp_customize->add_section('diarna_blog_section', array(
        'title'    => esc_html__('قسم المقالات والأخبار (المدونة)', 'diarnafacha'),
        'panel'    => 'diarna_theme_panel',
        'priority' => 35,
    ));

    // Enable / Disable
    $wp_customize->add_setting('diarna_enable_blog_section', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('diarna_enable_blog_section', array(
        'label'   => esc_html__('عرض قسم المقالات في الصفحة الرئيسية', 'diarnafacha'),
        'section' => 'diarna_blog_section',
        'type'    => 'checkbox',
    ));

    // Eyebrow
    $wp_customize->add_setting('diarna_blog_eyebrow', array(
        'default'           => 'المدونة والمعرفة',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('diarna_blog_eyebrow', array(
        'label'   => esc_html__('النص العلوي التعريفي (Eyebrow)', 'diarnafacha'),
        'section' => 'diarna_blog_section',
        'type'    => 'text',
    ));

    // Title
    $wp_customize->add_setting('diarna_blog_title', array(
        'default'           => 'مقالات ودراسات الواجهات المعمارية',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('diarna_blog_title', array(
        'label'   => esc_html__('عنوان القسم الرئيسي', 'diarnafacha'),
        'section' => 'diarna_blog_section',
        'type'    => 'text',
    ));

    // Subtitle
    $wp_customize->add_setting('diarna_blog_sub', array(
        'default'           => 'أحدث المقالات والنصائح التخصصية في اختيار خامات الحجر، تقنيات التركيب الميكانيكي، واشتراطات كود البناء السعودي.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('diarna_blog_sub', array(
        'label'   => esc_html__('الوصف التوضيحي للقسم', 'diarnafacha'),
        'section' => 'diarna_blog_section',
        'type'    => 'textarea',
    ));

    // Number of Posts
    $wp_customize->add_setting('diarna_blog_count', array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('diarna_blog_count', array(
        'label'       => esc_html__('عدد المقالات المعروضة في الصفحة الرئيسية', 'diarnafacha'),
        'description' => esc_html__('القيمة الافتراضية 3 مقالات. اترك 0 للاعتماد على إعداد ووردبريس العام (الضبط > قراءة).', 'diarnafacha'),
        'section'     => 'diarna_blog_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 12,
            'step' => 1,
        ),
    ));

    // Button Text
    $wp_customize->add_setting('diarna_blog_btn_text', array(
        'default'           => 'تصفح كافة المقالات',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('diarna_blog_btn_text', array(
        'label'   => esc_html__('نص زر الانتقال لكافة المقالات', 'diarnafacha'),
        'section' => 'diarna_blog_section',
        'type'    => 'text',
    ));

    // ========================================================
    // 5. Footer Settings
    // ========================================================
    $wp_customize->add_section('diarna_footer_section', array(
        'title'    => esc_html__('إعدادات الفوتر وحقوق الملكية', 'diarnafacha'),
        'panel'    => 'diarna_theme_panel',
        'priority' => 40,
    ));

    $wp_customize->add_setting('diarna_footer_about', array(
        'default'           => 'شركة ديارنا الحديثة للاستثمار — مقاولات الحجر والواجهات للمشاريع السكنية والتجارية في الرياض والمملكة العربية السعودية.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('diarna_footer_about', array(
        'label'   => esc_html__('نبذة الفوتر التعريفي بالشركة', 'diarnafacha'),
        'section' => 'diarna_footer_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('diarna_copyright_text', array(
        'default'           => 'شركة ديارنا الحديثة للاستثمار — جميع الحقوق محفوظة.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('diarna_copyright_text', array(
        'label'   => esc_html__('نص حقوق النشر (Copyright)', 'diarnafacha'),
        'section' => 'diarna_footer_section',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'diarnafacha_customize_register');
