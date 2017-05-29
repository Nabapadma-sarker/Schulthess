<?php
/**
 * The main template file
 */

get_header(); ?>

         <div class="row slider-area">	
	   <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
				    <?php
					 $args = array( 'post_type' => 'slider', 'order'   => 'ASC' );
					$loop = new WP_Query( $args );
					$i=0;
					while ( $loop->have_posts() ) : $loop->the_post();
					 $src = wp_get_attachment_image_src( get_post_thumbnail_id($loop->ID), 'full', false, '' );
					 $alt = get_post_meta($loop->ID, '_wp_attachment_image_alt', true);
                                         $location1 = get_post_meta($post->ID, '_location', true);
                                         $location2 = get_post_meta($post->ID, 'read_location', true);
                                         $location3 = get_post_meta($post->ID, 'link_location', true);
					 $description = $loop->post_content;
					 ?>
					<div class="item <?php if($i==0){echo "active";}?>" >
                       <div class="carousel-caption">
						 <h3 style="color: <?php echo $location1; ?>;"><?php the_title() ;?></h3>
                        <p><a href="<?php echo $location3; ?>" style="color: <?php echo $location2; ?>;">lees meer >></a></p>
					  </div>
					  <img src="<?php  echo $src[0]; ?>" alt="<?php echo $alt ;?>">
					</div>
					<?php
					$i=$i+1;
					endwhile;
					?>	
			   </div>				  
         </div>
		<div class="clearfix"> </div>
   </div>  
	 <div class="container">
				<div class="row maincontent">
				    <div class="col-sm-3 col-md-offset-1 content-left">
						<?php dynamic_sidebar( 'home_left_sidebar' ); ?>
					</div>
					<div class="col-sm-8">
						<div class="row">
						  <?php
							$wsubargs = array(
								'hierarchical' => 1,
								'show_option_none' => '',
								'hide_empty' => 0,
								'parent' => $category->term_id,
								'taxonomy' => 'product_cat'
							);
							$wsubcats = get_categories($wsubargs);

							foreach ($wsubcats as $wsc): ?>
	                            <?php $tyty = $wsc->cat_ID; ?>
								
								<div class="col-sm-6 product1">
								  
								  <p><a href="<?php echo get_term_link( $wsc->slug, $wsc->taxonomy );?>">naar <?php echo $wsc->name;?> >></a></p>
								  <h3><?php echo $wsc->slug;?>. <span class="gren">Mijn Schulthess.</span></h3>							 
								  <?php $thumbnail_id = get_woocommerce_term_meta( $tyty , 'thumbnail_id', true );
								$image = wp_get_attachment_url( $thumbnail_id );
								echo '<img src="' . $image . '"  alt="..."/>';
								?>
								  <div class="pro-category-td"> 
								  <h4><?php $term_meta = get_option( "product_cat_$tyty" );?>
								<?php echo $term_meta;?></h4> 
								  <div class="pro-category-d">
								  <h3><?php echo $wsc->category_description;?>
								  <span class="gren">Mijn Schulthess.</span></h3>	
								  <p><a href="<?php echo get_term_link( $wsc->slug, $wsc->taxonomy );?>">lees meer >></a></p>	
								  </div>
								  </div>	
							   </div> 
						    <?php endforeach;?>
						</div>
					</div>
				</div>
		<div class="clearfix"> </div>
	 </div>



<?php get_footer(); ?>
