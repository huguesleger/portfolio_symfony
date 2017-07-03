//$(document).ready(function(){
//     var line = new ProgressBar.Line('#loaders', {
//        color: '#FCB03C',
//        duration: 3000,
//        strokeWidth: 1,
//        easing: 'easeInOut',
//            from: { color: '#f94545' },
//            to: { color: '#ff8668' },
//    step: function(state, line, attachment) {
//        line.path.setAttribute('stroke', state.color);
//    }
//    
//    });
//    line.animate(1);
//   setTimeout(function(){
//               $('#loaders').velocity({
//                    opacity : 1  
//               }, {
//                    duration: 1600,
//                  complete: function(){
//                  $('#loaders').velocity({
//                    opacity : 0
//                });
//                     $('#hola').velocity({
//                          opacity:0,
//                          zIndex: -1
//                          
//                       });
//                        
//               }
//               
//               });
//            
//           },1200);
//        
//        });








$(document).ready(function(){
    
    $('.btn-rubrique').click(function(){
        
//    $('.menu-type').removeClass('open');
//    $('.main-icon').removeClass('is-open , is-open-color');
//$('body').addClass('animated fadeIn');
//    $('body').addClass('animated fadeOut');
//       $('body').addClass('animated slideOutUp');
//     $('body').css('display', 'none');
//        $('body').fadeOut(600);
         $('body').addClass('animated-speed fadeOut');
            
     
   
           

});
});


	$(document).ready(function() {
            $.adaptiveBackground.run({
                normalizeTextColor: true
            });
        });
        

// Start midnight
$(document).ready(function(){
    var WH= $(window).width();
 // Change this to the correct selector.
  if(WH > 767){
 $('#Hamb').midnight();
  }
});


$(document).ready(function() {
       
    
        var windowHeight = $(document).innerHeight();
//        var navHeight = $('.project-content').height();
//	$('.nav-add').css('min-height', windowHeight);
        $('.logo-hl-admin').css('max-height', windowHeight);
    
     
//   $('.project-content').resize(function () {
//       var windowHeight = $(document).innerHeight();
//	$('.nav-add').css('min-height', windowHeight );
//    });
    
     var windowHeight = $(document).innerHeight();
//        var navHeight = $('.project-content').height();
	$('.project-content').css('min-height', windowHeight);
      
    });



$(document).ready(function(){
//    $('.menu-tint').hide();
$('.main-icon').click(function(){
//     $('.menu-tint').show();
    $('.menu-type').toggleClass('open');
    
     var wH= $(window).width();
                if(wH > 767){

                $('.navbar-brand').addClass('white');
                $('#content').toggleClass('push-content');

                }
                
$this = $(this);
if($this.hasClass('is-open')){
	$this.addClass('is-close').removeClass('is-open , is-open-color');
      $('body').css('overflowY','visible');
      $('#colorLogo').find("path").attr('fill','#000');
         $('.main-content').show();
//         $('.navbar-default').css({marginTop: "20%", transition :"0.4s"});
         $('.navbar-brand').removeClass('white');
//         $('.logo-home').css('background-color','#fff');
         $('#big').removeClass('animated fadeIn big-logo');
         $('.menu-tint').hide(410);
         $('#iconSvg').css('position','absolute');

          
           
         

}else{
		$this.removeClass('is-close').addClass('is-open is-open-color');
                    $('#big').addClass('animated fadeIn big-logo');
                if(wH > 767){
                 $('#colorLogo').find("path").attr('fill','#fff');
             }
                $('body').css('overflowY','hidden');
                $('#iconSvg').css('position','fixed');
                 
	}
        
            




$('.btn-rubrique a').mouseenter(function(){
  $('.line').css('top','85%','height','10%');
});

$('.btn-rubrique a').mouseout(function(){
  $('.line').css('top','0%','height','90%');
});

$('#bg-white').mouseenter(function(){
   $('.btn-rubrique a').addClass('txt-color-primary');
     $('.navbar-brand').removeClass('white');
     $('.navbar-brand').addClass('black');
     $('.main-icon.is-open.is-open-color').addClass('border-dark');
      $('#colorLogo').find("path").attr('fill','#000');
});

$('#bg-white').mouseout(function(){
   $(".btn-rubrique a").removeClass('txt-color-primary');
    $(".navbar-brand").addClass('white');
    $('.navbar-brand').removeClass('black');
    $('.main-icon.is-open.is-open-color').removeClass('border-dark');
     $('#colorLogo').find("path").attr('fill','#fff');
});


    
	var bgColor; 
	$(".btn-rubrique a").mouseenter(function(){
		var select = $(this).attr("name"); 
		$("#bg-menu div[name="+select+"]").addClass('hovered'); 
		bgColor = $("#bg-menu div[name="+select+"]");      
	});
        
	$(".btn-rubrique a").mouseout(function(){
		$(bgColor).removeClass('hovered');
	});
      

	//close nav left
});
});



$(document).ready(function(){
       $('#home .container-fluid').css( { marginLeft : "0px", marginRight : "0px", transition :"0.4s" } );
   });
   
