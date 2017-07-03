$(document).ready(function(){
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
        
        $(document).ready(function(){
$('#myModal').modal('show');

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


