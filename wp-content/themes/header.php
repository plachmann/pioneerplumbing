<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Basic Page Needs
    ================================================== -->
	<title>
		<?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;

		wp_title( '|', true, 'right' );

		// Add the blog name.
		bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'singlepro' ), max( $paged, $page ) );

		?>
	</title>
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
   <?php global $singlepro_options;if(!empty($singlepro_options['favicon_uploader']['url'])) { ?>
		<link rel="shortcut icon" href="<?php echo $singlepro_options['favicon_uploader']['url'] ?>" type="image/x-icon" />
	<?php } else { ?>
			<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/logo/wpf-favicon.png"/>
	<?php } ?>		

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	<?php wp_head();?>
  </head>
  <body> 
  
	
	<?php get_template_part('inc/templates/pre-loader');?>
	
					

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
          <div class="container">
          <div class="navbar-header">
            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- LOGO -->
			<?php get_template_part('inc/templates/logo');?>
            
                   
          </div>
		  
          <div id="navbar" class="navbar-collapse collapse">
		  

			<?php /* Main menu navigation */
				
				
				if (function_exists('wp_nav_menu')) {
					wp_nav_menu( array(
					  'menu' => 'wpf-main-menu',
					  'container' => false,
					  'fallback_cb' => 'wpj_default_menu',
					  'menu_class' => 'nav navbar-nav navbar-right main_nav',
					  'menu_id' => 'top-menu'
					  )
					);
				}
				else {
					wpj_default_menu();
				}
								
			?>				
			
			


			
          </div><!--/.nav-collapse -->
          </div>     
        </nav>  
      </div>
      <!-- END MENU -->
	  
	</header>
	
	
	<!--=========== End HEADER SECTION ================--> 