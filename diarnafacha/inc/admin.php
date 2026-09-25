<?php
/**
 * WordPress Admin Dashboard Integration & Demo Data Setup
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Theme Options Page to WordPress Admin
 */
function diarnafacha_add_admin_menu() {
    add_menu_page(
        esc_html__('ديارنا الحديثة', 'diarnafacha'),
        esc_html__('ديارنا الحديثة', 'diarnafacha'),
        'manage_options',
        'diarnafacha-dashboard',
        'diarnafacha_admin_dashboard_page',
        'dashicons-building',
        3
    );

    add_submenu_page(
        'diarnafacha-dashboard',
        esc_html__('لوحة التحكم والإعدادات', 'diarnafacha'),
        esc_html__('لوحة التحكم', 'diarnafacha'),
        'manage_options',
        'diarnafacha-dashboard',
        'diarnafacha_admin_dashboard_page'
    );

    add_submenu_page(
        'diarnafacha-dashboard',
        esc_html__('تخصيص الهوية والمحتوى', 'diarnafacha'),
        esc_html__('تخصيص الهوية (Customizer)', 'diarnafacha'),
        'manage_options',
        'customize.php?autofocus[panel]=diarna_theme_panel'
    );
}
add_action('admin_menu', 'diarnafacha_add_admin_menu');

/**
 * Admin Dashboard Page Content
 */
