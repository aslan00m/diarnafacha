<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">

    <section class="section" style="min-height:70vh;display:flex;align-items:center;">
        <div class="container" style="text-align:center;max-width:700px;">
            <span class="eyebrow" style="justify-content:center;"><?php esc_html_e('خطأ 404', 'diarnafacha'); ?></span>
            <h1 class="h1" style="font-size:clamp(48px, 8vw, 96px);color:var(--c-accent);margin-bottom:16px;">404</h1>
            <h2 class="h2" style="margin-bottom:16px;"><?php esc_html_e('الصفحة المطلوبة غير موجودة', 'diarnafacha'); ?></h2>
            <p class="lead" style="margin-bottom:32px;color:var(--c-muted);">
                <?php esc_html_e('عذراً، الصفحة التي تبحث عنها قد تكون تم نقلها أو حذفها، أو أن الرابط غير صحيح.', 'diarnafacha'); ?>
            </p>
            <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary btn--lg">
                    <?php esc_html_e('العودة للرئيسية', 'diarnafacha'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/services/')); ?>" class="btn btn--outline btn--lg">
                    <?php esc_html_e('تصفح خدماتنا', 'diarnafacha'); ?>
                </a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
