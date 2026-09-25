<?php
/**
 * The sidebar containing the main widget area
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area" style="background:#fff;border-radius:var(--radius);padding:28px;box-shadow:var(--shadow-sm);">
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>
