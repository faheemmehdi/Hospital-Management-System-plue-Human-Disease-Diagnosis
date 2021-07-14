
$(window).scroll(function(){
    if($(this).scrollTop()>400){
       $('.navbar').addClass('scrollTop');
    }
    else{
         $('.navbar').removeClass('scrollTop');
      
    }
})

$('html').smoothScroll();

$(function(){
    new WOW().init();
});