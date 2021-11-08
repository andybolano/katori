<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Katori</title>
	<?php wp_head(); ?>
</head>  
<body>  

<nav class="navbar navbar-light navbar-expand-lg bg-white fixed-top navbar-katori">
	<div class="container">
	  <a href="<?php echo get_site_url() ?>" style="margin: auto;"><img src="<?php echo get_stylesheet_directory_uri()?>/img/logo.svg" alt="logo" class="logo img-responsive"></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg">
			<span class="navbar-toggler-icon"></span>
		</button>
	
  
  	<div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
	
  	  <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
		    <a href="<?php echo get_site_url() ?>" style="margin: auto;"><img src="<?php echo get_stylesheet_directory_uri()?>/img/logo.svg" alt="logo" class="logo img-responsive"></a>
		</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
	  <div class="offcanvas-body">

	 			 <?php 
						wp_nav_menu( array(
						'theme_location' => 'menu_navbar',
						'menu_class' => 'navbar-nav flex-grow-1 pe-3'
					));
					?>

			<div class="social-network mobile">
					<p>Síguenos:</p>
			<?php
				wp_nav_menu( array(
											'theme_location' => 'menu_sociales',
											'menu_id' => 'social',
											'depth' => 1,
											'menu_class' => 'social-item header',
											'link_before' => '<span class="sr-only">',
											'link_after' => '</span>',
											'fallback_cb' => '',
										
										));
								?>

				</div>
			
	  </div>
	</div>

	<div class="social-network">
		<p>Síguenos:</p>
<?php
	wp_nav_menu( array(
								'theme_location' => 'menu_sociales',
								'menu_id' => 'social',
								'depth' => 1,
								'menu_class' => 'social-item header',
								'link_before' => '<span class="sr-only">',
								'link_after' => '</span>',
								'fallback_cb' => '',
							
							 ));
					?>

	</div>
  </div>
</nav>

