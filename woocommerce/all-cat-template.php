<?php


get_header(); ?>


<?php

$term = get_queried_object();
//echo $term->term_id;
//var_dump($term);
$wsubargs = array(
    'hierarchical' => 1,
    'show_option_none' => '',
    'hide_empty' => 0,
    'parent' => $term->term_id,
    'taxonomy' => 'product_cat',
	'order'   => 'DESC'
);
$wsubcats = get_categories($wsubargs);

if($wsubcats){
foreach ($wsubcats as $wsc): ?>
    	 <div class="container product-main">
				<div class="row pro-category">
				 <div class="col-sm-12">
                  <h2><?php echo $wsc->name;?></h2>	
                  <p><?php echo $wsc->category_description;?></p>							 
                 </div>
                 </div>
				 
				 <div class="row">
        <?php $subcategory_products = new WP_Query( array( 'post_type' => 'product', 'product_cat' => $wsc->slug, 'posts_per_page'=>-1 ) );
            if($subcategory_products->have_posts()):
             $t=1;  ?>
            <?php while ( $subcategory_products->have_posts() ) : $subcategory_products->the_post(); ?>
            <div class="col-sm-3 product2 <?php if($t%4==1 && $t!=1){echo 'clear'; }?>">
				      <?php	
		   $src = wp_get_attachment_image_src( get_post_thumbnail_id( $subcategory_products->post->ID ), 'shop_catalog' );?>
			<a href="<?php echo get_permalink( $subcategory_products->post->ID ) ?>"><img src="<?php echo $src[0]; ?>" alt="..." /></a>
                      <div class="pro-category-titdes"> 
							  <a href="<?php echo get_permalink( $subcategory_products->post->ID ) ?>"><h4> <?php the_title(); ?></h4></a> 
							  <div class="pro-category-des">
							  <h5><?php  $myExcerpt = apply_filters( 'woocommerce_short_description', $subcategory_products->post->post_excerpt );
								  $tags = array("<p>", "</p>");
								  $myExcerpt = str_replace($tags, "", $myExcerpt);
								  echo $myExcerpt;
							  ?></h5>
							  <p><a href="<?php echo get_permalink( $subcategory_products->post->ID ) ?>">meer informatie >></a></p>	
							  </div>
					  </div>					  
				
            </div>
            <?php $t=$t+1; ?>
            <?php endwhile;?>
        
    <?php endif; wp_reset_query(); // Remember to reset ?>
	</div>
    </div>
<?php endforeach;?>
<?php	}
	
	else {
	//var_dump($term);
	//echo $term->term_id; ?>
		 <div class="container product-main">
				<div class="row pro-category">
				 <div class="col-sm-12">
                  <h2><?php echo $term->name;?></h2>	
                  <p><?php echo $term->description;?></p>							 
                 </div>
                 </div>
				 
				 <div class="row">
        <?php $subcategory_products = new WP_Query( array( 'post_type' => 'product', 'product_cat' => $term->slug, 'posts_per_page'=>-1) );
            if($subcategory_products->have_posts()):
             $t=1;?>
      
            <?php while ( $subcategory_products->have_posts() ) : $subcategory_products->the_post(); ?>
            <div class="col-sm-3 product2 <?php if($t%4==1 && $t!=1){echo 'clear'; }?>">
				      <?php	
		   $src = wp_get_attachment_image_src( get_post_thumbnail_id( $subcategory_products->post->ID ), 'shop_catalog' );?>
			<a href="<?php echo get_permalink( $subcategory_products->post->ID ) ?>"><img src="<?php echo $src[0]; ?>" alt="..." /></a>
                      <div class="pro-category-titdes"> 
							  <a href="<?php echo get_permalink( $subcategory_products->post->ID ) ?>"><h4><?php the_title(); ?></h4></a> 
							  <div class="pro-category-des">
							  <h5><?php  $myExcerpt = apply_filters( 'woocommerce_short_description', $subcategory_products->post->post_excerpt );
								  $tags = array("<p>", "</p>");
								  $myExcerpt = str_replace($tags, "", $myExcerpt);
								  echo $myExcerpt;
							  ?></h5>
							  <p><a href="<?php echo get_permalink( $subcategory_products->post->ID ) ?>">meer informatie >></a></p>	
							  </div>
					  </div>					  
				   </div>
             <?php $t=$t+1; ?>
            <?php endwhile;?>
        
    <?php endif; wp_reset_query(); // Remember to reset ?>
  </div>    
</div>
	<?php }?>

<?php get_footer(); ?>
