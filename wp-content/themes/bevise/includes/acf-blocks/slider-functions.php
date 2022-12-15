<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


function rfx_acf_slide_html($index, $slide)
{
    ob_start();
    $wrapper_styles = 'height:100%;';
    $wrapper_styles .= 'background-image:url(' . $slide['slide_background'] . ');';
?>
    <div class="rfx_acf_slide_item" slide="<?php echo $index ?>" style="<?php echo $wrapper_styles ?>">
        <div class="rfx_acf_slide_wrapper" style="max-width:<?php echo get_field('szerokosc_kontenera', 'options') ?>px; margin:0 auto;">
            <div class="rfx_acf_slide_content">
                <?php echo $slide['slide_content'] ?>
            </div>
        </div>
    </div>
<?php
    $output = ob_get_clean();
    $output = str_replace("\n", "", $output);
    $output = str_replace("\r", "", $output);
    return $output;
} //rfx_acf_slide_html



function rfx_acf_slider_buttons_arrows($slider_repeater)
{
    if (count($slider_repeater) == 1) return;
?>
    <div class="rfx_acf_slider_buttons ras-arrows">
        <span class="prev arrow"> &#8249; </span>
        <span class="next arrow"> &#8250; </span>
    </div>
<?php
} //rfx_acf_slider_buttons_arrows()


function rfx_acf_slider_buttons_dots($slider_repeater)
{
    if (count($slider_repeater) == 1) return;
?>
    <div class="rfx_acf_slider_buttons ras-dots">
        <?php
        foreach ($slider_repeater as $index => $slide) :
        ?>
            <span class="dot" slide="<?php echo $index + 1 ?>"></span>
        <?php
        endforeach;

        ?>
    </div>
<?php

} //rfx_acf_slider_buttons_dots()



function bv_slider_scripts2($slider_repeater)
{
?>
    <script>
        jQuery(document).ready(function($) {


            function rfx_acf_slide_1() {
                var html = '<?php echo rfx_acf_slide_html(1, $slider_repeater[0]) ?>';
                return html;
            } //rfx_acf_slide_1()

            function rfx_acf_slide_2() {
                var html = '<?php echo rfx_acf_slide_html(2, $slider_repeater[1]) ?>';
                return html;
            } //rfx_acf_slide_1()


            function rfx_acf_slide_3() {
                var html = '<?php echo rfx_acf_slide_html(3, $slider_repeater[2]) ?>';
                return html;
            } //rfx_acf_slide_1()



            function rfx_acf_slide_putter(index) {
                var html;
                if (index == 1) {
                    html = rfx_acf_slide_1();
                } else if (index == 2) {
                    html = rfx_acf_slide_2();
                } else if (index == 3) {
                    html = rfx_acf_slide_3();
                } //if
                var $miejsce = $('.rfx_acf_slider_items');
                $miejsce.html(html);

            } //rfx_acf_slide_putter()


            function rfx_acf_slider_changer(index) {
                $('.rfx_acf_slider_items').css('opacity', '0');
                setTimeout(function() {
                    rfx_acf_slide_putter(index);
                    $('.rfx_acf_slider_items').css('opacity', '1');
                }, 400);
                $('.rfx_acf_slider_contener').trigger('rfx_acf_slider_changed');
            } //rfx_acf_slider_changer()



            function rfx_acf_slider_dots_aktiv(index) {
                $('.rfx_acf_slider_buttons span.dot.aktiv').removeClass('aktiv');
                $('span.dot[slide="' + index + '"]').addClass('aktiv');
            } //rfx_acf_slider_dots_aktiv()


            //start dots aktiv
            rfx_acf_slider_dots_aktiv(1);



            //arrows
            $('.rfx_acf_slider_buttons span.arrow').click(function() {
                var index = $('.rfx_acf_slide_item').attr('slide');
                var max = $('.rfx_acf_slider_items').attr('max');

                if ($(this).hasClass('next')) {
                    var new_index = parseInt(index) + 1;
                    if (new_index > max) {
                        new_index = 1;
                    }
                } else if ($(this).hasClass('prev')) {
                    var new_index = parseInt(index) - 1;
                    if (new_index == 0) {
                        new_index = max;
                    }
                } //if

                rfx_acf_slider_changer(new_index);
                rfx_acf_slider_dots_aktiv(new_index);

            }); //click


            //dots
            $('.rfx_acf_slider_buttons span.dot').click(function() {
                var index = $(this).attr('slide');
                rfx_acf_slider_changer(index);
                rfx_acf_slider_dots_aktiv(index);

            });


            function rfx_acf_slider_autoslide(time) {
                var max = $('.rfx_acf_slider_items').attr('max');
                if (max == 1) return false;
                var ras_interval = setInterval(function() {
                    var i = $('.rfx_acf_slide_item').attr('slide');
                    var ni = parseInt(i) + 1;
                    if (ni > max) ni = 1;
                    rfx_acf_slider_changer(ni);
                    rfx_acf_slider_dots_aktiv(ni);
                }, time);
            } //rfx_acf_slider_autoslide()

            rfx_acf_slider_autoslide(6000);



            // $('.rfx_acf_slider_contener').swipe(function(direction){
            //     $('.rfx_acf_slider_buttons span.arrow.prev').trigger('click');
            // });
            //     var params = {
            //         preventDefault: false
            //     };

            // $('.rfx_acf_slider_contener').swipe(function(direction, params) {
            //     if (direction == 'right') {
            //         $('.rfx_acf_slider_buttons span.arrow.prev').trigger('click');
            //     } else if (direction == 'left') {
            //         $('.rfx_acf_slider_buttons span.arrow.next').trigger('click');
            //     } else if (direction == 'up') {
            //         var slider_height = $('.rfx_acf_slider_contener').height();
            //         $("html, body").animate({
            //             scrollTop: slider_height
            //         }, 300);
            //     } else if (direction == 'down') {
            //         $("html, body").animate({
            //             scrollTop: 0
            //         }, 400);
            //     }
            // });


        });
    </script>
<?php
} //bv_slider_scripts2()



?>
<style>
    .rfx_acf_slider_contener {
        position: relative;
    }

    .rfx_acf_slider_items {
        transition: 0.3s;
        opacity: 1;
    }

    .rfx_acf_slide_item {
        background-size: cover;
        background-position: center;
    }

    .rfx_acf_slide_wrapper {
        display: flex;
        height: 100%;
        align-items: center;
    }

    .rfx_acf_slider_navigation {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
    }

    .rfx_acf_slider_buttons.ras-arrows {
        display: flex;
        justify-content: space-between;
        width: 100%;
        padding: 0 15px;
        opacity: 0;
        transition: 0.3s;
    }

    .rfx_acf_slider_navigation:hover .rfx_acf_slider_buttons.ras-arrows {
        opacity: 1;
    }

    .rfx_acf_slider_buttons.ras-dots {
        display: flex;
        justify-content: center;
        gap: 10px;
        position: absolute;
        width: 100%;
        bottom: 20px;
    }

    .rfx_acf_slider_buttons span {
        font-size: 30px;
        cursor: pointer;
        background: rgba(0, 0, 0, 0.2);
        color: #fff;
        border-radius: 50%;
        width: 39px;
        text-align: center;
        padding-bottom: 5px;
        margin-bottom: 5px;
    }

    .rfx_acf_slider_buttons span.dot {
        height: 6px;
        width: 11px;
    }

    .rfx_acf_slider_buttons span.dot.aktiv {
        background-color: #eee;
    }

    .rfx_acf_slide_content {
        padding: 15px;
    }
</style>