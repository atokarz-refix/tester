<?php

/**
 * Załączenie stylów i skryptów do motywu
 */

add_action('wp_head', 'css_variables');
function css_variables()
{
?>
    <style>
        :root {
            --contener-width: <?php echo get_field('szerokosc_kontenera','options').'px' ?>;
            --font-family-heading: "Oxygen";
            --font-family-content: "Inter";
            --kolor-01: #000000;
            --kolor-02: #6C6C6C;
        }
    </style>
<?php
} //css_variables

function bevise_theme_files()
{

    wp_enqueue_style('bevise_theme_styles', get_stylesheet_uri());
    wp_enqueue_style('cherieplace_style', get_template_directory_uri() . '/css/cherieplace_style.css');
    wp_enqueue_style('cherieplace_wc_styles', get_template_directory_uri() . '/css/cherieplace_wc_styles.css');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('bevise_theme_scripts_scripts', get_template_directory_uri() . '/js/bevise_theme_scripts.js', '', '', true);
    wp_enqueue_script('bv_variation_select_radio_scripts', get_template_directory_uri() . '/js/bv_variation_select_radio_scripts.js', '', '', true);
}
add_action('wp_enqueue_scripts', 'bevise_theme_files');

function bevise_theme_setup()
{
    register_nav_menus(array(
        'main-menu' => 'Main menu',
        'mobile-menu' => 'Mobile menu'
    ));

    add_theme_support('custom-logo', array(
        'height'      => 100, // wysokość logo
        'width'       => 100, // szerokość logo
        'flex-height' => false, // czy wysokość ma być elastyczna
        'flex-width'  => true, // czy szerokość ma być elastyczna
    ));
}
add_action('after_setup_theme', 'bevise_theme_setup');

add_theme_support('align-wide');




add_action('widgets_init', 'bevise_theme_footer_widget_01');
function bevise_theme_footer_widget_01()
{

    register_sidebar(
        array(
            'name'          => esc_html__('Footer', 'bevise'),
            'id'            => 'footer-1',
            'description'   => esc_html__('Add widgets here to appear in your footer.', 'bevise'),
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="bevise_theme_footer_wrapper">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => 'Woocommerce sidebar',
            'id'            => 'wc-sidebar-01',
            'description'   => esc_html__('Add widgets here to appear in your footer.', 'bevise'),
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="bevise_wc_sidebar_wrapper">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => 'Header Right',
            'id'            => 'header-right-sidebar-01',
            'description'   => esc_html__('Add widgets here to appear in header right part.', 'bevise'),
            'before_widget' => '<div id="header-right-sidebar-wrapper">',
            'after_widget'  => '</div>',
            // 'before_title'  => '',
            // 'after_title'   => '',
        )
    );

}//bevise_theme_footer_widget_01()


/**
 * Check if WooCommerce is activated
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}




function mobile_check()
{
    $status = false;
    $mobile = strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile');
    if ($mobile) $status = true;
    return $status;
} //mobile_check()


//sprawdza czy zadana klasa jest dopisana do body
function if_klasa_body($klasa){
	$klasy_body = get_body_class();
	if (in_array($klasa,$klasy_body)) {
		return true;
	}//koniec ifa
} // koniec if_klasa_body()



function bv_get_cat_data($cat_id){

    $term = get_term($cat_id);

	if(!$term) return false;
    $term_meta = get_term_meta($cat_id);
    
    $data = [];
    $data['name'] = $term->name;
    $data['slug'] = $term->slug;
    $data['img_id'] = $term_meta['thumbnail_id'][0];
    $data['link'] = get_category_link($cat_id);
    $data['description'] = $term->description;

    return $data;
}//bv_get_cat_image()




//includes
include_once 'includes/bv-acf-options-page.php';
include_once 'includes/bv-acf-blocks.php';
include_once 'includes/bv-woocommerce-rules.php';


