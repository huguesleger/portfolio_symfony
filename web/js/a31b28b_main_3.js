$(document).ready(function(){$(".btn-rubrique").click(function(){$("body").addClass("animated-speed fadeOut")})});$(document).ready(function(){$.adaptiveBackground.run({normalizeTextColor:true})});$(document).ready(function(){var a=$(window).width();if(a>767){$("#Hamb").midnight()}});$(document).ready(function(){var a=$(document).innerHeight();$(".logo-hl-admin").css("max-height",a);var a=$(document).innerHeight();$(".project-content").css("min-height",a)});$(document).ready(function(){$(".main-icon").click(function(){$(".menu-type").toggleClass("open");var a=$(window).width();if(a>767){$(".navbar-brand").addClass("white");$("#content").toggleClass("push-content")}$this=$(this);if($this.hasClass("is-open")){$this.addClass("is-close").removeClass("is-open , is-open-color");$("body").css("overflowY","visible");$("#colorLogo").find("path").attr("fill","#000");$(".main-content").show();$(".navbar-brand").removeClass("white");$("#big").removeClass("animated fadeIn big-logo");$(".menu-tint").hide(410);$("#iconSvg").css("position","absolute")}else{$this.removeClass("is-close").addClass("is-open is-open-color");$("#big").addClass("animated fadeIn big-logo");if(a>767){$("#colorLogo").find("path").attr("fill","#fff")}$("body").css("overflowY","hidden");$("#iconSvg").css("position","fixed")}$(".btn-rubrique a").mouseenter(function(){$(".line").css("top","85%","height","10%")});$(".btn-rubrique a").mouseout(function(){$(".line").css("top","0%","height","90%")});$("#bg-white").mouseenter(function(){$(".btn-rubrique a").addClass("txt-color-primary");$(".navbar-brand").removeClass("white");$(".navbar-brand").addClass("black");$(".main-icon.is-open.is-open-color").addClass("border-dark");$("#colorLogo").find("path").attr("fill","#000")});$("#bg-white").mouseout(function(){$(".btn-rubrique a").removeClass("txt-color-primary");$(".navbar-brand").addClass("white");$(".navbar-brand").removeClass("black");$(".main-icon.is-open.is-open-color").removeClass("border-dark");$("#colorLogo").find("path").attr("fill","#fff")});var b;$(".btn-rubrique a").mouseenter(function(){var c=$(this).attr("name");$("#bg-menu div[name="+c+"]").addClass("hovered");b=$("#bg-menu div[name="+c+"]")});$(".btn-rubrique a").mouseout(function(){$(b).removeClass("hovered")})})});$(document).ready(function(){$("#home .container-fluid").css({marginLeft:"0px",marginRight:"0px",transition:"0.4s"})});$(window).on("scroll",function(){if($(window).scrollTop()===0){$("#home .container-fluid").css({marginLeft:"0px",marginRight:"0px",transition:"0.4s"})}else{$("#home .container-fluid").css({marginLeft:"15px",marginRight:"15px"})}});$(document).ready(function(){var a=$(window).width();if(a>767){$(".carousel").carousel({interval:0})}});$(document).ready(function(){new WOW().init()});$(document).ready(function(){$(".count").each(function(){$(this).prop("Counter",-1).animate({Counter:$(this).text()},{duration:4000,easing:"swing",step:function(a){$(this).text(Math.ceil(a))}})})});$(document).ready(function(){$(window).scroll(function(b){a()});function a(){var b=$(window).scrollTop();$(".img-header").css("top",-(b*0.0315)+"rem");$(".img-header > h2").css("top",-(b*-0.005)+"rem");$(".img-header > h2").css("opacity",1-(b*0.00245))}$(window).on("scroll",function(){var b=$(window).width();var c=$(".img-header").outerHeight();if(b>767){if($(window).scrollTop()>(c)){$(".breadcrumb").addClass("fixed-bread padd-top-lg");$(".breadcrumb").css("opacity","0.9");$(".infos-project-single").css("padding-top","90px")}else{$(".breadcrumb").removeClass("fixed-bread padd-top-lg");$(".breadcrumb").css("opacity","1");$(".infos-project-single").css("padding-top","30px")}}else{if(b<767){if($(window).scrollTop()>(c)){$(".breadcrumb").addClass("fixed-bread");$(".breadcrumb").css({opacity:"0.9",top:"50px"})}else{$(".breadcrumb").removeClass("fixed-bread");$(".breadcrumb").css({opacity:"0.9",top:"0"})}}}})});$(document).ready(function(){if($("#back-to-top").length){var b=900,a=function(){var c=$(window).scrollTop();if(c>b){$(".btn-top").addClass("show")}else{$(".btn-top").removeClass("show")}};a();$(window).on("scroll",function(){a()});$(".btn-top").on("click",function(c){c.preventDefault();$("html,body").animate({scrollTop:0},700)})}});$(document).ready(function(){$(function(){$("#moreThumb .container-fluid").hide();$("#btnMoreThumb").click(function(){$("#moreThumb .container-fluid").show();$("#btnMoreThumb").hide()})})});