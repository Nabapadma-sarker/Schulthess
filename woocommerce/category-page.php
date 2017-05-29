<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}?>

	 <div class="container product-main">
				<div class="row pro-category">
				 <div class="col-sm-12">
                  <h2>Wasmachines</h2>	
                  <p>Sterk, snel,stil, Mijn Schulthess</p>							 
                 </div>
                 </div><!--dsfd-->
				 
				 <div class="row">
				 <?php while ( have_posts() ) : the_post(); ?>
			        <?php wc_get_template_part( 'content', 'product' ); ?>
		          <?php endwhile; // end of the loop. ?>
				 </div> </div>

	 </div>
	 