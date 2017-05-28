<?php if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) return; ?>
<?php
	/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<!-- You can start editing here. -->

<div id="commentsbox">
<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number(__('Chưa có bình luận',''), __('1 bình luận',''), __('% bình luận','') );?><?php _e(' :',''); ?></h3>
	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>

	<div class="comment-nav">
		<div class="alignleft">
			<?php previous_comments_link() ?>
		</div>

		<div class="alignright">
			<?php next_comments_link() ?>
		</div>
	</div>

<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( ! comments_open() && ! is_page() ) : ?>
		<?php _e('Comments are closed.','incart-lite'); ?>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
	<div id="comment-form">
		<?php comment_form(); ?>
	</div>
<?php endif; // if you delete this the sky will fall on your head ?>
</div>