<?php
/**
 * The template for displaying all single posts (Articles)
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) : the_post();
    $categories = get_the_category();
    $primary_cat = !empty($categories) ? $categories[0]->name : '';
    $reading_time = function_exists('diarnafacha_reading_time') ? diarnafacha_reading_time(get_the_ID()) : 4;
    $share_url = urlencode(get_permalink());
    $share_title = urlencode(get_the_title());
    $wa_share = "https://wa.me/?text=" . $share_title . "%20" . $share_url;
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container page-hero__inner" data-reveal>
            <?php get_template_part('template-parts/sections/breadcrumbs'); ?>
            
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;flex-wrap:wrap;">
                <?php if ($primary_cat) : ?>
                    <span class="card__badge" style="position:static;display:inline-block;">
                        <?php echo esc_html($primary_cat); ?>
                    </span>
                <?php endif; ?>
                <span class="meta-item" style="color:#D6B47D;font-size:13px;display:inline-flex;align-items:center;gap:6px;">
                    <?php echo diarnafacha_icon('clock'); ?>
                    <span><?php printf(esc_html__('%d دقائق قراءة', 'diarnafacha'), $reading_time); ?></span>
                </span>
                <span class="meta-item" style="color:rgba(255,255,255,0.7);font-size:13px;display:inline-flex;align-items:center;gap:6px;">
                    <?php echo diarnafacha_icon('calendar'); ?>
                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                </span>
            </div>

            <h1 class="h1"><?php the_title(); ?></h1>
        </div>
    </section>

    <section class="section">
        <div class="container" style="max-width:920px;">
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-article'); ?>>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="single-article__featured" data-reveal>
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="single-article__content" data-reveal>
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('الصفحات:', 'diarnafacha'),
                        'after'  => '</div>',
                    ));
                    ?>

                    <?php if (has_tag()) : ?>
                        <div class="single-article__tags">
                            <span class="tags-label"><?php echo diarnafacha_icon('tag'); ?> <?php esc_html_e('الوسوم:', 'diarnafacha'); ?></span>
                            <?php the_tags('', ' ', ''); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Share on WhatsApp / Socials -->
                    <div class="single-article__share">
                        <strong><?php esc_html_e('مشاركة هذا المقال:', 'diarnafacha'); ?></strong>
                        <a href="<?php echo esc_url($wa_share); ?>" target="_blank" rel="noopener" class="btn btn--outline btn--sm" style="display:inline-flex;align-items:center;gap:8px;">
                            <?php echo diarnafacha_icon('whatsapp'); ?>
                            <span><?php esc_html_e('واتساب', 'diarnafacha'); ?></span>
                        </a>
                    </div>
                </div>

                <!-- Author Box -->
                <div class="single-article__author" data-reveal>
                    <div class="author-avatar">
                        <?php echo get_avatar(get_the_author_meta('ID'), 64); ?>
                    </div>
                    <div>
                        <span class="author-label"><?php esc_html_e('كُتب بواسطة الفريق الهندسي', 'diarnafacha'); ?></span>
                        <h4 class="author-name"><?php echo esc_html(get_the_author()); ?></h4>
                        <p class="author-bio">
                            <?php echo esc_html(get_the_author_meta('description') ?: __('فريق التحرير والاستشارات الهندسية في شركة ديارنا الحديثة للاستثمار ومقاولات الواجهات الحجرية بالرياض.', 'diarnafacha')); ?>
                        </p>
                    </div>
                </div>

                <?php
                // Related Posts
                if (!empty($categories)) {
                    $related_query = new WP_Query(array(
                        'category__in'   => array($categories[0]->term_id),
                        'post__not_in'   => array(get_the_ID()),
                        'posts_per_page' => 2,
                        'ignore_sticky_posts' => 1,
                    ));

                    if ($related_query->have_posts()) : ?>
                        <div class="single-article__related" style="margin-top:56px;" data-reveal>
                            <h3 style="font-size:22px;margin-bottom:24px;"><?php esc_html_e('مقالات ذات صلة بالموضوع', 'diarnafacha'); ?></h3>
                            <div class="grid-2">
                                <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                                    <?php get_template_part('template-parts/sections/card-post'); ?>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php endif;
                }
                ?>

                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </article>
        </div>
    </section>

    <?php get_template_part('template-parts/final-cta'); ?>

</main>

<?php
endwhile;

get_footer();
