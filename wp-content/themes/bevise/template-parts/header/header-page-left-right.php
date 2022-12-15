<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$header_left_width = 'width:' . get_field('header_szerokosc_left', 'options') . '%;';
$header_right_width = 'width:' . get_field('header_szerokosc_right', 'options') . '%;';

?>
<div class="header-left" style="<?php echo esc_attr($header_left_width); ?>">
    <?php the_custom_logo(); ?>
</div>
<div class="header-right" style="<?php echo esc_attr($header_right_width); ?>">
    <?php
    
        wp_nav_menu(
            array(
                'theme_location'  => 'main-menu',
                'menu_class'      => 'menu-wrapper',
                'container_class' => 'primary-menu-container',
                'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
                'fallback_cb'     => false,
            )
        );
   
    ?>
</div>