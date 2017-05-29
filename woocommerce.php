<?php
/**
 * The products template file
 */

get_header(); ?>



<?php
		if ( is_singular( 'product' ) ) {

			//wc_get_template( 'woocommerce/single-product.php' );
			while ( have_posts() ) : the_post();

				wc_get_template_part( 'content', 'single-product' );

			endwhile;

		} 
		elseif(is_product_category()){
		   wc_get_template( 'woocommerce/all-cat-template.php' );
		}
		else { 
		wc_get_template( 'woocommerce/category-page.php' );
		} 

?>
<?php
get_footer();
?>
