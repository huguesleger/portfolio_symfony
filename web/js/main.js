//$(window).load(function(){
//   setTimeout(function(){
//               $('#svg').velocity({
//                    opacity : 0.1,
//                   translateY: "-80px"
//               }, {
//                    duration: 600,
//                  complete: function(){
//                  $('#svg').velocity({
//                    opacity : 0
//
//               }, {
//                    duration: 600,
//                    easing: [0.7,0,0.3,1],
//                    complete: function(){
////                        $('.home').addClass('animate-border divide');
//                       $('#hola').hide();
//                    }
//               });
//              
//                   }
//                });
//           },1500);
////        $("#hola").fadeOut(2000);
//
//
//        });




//$(window).load(function(){
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
//               }
//               });
//            
//           },1200);
////        $("#hola").fadeOut(2000);
//
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
        
//
////$(window).load(function(){
//     //Preloader
//
//
//		            setTimeout(function(){
//                $('#svg').velocity({
//                    opacity : 0.1,
//                    translateY: "-80px"
//                }, {
//                    duration: 600,
//                    complete: function(){
//                   
//                    $('#hola').velocity({
//                    opacity : "0"
//                    
//
//                }, {
//                    duration: 600,
//                    easing: [0.7,0,0.3,1],
//                    complete: function(){
//                        $('#container').css('opacity','1');
//                        $('#hola').hide();
//                    }
//                });
//                    }
//                });
//            },3000);
//});





