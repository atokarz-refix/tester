<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


function bv_page_title()
{

	if (!get_field('page_title', 'options')) return; // ustawienie w bevise settings
	if (get_field('page_title') == 'nie') return; // ustawienie w edycji strony
	// if(is_product()) return; // chowa page titile na produktach

	if (get_field('header_style', 'options') == 'full-width') {
		$wrapper_classes  = 'page-title full-width-page-title';
		$container_width = 'max-width: 100%;';
	} else {
		$wrapper_classes  = 'page-title boxed-page-title';
		$container_width = 'max-width: ' . get_field('szerokosc_kontenera', 'options') . 'px; margin:0 auto;';
	}


?>
	<!-- START #bv_page_title -->
	<div id="bv_page_title">
		<div class="bv_page_title_wrapper <?php echo $wrapper_classes ?>" style="<?php echo $container_width ?>">
			<?php do_action('bv_page_title_action') ?>
		</div>
	</div>
	<!-- KONIEC #bv_page_title -->
<?php
} //bv_page_title();


add_action('bv_page_title_action', 'bv_page_title_content');
function bv_page_title_content()
{


	$page_id = $post->ID;
	$title = get_the_title($page_id);

	$title = apply_filters('bv_page_title', $title);
?>
	<h1 class="bv_page_title_text"> <?php echo $title ?></h1>
<?php

} //bv_page_title_content()


bv_page_title();
?>