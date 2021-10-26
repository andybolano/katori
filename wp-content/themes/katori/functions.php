<?php 

require('post-types/banners.php');
require('post-types/products.php');

function katori_styles(){
	wp_enqueue_style('normalize', get_stylesheet_directory_uri().'/css/normalize.css');
	wp_enqueue_style('bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css");
    wp_enqueue_style('style', get_stylesheet_uri());
}

function katori_scripts(){
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper','https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js');
	wp_enqueue_script('bootstrapjs', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js", array('jquery') , '4.3.1', true);
}


add_action('wp_enqueue_scripts','katori_styles');
add_action('wp_enqueue_scripts','katori_scripts');

add_theme_support('post-thumbnails');
add_theme_support('custom-header');




function widget_script(){
    global $pagenow;
    if ( 'widgets.php' === $pagenow )
        wp_enqueue_script( 'widget-script', plugins_url( 'includes/widget_script.js', __FILE__ ), array( 'jquery' ), false, true );

}

add_action('admin_init', 'widget_script' );

register_nav_menus(array(
	'menu_navbar' => __('Menu Navbar', 'katori'),
	'menu_footer' => __('Menu Footer', 'katori'),
	'menu_sociales' => __('Menu Redes Sociales', 'katori'),
	'menu_sociales_footer' => __('Menu Redes Sociales footer', 'katori')
));


function nav_menu_link_class($atts, $item, $args, $depth ) {
	if('dropdown' === $item->classes[0]){
		$atts['class'] = 'dropdown-toggle';
		$atts['id'] = 'offcanvasNavbarDropdown';
		$atts['role']= 'button';
		$atts['data-bs-toggle'] ='dropdown';
		$atts['aria-expanded']= 'false';
	}


	if( $depth > 0 ) {
		$atts['class'] = 'dropdown-item';
	}

    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'nav_menu_link_class', 10, 4 );

function add_submenu_css_class( $classes ) {
    $classes[] = 'dropdown-menu';
    return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'add_submenu_css_class' );


function katori_widgets(){
	register_sidebar(array(
		'name' => __('Call to Action ver video Widget'),
		'id' => ('footer_widget'),
		'description' => ('Widget para el call to action de ver video en el home'),
		'before_widget' => '<div id="%1$s"  class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-footer-title">',
		'after_title' => '</h2>',
	));
}

add_action('widgets_init', 'katori_widgets');

?>