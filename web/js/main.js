$(document).ready(function(){ 
$('.main-icon').click(function(){
$this = $(this);
if($this.hasClass('is-open')){
	$this.addClass('is-close').removeClass('is-open , is-open-color');
        $('body').css('overflowY','visible');
        
        $('#form-contact').hide();
         $('.main-content').show();
         $('.navbar-default').css({marginTop: "20%", transition :"0.4s"});
         $('#container').css({marginLeft: "0%", transition :"0.4s"});
         $('#carousel-example-generic').css({visibility: "visible"});
                $('.anim-title').css({opacity: "1"});
                $('.container').css({visibility: "visible"});
                $('.services').css({visibility: "visible"});
                $('.footer').css({visibility: "visible"});
                $('.breadcrumb').css({visibility: "visible"});
                $('.thumb-work').css({visibility: "visible"});
                $('body').removeClass('color');
                $('.big-logo').hide();
          
           
         

}else{
		$this.removeClass('is-close').addClass('is-open is-open-color');
                $('body').css('overflowX','hidden');
                $('body').css('overflowY','hidden');
                
                $('#container').css({marginLeft: "50%", transition :"0.4s"});
                $('#carousel-example-generic').css({visibility: "hidden"});
                $('.anim-title').css({opacity: "0"});
                $('.container').css({visibility: "hidden"});
                $('.services').css({visibility: "hidden"});
                $('.footer').css({visibility: "hidden"});
                $('.breadcrumb').css({visibility: "hidden"});
                $('.thumb-work').css({visibility: "hidden"});
                $('.big-logo').show().addClass('animated slideInRight');
                var wH= $(window).width();
                if(wH > 767){
                    
                     $('body').addClass('color');
                      
                }

                
                
	}

//open nav left

	if( $('#pushMain').toggle()){
		$('.push-main').addClass('is-open-test animated slideInLeft');
                $('body').scrollTop(0);
               
                
              
                   
                   
           
          
	} else {
		$('.push-main').removeClass('is-open-test animated slideInLeft');

                
                
                
                
        
	} 

        
        $('.mail').click(function(){
                    $('#form-contact').show();
                    $('.navbar-default').css({marginTop: "-6.5%", transition :"0.4s"});

                    
                });
                
        $('.envoyer').click(function(){
            $('#form-contact').hide();
            $('.main-content').show();
            $('.navbar-default').css({marginTop: "20%", transition :"0.4s"});
             $('.contact-me').css({marginTop: "32%", transition :"0.4s"});
        });


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
 
 $(function(){
   $(document).ready(function () {
        var navHeight = $('.project-content').height();
	$('.nav-add').css('min-height', navHeight);
    });
    });
    
 $(function(){
   $('.project-content').resize(function () {
        var navHeight = $('.project-content').height();
	$('.nav-add').css('min-height', navHeight);
    });
      });
    
    

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

  
  function autoType(elementClass, typingSpeed){
  var thhis = $(elementClass);
  thhis.css({
    "position": "relative",
    "display": "inline-block"
  });
  thhis.prepend('<div class="cursor" style="right: initial; left:0;"></div>');
  thhis = thhis.find(".text-js");
  var text = thhis.text().trim().split('');
  var amntOfChars = text.length;
  var newString = "";
  thhis.text("|");
  setTimeout(function(){
    thhis.css("opacity",1);
    thhis.prev().removeAttr("style");
    thhis.text("");
    for(var i = 0; i < amntOfChars; i++){
      (function(i,char){
        setTimeout(function() {        
          newString += char;
          thhis.text(newString);
        },i*typingSpeed);
      })(i+1,text[i]);
    }
  },1500);
}

$(document).ready(function(){
  // Now to start autoTyping just call the autoType function with the 
  // class of outer div
  // The second paramter is the speed between each letter is typed.   
  autoType(".type-js",100);


  
});

  	//Initiat WOW JS
	new WOW().init();
        
       
  });