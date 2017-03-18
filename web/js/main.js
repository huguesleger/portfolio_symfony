$(window).load(function(){
            setTimeout(function(){
                $('#svg').velocity({
                    opacity : 0.1,
                    translateY: "-80px"
                }, {
                    duration: 600,
                    complete: function(){
                    $('#hola').velocity({
                    opacity : 0

                }, {
                    duration: 600,
                    easing: [0.7,0,0.3,1],
                    complete: function(){
                        $('.home').addClass('animate-border divide');
                        $('#hola').hide();
                    }
                });
                    }
                });
            },1500);
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
      
    
    $('#iconImgHeader').css({
        right: ($('#imgHeader').width() - $('#iconImgHeader').innerWidth()) / 2,
        top: ($('#imgHeader').height() - $('#iconImgHeader').innerHeight()) / 2 +80
    });
    
  
  
    });



$(document).ready(function(){
    $('.menu-tint').hide();
$('.main-icon').click(function(){
     $('.menu-tint').show();
    $('.menu-type').toggleClass('open');
    
     var wH= $(window).width();
                if(wH > 767){
                
                
                $('#logo').toggleClass('push');
                $('.navbar-brand').addClass('white');
                    
//     $('#big').css('display','block');
//     $('.big-logo').toggleClass('push-biglogo');
                $('#content').toggleClass('push-content');
                  $('#big').css({
            top: ($(window).height() - $('.big-logo').outerHeight()) / 3 
        });

        $(window).resize(function () {
         $('#big').css({
             top: ($(window).height() - $('.big-logo').outerHeight()) / 3
         });
     });
                }
                
                if(wH > 1024){
    $('#big').css({
            right: ($(window).width() - $('.big-logo').outerWidth()) / 7 ,
            top: ($(window).height() - $('.big-logo').outerHeight()) / 3 
        });

        $(window).resize(function () {
         $('#big').css({
             right: ($(window).width() - $('.big-logo').outerWidth()) / 7,
             top: ($(window).height() - $('.big-logo').outerHeight()) / 3
         });
     });
                }
                
                if(wH < 767){
                    $('.navbar-brand').addClass('white');
                }
     

$this = $(this);
if($this.hasClass('is-open')){
	$this.addClass('is-close').removeClass('is-open , is-open-color');
      $('body').css('overflowY','visible');
         $('.main-content').show();
//         $('.navbar-default').css({marginTop: "20%", transition :"0.4s"});
         $('.navbar-brand').removeClass('white');
         $('#big').removeClass('animated fadeIn big-logo');
         $('.menu-tint').hide(410);
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
                 
                $('body').css('overflowY','hidden');
//                $('body').css('overflowY','hidden');
  
                
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



 

$(function() {
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


$( "#1 .content-txt-web" ).addClass('change-color-1');
$( "#4 .content-txt-web" ).addClass('change-color-2');
$( "#5 .content-txt-web" ).addClass('change-color-3');
$( "#6 .content-txt-web" ).addClass('change-color-4');
$( "#7 .content-txt-web" ).addClass('change-color-5');
$( "#8 .content-txt-web" ).addClass('change-color-6');
$( "#9 .content-txt-web" ).addClass('change-color-7');



  });
