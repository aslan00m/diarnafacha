<?php
/**
 * The template for displaying comments
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area" style="margin-top:56px;padding-top:36px;border-top:1px solid var(--c-line);" data-reveal>

    <?php if (have_comments()) : ?>
        <h3 class="comments-title" style="font-size:22px;margin-bottom:24px;">
            <?php
            $diarnafacha_comment_count = get_comments_number();
            if ('1' === $diarnafacha_comment_count) {
                printf(
                    /* translators: 1: title. */
                    esc_html__('تعليق واحد على &ldquo;%1$s&rdquo;', 'diarnafacha'),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            } else {
                printf(
                    /* translators: 1: comment count number, 2: title. */
                    esc_html(_nx('%1$s تعليقات على &ldquo;%2$s&rdquo;', '%1$s تعليق على &ldquo;%2$s&rdquo;', $diarnafacha_comment_count, 'comments title', 'diarnafacha')),
                    number_format_i18n($diarnafacha_comment_count),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            }
            ?>
        </h3>

        <ol class="comment-list" style="list-style:none;padding:0;margin:0 0 40px;display:flex;flex-direction:column;gap:20px;">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 48,
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation(array(
            'prev_text' => diarnafacha_icon('arrow-left') . ' ' . esc_html__('تعليقات أقدم', 'diarnafacha'),
            'next_text' => esc_html__('تعليقات أحدث', 'diarnafacha') . ' ' . diarnafacha_icon('arrow-left'),
        ));
        ?>

        <?php if (!comments_open()) : ?>
            <p class="no-comments" style="color:var(--c-muted);font-size:14px;"><?php esc_html_e('التعليقات مغلقة لهذا المقال.', 'diarnafacha'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply'          => esc_html__('اترك تعليقاً أو استفساراً', 'diarnafacha'),
        'title_reply_to'       => esc_html__('الرد على %s', 'diarnafacha'),
        'cancel_reply_link'    => esc_html__('إلغاء الرد', 'diarnafacha'),
        'label_submit'         => esc_html__('نشر التعليق', 'diarnafacha'),
        'class_submit'         => 'btn btn--primary',
        'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
        'comment_notes_before' => '<p style="color:var(--c-muted);font-size:13.5px;margin-bottom:16px;">' . esc_html__('لن يتم نشر بريدك الإلكتروني. الحقول الإلزامية مشار إليها بالعلامة *', 'diarnafacha') . '</p>',
    ));
    ?>

</div>