$(document).ready(function() {
    

//           
//           
//var heightHome = $('#home').innerHeight();
//var heightLogo = $('#logo').innerHeight();
//
//$(window).on('scroll', function(){
//    var diffHeight = (heightHome) - (heightLogo);
//	if( $(window).scrollTop()  > (diffHeight) ){
//		$('.hamb').removeClass('hamb-color');
//	}else {
//		$('.hamb').addClass('hamb-color');
//                
//    }
// 
//});

//var heightHome = $('#home').outerHeight();
//var heightServ = $('#service').outerHeight();

//$(window).on('scroll', function(){
//   
//	if( $(window).scrollTop()  < (50) ){
//		$('.hamb').removeClass('hamb-color');
//	}else {
//		$('.hamb').addClass('hamb-color');
//                         
//    }if( $(window).scrollTop()  > (heightHome)+30 ){
//            $('.hamb').removeClass('hamb-color');
//            
//    }if( $(window).scrollTop()  >= (heightServ)+ 170 ){
//            $('.hamb').addClass('hamb-color');
//    }
// 
//});

//$(window).on('scroll', function(){
//   var heightLogo = $('#logo').outerHeight(); 
//   var heightHome = $('#home').outerHeight();
////   var heightIcon = $('#iconMe').outerHeight();
// var heightServ = $('#service').outerHeight();
////   var diffHeight = (heightLogo) + (heightHome);
//	if( $(window).scrollTop() > (heightLogo)-50 ){
//		$('.hamb').addClass('hamb-color');
//      }else {
//		$('.hamb').removeClass('hamb-color');
//
//      }if( $(window).scrollTop()  > (heightHome) ){
//           $('.hamb').removeClass('hamb-color');
//           
//         
//        }if( $(window).scrollTop()  > (heightServ)+170 ){
//           $('.hamb').addClass('hamb-color');
//       }
//          
//});



//$(window).on('scroll', function(){
//   var heightLogo = $('#logo').outerHeight();
//   var heightIcon = $('#logo').outerHeight() + $('#home').outerHeight();
//   var heightServ = $('#logo').outerHeight() + $('#home').outerHeight() + $('#iconMe').outerHeight();
//   var heightTitleWeb = $('#titleWeb').outerHeight() +90;
//   var heightTitleWd = $('#titleWd').outerHeight();
//   var heightTitleGal = $('#titleGal').outerHeight();
//   var heightTitleMe = $('#titleMe').outerHeight();
//   var heightImgMe = $('#fullImgMe').outerHeight();
//   var heightTitleContact = $('#titleContact').outerHeight();
//
// 
//	if( $(window).scrollTop() >= (heightLogo)){
//		$('.hamb').addClass('hamb-color');
//                 $('.txt-hamb').addClass('txt-color-white');
//          
//        }else {
//		$('.hamb').removeClass('hamb-color');
//                $('.txt-hamb').removeClass('txt-color-white');
//                
//         } if ( $(window).scrollTop() >= (heightIcon)-50){
//		$('.hamb').removeClass('hamb-color');
//                $('.txt-hamb').removeClass('txt-color-white');
////                $('.txt-hamb').css('color','#000');
//
//                
//        }if( $(window).scrollTop()  >= (heightServ)-10 ){
//           $('.hamb').addClass('hamb-color');
//           $('.txt-hamb').addClass('txt-color-white');
// 
//     }  if( $(window).scrollTop()  <= (heightTitleWeb)){
//           $('.txt-hamb').removeClass('txt-color-white');
//           $('.hamb').removeClass('hamb-color');
// 
//     } if( $(window).scrollTop()  <= (heightTitleWd) ){
//           $('.txt-hamb').removeClass('txt-color-white');
//           $('.hamb').removeClass('hamb-color');
// 
//     } if( $(window).scrollTop()  <= (heightTitleGal) ){
//           $('.txt-hamb').removeClass('txt-color-white');
//           $('.hamb').removeClass('hamb-color');
// 
//     } if( $(window).scrollTop()  <= (heightTitleMe)){
//           $('.txt-hamb').removeClass('txt-color-white');
//           $('.hamb').removeClass('hamb-color');
// 
//     } if( $(window).scrollTop()  <= (heightImgMe) ){
//           $('.txt-hamb').removeClass('txt-color-white');
//           $('.hamb').removeClass('hamb-color');
//            
//       } if( $(window).scrollTop()  <= (heightTitleContact) ){
//           $('.txt-hamb').removeClass('txt-color-white');
//           $('.hamb').removeClass('hamb-color');
//       }
//
//});

// Start midnight
$(document).ready(function(){
 // Change this to the correct selector.
 $('#Hamb').midnight();
});






       
//		 setTimeout(function(){
//                $('#preloader').velocity({
//                    opacity : 0.1,
//                    translateY: "-80px"
//                }, {
//                    duration: 600,
//                    complete: function(){
//                   
//                    $('#hola').velocity({
//                    opacity : "0"
//                    
//
//                }, {
//                    duration: 600,
//                    easing: [0.7,0,0.3,1],
//                    complete: function(){
//                        $('#container').css('opacity','1');
//                        $('#hola').hide();
//                    }
//                });
//                    }
//                });
//            },2300);
    
    
    
    
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
                
                
//                $('#logo').toggleClass('push');
                $('.navbar-brand').addClass('white');
//                $('.logo-home').css('background-color','transparent');
   /////////////////
////////////////                 
//     $('#big').css('display','block');
//     $('.big-logo').toggleClass('push-biglogo
//     /////////////////
////////////////
                $('#content').toggleClass('push-content');
//                  $('#big').css({
//            top: ($(window).height() - $('.big-logo').outerHeight()) / 3 
//        });

//        $(window).resize(function () {
//         $('#big').css({
//             top: ($(window).height() - $('.big-logo').outerHeight()) / 3
//         });
//     });
                }
                
//                if(wH > 1024){
//    $('#big').css({
//            right: ($(window).width() - $('.big-logo').outerWidth()) / 7 ,
//            top: ($(window).height() - $('.big-logo').outerHeight()) / 3 
//        });
//
//        $(window).resize(function () {
//         $('#big').css({
//             right: ($(window).width() - $('.big-logo').outerWidth()) / 7,
//             top: ($(window).height() - $('.big-logo').outerHeight()) / 3
//         });
//     });
//                }
                
//                if(wH < 767){
//                    $('.navbar-brand').addClass('white');
//                   
//                }
     

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
//         $('#container').css({width: "100%", marginLeft: "0%"});
//         $('#carousel-example-generic').css({visibility: "visible"});
//         $('.anim-title').css({visibility: "visible", marginLeft:"0%", opacity:"1"});
//         $('#icon-present').css('display','');
//         $('.services').css('display','');
//         $('.footer').css('display','');
//         $('.breadcrumb').css('display','');
//         $('.thumb-work').css('display','');
//                 
//                $('body').removeClass('color');
                
          
           
         

}else{
		$this.removeClass('is-close').addClass('is-open is-open-color');
                    $('#big').addClass('animated fadeIn big-logo');
//                $('#big').append('<div class="big-logo"></div>');
//                 $('.navbar-brand').addClass('white');
                 $('#colorLogo').find("path").attr('fill','#fff');
                $('body').css('overflowY','hidden');
                $('#iconSvg').css('position','fixed');
                /////////////////
                ////////////////
//                $('body').css('overflowY','hidden');
                /////////////////
                ////////////////
  
                
//                $('#logo')
//                $('#carousel-example-generic').css({visibility: "hidden"});
//                $('.anim-title').css({visibility: "hidden", marginLeft:"-50%", opacity:"0"});
//                $('#icon-present').css('display','none');
//                $('.services').css('display','none');
//                $('.footer').css('display','none');
//                $('.breadcrumb').css('display','none');
//                $('.thumb-work').css('display','none');
              
//                var wH= $(window).width();
//                if(wH > 767){
//                    
//                     $('body').addClass('color');
//                      
//                }

                        
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


    
//     $('#hover-web').mouseenter(function(){
//       $('#nav-color').addClass('hovered');
//          
//});

//$('#hover-web').mouseout(function(){
//    $('#nav-color').removeClass('hovered');
//});

	var bgColor; 
	$(".btn-rubrique a").mouseenter(function(){
		var select = $(this).attr("name"); 
		$("#bg-menu div[name="+select+"]").addClass('hovered'); 
		bgColor = $("#bg-menu div[name="+select+"]");      
	});
        
	$(".btn-rubrique a").mouseout(function(){
		$(bgColor).removeClass('hovered');
	});


//open nav left

//$(function(){
//	if( $('#pushMain').toggle()){
//		$('.push-main').addClass('is-open-test animated slideInLeft');
//                
//                $('body').scrollTop(0);
//               
//                
//              
//                   
//                   
//           
//          
//	} else {
//		$('.push-main').removeClass('is-open-test animated slideInLeft');
//               
//             
//
//                
//                
//                
//                
//        
//	} 
//        });
        
//$(function(){
//        $('.mail').click(function(){
//                    $('.navbar-default').css({marginTop: "-6.5%", transition :"0.4s"});
//
//                    
//                });
//                
//        $('.envoyer').click(function(){
//            $('.main-content').show();
//            $('.navbar-default').css({marginTop: "20%", transition :"0.4s"});
//             $('.contact-me').css({marginTop: "32%", transition :"0.4s"});
//        });
//
//});
	//close nav left
});




   $(function(){
       $('#home .container-fluid').css( { marginLeft : "0px", marginRight : "0px", transition :"0.4s" } );
   });
   