function diarnafacha_admin_dashboard_page() {
    $demo_installed = false;

    // Handle One-Click Demo Content Generation
    if (isset($_POST['diarna_import_demo']) && check_admin_referer('diarna_import_demo_action', 'diarna_demo_nonce')) {
        diarnafacha_setup_initial_content();
        $demo_installed = true;
    }

    $projects_count = wp_count_posts('project')->publish;
    $services_count = wp_count_posts('service')->publish;
    $faq_count      = wp_count_posts('faq')->publish;
    $posts_count    = wp_count_posts('post')->publish;
    ?>
    <div class="wrap" style="max-width:1100px;font-family:system-ui,sans-serif;">
        <h1 style="display:flex;align-items:center;gap:12px;margin-bottom:20px;">
            <span class="dashicons dashicons-building" style="font-size:32px;width:32px;height:32px;color:#B08347;"></span>
            <?php esc_html_e('قالب ديارنا الحديثة — لوحة إدارة الموقع', 'diarnafacha'); ?>
        </h1>

        <?php if ($demo_installed): ?>
            <div class="notice notice-success is-dismissible" style="padding:12px 16px;">
                <p><strong><?php esc_html_e('تم تهيئة وإنشاء البيانات التجريبية والصفحات بنجاح! تم ربط الصفحات، تعيين صفحة المقالات الرئيسية، وتوليد المقالات والمشاريع والخدمات والأسئلة الشائعة.', 'diarnafacha'); ?></strong></p>
            </div>
        <?php endif; ?>

        <div style="display:grid;grid-template-columns:2fr 1fr;gap:24px;margin-top:20px;">
            <div>
                <!-- Status & Overview -->
                <div style="background:#fff;border:1px solid #ccd0d4;border-radius:8px;padding:24px;margin-bottom:24px;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
                    <h2 style="margin-top:0;font-size:20px;border-bottom:1px solid #eee;padding-bottom:12px;">
                        <?php esc_html_e('نظرة عامة على محتوى الموقع', 'diarnafacha'); ?>
                    </h2>
                    <div style="display:grid;grid-template-columns:repeat(4, 1fr);gap:14px;margin:20px 0;">
                        <div style="background:#F6F3EE;padding:16px;border-radius:6px;border-right:4px solid #B08347;text-align:center;">
                            <span style="font-size:26px;font-weight:bold;color:#2B2926;display:block;"><?php echo esc_html($projects_count); ?></span>
                            <span style="color:#6E6859;font-size:13px;"><?php esc_html_e('المشاريع المنفذة', 'diarnafacha'); ?></span>
                        </div>
                        <div style="background:#F6F3EE;padding:16px;border-radius:6px;border-right:4px solid #B08347;text-align:center;">
                            <span style="font-size:26px;font-weight:bold;color:#2B2926;display:block;"><?php echo esc_html($services_count); ?></span>
                            <span style="color:#6E6859;font-size:13px;"><?php esc_html_e('خدمات الواجهات', 'diarnafacha'); ?></span>
                        </div>
                        <div style="background:#F6F3EE;padding:16px;border-radius:6px;border-right:4px solid #B08347;text-align:center;">
                            <span style="font-size:26px;font-weight:bold;color:#2B2926;display:block;"><?php echo esc_html($posts_count); ?></span>
                            <span style="color:#6E6859;font-size:13px;"><?php esc_html_e('المقالات المنشورة', 'diarnafacha'); ?></span>
                        </div>
                        <div style="background:#F6F3EE;padding:16px;border-radius:6px;border-right:4px solid #B08347;text-align:center;">
                            <span style="font-size:26px;font-weight:bold;color:#2B2926;display:block;"><?php echo esc_html($faq_count); ?></span>
                            <span style="color:#6E6859;font-size:13px;"><?php esc_html_e('الأسئلة الشائعة', 'diarnafacha'); ?></span>
                        </div>
                    </div>

                    <p style="line-height:1.7;color:#444;">
                        <?php esc_html_e('مرحباً بك في قالب ديارنا الحديثة المتكامل لمقاولات الحجر والواجهات. تم بناء هذا القالب ليمنحك تحكماً شاملاً من لوحة ووردبريس مع الحفاظ الدقيق على الهوية المعمارية الراقية والسرعة الفائقة، وتوافقاً كاملاً مع إعدادات مقالات ووردبريس (الإعدادات > قراءة، التصنيفات، والوسوم).', 'diarnafacha'); ?>
                    </p>
                </div>

                <!-- One Click Demo Data Generator -->
                <div style="background:#fff;border:1px solid #ccd0d4;border-radius:8px;padding:24px;box-shadow:0 1px 3px rgba(0,0,0,0.05);">
                    <h2 style="margin-top:0;font-size:20px;border-bottom:1px solid #eee;padding-bottom:12px;">
                        <?php esc_html_e('تهيئة المحتوى التجريبي للموقع (1-Click Demo Setup)', 'diarnafacha'); ?>
                    </h2>
                    <p style="color:#555;line-height:1.7;">
                        <?php esc_html_e('إذا قمت بتثبيت القالب على موقع ووردبريس جديد، يمكنك بنقرة واحدة توليد كافة الصفحات الأساسية (الرئيسية، خدماتنا، معرض الأعمال، المقالات، من نحن، مراحل العمل، الأسئلة الشائعة، طلب عرض سعر، اتصل بنا) مع نماذج مقالات متخصصة وخدمات ومشاريع مطابقة للهوية المعمارية للموقع.', 'diarnafacha'); ?>
                    </p>
                    <form method="post" onsubmit="return confirm('هل ترغب في توليد الصفحات والمحتوى التجريبي المبدئي الآن؟');">
                        <?php wp_nonce_field('diarna_import_demo_action', 'diarna_demo_nonce'); ?>
                        <button type="submit" name="diarna_import_demo" class="button button-primary button-hero" style="background:#B08347;border-color:#946A34;">
                            <span class="dashicons dashicons-download" style="vertical-align:middle;margin-left:4px;"></span>
                            <?php esc_html_e('توليد وتهيئة الصفحات والمحتوى الآن', 'diarnafacha'); ?>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Quick Links Sidebar -->
            <div>
                <div style="background:#fff;border:1px solid #ccd0d4;border-radius:8px;padding:20px;box-shadow:0 1px 3px rgba(0,0,0,0.05);margin-bottom:20px;">
                    <h3 style="margin-top:0;"><?php esc_html_e('إجراءات سريعة للمقالات والمحتوى', 'diarnafacha'); ?></h3>
                    <ul style="line-height:2.2;margin:0;padding-right:20px;list-style:disc;">
                        <li><a href="<?php echo esc_url(admin_url('post-new.php')); ?>"><strong><?php esc_html_e('إضافة مقال جديد (WordPress Post)', 'diarnafacha'); ?></strong></a></li>
                        <li><a href="<?php echo esc_url(admin_url('edit-tags.php?taxonomy=category')); ?>"><?php esc_html_e('إدارة تصنيفات المقالات', 'diarnafacha'); ?></a></li>
                        <li><a href="<?php echo esc_url(admin_url('options-reading.php')); ?>"><?php esc_html_e('إعدادات القراءة وعدد المقالات', 'diarnafacha'); ?></a></li>
                        <li><a href="<?php echo esc_url(admin_url('post-new.php?post_type=project')); ?>"><?php esc_html_e('إضافة مشروع واجهة جديد', 'diarnafacha'); ?></a></li>
                        <li><a href="<?php echo esc_url(admin_url('post-new.php?post_type=service')); ?>"><?php esc_html_e('إضافة خدمة جديدة', 'diarnafacha'); ?></a></li>
                        <li><a href="<?php echo esc_url(admin_url('post-new.php?post_type=faq')); ?>"><?php esc_html_e('إضافة سؤال شائع وجواب', 'diarnafacha'); ?></a></li>
                        <li><a href="<?php echo esc_url(admin_url('customize.php?autofocus[panel]=diarna_theme_panel')); ?>"><?php esc_html_e('تخصيص الهوية والمدونة', 'diarnafacha'); ?></a></li>
                        <li><a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><?php esc_html_e('إدارة قوائم التصفح', 'diarnafacha'); ?></a></li>
                    </ul>
                </div>

                <div style="background:#2B2926;color:#EFEAE1;border-radius:8px;padding:20px;">
                    <h3 style="margin-top:0;color:#D6B47D;"><?php esc_html_e('الدعم والتوثيق', 'diarnafacha'); ?></h3>
                    <p style="font-size:13px;line-height:1.7;color:#ccc;">
                        <?php esc_html_e('القالب متوافق 100% مع نظام مقالات ووردبريس ومحرر المكونات Gutenberg وكلاسيك إيديتور ويدعم الصور البارزة والوسوم والتصنيفات ونظام التعليقات.', 'diarnafacha'); ?>
                    </p>
                    <p style="font-size:13px;margin-bottom:0;">
                        <strong><?php esc_html_e('الإصدار:', 'diarnafacha'); ?></strong> 1.1.0
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Setup Initial Demo Content helper
 */
function diarnafacha_setup_initial_content() {
    // 1. Create Core Pages
    $pages = array(
        'الرئيسية'        => array('slug' => 'home', 'template' => ''),
        'خدماتنا'         => array('slug' => 'services', 'template' => 'page-templates/page-services.php'),
        'معرض الأعمال'    => array('slug' => 'gallery', 'template' => 'page-templates/page-gallery.php'),
        'المقالات'        => array('slug' => 'blog', 'template' => ''),
        'من نحن'          => array('slug' => 'about', 'template' => 'page-templates/page-about.php'),
        'مراحل العمل'     => array('slug' => 'process', 'template' => 'page-templates/page-process.php'),
        'الأسئلة الشائعة' => array('slug' => 'faq', 'template' => 'page-templates/page-faq.php'),
        'طلب عرض سعر'     => array('slug' => 'quote', 'template' => 'page-templates/page-quote.php'),
        'اتصل بنا'        => array('slug' => 'contact', 'template' => 'page-templates/page-contact.php'),
    );

    $front_page_id = 0;
    $blog_page_id  = 0;

    foreach ($pages as $title => $data) {
        $existing = get_page_by_path($data['slug']);
        if (!$existing) {
            $page_id = wp_insert_post(array(
                'post_title'     => $title,
                'post_name'      => $data['slug'],
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'comment_status' => 'closed',
            ));
            if ($data['template'] && !is_wp_error($page_id)) {
                update_post_meta($page_id, '_wp_page_template', $data['template']);
            }
            if ($data['slug'] === 'home' && !is_wp_error($page_id)) {
                $front_page_id = $page_id;
            }
            if ($data['slug'] === 'blog' && !is_wp_error($page_id)) {
                $blog_page_id = $page_id;
            }
        } else {
            if ($data['slug'] === 'home') {
                $front_page_id = $existing->ID;
            }
            if ($data['slug'] === 'blog') {
                $blog_page_id = $existing->ID;
            }
        }
    }

    // Set Front Page and Posts Page (Reading Settings)
    if ($front_page_id) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page_id);
    }
    if ($blog_page_id) {
        update_option('page_for_posts', $blog_page_id);
    }

    // 2. Create Initial Architectural Articles / Posts
    $articles_data = array(
        array(
            'title'    => 'دليلك الشامل لاختيار حجر واجهات الفلل في الرياض',
            'content'  => "تعد واجهة الفيلا بمثابة بطاقة التعريف الأولى التي تعكس ذوق صاحب المنزل وفخامته المعمارية. وفي مناخ مدينة الرياض ذي الصيف الحار والجاف، يصبح اختيار نوع الحجر الطبيعي قراراً هندسياً حاسماً يتجاوز المظهر الجمالي المجرد.\n\n<!--more-->\n\n## 1. حجر الرياض الطبيعي (الأصفر والأبيض الكريمي)\nيتميز حجر الرياض الطبيعي المستخرج من محاجر المنطقة بصلابته العالية وقدرته الاستثنائية على امتصاص الصدمات الحرارية ومقاومة درجات الحرارة المرتفعة التي تتجاوز 45 درجة مئوية في فصل الصيف دون أن يتأثر لونه أو بنيته الفيزيائية.\n\n## 2. حجر الترافنتينو (Travertine)\nاكتسب الترافنتينو شعبية كبرى في الواجهات المودرن في أحياء شمال الرياض (حطين، النرجس، الياسمين) بفضل تعريقاته الطبيعية ومظهره العصري الأنيق. ونوصي دائماً بتثبيته ميكانيكياً باستخدام زوايا ستانلس ستيل مع عزل مائي خلفي.\n\n## 3. الحجر الأردني والحجر السوري\nيمتاز بتنوع ألوانه ودقة تفاصيله وقابليته للزخرفة والنحت، وهو ممتاز للفلل ذات الطابع الكلاسيكي والنيوكلاسيك.\n\n### نصيحة ديارنا الحديثة:\nاحرص دائماً على تطبيق مادة حماية شفافة (Silicone Water Repellent) بعد انتهاء التركيب لضمان حماية مسام الحجر من ذرات الغبار والأتربة والاحتفاظ بلونه الأصلي لسنوات طويلة.",
            'category' => 'نصائح وإرشادات',
            'tags'     => array('حجر الرياض', 'واجهات فلل', 'ترافنتينو', 'كود البناء'),
        ),
        array(
            'title'    => 'التركيب الميكانيكي مقابل الخلطة الأسمنتية: أيهما أفضل لواجهتك؟',
            'content'  => "يدور تساؤل متكرر بين ملاك المشاريع والمباني في الرياض حول الفروقات الحقيقية بين أسلوب التركيب الميكانيكي وأسلوب التركيب التقليدي بالخلطة الأسمنتية.\n\n<!--more-->\n\n## ما هو التركيب الميكانيكي؟\nهو نظام تثبيت ألواح الحجر بواسطة إكسسوارات معدنية غير قابلة للصدأ (زوايا، براغي، وبراشيم من الستانلس ستيل 304 أو المجلفن على الساخن) تُثبت في الهيكل الخرساني أو البلوك مباشرة، مع ترك فراغ هوائي خلف الحجر يتراوح بين 3 إلى 5 سم.\n\n## مميزات التركيب الميكانيكي:\n1. **أمان تام ضد السقوط:** يتحمل التمدد والانكماش الناتج عن الفروقات الحرارية الحادة بين ليل ونهار الرياض.\n2. **عزل حراري مدمج:** الفراغ الهوائي خلف الحجر يعمل كطبقة عزل إضافية تقلل انتقال حرارة الشمس إلى جدران المبنى بنسبة تتجاوز 30%.\n3. **سهولة الصيانة:** إمكانية استبدال أي لوح متضرر بشكل منفصل دون التأثير على باقي الألواح المجاورة.\n\n## متى يُستخدم التركيب بالخلطة؟\nيُستخدم في الارتفاعات المنخفضة جداً (الأحواش والأسوار الأرضية) وتحت إشراف هندسي للتأكد من خلو الرمل والماء من الأملاح الضارة.",
            'category' => 'مقارنات فنية',
            'tags'     => array('تركيب ميكانيكي', 'خلطة اسمنتية', 'عزل حراري', 'أمان الواجهات'),
        ),
        array(
            'title'    => 'أهم اشتراطات كود البناء السعودي للواجهات الحجرية الخارجية',
            'content'  => "وضع كود البناء السعودي (SBC) معايير دقيقة وملزمة تهدف إلى حماية الأرواح والممتلكات وضمان كفاءة الطاقة واستدامة المباني السكنية والتجارية.\n\n<!--more-->\n\n## الاشتراطات الهندسية الأساسية:\n- **سماكة ألواح الحجر:** ألا تقل سماكة حجر الواجهات في التركيب الميكانيكي عن 30 ملم (3 سم) لضمان متانة ثقوب المسامير وتفادي التكسر تحت ضغط الرياح.\n- **نوعية المسامير والزوايا:** اشتراط استخدام معادن مقاومة للصدأ والتآكل (Stainless Steel Grade 304 or 316) واعتماد حسابات الأحمال الهندسية من مكتب معتمد.\n- **طبقة العزل الحراري ومقاومة الحريق:** إلزامية تركيب ألواح الصوف الصخري (Rockwool) بكثافة لا تقل عن 50 كجم/م³ خلف الحجر مع حواجز نارية (Fire Stops) بين الطوابق.\n- **فواصل التمدد (Expansion Joints):** ترك فواصل تمدد رأسية وأفقية كل 6 إلى 9 أمتار وملئها بمادة سيليكون إنشائي مرن ومقاوم للأشعة فوق البنفسجية.\n\nنحن في **شركة ديارنا الحديثة** نلتزم التزاماً كاملاً بجميع بنود الكود ونقدم للعميل تقارير هندسية معتمدة لكل مرحلة من مراحل التنفيذ.",
            'category' => 'كود البناء السعودي',
            'tags'     => array('كود البناء السعودي', 'اشتراطات بلدية', 'صوف صخري', 'سلامة المنشآت'),
        ),
    );

    foreach ($articles_data as $art) {
        $check = get_page_by_title($art['title'], OBJECT, 'post');
        if (!$check) {
            $post_id = wp_insert_post(array(
                'post_title'   => $art['title'],
                'post_content' => $art['content'],
                'post_status'  => 'publish',
                'post_type'    => 'post',
            ));

            if (!is_wp_error($post_id)) {
                // Assign category
                if (!empty($art['category'])) {
                    wp_set_object_terms($post_id, $art['category'], 'category');
                }
                // Assign tags
                if (!empty($art['tags'])) {
                    wp_set_post_tags($post_id, $art['tags']);
                }
            }
        }
    }

    // 2. Create Initial Services
    $services_data = array(
        array(
            'title'    => 'تنفيذ الواجهات الحجرية',
            'sub'      => 'تنفيذ الواجهات وفق المخططات والتصميم المعماري للمشروع.',
            'icon'     => 'facade',
            'features' => "تنفيذ مطابق للمخططات والتصميم\nتركيب ميكانيكي آمن\nعزل حراري ورطوبة",
        ),
        array(
            'title'    => 'واجهات الفلل',
            'sub'      => 'تنفيذ واجهات حجرية للفلل والمنازل الخاصة بأرقى التفاصيل.',
            'icon'     => 'villa',
            'features' => "تصاميم فلل مودرن وكلاسيك\nحجر طبيعي نخب أول\nضمان شامل على الأعمال",
        ),
        array(
            'title'    => 'الواجهات التجارية',
            'sub'      => 'تنفيذ واجهات للمشاريع والمنشآت التجارية والمباني الإدارية.',
            'icon'     => 'commercial',
            'features' => "تنفيذ سريع ومتقن\nتحمل للظروف الجوية\nمظهر معماري جذاب",
        ),
    );

    foreach ($services_data as $srv) {
        $check = get_page_by_title($srv['title'], OBJECT, 'service');
        if (!$check) {
            $srv_id = wp_insert_post(array(
                'post_title'   => $srv['title'],
                'post_content' => $srv['sub'],
                'post_status'  => 'publish',
                'post_type'    => 'service',
            ));
            if (!is_wp_error($srv_id)) {
                update_post_meta($srv_id, '_service_subtitle', $srv['sub']);
                update_post_meta($srv_id, '_service_icon', $srv['icon']);
                update_post_meta($srv_id, '_service_features', $srv['features']);
            }
        }
    }

    // 3. Create Initial FAQ
    $faqs_data = array(
        array(
            'q' => 'ما الفرق بين التركيب الميكانيكي والتركيب بالخلطة الأسمنتية؟',
            'a' => 'التركيب الميكانيكي يعتمد على زوايا وبراغي ستانلس ستيل مثبتة بالخرسانة مباشرة مع ترك فراغ هوائي يعمل كعازل حراري ممتاز ويمنع سقوط الحجر بفعل عوامل التمدد والانكماش. أما الخلطة الأسمنتية فتعتمد على الالتصاق المباشر وهي مناسبة لبعض الارتفاعات البسيطة.'
        ),
        array(
            'q' => 'ما هو نوع الحجر الأنسب لواجهات الفلل في الرياض؟',
            'a' => 'يعتمد الاختيار على الطابع المعماري (مودرن أو نيو كلاسيك). يعتبر الحجر الطبيعي مثل حجر الرياض والبيج والترافنتينو والرخام المعالج من الخيارات المثالية لمقاومتها العالية لحرارة الصيف وجفاف الطقس.'
        ),
        array(
            'q' => 'كم يستغرق تنفيذ واجهة فيلا سكنية متوسطة؟',
            'a' => 'عادة ما تستغرق واجهة الفيلا السكنية ما بين 30 إلى 60 يوم عمل حسب المساحة ودقة التفاصيل والكرانيش والقصات المعمارية.'
        ),
    );

    foreach ($faqs_data as $faq) {
        $check = get_page_by_title($faq['q'], OBJECT, 'faq');
        if (!$check) {
            wp_insert_post(array(
                'post_title'   => $faq['q'],
                'post_content' => $faq['a'],
                'post_status'  => 'publish',
                'post_type'    => 'faq',
            ));
        }
    }
}
