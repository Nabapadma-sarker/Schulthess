<?php get_header(); ?>



<?php 

   if ( get_query_var('paged') ) {

$paged = get_query_var('paged');

} elseif ( get_query_var('page') ) {

$paged = get_query_var('page');

} else {

   $paged = 1;

}


  $query_args = array(
      'post_type' => 'post',
      'posts_per_page' => 4,
      'paged' => $paged,
	  'category_name' => 'nieuws',
      'paged' => $paged
    );

   $wp_query = new WP_Query( $query_args ); ?>
    	 <div class="container product-main">
              <div class="row main_content_title">
				 <div class="col-sm-12">
                  <h2>nieuws</h2>						 
                 </div>
                 </div>
     <div class="row main_page_content">
  <?php if (  $wp_query->have_posts() ) : ?>

    <!-- the loop -->
    <?php while (  $wp_query->have_posts() ) :  $wp_query->the_post(); ?>
		<div class="itemContainer itemContainerLast" style="width:99.9%;">

		<article class="itemView groupLeading">  	
		<header>
		<h2>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
                <h4><?php the_date('M j, Y'); ?></h4> 
		</header>

		<div class="itemBlock">
		<div class="itemBody">  											
		<div class="itemIntroText"> 
		 <?php the_excerpt(20); ?>
		</div>
		<a class="itemReadMore button" href="<?php the_permalink(); ?>"> Lees meer...  </a>
		</div>
		</div>
		</article>
		</div>
    <?php endwhile; ?>
    <!-- end of the loop -->

    <!-- pagination here -->
  		    <?php
      if (function_exists(custom_pagination)) {
        custom_pagination($the_query->max_num_pages,"",$paged);
      }
    ?>


  <?php wp_reset_postdata(); ?>


  <?php else:  ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
</div>
    </div>
<?php get_footer(); ?>