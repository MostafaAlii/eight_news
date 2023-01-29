$(function(){
    // vars
    var htmlAndBodyElements = $('html, body');
    var csrollToTop = $('#scroll-up');

/*
    ####################################
    ** scroll-up
    ####################################
*/
$(window).scroll(function(){
    // Start feature csroll_to_top
    if($(window).scrollTop() >= 300){
        
        if(csrollToTop.is(':hidden')){
            csrollToTop.fadeIn(1000);
        }

    }else{
        csrollToTop.fadeOut(1000);
    }
    /////////////////////////////////
    ///////////// popUp ////////////
});
csrollToTop.on('click',function(){
    htmlAndBodyElements.animate({
        scrollTop: 0
    },1000);
});
/*
    ####################################
    ** Search Input
    ####################################
*/
$('.search').click(function () { 
    $('.input-box').addClass('open');
});
    
// ---- ---- Close Input ---- ---- //
$('.close-icon').click(function () { 
    $('.input-box').removeClass('open');
});

// End Search Animation Input 

/*
    ####################################
    ** Initialize Swiper
    ####################################
*/
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 5,
  spaceBetween: 1,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
/*
    ####################################
    ** prodcast-section
    ####################################
*/
var swiper = new Swiper(".prodcast-sec", {
  slidesPerView: 3,
  spaceBetween: 1,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});



/*
    ####################################
    ** Latest Posts
    ** This fiddle is using the latest version  of Slick (from master) and jQuery.
    ####################################
*/
$(".slider").slick({
  asNavFor: '.nav',
  slidesToShow: 1,
  slidesToScroll: 1,
  swipeToSlide: true
});

$(".nav").slick({
  asNavFor: '.slider',
  slidesToShow: 5,
  slidesToScroll: 1,
  draggable:true,
  infinite: true,
  swipeToSlide: true,
  vertical: true,
  verticalSwiping: true,
  centerMode: false
});

// replace getSlideCount and getNavigableIndexes without rehosting hack

$(".nav, .slider").each(function() {
  this.slick.getSlideCount = function() {

      var _ = this,
          slidesTraversed, swipedSlide, centerOffset;
          

      centerOffset = _.options.centerMode === true ? _.slideWidth * Math.floor(_.options.slidesToShow / 2) : 0;

    if (_.options.swipeToSlide === true) {
          
          _.$slideTrack.find('.slick-slide').each(function(index, slide) {
              var offsetPoint = slide.offsetLeft,
                  outerSize = $(slide).outerWidth();
              
              if(_.options.vertical === true) {
                  offsetPoint = slide.offsetTop;
                  outerSize = $(slide).outerHeight();
              }
              if (offsetPoint - centerOffset + (outerSize / 2) > (_.swipeLeft * -1)) {
                  swipedSlide = slide;
                  return false;
              }
          });
          slidesTraversed = Math.abs($(swipedSlide).attr('data-slick-index') - _.currentSlide) || 1;
          
          return slidesTraversed;
      } else {
          return _.options.slidesToScroll;
      }

  };
  
  this.slick.getNavigableIndexes = function() {

      var _ = this,
          breakPoint = 0,
          counter = 0,
          indexes = [],
          max;

      if (_.options.infinite === false) {
          max = _.slideCount;
      } else {
          breakPoint = _.options.slideCount * -1;
          counter = _.options.slideCount * -1;
          max = _.slideCount * 2;
      }

      while (breakPoint < max) {
          indexes.push(breakPoint);
          breakPoint = counter + _.options.slidesToScroll;
          counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
      }

      return indexes;

  };
});

//
$('button.slick-prev').html('<i class="fa fa-angle-up" aria-hidden="true"></i>');
$('button.slick-next').html('<i class="fa fa-angle-down" aria-hidden="true"></i>');

});

/*
    ####################################
    ** dark mode
    ####################################
*/
const darkmode = new darken({
    toggle: "#dm-toggle",
    variables: {
        "--primary-color": ["#ffffff", "#000000"],
        "--text-color": ["#000000", "#ffffff"],
    },
    stylesheets: {
        id: "darken-stylesheet",
        dark: "assets/css/dark.css",
        light: "assets/css/light.css",
    },
});


/*
    ####################################
    ** Create List And Grid View category page
    ####################################
*/
$('.sort-tablist li').click(function(e){
    e.preventDefault();
    
    $(this).addClass('active').siblings().removeClass('active');
    $('#sort-type').removeClass('layout-grid layout-list').addClass($(this).attr('data-bs-toggle'));

});

$('#myTab a').on('click', function (e) {
    e.preventDefault();
    $(this).tab('show');
    $(this).addClass('active').siblings().removeClass('active');
})