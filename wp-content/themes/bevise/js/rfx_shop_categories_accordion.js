jQuery(document).ready(function ($) {
function rfx_category_list_starter_accordion() {

    $('.current-parent > ul').slideDown(350);
    $('.current-parent').find('.rfx_accordion__arrow:first').addClass('arrow-rotate');
    $('.current-cat > ul').slideDown(350);

}//rfx_category_list_starter_accordion()


function rfx_category_list_arrow(){
    $('.wc-block-product-categories-list-item').each(function () {
        if ($(this).find('ul').length){
            $(this).prepend('<span class="rfx_accordion__arrow">↓</span>');
        }//if
    });//each
}//rfx_category_list_arrow()


function rfx_category_list_add_current_parent_classes() {

    var current_url = window.location.href;
    var current_cat = $('a[href="' + current_url + '"]');
    current_cat.closest('li').addClass('current-cat');

    var $current_cat = $('li.current-cat');
    var $closest_ul = $($current_cat).closest('ul');
    if (!$closest_ul.hasClass('wc-block-product-categories-list--depth-0')) {
        $closest_ul.closest('li').addClass('current-parent');
        $closest_ul = $closest_ul.closest('li').closest('ul');
        if (!$closest_ul.hasClass('wc-block-product-categories-list--depth-0')) {
            $closest_ul.closest('li').addClass('current-parent');
            $closest_ul = $closest_ul.closest('li').closest('ul');
        }//if

    }//if

    rfx_category_list_arrow();

    rfx_category_list_starter_accordion();

}//rfx_category_list_add_current_parent_classes()

rfx_category_list_add_current_parent_classes();




function rfx_categories_accordion() {

    var current_cat = $('.current-cat');



    $(".rfx_accordion__arrow").click(function () {

        $(this).parent().toggleClass("current-parent");

        if ($(this).parent().hasClass('current-parent')) {
            $(this).parent().find('.wc-block-product-categories-list').first().slideDown(350);
            $(this).parent().find('.rfx_accordion__arrow:first').addClass('arrow-rotate');
        }
        else {
            $(this).parent().find('.wc-block-product-categories-list').slideUp(350);
            $(this).parent().find('.rfx_accordion__arrow:first').removeClass('arrow-rotate');
        }
    });

    // current_cat.parent().addClass('current-cat');

}
rfx_categories_accordion();

});//koniec jQuery