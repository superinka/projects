<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
?>
<div id="quickview-container-<?php the_ID(); ?>">
	<div class="quickview-container woocommerce">
		<?php
        global $product;
            /**
             * woocommerce_before_single_product hook
             *
             * @hooked woocommerce_show_messages - 10
             */
             do_action( 'woocommerce_before_single_product' );
        ?>
        <div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class("product single-product"); ?>>
           <div class="single-product-top clearfix">
				<div class="col-lg-5">
			   <?php
					/**
					 * woocommerce_show_product_images hook
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
				?>
				</div>
				<div class="product-summary col-lg-7">
					  
					<?php
						/**
						 * woocommerce_single_product_summary hook
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 */
						//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
						do_action( 'woocommerce_single_product_summary' );
					?>
					 <?php get_social(); ?>
				</div>
           </div><!-- .summary -->
		</div>
        
        <?php do_action( 'woocommerce_after_single_product' ); ?>
        <div class="clearfix"></div>
    </div>
</div>
<?php
	global $post, $wp, $woocommerce;
	$ajax_cart_en         = get_option( 'woocommerce_enable_ajax_add_to_cart' ) == 'yes' ? true : false;
	$assets_path          = str_replace( array( 'http:', 'https:' ), '', WC()->plugin_url() ) . '/assets/';
	$frontend_script_path = $assets_path . 'js/frontend/';
	$wc_ajax_url 					= WC_AJAX::get_endpoint( "%%endpoint%%" );
	$admin_url = admin_url('admin-ajax.php');
	$cart_url = $woocommerce->cart->get_cart_url();
?>
<script type='text/javascript'>
/* <![CDATA[ */
<?php
$wc_add_to_cart_params = apply_filters( 'wc_add_to_cart_params', array(
	'ajax_url'                => $woocommerce->ajax_url(),
	'wc_ajax_url'         => 	$wc_ajax_url,
	'i18n_view_cart'          => esc_attr__( 'View Cart', 'woocommerce' ),
	'cart_url'                => $cart_url,
	'is_cart'                 => is_cart(),
	'cart_redirect_after_add' => get_option( 'woocommerce_cart_redirect_after_add' )
) );

$woocommerce_params = apply_filters( 'woocommerce_params', array(
	'ajax_url'                => $woocommerce->ajax_url(),
	'wc_ajax_url'         => 	$wc_ajax_url
) );

$wc_cart_fragments_params = apply_filters( 'wc_cart_fragments_params', array(
	'ajax_url'            => $woocommerce->ajax_url(),
	'wc_ajax_url'         => 	$wc_ajax_url,
	'fragment_name'				=> apply_filters( 'woocommerce_cart_fragment_name', 'wc_fragments' )
) );

$wc_add_to_cart_variation_params = apply_filters( 'wc_add_to_cart_variation_params', array(
	'i18n_no_matching_variations_text' => esc_attr__( 'Sorry, no products matched your selection. Please choose a different combination.', 'woocommerce' ),
	'i18n_unavailable_text'            => esc_attr__( 'Sorry, this product is unavailable. Please choose a different combination.', 'woocommerce' ),
) );

?>
var wc_add_to_cart_params 					= <?php echo json_encode($wc_add_to_cart_params); ?>;
var woocommerce_params 							= <?php echo json_encode($woocommerce_params); ?>;
var wc_cart_fragments_params 				= <?php echo json_encode($wc_cart_fragments_params); ?>;
var wc_add_to_cart_variation_params = <?php echo json_encode($wc_add_to_cart_params); ?>;

/* ]]> */
<?php
$suffix               = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
$assets_path          = str_replace( array( 'http:', 'https:' ), '', $woocommerce->plugin_url() ) . '/assets/';
$frontend_script_path = $assets_path . 'js/frontend/';
?>

jQuery(document).ready(function($) {
	$.getScript("<?php echo $frontend_script_path . 'add-to-cart' . $suffix . '.js'; ?>");
	$.getScript("<?php echo $frontend_script_path . 'single-product' . $suffix . '.js'; ?>");
	$.getScript("<?php echo $frontend_script_path . 'woocommerce' . $suffix . '.js'; ?>");
	$.getScript("<?php echo $frontend_script_path . 'add-to-cart-variation' . $suffix . '.js'; ?>");
});
</script>