$(document).ready(function(){var a=$(window).width();if(a>1023){$(".full-img-screenshot-pos-dark").show();$(".full-img-screenshot-pos-dark").css({height:($("#sizeBackground").height()+480)})}else{if(a<1023){$(".full-img-screenshot-pos-dark").hide()}}$(window).resize(function(){var b=$(window).width();if(b>1023){$(".full-img-screenshot-pos-dark").show();$(".full-img-screenshot-pos-dark").css({height:($("#sizeBackground").height()+480)})}else{if(b<1023){$(".full-img-screenshot-pos-dark").hide()}}})});