<?php get_header(); ?>
<?php
$s=get_search_query();
$args = array(
                's' =>$s
            );
    // The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
?><div class="container product-main">
        <div class="row pro-category">
				 <div class="col-sm-12"><?php
        _e("<h2 style='font-weight:bold;color:#000'>Search Results for: ".get_query_var('s')."</h2>");
		?></div>
                 </div>
				 <div class="row"><?php
        while ( $the_query->have_posts() ) {
           $the_query->the_post();
                 ?>
				  <div class="col-sm-3 product2">
				      <?php	
		   $src = wp_get_attachment_image_src( get_post_thumbnail_id( $the_query->post->ID ), 'shop_catalog' );?>
			<img src="<?php echo $src[0]; ?>" alt="..." />
					  <div class="pro-category-titdes"> 
							  <h4><?php the_title(); ?></h4> 
							  <div class="pro-category-des">
							  <h5><?php  $myExcerpt = apply_filters( 'woocommerce_short_description', $the_query->post->post_excerpt );
								  $tags = array("<p>", "</p>");
								  $myExcerpt = str_replace($tags, "", $myExcerpt);
								  echo $myExcerpt;
							  ?></h5>	
							  <p><a href="<?php the_permalink(); ?>">lees meer >></a></p>	
							  </div>
					  </div>					  
				   </div>
                   
                 <?php
        }
    }else{
?>
        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
        <div class="alert alert-info">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
        </div>
<?php } ?>
</div>
</div>
<?php get_footer(); ?>