<?php
/**
 * Numeric Pagination Component
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

the_posts_pagination(array(
    'mid_size'           => 2,
    'prev_text'          => diarnafacha_icon('arrow-left') . ' ' . esc_html__('السابق', 'diarnafacha'),
    'next_text'          => esc_html__('التالي', 'diarnafacha') . ' ' . diarnafacha_icon('arrow-left'),
    'screen_reader_text' => esc_html__('تصفح الصفحات', 'diarnafacha'),
));
