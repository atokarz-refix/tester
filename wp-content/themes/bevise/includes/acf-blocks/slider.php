<?php

/**
 * slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
} //if

// Create class attribute allowing for custom "className" and "align" values.
$className = 'acf-slider';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
} //if


// // Load values and assign defaults.
// $text = get_field('testimonial') ?: 'Your testimonial here...';
// $author = get_field('author') ?: 'Author name';
// $role = get_field('role') ?: 'Author role';
// $image = get_field('image') ?: 295;
// $background_color = get_field('background_color');
// $text_color = get_field('text_color');

$slider_repeater = (wp_is_mobile()) ? get_field('slide_mobile') : get_field('slide');



if (!$slider_repeater) {
    echo '<p>Brak wybranych obrazów do ACF Slider</p>';
    return;
} //if


include_once 'slider-functions.php';

$slider_content_height = (wp_is_mobile()) ? get_field('slider_height_mobile') : get_field('slider_height');
$mobile_contener_class = (wp_is_mobile()) ? 'bv_slider_mobile' : '';
?>

<div class="rfx_acf_slider_contener <?php echo $mobile_contener_class ?>" style="height:<?php echo $slider_content_height ?>px;">
    <div class="rfx_acf_slider_items" max="<?php echo count($slider_repeater) ?>" style="height:100%;">
    
        <?php echo rfx_acf_slide_html(1, $slider_repeater[0]);  ?>
    </div>
    <div class="rfx_acf_slider_navigation">
        <?php rfx_acf_slider_buttons_arrows($slider_repeater); ?>
        <?php rfx_acf_slider_buttons_dots($slider_repeater); ?>
    </div>
</div>

<?php 

bv_slider_scripts2($slider_repeater);