$(document).ready(function(){ 
$('.main-icon').click(function(){
$this = $(this);
if($this.hasClass('is-open')){
	$this.addClass('is-close').removeClass('is-open , is-open-color');
        $('body').css('overflow','visible');
        $('#form-contact').hide();
         $('.main-content').show();
         $('.navbar-default').css({marginTop: "10%", transition :"0.4s"});

}else{
		$this.removeClass('is-close').addClass('is-open , is-open-color');
                $('body').css('overflow','hidden');
                
	}

//open nav left

	if( $('#pushMain').toggle("slide")){
		$('.push-main').addClass('is-open-test');
              
                   
                   
           
          
	} else {
		$('.push-main').removeClass('is-open-test');
       
	}
        
        $('.mail').click(function(){
                    $('#form-contact').show();
                    $('.navbar-default').css({marginTop: "-9px", transition :"0.4s"});
                });
                
        $('.envoyer').click(function(){
            $('#form-contact').hide();
            $('.main-content').show();
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


$(function(){
 var navHeight = $('.project-content').height();
	$('.nav-add').css('height',navHeight);
        });
        
   $(window).resize(function () {
        var navHeight = $('.project-content').height();
	$('.nav-add').css('height',navHeight);
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
			$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close confirm" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Merci de confirmer</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-danger" id="dataConfirmOK">Oui</a></div></div></div></div>');
		}
		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
		$('#dataConfirmOK').attr('href', href);
		$('#dataConfirmModal').modal({show:true});
		
		return false;
	});
});



});
 
  
