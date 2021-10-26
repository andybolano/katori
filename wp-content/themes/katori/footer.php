<footer>
    <div class="container">
        <div class="wrapper-footer">
            <div class="row">
                <div class="col-lg-6">
                <?php 
						wp_nav_menu( array(
						'theme_location' => 'menu_footer',
						'menu_class' => 'navbar-footer'
					));
					?>
<div class="social-network" style="margin-top:30px">
<?php
				wp_nav_menu( array(
											'theme_location' => 'menu_sociales_footer',
											'menu_id' => 'social',
											'depth' => 1,
											'menu_class' => 'social-item',
											'link_before' => '<span class="sr-only">',
											'link_after' => '</span>',
											'fallback_cb' => '',
										
										));
								?>
</div>

           
                </div>
                <div class="col-lg-3">
                    <div class="location-info">
                        <b>Bogotá</b><br>
                        Calle 17 N° 10-11<br>
                        Código Postal 110321<br>
                        Teléfono + 57 1 2810499<br>
                        servicioalcliente@katori.com.co<br>
                        Colombia
                    </div>
                
                </div>
                <div class="col-lg-3">
                <div class="location-info">
                    <b>Cartagena</b><br>
                    Carrera 56 N° 1-89 Km 3 Vía Mamonal<br>
                    Código Postal 130013<br>
                    Teléfono + 57 5 6754683<br>
                    servicioalcliente@katori.com.co<br>
                    Colombia<br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                   <div class="logo-foo"></div>
                   <p class="lengend-logo-foo">Katori una marca registrada ®</p>
                </div>
            </div>
        </div>
    </div>
</footer>



<?php wp_footer(); ?>
</body>
</html>