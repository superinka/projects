<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $woocommerce_loop;

if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}


// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

?>
<li class="col-md-3 col-sm-6 col-xs-12">
	<div class="products-entry clearfix">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		<div class="products-thumb">
			<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
				
			?>
			

		</div>
		<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
		<div class="products-content">	
			<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
			<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php the_title(); ?> </a></h4>
			<?php if ( $price_html = $product->get_price_html() ){?>
			<div class="item-price">
				<span>
					<?php echo $price_html; ?>
				</span>
			</div>
			<?php } ?>
			<div class="desc std">
	        <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
            </div>

            <?php
            /**
             * woocommerce_after_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_price - 10
             */
            ?>
		</div>
	</div>
</li>