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



 var navHeight = $('.project-content').height();
	$('.nav-add').css('height',navHeight);

   $(window).resize(function () {
        var navHeight = $('.project-content').height();
	$('.nav-add').css('height',navHeight);
    });


});

 
  
