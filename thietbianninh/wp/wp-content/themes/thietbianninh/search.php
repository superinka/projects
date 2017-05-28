<?php get_header(); ?>
<div class="container">
			<div class="bread-title-holder">
			<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>
			<div class="container">
				<div class="row-fluid">
					<div class="container_inner clearfix">
						<?php 
						if ((class_exists('incart_breadcrumb_class'))) {$incart_breadcumb->custom_breadcrumb();}
						?>
					</div>
				</div>
			</div>
		</div>	
	<?php
		get_template_part( 'templates/search-product');
	?>
</div>
<?php get_footer(); ?>