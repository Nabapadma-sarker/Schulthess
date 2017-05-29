<?php
/**
 * The template for displaying the footer
 *

 */
?>
   <footer>
      <div class="container">
				<div class="row">
					<div class="col-md-4">
					    <div class="logo-footer left-side">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php $header_image = get_header_image();
								if ( ! empty( $header_image ) ) {?>
								<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
								<?php
								} 
							  else { ?><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png" alt="logo" /> <?php } ?>
							</a>
						</div>
					</div>
					<div class="col-md-4 footer">
					<?php dynamic_sidebar( 'footer_area1' ); ?>
					</div>
					<div class="col-md-4 footer">
					<?php dynamic_sidebar( 'footer_area2' ); ?>
					</div>
				</div>
                        <div style="text-align: center; margin-top: 15px; font-family: &quot;Open Sans&quot;,sans-serif; font-weight: 300; font-size: 12px; color: rgb(92, 102, 108);" class="row">
	Powered by: <a href="http://pjpprojects.nl/">pjpprojects.nl</a>
</div>
	  </div>
	</footer>

	    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-1.8.3.min.js"></script>	
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
        <script>
function myFunction() {
    window.print();
}

$('.carousel').carousel({
  interval: 7000
})
</script>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-75832202-1', 'auto');
ga('send', 'pageview');

</script>
<?php wp_footer(); ?>

</body>
</html>
