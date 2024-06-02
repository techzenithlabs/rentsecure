
/*==================================================
    Sticy Slider  
 ==================================================*/
 
$(document).ready(function(){
    $(window).scroll(function() {
       if ($(this).scrollTop() >0){
          $('.header').addClass("sticky");
       } else {
          $('.header').removeClass("sticky");
       }
    })
});

/*==================================================
 About Say Slider  
 ==================================================*/

$('.about-carousel').owlCarousel({
    loop:true,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:2
        }
    }
})