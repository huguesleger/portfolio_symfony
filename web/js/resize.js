/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


  $(document).ready(function(){
    var windowW = $(window).width();
  if(windowW >= 1024){
document.getElementById('imgSize').style.height=document.getElementById('sizeBackground').offsetHeight +200+"px";
  $('#Img-pos').insertBefore('#concept-mobile');
  
 } else {
//     $('.full-img-screenshot-pos-dark').removeClass();
   $('#concept-mobile').append($('#Img-pos'));
 }
});
