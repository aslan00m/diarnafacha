<?php
/**
 * Project Card Component for Gallery
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$layout = get_post_meta(get_the_ID(), '_project_grid_layout', true);
$class = 'gitem';
if ($layout === 'wide') $class .= ' gitem--wide';
if ($layout === 'tall') $class .= ' gitem--tall';

$terms = get_the_terms(get_the_ID(), 'project_category');
$cat_slugs = array();
if ($terms && !is_wp_error($terms)) {
    foreach ($terms as $term) {
        $cat_slugs[] = $term->slug;
    }
}
$data_cat = !empty($cat_slugs) ? implode(' ', $cat_slugs) : 'all';

$thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=70';
?>

<figure class="<?php echo esc_attr($class); ?>" data-cat="<?php echo esc_attr($data_cat); ?>">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
    </a>
</figure>
