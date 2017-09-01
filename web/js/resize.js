/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
   
   $(document).ready(function () {

   var windowW = $(window).width();
   if (windowW > 1023){
      $('.full-img-screenshot-pos-dark').show();  
    $('.full-img-screenshot-pos-dark').css({
        height: ($('#sizeBackground').height() + 480 )
    });
   }else 
         if (windowW < 1023){
        $('.full-img-screenshot-pos-dark').hide();
    }


    $(window).resize(function () {
        var windowW = $(window).width();
         if (windowW > 1023){
        $('.full-img-screenshot-pos-dark').show();     
        $('.full-img-screenshot-pos-dark').css({
        height: ($('#sizeBackground').height() + 480 )
        });
    } else 
         if (windowW < 1023){
        $('.full-img-screenshot-pos-dark').hide();
    }
    
    });
      });