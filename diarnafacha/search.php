<?php
/**
 * The template for displaying search results pages
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container page-hero__inner" data-reveal>
            <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
            <span class="eyebrow"><?php esc_html_e('نتائج البحث', 'diarnafacha'); ?></span>
            <h1 class="h1">
                <?php printf(esc_html__('نتائج البحث عن: "%s"', 'diarnafacha'), '<span>' . get_search_query() . '</span>'); ?>
            </h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="grid-3">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?> data-reveal>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="card__media">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('diarna-project-card'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="card__body">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                                <a href="<?php the_permalink(); ?>" class="card__link">
                                    <?php esc_html_e('عرض التفاصيل', 'diarnafacha'); ?>
                                    <?php echo diarnafacha_icon('arrow-left'); ?>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <div style="margin-top:40px;text-align:center;">
                    <?php get_template_part('template-parts/sections/pagination'); ?>
                </div>
            <?php else : ?>
                <div style="text-align:center;padding:60px 20px;background:#fff;border-radius:var(--radius);max-width:700px;margin:0 auto;box-shadow:var(--shadow-sm);">
                    <h2 style="margin-bottom:12px;"><?php esc_html_e('لم يتم العثور على أي نتائج مطابقة.', 'diarnafacha'); ?></h2>
                    <p style="color:#6E6859;margin-bottom:24px;"><?php esc_html_e('يرجى تجربة كلمات بحث أخرى أو تصفح خدماتنا ومشاريعنا من القائمة العلوية.', 'diarnafacha'); ?></p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary"><?php esc_html_e('العودة للرئيسية', 'diarnafacha'); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part('template-parts/final-cta'); ?>

</main>

<?php
get_footer();
