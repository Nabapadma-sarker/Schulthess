<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="author" content="">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/animate.css" rel="stylesheet">
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/main.css" rel="stylesheet">
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/responsive.css" rel="stylesheet">
     <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/slick-theme.css"/>
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/ico/apple-touch-icon-57-precomposed.png">
<?php wp_head(); ?>	
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
							     <?php wp_nav_menu( array('theme_location'  => 'secondary_header_menu', 'items_wrap'   => '%3$s', 'container' => '')); ?>								
								<li class="search_box pull-right">
								<form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
									 <fieldset>									 
										 <input type="image" id="searchsubmit" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/searchicon.png" />
										 <input type="search" id="s" name="s"  required />
									 </fieldset>
								</form>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
                          <nav class="navbar navbar-default">
										  <div class="container-fluid">
											<!-- Brand and toggle get grouped for better mobile display -->
											<div class="navbar-header">
											  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											  </button>
											  <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
											  <?php $header_image = get_header_image();
												if ( ! empty( $header_image ) ) {?>
												<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
												<?php
												} 
                                              else { ?><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png" alt="logo" /> <?php } ?>
											</a>
											</div>

											<!-- Collect the nav links, forms, and other content for toggling -->
											<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">											
											  <?php wp_nav_menu( array('theme_location'  => 'header_menu', 'items_wrap'   => '<ul class="nav navbar-nav navbar-right mainmenu">%3$s</ul>', 'container' => '')); ?>
											</div><!-- /.navbar-collapse -->
										  </div><!-- /.container-fluid -->
										</nav>
				</div>
			</div>
		</div><!--/header-middle-->
	</header><!--/header-->