$(window).on('scroll', function(){
	if( $(window).scrollTop() === 0 ){
$('#home .container-fluid').css( { marginLeft : "0px", marginRight : "0px", transition :"0.4s" } );


	} else {
$('#home .container-fluid').css( { marginLeft : "15px", marginRight : "15px"} );
	}

});


//$(function(){
// var navHeight = $('.project-content').height();
//	$('.nav-add').css('height',navHeight);
//        });
 

    
    

//$(".alert").alert();

// $('.btn-danger').click(function(){
//                 confirm("Press a button!");
//                   
//                });



 

	$('a[data-confirm]').click(function(ev) {
		var href = $(this).attr('href');
		
		if (!$('#dataConfirmModal').length) {
			$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close confirm" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Confirmation</h3></div><div class="modal-body-confirm"></div><div class="modal-footer"><a class="btn fa fa-check" id="dataConfirmOK"></a><a class="btn fa fa-times" data-dismiss="modal" aria-hidden="true"></a></div></div></div></div>');
		}
		$('#dataConfirmModal').find('.modal-body-confirm').text($(this).attr('data-confirm'));
		$('#dataConfirmOK').attr('href', href);
		$('#dataConfirmModal').modal({show:true});
		
		return false;
	});





$(function(){
 
    $('#edit-compte').click(function(){
         var $groupe = document.getElementById('appbundle_user_name'); 
    $groupe.disabled = !true; 
    
    });
    
     $('#edit-pass').click(function(){
         var $groupe = document.getElementById('appbundle_user_pass'); 
    $groupe.disabled = !true; 
//    $('.boutonCompte').show();

});
 
  });
  
  
  $(function(){
 
    $('#edit-compte-close').click(function(){
         var $groupe = document.getElementById('appbundle_user_name'); 
    $groupe.disabled = !false; 
    
    });
    
     $('#edit-pass-close').click(function(){
         var $groupe = document.getElementById('appbundle_user_pass'); 
    $groupe.disabled = !false; 
//    $('.boutonCompte').show();
});

 
  });
  

