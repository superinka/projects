<?php 
/**
* The template for displaying Category pages.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*/

get_header(); ?>

<div class="main-wrapper-item">
	<div class="bread-title-holder">
		<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>
		<div class="container">
			<div class="row-fluid">
				<div class="container_inner clearfix">
					<h1 class="title">
						<?php printf( __( 'Category Archives : %s', '' ), '<span>' . single_cat_title( '', false ) . '</span>' );?> 	
					</h1>

					<?php
							if ((class_exists('incart_breadcrumb_class'))) {$incart_breadcumb->custom_breadcrumb();}
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="container post-wrap"> 
		<div class="row-fluid">
			<div id="container" class="col-md-9 col-xs-12">
				<div id="content">
					<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
					<?php get_template_part( 'content/content', get_post_format() ); ?>
					<?php endwhile; ?>
					<?php
						$prev_link = get_previous_posts_link('&larr;Previous');
						$next_link = get_next_posts_link('Next&rarr;');
						if($prev_link || $next_link){
						?>
						<div class="navigation blog-navigation">			
							<div class="alignleft"><?php previous_posts_link(__('&larr;Previous','incart-lite')) ?></div>		
							<div class="alignright"><?php next_posts_link(__('Next&rarr;','incart-lite'),'') ?></div>    						
						</div>  
						<?php
						}
					?> 
					<?php else :  ?>
					<?php get_template_part( 'templates/content/none' ); ?>
					<?php endif; ?>
				</div>
				<!-- content --> 
			</div>
			<!-- container --> 
			
			<!-- Sidebar -->
			<div id="sidebar" class="col-md-3 hidden-xs">
				<ul class="skeside">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</ul>
			</div>
			<!-- Sidebar --> 

		</div>
	</div>
</div>
<?php get_footer(); ?>