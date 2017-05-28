<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<?php get_header(); ?>

<div class="container">
<div class="row">



<div class="col-xs-12 col-sm-12 col-md-12 categories-box" style="padding-top: 30px;">
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action('woocommerce_before_main_content');
	?>
	<div class="col-md-9 col-xs-12 col-sm-12">
		<div class="single-product clearfix">
		
			<?php while ( have_posts() ) : the_post(); ?>

				<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>
		
		</div>
	</div>
	
	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');
	?>
<?php get_footer(); ?>
