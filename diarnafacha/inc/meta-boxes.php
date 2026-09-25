<?php
/**
 * Custom Meta Boxes for Projects and Services
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Meta Boxes
 */
function diarnafacha_add_meta_boxes() {
    // Project Details Meta Box
    add_meta_box(
        'diarna_project_details',
        esc_html__('تفاصيل المشروع والمواصفات الفنية', 'diarnafacha'),
        'diarnafacha_project_details_callback',
        'project',
        'normal',
        'high'
    );

    // Service Details Meta Box
    add_meta_box(
        'diarna_service_details',
        esc_html__('إعدادات ومميزات الخدمة', 'diarnafacha'),
        'diarnafacha_service_details_callback',
        'service',
        'normal',
        'high'
    );

    // Testimonial Meta Box
    add_meta_box(
        'diarna_testimonial_details',
        esc_html__('بيانات تقييم العميل', 'diarnafacha'),
        'diarnafacha_testimonial_details_callback',
        'testimonial',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'diarnafacha_add_meta_boxes');

/**
 * Project Details Callback
 */
function diarnafacha_project_details_callback($post) {
    wp_nonce_field('diarna_save_project_meta', 'diarna_project_meta_nonce');

    $location    = get_post_meta($post->ID, '_project_location', true);
    $stone_type  = get_post_meta($post->ID, '_project_stone_type', true);
    $year        = get_post_meta($post->ID, '_project_year', true);
    $area        = get_post_meta($post->ID, '_project_area', true);
    $grid_layout = get_post_meta($post->ID, '_project_grid_layout', true);
    if (!$grid_layout) $grid_layout = 'standard';
    ?>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;padding:8px 0;">
        <p>
            <label for="project_location" style="display:block;font-weight:600;margin-bottom:4px;">
                <?php esc_html_e('الموقع / المدينة:', 'diarnafacha'); ?>
            </label>
            <input type="text" id="project_location" name="project_location" value="<?php echo esc_attr($location); ?>" style="width:100%;padding:8px;" placeholder="مثال: الرياض - حي الملقا" />
        </p>

        <p>
            <label for="project_stone_type" style="display:block;font-weight:600;margin-bottom:4px;">
                <?php esc_html_e('نوع الحجر وطريقة التركيب:', 'diarnafacha'); ?>
            </label>
            <input type="text" id="project_stone_type" name="project_stone_type" value="<?php echo esc_attr($stone_type); ?>" style="width:100%;padding:8px;" placeholder="مثال: حجر طبيعي - تركيب ميكانيكي" />
        </p>

        <p>
            <label for="project_year" style="display:block;font-weight:600;margin-bottom:4px;">
                <?php esc_html_e('سنة التنفيذ / مدة العمل:', 'diarnafacha'); ?>
            </label>
            <input type="text" id="project_year" name="project_year" value="<?php echo esc_attr($year); ?>" style="width:100%;padding:8px;" placeholder="مثال: 2024 / 45 يوماً" />
        </p>

        <p>
            <label for="project_area" style="display:block;font-weight:600;margin-bottom:4px;">
                <?php esc_html_e('المساحة التقريبية للواجهات (م²):', 'diarnafacha'); ?>
            </label>
            <input type="text" id="project_area" name="project_area" value="<?php echo esc_attr($area); ?>" style="width:100%;padding:8px;" placeholder="مثال: 550 م²" />
        </p>

        <p style="grid-column: span 2;">
            <label for="project_grid_layout" style="display:block;font-weight:600;margin-bottom:4px;">
                <?php esc_html_e('حجم الصورة في شبكة المعرض (Grid Layout):', 'diarnafacha'); ?>
            </label>
            <select id="project_grid_layout" name="project_grid_layout" style="width:100%;padding:8px;">
                <option value="standard" <?php selected($grid_layout, 'standard'); ?>>عادي / مربع (Standard / Square)</option>
                <option value="wide" <?php selected($grid_layout, 'wide'); ?>>عريض (Wide - يمتد على عمودين)</option>
                <option value="tall" <?php selected($grid_layout, 'tall'); ?>>طويل / رأسي (Tall - يمتد على صفين)</option>
            </select>
        </p>
    </div>
    <?php
}

/**
 * Service Details Callback
 */
function diarnafacha_service_details_callback($post) {
    wp_nonce_field('diarna_save_service_meta', 'diarna_service_meta_nonce');

    $subtitle = get_post_meta($post->ID, '_service_subtitle', true);
    $icon     = get_post_meta($post->ID, '_service_icon', true);
    $features = get_post_meta($post->ID, '_service_features', true);
    $wa_msg   = get_post_meta($post->ID, '_service_wa_msg', true);
    ?>
    <div style="padding:8px 0;">
        <p>
            <label for="service_subtitle" style="display:block;font-weight:600;margin-bottom:4px;">
                <?php esc_html_e('وصف مختصر للخدمة (يظهر أسفل العنوان):', 'diarnafacha'); ?>
            </label>
            <input type="text" id="service_subtitle" name="service_subtitle" value="<?php echo esc_attr($subtitle); ?>" style="width:100%;padding:8px;" placeholder="مثال: تنفيذ واجهات حجرية للفلل والمنازل الخاصة وفق أدق المخططات." />
        </p>

        <p>
            <label for="service_icon" style="display:block;font-weight:600;margin-bottom:4px;">
                <?php esc_html_e('أيقونة الخدمة:', 'diarnafacha'); ?>
            </label>
            <select id="service_icon" name="service_icon" style="width:100%;padding:8px;">
                <option value="facade" <?php selected($icon, 'facade'); ?>>واجهات عامة (Facade / Grid)</option>
                <option value="villa" <?php selected($icon, 'villa'); ?>>فيلا سكنية (Villa / House)</option>
                <option value="commercial" <?php selected($icon, 'commercial'); ?>>مشروع تجاري (Commercial Buildings)</option>
                <option value="building" <?php selected($icon, 'building'); ?>>عمارة وبرج (Residential Towers)</option>
            </select>
        </p>

        <p>
            <label for="service_features" style="display:block;font-weight:600;margin-bottom:4px;">
                <?php esc_html_e('مميزات ونقاط تفصيلية (اكتب كل ميزة في سطر منفصل):', 'diarnafacha'); ?>
            </label>
            <textarea id="service_features" name="service_features" rows="5" style="width:100%;padding:8px;" placeholder="تركيب ميكانيكي آمن ومطابق لكود البناء السعودي&#10;عزل حراري ورطوبة عالي الكفاءة&#10;ضمان شامل على التركيب والتثبيت"><?php echo esc_textarea($features); ?></textarea>
        </p>

        <p>
            <label for="service_wa_msg" style="display:block;font-weight:600;margin-bottom:4px;">
                <?php esc_html_e('رسالة واتساب مخصصة عند الضغط على طلب الخدمة:', 'diarnafacha'); ?>
            </label>
            <input type="text" id="service_wa_msg" name="service_wa_msg" value="<?php echo esc_attr($wa_msg); ?>" style="width:100%;padding:8px;" placeholder="السلام عليكم، أود الاستفسار عن خدمة واجهات الفلل لمشروعي." />
        </p>
    </div>
    <?php
}

/**
 * Testimonial Details Callback
 */
function diarnafacha_testimonial_details_callback($post) {
    wp_nonce_field('diarna_save_testimonial_meta', 'diarna_testimonial_meta_nonce');

    $role   = get_post_meta($post->ID, '_testimonial_role', true);
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    if (!$rating) $rating = '5';
    ?>
    <div style="padding:8px 0;">
        <p>
            <label for="testimonial_role" style="display:block;font-weight:600;margin-bottom:4px;">
                <?php esc_html_e('صفة العميل / المشروع:', 'diarnafacha'); ?>
            </label>
            <input type="text" id="testimonial_role" name="testimonial_role" value="<?php echo esc_attr($role); ?>" style="width:100%;padding:8px;" placeholder="مثال: مالك فيلا - حي النرجس" />
        </p>
        <p>
            <label for="testimonial_rating" style="display:block;font-weight:600;margin-bottom:4px;">
                <?php esc_html_e('التقييم (من 5 نجوم):', 'diarnafacha'); ?>
            </label>
            <select id="testimonial_rating" name="testimonial_rating" style="width:100%;padding:8px;">
                <option value="5" <?php selected($rating, '5'); ?>>⭐⭐⭐⭐⭐ (5 نجوم - ممتاز)</option>
                <option value="4" <?php selected($rating, '4'); ?>>⭐⭐⭐⭐ (4 نجوم - جيد جداً)</option>
            </select>
        </p>
    </div>
    <?php
}

/**
 * Save Meta Boxes Data
 */
function diarnafacha_save_meta_boxes($post_id) {
    // Autosave check
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) return;

    // 1. Project Meta
    if (isset($_POST['diarna_project_meta_nonce']) && wp_verify_nonce($_POST['diarna_project_meta_nonce'], 'diarna_save_project_meta')) {
        if (isset($_POST['project_location'])) update_post_meta($post_id, '_project_location', sanitize_text_field($_POST['project_location']));
        if (isset($_POST['project_stone_type'])) update_post_meta($post_id, '_project_stone_type', sanitize_text_field($_POST['project_stone_type']));
        if (isset($_POST['project_year'])) update_post_meta($post_id, '_project_year', sanitize_text_field($_POST['project_year']));
        if (isset($_POST['project_area'])) update_post_meta($post_id, '_project_area', sanitize_text_field($_POST['project_area']));
        if (isset($_POST['project_grid_layout'])) update_post_meta($post_id, '_project_grid_layout', sanitize_text_field($_POST['project_grid_layout']));
    }

    // 2. Service Meta
    if (isset($_POST['diarna_service_meta_nonce']) && wp_verify_nonce($_POST['diarna_service_meta_nonce'], 'diarna_save_service_meta')) {
        if (isset($_POST['service_subtitle'])) update_post_meta($post_id, '_service_subtitle', sanitize_text_field($_POST['service_subtitle']));
        if (isset($_POST['service_icon'])) update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
        if (isset($_POST['service_features'])) update_post_meta($post_id, '_service_features', sanitize_textarea_field($_POST['service_features']));
        if (isset($_POST['service_wa_msg'])) update_post_meta($post_id, '_service_wa_msg', sanitize_text_field($_POST['service_wa_msg']));
    }

    // 3. Testimonial Meta
    if (isset($_POST['diarna_testimonial_meta_nonce']) && wp_verify_nonce($_POST['diarna_testimonial_meta_nonce'], 'diarna_save_testimonial_meta')) {
        if (isset($_POST['testimonial_role'])) update_post_meta($post_id, '_testimonial_role', sanitize_text_field($_POST['testimonial_role']));
        if (isset($_POST['testimonial_rating'])) update_post_meta($post_id, '_testimonial_rating', sanitize_text_field($_POST['testimonial_rating']));
    }
}
add_action('save_post', 'diarnafacha_save_meta_boxes');
