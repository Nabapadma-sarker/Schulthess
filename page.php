<?php
/**
 * The main template file
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post();?>
    	 <div class="container product-main">
				<div class="main_content_title">
				 <div class="col-sm-12">
                  <h2><?php the_title(); ?></h2>						 
                 </div>
                 </div>
				 
				 <div class="main_page_content">
				 <?php the_content(); ?>
				 	</div>
    </div>
<?php endwhile;	?>
<?php get_footer(); ?>