$('#myModal').modal('show');

  



  
        
          $(document).ready(function(){
        $ ( '.carousel' ). carousel ({ interval : 0 }); 
    });
     
        //Initiat WOW JS
	new WOW().init();
        
        
        
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
     
    
//  $(function(){
//   
//       $('#1 .folio-item-web').css('border-bottom','1px solid #c4c4c4');
//      $("#1").hover(function(){
//         $(".overlay-web").css('background-color','red');
//      });
//       $('#4 .folio-item-web').css('border-bottom','1px solid #c4c4c4');
//       $("#4").hover(function(){
//         $(".overlay-web").css('background-color','blue');
//      });
//       $('#5 .folio-item-web').css('border-bottom','1px solid #c4c4c4');
//       $("#5").hover(function(){
//         $(".overlay-web").css('background-color','purple');
//      });
//      $('#6 .folio-item-web').css('border-right','transparent solid 1px');
//      $('#6 .folio-item-web').css('border-bottom','1px solid #c4c4c4');
//      $("#6").hover(function(){
//         $(".overlay-web").css('background-color','green');
//      });
//       $("#7").hover(function(){
//         $(".overlay-web").css('background-color','yellow');
//      });
//      $("#8").hover(function(){
//         $(".overlay-web").css('background-color','red');
//      });
//       $("#9").hover(function(){
//         $(".overlay-web").css('background-color','#c4c4c4');
//      });
//  });


//$( "#1 .content-txt-web" ).addClass('change-color-1');
//$( "#4 .content-txt-web" ).addClass('change-color-2');
//$( "#5 .content-txt-web" ).addClass('change-color-3');
//$( "#6 .content-txt-web" ).addClass('change-color-4');
//$( "#7 .content-txt-web" ).addClass('change-color-5');
//$( "#8 .content-txt-web" ).addClass('change-color-6');
//$( "#9 .content-txt-web" ).addClass('change-color-7');


//$('.btn-rubrique').click(function(){

//    $('.menu-type').removeClass('open');
//    $('.main-icon').removeClass('is-open , is-open-color');
//});


//$('#projectprint').mouseenter(function(){
//   $('.txt-present-print').addClass('cursor-fleche');
//});

//$("#testing").html('<p>DIGITAL ART</p><p>ILLUSTRATIONS</p>');

//$('body').addClass('animated fadeIn');
// $('body').css('display', 'none');
//$('body').fadeIn('1600');
//  


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
   var heightbread = $('.img-header').outerHeight();
	if( $(window).scrollTop() >(heightbread)){
                
		$('.breadcrumb').addClass('fixed-bread padd-top-lg');
                $('.breadcrumb').css('opacity','0.9');
                $('.infos-project-single').css('padding-top','90px');
          
        }else {
		$('.breadcrumb').removeClass('fixed-bread padd-top-lg');
                $('.breadcrumb').css('opacity','1');
                $('.infos-project-single').css('padding-top','30px');
                
                
       }
});


$(document).ready(function(){
document.getElementById('imgSize').style.height=document.getElementById('sizeBackground').offsetHeight +200+"px";

});



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

$(function() {
$('#moreThumb .container-fluid').hide();
$('#btnMoreThumb').click(function(){
$('#moreThumb .container-fluid').show();
$('#btnMoreThumb').hide();
});
});

//header image effect sur logo 

    


