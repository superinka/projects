<?php
/**
 * The template for displaying a "No posts found" message.
 */
?>
<div class="post">
	<h2>
	  <?php _e('Không tìm thấy',''); ?>
	</h2>
</div>
<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', '' ), admin_url( 'post-new.php' ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', '' ); ?></p>
	<?php get_search_form(); ?>
	<?php else : ?>
		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', '' ); ?></p>
	    <div class="topsearch-entry">
          <?php get_search_form(); ?>
        </div>
	<?php endif; ?>
</div><!-- page-content -->