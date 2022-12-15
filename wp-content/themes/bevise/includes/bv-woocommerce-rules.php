<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


function bevise_theme_add_woocommerce_support()
{
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 300,
        'single_image_width'    => 1200,
        'gallery_thumbnail_image_width' => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ));
}

add_action('after_setup_theme', 'bevise_theme_add_woocommerce_support');

add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');


//includes
include_once 'bv-variation-select-radio.php';


/**
 * Filter to Change WooCommerce Page Title.
 */
// add_filter('woocommerce_page_title', 'new_woocommerce_page_title');

function new_woocommerce_page_title($page_title)
{
    return false;
}


/**
 * Change number or products per row to 3
 */
// add_filter('loop_shop_columns', 'loop_columns', 999);
// if (!function_exists('loop_columns')) {
// 	function loop_columns() {
// 		return 3; // 3 products per row
// 	}
// }


// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

/**
 * @snippet       Hide Clear Link | WooCommerce Variable Products
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 6
 */

// add_filter('woocommerce_reset_variations_link', '__return_empty_string', 9999);



// usuwa informacje dodatkowe z wariantów
// add_filter('woocommerce_product_tabs', 'bv_wywal_tab_dodatkowe_informacje', 9999);
function bv_wywal_tab_dodatkowe_informacje($tabs)
{
    unset($tabs['additional_information']);
    return $tabs;
} //bv_wywal_tab_dodatkowe_informacje()








//delete tab title in tab
// add_filter('woocommerce_product_description_heading', 'bv_remove_single_product_tab_title');
function bv_remove_single_product_tab_title($title)
{
    $title = false;
    return $title;
} //bv_remove_single_product_tab_title()









function bv_ssti_change_variation()
{
    wc_enqueue_js("
    $( 'input.variation_id' ).change( function(){
        $('span[vid]').hide();
       if( '' != $(this).val() ) {
          var var_id = $(this).val();
          $('span[vid='+var_id+']').show();
       }
    });
 ");
} //bv_ssti_change_variation();

