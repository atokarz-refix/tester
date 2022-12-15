jQuery(document).ready(function ($) {


    $('.bv_mobile_header #menu-opener').click(function () {
        $(this).toggleClass('opener');
        $('.bv_mobile-menu').toggleClass('opener');
    });//click


    $( 'input.variation_id' ).change( function(){
        if( '' != $(this).val() ) {
           var var_id = $(this).val();
         $(document).trigger('bv_variation_changed',[var_id]);
        }//if
     });



    function bv_wc_tabs_accordion() {
        var tab = $(this).attr('id');
        var kontener = $(this).closest('.tab-kontener');
        var kontent =  $(this).closest('.tab-kontener').find('.tab-kontent');

        // if(kontener.hasClass('aktiv')) return false;

        // kontener.find('.tab-kontent').slideDown(function(){
        //     $('.tab-kontener.aktiv .tab-kontent').slideUp();
        //     $('.tab-kontener.aktiv').removeClass('aktiv');
        //     kontener.addClass('aktiv');
        // });

        if(kontener.hasClass('aktiv')) {
            kontent.slideUp();
            kontener.removeClass('aktiv');
        } else {
            kontener.addClass('aktiv');
            kontent.slideDown();
        }


    }//bv_wc_tabs_accordion()



    $('.tab-kontener .tab-tytul').click(bv_wc_tabs_accordion);


    function bv_wc_quantity_plus(){
        $('.woocommerce-variation-add-to-cart .quantity .input-text').val( function(i, oldval) {
            return ++oldval;
        });
    }//bv_wc_quantity_plus

    function bv_wc_quantity_minus(){
        $('.woocommerce-variation-add-to-cart .quantity .input-text').val( function(i, oldval) {
            return --oldval;
        });
    }//bv_wc_quantity_minus

    $('.button__quantity__plus').click(bv_wc_quantity_plus);
    $('.button__quantity__minus').click(bv_wc_quantity_minus);





// $(document.body).on('found_variation',function(){
// alert('event')
// });


  /* ---- mobile touch slide ---- */  

  const sliderContainer = document.querySelector('.rfx_acf_slider_contener');

  sliderContainer.addEventListener('touchstart', handleTouchStart, false);        
  sliderContainer.addEventListener('touchmove', handleTouchMove, false);
  
  var xDown = null;                                                        
  var yDown = null;
  
  function getTouches(evt) {
    return evt.touches ||             // browser API
           evt.originalEvent.touches; // jQuery
  }                                                     
                                                                           
  function handleTouchStart(evt) {
      const firstTouch = getTouches(evt)[0];                                      
      xDown = firstTouch.clientX;                                      
      yDown = firstTouch.clientY;                                      
  };                                                
                                                                           
  function handleTouchMove(evt) {
      if ( ! xDown || ! yDown ) {
          return;
      }
  
      var xUp = evt.touches[0].clientX;                                    
      var yUp = evt.touches[0].clientY;
  
      var xDiff = xDown - xUp;
      var yDiff = yDown - yUp;
                                                                           
      if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
          if ( xDiff > 0 ) {
              $('.rfx_acf_slider_buttons span.arrow.next').trigger('click');
          } else {
              $('.rfx_acf_slider_buttons span.arrow.prev').trigger('click');
          }                       
      } else {
          if ( yDiff > 0 ) {
              var slider_height = $('.rfx_acf_slider_contener').height();
              $("html, body").animate({
                  scrollTop: slider_height
              }, 300);
          } else { 
              $("html, body").animate({
                  scrollTop: 0
              }, 400);
          }                                                                 
      }
      /* reset values */
      xDown = null;
      yDown = null;                                             
  };






});//koniec jQuery