<?php
/**
 * The template for displaying comments
 */

// If the current post is protected by a password and the visitor has not entered the password, return early.
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h3 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ('1' === $comments_number) {
                printf(_x('Yksi kommentti "%2$s"', 'comments title', 'rengasliike-lappeenranta'), number_format_i18n($comments_number), get_the_title());
            } else {
                printf(_nx('%1$s kommentti "%2$s"', '%1$s kommenttia "%2$s"', $comments_number, 'comments title', 'rengasliike-lappeenranta'), number_format_i18n($comments_number), get_the_title());
            }
            ?>
        </h3>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 60,
            ));
            ?>
        </ol>

        <?php
        // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        ?>
        <nav class="comment-navigation" role="navigation">
            <h4 class="screen-reader-text"><?php _e('Comment navigation', 'rengasliike-lappeenranta'); ?></h4>
            <div class="nav-links">
                <div class="nav-previous"><?php previous_comments_link(__('← Vanhemmat kommentit', 'rengasliike-lappeenranta')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Uudemmat kommentit →', 'rengasliike-lappeenranta')); ?></div>
            </div>
        </nav>
        <?php endif; ?>

        <?php
        // If comments are closed and there are comments, let's leave a little note.
        if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p class="no-comments"><?php _e('Kommentit on suljettu.', 'rengasliike-lappeenranta'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply' => __('Jätä kommentti', 'rengasliike-lappeenranta'),
        'title_reply_to' => __('Vastaa %s', 'rengasliike-lappeenranta'),
        'cancel_reply_link' => __('Peruuta vastaus', 'rengasliike-lappeenranta'),
        'label_submit' => __('Lähetä kommentti', 'rengasliike-lappeenranta'),
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x('Kommentti', 'noun', 'rengasliike-lappeenranta') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . __('Kirjoita kommenttisi tähän...', 'rengasliike-lappeenranta') . '"></textarea></p>',
    ));
    ?>

</div> 