<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div class="container product-single">
		<div class="row pro-detail">
		 <div class="col-sm-8">
		   <div class="top-line"><?php echo get_post_meta( $post->ID, 'text_field1', true );?><span class="red-plus"></span></div>
		  <h2><?php echo get_the_title(); ?></h2>	
		  <p><?php echo get_post_meta( $post->ID, 'text_field2', true );?></p>		 
		 </div>
		 <div class="col-sm-4 right-side" onclick="myFunction()" style="cursor:pointer;">
		   <i class="fa fa-print"></i>Print					 
		 </div>
		 </div>
		 
		 <div class="row">
	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		woocommerce_show_product_sale_flash(); ?>
   <div class="col-sm-5">
		<?php global $product;
		  $attachment_ids= $product->get_gallery_attachment_ids($product->ID); ?>
		  <div class="images">
		  <a href="<?php $shop_single_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo $shop_single_image_url[0]; ?>" itemprop="image" data-rel="prettyPhoto[product-gallery]">
        <img id="img_011" src="<?php $shop_catalog_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'shop_catalog' );echo $shop_catalog_image_url[0]; ?>" /> 
		  </a>
		<div id="gal1" class="thumbnails multiple-items"> 
			<?php foreach( $attachment_ids as $attachment_id ) 
			{   //Get URL of Gallery Images - WooCommerce specific image sizes
			   ?>
			   <a href="<?php $shop_thumbnail_image_url = wp_get_attachment_image_src( $attachment_id, 'full' ); echo $shop_thumbnail_image_url[0]; ?>" data-rel="prettyPhoto[product-gallery]"><img id="img_01" src="<?php $shop_thumbnail_image_url = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' ); echo $shop_thumbnail_image_url[0]; ?>" /></a>
			  <?php				  
			}
			?>
       </div>		      
       </div>		      
   </div>
	<div class="col-sm-4 product3">
				     <div class="pro-detail-titdes"> 
					     <h4><?php echo get_post_meta( $post->ID, 'text_field3', true );?></h4> 
							  <div class="pro-detail-des"> 
								  <div class="equipment"><span class="red-plus"></span>&nbsp; details</div>	
								  <?php echo get_post_field('post_content',$product->ID); ?>
								  			  
				             </div>
				      </div>
				   </div>
				 <div class="col-sm-3 product3">
				      <?php
				       $location1 = get_post_meta($post->ID, '_wp_editor_test_1', true);
				     echo $location1; ?>				  
				   </div>
	</div>
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
