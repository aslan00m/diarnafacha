<?php
/**
 * Card Component: Single Blog Post / Article
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$categories = get_the_category();
$primary_cat = !empty($categories) ? $categories[0]->name : '';
$primary_cat_link = !empty($categories) ? get_category_link($categories[0]->term_id) : '#';

$thumb = has_post_thumbnail() 
    ? get_the_post_thumbnail_url(get_the_ID(), 'diarna-project-card') 
    : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=70';

$reading_time = function_exists('diarnafacha_reading_time') ? diarnafacha_reading_time(get_the_ID()) : 4;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card card--post'); ?> data-reveal>
    <div class="card__media">
        <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async" width="800" height="550">
        </a>
        <?php if ($primary_cat) : ?>
            <a href="<?php echo esc_url($primary_cat_link); ?>" class="card__badge">
                <?php echo esc_html($primary_cat); ?>
            </a>
        <?php endif; ?>
    </div>

    <div class="card__body">
        <div class="card__meta">
            <span class="meta-item">
                <?php echo diarnafacha_icon('calendar'); ?>
                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
            </span>
            <span class="meta-sep">·</span>
            <span class="meta-item">
                <?php echo diarnafacha_icon('clock'); ?>
                <span><?php printf(esc_html__('%d دقائق قراءة', 'diarnafacha'), $reading_time); ?></span>
            </span>
        </div>

        <h3 class="card__title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>

        <p class="card__desc">
            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
        </p>

        <a href="<?php the_permalink(); ?>" class="card__link">
            <span><?php esc_html_e('اقرأ المقال بالكامل', 'diarnafacha'); ?></span>
            <?php echo diarnafacha_icon('arrow-left'); ?>
        </a>
    </div>
</article>
