<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}




add_filter('woocommerce_dropdown_variation_attribute_options_html', 'bv_variation_radio_buttons', 20, 2);
function bv_variation_radio_buttons($html, $args)
{
    ob_start();
    $args;

    $select_style = 'classic';
    global $product;

    echo '<div class="bv_clone_select" select="' . $args['attribute'] . '">';
echo '<p class="bv_chosen_title"></p>';
echo '<div class="bv_select_radio_labels_wrapper">';
$options = $product->get_attributes()[$args['attribute']]['options'];
if(!$options) return $html;
    foreach ( $options as $option) :



        $term = get_term($option);
        $term_meta = get_term_meta($option);
        $img = wp_get_attachment_image_src($term_meta['tax_color'][0]);
        if ($img) {
            $select_style = 'image';
        } else {
            continue;
        } //if

        echo '<label class="bv_select_radio_label"><input type="radio" name="clone_' . $args['attribute'] . '" value="' . $term->slug . '"><img src="' . $img[0] . '" title="'.$term->name.'"><span class="podpis">' . $term->name . '</span></label>';

    endforeach;

    echo '</div></div>';

    if ($select_style != 'classic') {
?>
        <div class="hide_old_select" style="display:none;">
            <?php echo $html ?>
        </div>
<?php
    } else {
        echo $html;
    } //if


    $new_html = ob_get_clean();
    return $new_html;
}//bv_variation_radio_buttons()
