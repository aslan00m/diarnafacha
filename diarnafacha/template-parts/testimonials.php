<?php
/**
 * Template part: Testimonials Section
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$testimonials_query = new WP_Query(array(
    'post_type'      => 'testimonial',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
));
?>

<section class="section section--tint">
    <div class="container">
        <div class="section-head center" data-reveal>
            <span class="eyebrow"><?php esc_html_e('ثقة العملاء', 'diarnafacha'); ?></span>
            <h2 class="h2"><?php esc_html_e('ماذا يقول عملاؤنا عنا', 'diarnafacha'); ?></h2>
            <p class="lead"><?php esc_html_e('فخورون بثقة عملائنا في مشاريعهم السكنية والتجارية بالرياض.', 'diarnafacha'); ?></p>
        </div>

        <div class="grid-3">
            <?php if ($testimonials_query->have_posts()) : ?>
                <?php while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                    $role   = get_post_meta(get_the_ID(), '_testimonial_role', true);
                    $rating = intval(get_post_meta(get_the_ID(), '_testimonial_rating', true));
                    if (!$rating) $rating = 5;
                ?>
                    <article class="card" style="padding:28px;" data-reveal>
                        <div style="color:#B08347;margin-bottom:12px;font-size:18px;">
                            <?php echo str_repeat('★', $rating); ?>
                        </div>
                        <p style="font-size:15px;line-height:1.8;margin-bottom:20px;color:#3A3733;">
                            "<?php echo esc_html(get_the_content()); ?>"
                        </p>
                        <div>
                            <strong style="display:block;font-size:16px;color:#2B2926;"><?php the_title(); ?></strong>
                            <?php if ($role) : ?>
                                <span style="font-size:13px;color:#6E6859;"><?php echo esc_html($role); ?></span>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Default Testimonials -->
                <article class="card" style="padding:28px;" data-reveal>
                    <div style="color:#B08347;margin-bottom:12px;font-size:18px;">★★★★★</div>
                    <p style="font-size:15px;line-height:1.8;margin-bottom:20px;color:#3A3733;">
                        "تعامل ممتاز والتزام تام بالمخططات المعمارية. دقة تركيب الحجر الميكانيكي والفواصل أظهرت الفيلا بشكل يفوق التوقعات."
                    </p>
                    <div>
                        <strong style="display:block;font-size:16px;color:#2B2926;">م. عبدالله القحطاني</strong>
                        <span style="font-size:13px;color:#6E6859;">مالك فيلا سكنية - حي النرجس</span>
                    </div>
                </article>

                <article class="card" style="padding:28px;" data-reveal>
                    <div style="color:#B08347;margin-bottom:12px;font-size:18px;">★★★★★</div>
                    <p style="font-size:15px;line-height:1.8;margin-bottom:20px;color:#3A3733;">
                        "سرعة إنجاز واحترافية عالية في تنفيذ واجهة المبنى التجاري. فريق ديارنا الحديثة ذو خبرة حقيقية وملم بكود البناء."
                    </p>
                    <div>
                        <strong style="display:block;font-size:16px;color:#2B2926;">أبو فهد العتيبي</strong>
                        <span style="font-size:13px;color:#6E6859;">مستثمر تجاري - الرياض</span>
                    </div>
                </article>

                <article class="card" style="padding:28px;" data-reveal>
                    <div style="color:#B08347;margin-bottom:12px;font-size:18px;">★★★★★</div>
                    <p style="font-size:15px;line-height:1.8;margin-bottom:20px;color:#3A3733;">
                        "تجديد الواجهة القديمة للفيلا وتحويلها إلى نمط مودرن كان تحدياً كبيراً، ولكن النتيجة النهائية كانت مبهرة."
                    </p>
                    <div>
                        <strong style="display:block;font-size:16px;color:#2B2926;">سعود الشمري</strong>
                        <span style="font-size:13px;color:#6E6859;">مشروع تجديد واجهة - حي الملقا</span>
                    </div>
                </article>
            <?php endif; ?>
        </div>
    </div>
</section>
