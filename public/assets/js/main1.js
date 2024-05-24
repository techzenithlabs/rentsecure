/*==================================================
 Notifications Slider  
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
 Home Banner Slider  
 ==================================================*/

$('.banner-sec').owlCarousel({
    animateOut: 'fadeOut',
    autoplay:true,
    autoplayTimeout:5000,
    smartSpeed:1000,
    loop:true,
    margin:0,
    items:1,
    nav:false,
    dots:false
});


/*==================================================
 Home Year Exp
 ==================================================*/

$('.year-exp').owlCarousel({
    autoplay:true,
    autoplayTimeout:5000,
    smartSpeed:1000,
    loop:true,
    margin:0,
    items:1,
    nav:false,
    dots:true
});

/*==================================================
 Home Customer logo
 ==================================================*/

$('.customer-logo').owlCarousel({
    autoplay:true,
    smartSpeed:1000,
    loop:true,
    margin:70,
    nav:false,
    dots:true,
    responsive:{
        0:{
            items:2
        },
        480:{
            items:3
        },
        768:{
            items:4
        },
        1000:{
            items:5
        }
    }
})


$('.customer-moblie').owlCarousel({
    autoplay:true,
    autoplayTimeout:5000,
    smartSpeed:1000,
    loop:true,
    margin:0,
    items:1,
    nav:false,
    dots:true
})

/*==================================================
  milestones logo
 ==================================================*/

 $('.milestones-carousel').owlCarousel({
    autoplay:false,
    smartSpeed:1000,
    loop:true,
    margin:0,
    nav:false,
    dots:true,
    responsive:{
        0:{
            items:2
        },
        480:{
            items:3
        },
        768:{
            items:4
        },
        1000:{
            items:7
        }
    }
})

/*==================================================
 Tesimonial slider
 ==================================================*/

$('.testimonial-slider').owlCarousel({
    autoplay:false,
    autoplayTimeout:5000,
    smartSpeed:1000,
    loop:true,
    margin:0,
    items:1,
    nav:false,
    dots:true
});


/*==================================================
    hamburger Icon 
 ==================================================*/

$(document).ready(function(){
  $(".hamburger").click(function(){
    $(this).toggleClass("is-active");
  });
});


/*==================================================
    Wow Js
 ==================================================*/

WOW.prototype.addBox = function(element) {
    this.boxes.push(element);
    };
    var wow = new WOW();
    wow.init();

/*==================================================
   Footer Js
 ==================================================*/

$(document).ready(function(){
    if ($(window).width() < 767) {
        $(".footer-sec h4").click(function(){
          $(this).next(".link").toggle();
          $(this).toggleClass("show");
        });
    }
});

/*==================================================
   Side Menu
 ==================================================*/

$(document).ready(function(){

  $(".mobile-icon").click(function(){
    $(".mobile-menu").toggleClass("visiable");
  });

  $(".closed").click(function(){
    $(".mobile-menu").removeClass("visiable");
  });

  $(".mobile-icon").click(function(){
    $('body').toggleClass("black-shadow");
  });

  $(".closed").click(function(){
    $('body').removeClass("black-shadow");
  });

    $(document).ready(function(){
      $(".mob-menu h4").click(function(){
        $(this).next(".sub-menu").toggle("slow");
      });
    });

    $(document).ready(function(){
      $(".mob-menu h4").click(function(){
        $(this).toggleClass("up-aarow");
      });
    });

});

/*==================================================
  Careers Load More
 ==================================================*/


 $(document).ready(function(){
   $(".post-req .post-repeat").slice(0, 4).show();
   $("#careerMore").on("click", function(e){
     e.preventDefault();
     $(".post-req .post-repeat:hidden").slice(0, 3).slideDown();
     if($(".post-req .post-repeat:hidden").length == 0) {
       $("#careerMore").text("No Content").addClass("noContent");
     }
     $('html,body').animate({
       scrollTop: $(this).offset().top
    }, 200);
   });
 });


/*==================================================
   News Load More
 ==================================================*/

 $(document).ready(function(){
   $(".event-all-img .col-md-4").slice(0, 6).show();
   $("#loadMore").on("click", function(e){
     e.preventDefault();
     $(".event-all-img .col-md-4:hidden").slice(0, 3).slideDown();
     if($(".event-all-img .col-md-4:hidden").length == 0) {
       $("#loadMore").text("No Content").addClass("noContent");
     }
     $('html,body').animate({
       scrollTop: $(this).offset().top
    }, 200);
   });
 });