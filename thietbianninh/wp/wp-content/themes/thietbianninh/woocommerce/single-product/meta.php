<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php
		$size = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
		echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $size, 'woocommerce' ) . ' ', '.</span>' );
	?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
<div class="line-phone">
	<span>Hotline:</span> <b>Mr Nam: 0965.098.053</b> /  <b>Mr Đảng: 0166.717.5016</b> /  <b>Tư vấn viên: 04.3787.8923</b>
</div>
<div class="line-mobi">
	<span>Tel:</span> <b>04.3787.8923</b>
</div>