$(window).on('scroll', function(){
	if( $(window).scrollTop() === 0 ){
$('#home .container-fluid').css( { marginLeft : "0px", marginRight : "0px", transition :"0.4s" } );


	} else {
$('#home .container-fluid').css( { marginLeft : "15px", marginRight : "15px"} );
	}

});




//$(document).ready(function(){
//	$('a[data-confirm]').click(function(ev) {
//		var href = $(this).attr('href');
//		
//		if (!$('#dataConfirmModal').length) {
//			$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close confirm" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Confirmation</h3></div><div class="modal-body-confirm"></div><div class="modal-footer"><a class="btn fa fa-check" id="dataConfirmOK"></a><a class="btn fa fa-times" data-dismiss="modal" aria-hidden="true"></a></div></div></div></div>');
//		}
//		$('#dataConfirmModal').find('.modal-body-confirm').text($(this).attr('data-confirm'));
//		$('#dataConfirmOK').attr('href', href);
//		$('#dataConfirmModal').modal({show:true});
//		
//		return false;
//	});
//        });





//$(document).ready(function(){
//    $('#edit-compte').click(function(){
//         var $groupe = document.getElementById('appbundle_user_name'); 
//    $groupe.disabled = !true; 
//
//    
//    });
//    
//     $('#edit-pass').click(function(){
//         var $groupe = document.getElementById('appbundle_user_pass'); 
//    $groupe.disabled = !true; 
////    $('.boutonCompte').show();
//
//});
// 
//  });
//  
//  
// $(document).ready(function(){
// 
//    $('#edit-compte-close').click(function(){
//         var $groupe = document.getElementById('appbundle_user_name'); 
//    $groupe.disabled = !false; 
//    
//    });
//    
//     $('#edit-pass-close').click(function(){
//         var $groupe = document.getElementById('appbundle_user_pass'); 
//    $groupe.disabled = !false; 
////    $('.boutonCompte').show();
//});
//
// 
//  });
  

//$(document).ready(function(){
//$('#myModal').modal('show');
//
//});
  



   
          $(document).ready(function(){
           var WW = $(window).width();
             if(WW > 767){
        $ ( '.carousel' ). carousel ({ interval : 0 });
    }
    });
    
     
     $(document).ready(function(){
        //Initiat WOW JS
	new WOW().init();
        
     });
     
$(document).ready(function(){        
$('.count').each(function () {
    $(this).prop('Counter',-1).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
});
     
$(document).ready(function(){    
$(window).scroll(function(e){
  parallax();
});

function parallax(){
  var scrolled = $(window).scrollTop();
  $('.img-header').css('top',-(scrolled*0.0315)+'rem');
  $('.img-header > h2').css('top',-(scrolled*-0.005)+'rem');
  $('.img-header > h2').css('opacity',1-(scrolled*.00245));      
};

   
$(window).on('scroll', function(){
    var windowW = $(window).width();
    var heightbread = $('.img-header').outerHeight();
  if(windowW > 767){
	if( $(window).scrollTop() >(heightbread)){
                
		$('.breadcrumb').addClass('fixed-bread padd-top-lg');
                $('.breadcrumb').css('opacity','0.9');
                $('.infos-project-single').css('padding-top','90px');
          
        }else {
		$('.breadcrumb').removeClass('fixed-bread padd-top-lg');
                $('.breadcrumb').css('opacity','1');
                $('.infos-project-single').css('padding-top','30px');
                
                
       } 
   } else if (windowW < 767){
	if( $(window).scrollTop() >(heightbread)){
            $('.breadcrumb').addClass('fixed-bread');
                $('.breadcrumb').css({opacity:'0.9' , top:'50px'});
               
                
        } else {
		$('.breadcrumb').removeClass('fixed-bread');
                $('.breadcrumb').css({opacity:'0.9' , top:'0'});
               
                
                
       } 
   }
   
   
      
});

});


$(document).ready(function(){  

if ($('#back-to-top').length) {
    var scrollTrigger = 900, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('.btn-top').addClass('show');
            } else {
                $('.btn-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('.btn-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}

});


$(document).ready(function(){
$(function() {
$('#moreThumb .container-fluid').hide();
$('#btnMoreThumb').click(function(){
$('#moreThumb .container-fluid').show();
$('#btnMoreThumb').hide();
});
});
});


//$(document).ready(function(){
//    var windowW = $(window).width();
//  if(windowW >= 1024){
//document.getElementById('imgSize').style.height=document.getElementById('sizeBackground').offsetHeight +200+"px";
//
//  }
//});

//header image effect sur logo 

    


//$(document).ready(function(){
// var windowW = $(window).width();
//// var bgGrey = $('#sizeBackground').outerHeight();
//   
//if (windowW > 1023){
////    $('.full-img-screenshot-pos-dark').css({
//////        height: ($('.full-img-screenshot').outerHeight()+200)
////        height: (bgGrey +200)
////        
////    });
//    
//     $('#Img-pos').insertBefore('#concept-mobile');
// } else {
////     $('.full-img-screenshot-pos-dark').removeClass();
//   $('#concept-mobile').append($('#Img-pos'));
// }
//
//});
