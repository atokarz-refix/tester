<?php

/**
 * post_grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'post_grid-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
} //if

// Create class attribute allowing for custom "className" and "align" values.
$className = 'acf-post_grid';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
} //if


$postgrid_obj = get_field('post_grid');

global $post;

$output = '';

$posts = get_posts();


foreach ($posts as $post) {
    $post_date = get_the_date();
    $post_title = '<p class="postgrid__tytul"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></p>';
    $post_img = '<div class="postgrid__img" style="background-image: url(' . get_the_post_thumbnail_url() . '); min-height: 300px; background-repeat: no-repeat"><a style="display: block; height: 100%; width: 100%;"href="' . get_the_permalink() . '"></a></div>';
    $post_desc = get_the_excerpt();
    $post_desc = substr($post_desc, 0, 100);
    $post_desc_result = substr($post_desc, 0, strrpos($post_desc, ' '));
    $post_link = '<a class="postgrid__link" href="' . get_the_permalink() . '">WIĘCEJ ⟶</a>';
    $output .= '<div class="postgrid__box">' . $post_img . '<p class="postgrid__data">' . $post_date . '</p>' . $post_title . '<p class="postgrid__exc">' . $post_desc_result . ' [...]</p>' . $post_link . '</div>';
}

echo '<div class="postgrid__container">' . $output . '</div>';




