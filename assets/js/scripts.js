jQuery(document).ready(function($){

homeHeight();

/* page builder row styles */
var row_container = $('body').data('container');
$('.panel-row-style').each(function(){
    /* container */
    var row_co = $(this).data('container');
    if(row_co == null || row_co=='' || row_co == undefined){
        row_co = row_container;
    } 
    $(this).find('.panel-grid-cell').wrapAll('<div class="'+row_co+'"></div>');

    
 });
/* container ends */




/* banner slider */
    var auto_play = true;
    var s_speed = parseInt( $('.top_slider').data('speed') );
    if( s_speed === 0 ){
        auto_play = false;
    }
    var a_speed = parseInt( $('.top_slider').data('animation') ); 
    $('.top_slider').flexslider({
        slideshow: auto_play,
        slideshowSpeed: s_speed,
        animationSpeed: a_speed,
        controlNav: false,
        directionNav: true,
        animationLoop: true,
        prevText: '<i class="fas fa-angle-left">',
        nextText: '<i class="fas fa-angle-right">',
        
    });
    $('.flex-direction-nav').addClass('container-large');

/* one page scroll */
$('#primary-menu li a').on('click' , function(e){
    var href= $(this).attr('href'); 
    if( href.startsWith( '#' ) ){
        e.preventDefault();
        $(this).parent().siblings().removeClass('current-menu-item');
        $(this).parent().addClass('current-menu-item');
        var scrollTo = $(href).offset().top;
        scrollTo = scrollTo-50;
        $('html,body').animate({ scrollTop:scrollTo+'px'} , 1000);
    }
});

/* pagebuilder widget styles */
$('.panel-widget-style').each(function(){
    var title_color = $(this).data('title-color');
    if( title_color ){
        var title =  $(this).find('.compo-header h3');
        if( ! title.hasClass('compo-price-table-title') ){
            title.css('color',title_color);
        }
        
    }
});




    $(".do-scrol").click(function(e){
        e.preventDefault();
        var target = $(this).attr('href');
        var scrolltop = $(target).offset().top;
        $('html, body').animate({scrollTop: scrolltop }, 1500 );
    });

    
    
//Filtering Portfolio

$(function() {
    var selectedClass = "";
    $(".fil-cat").click(function(e){
        e.preventDefault();
        selectedClass = $(this).attr("data-rel");
        $(".fil-cat").removeClass("active-work");
       $(this).addClass("active-work");
        $("#portfolioWork").fadeTo(100, 0.1);
        $("#portfolioWork div.tile").not("."+selectedClass).fadeOut().removeClass('scale-anm');
        setTimeout(function() {
            $("."+selectedClass).fadeIn().addClass('scale-anm');
            $("#portfolioWork").fadeTo(300, 1);
        }, 300);

    });
});
//Ends==========



//Fixed footer
function fixFooter(){
    if($('#footer').hasClass('fixed-footer')){
        var spaceBtm = $('.fixed-footer').outerHeight();
        $('.body-wrapp').addClass('keepSpace');
        $('.keepSpace').css({
            'margin-bottom': spaceBtm - 24 + 'px'
        })
    }
}

fixFooter();

//Input form underline

$('.input-box').not(this).on('click', function(){
    $(this).parent().removeClass('has-border');
});

$('.input-box').off().on('focus', function(){
    $('.input-wrap').removeClass('has-border');
    $(this).parent().addClass('has-border');
});

//Popup setting=====================================
$('.fire-video-popup').off().on('click', function(){
    $('#videoPop').fadeIn(400);
    $('body').css({
        'overflow-y':'hidden'
    });
});

$('.custop-pop-close').off().on('click', function(){
    $('#videoPop').fadeOut(400);
    $('body').css({
        'overflow-y':'auto'
    });
});
//===================================================

//Menu trigger====================
$('.mobile-menu').on('click', function(){
    $(this).toggleClass('collapse-menu')
    $('.menu-main').slideToggle(400);
});

//If no banner

if($('.body-wrapp').hasClass('no-banner')){
    var hdrHeight = $('.jr-site-header').outerHeight() + 'px';
    $('.jr-site-header + section, .jr-site-header + div').css({
        'paddingTop': hdrHeight
    });
}

//full width youtube video
$(function(){
    $('.jr-site-static-banner iframe').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });
  
    $(window).resize(function(){
      $('.jr-site-static-banner iframe').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });
    });
  });



//Skill bar js
$('.skillbar').each(function(){
    $(this).find('.skillbar-bar').animate({
        width:$(this).attr('data-percent')
    },2000);
});

//Accordian

$('.acc-title').off().on('click', function () {
    $('.acc-content').slideUp(400);
    $('.acc-title').removeClass('active');
    $(this).addClass('active');
    $(this).siblings('.acc-content').slideDown(400);
});



//Owl carousel===========

    //multiple carousel in one page
    $('.testimonial-slider').owlCarousel({
        loop:true,
        autoplay:true,
        margin:10,//Gutter space between items
        autoHeight:true,
        items:1,
        autoHeight: false,
        nav:true,
        navText: ["<span class='fa fa-arrow-left'></span>","<span class='fa fa-arrow-right'></span>"]
    });

        //Team
    $('.teamCarousel').owlCarousel({
        loop:true,
        autoplay:true,
        autoplayTimeout:7000,
        margin:20,
        nav:true,
        navText: ["<span class='fas fa-arrow-circle-left'></span>","<span class='fas fa-arrow-circle-right'></span>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1024:{
                items:4
            }
        }
    });

    //Client Logos
    $('.clientLogo').owlCarousel({
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:3000,
        nav:false,
        navText: ["<span class='fa fa-arrow-left'></span>","<span class='fa fa-arrow-right'></span>"],
        responsive:{
            0:{
                items:2
            },
            600:{
                items:2
            },
            1000:{
                items:5
            }
        }
    });


//Sticky Header =========

$(window).scroll(function () {
    var scrollTop = $(window).scrollTop();
    if(scrollTop > 100){
        $('.jr-site-header').addClass('scrolled')
    }
    else{
        $('.jr-site-header').removeClass('scrolled')
    }
});

$(window).resize(function(){
    homeHeight();
    

});

/*-----------------------------------------------------------------------------------*/
/*  MENU
/*-----------------------------------------------------------------------------------*/
function calculateScroll() {
    var contentTop      =   [];
    var contentBottom   =   [];
    var winTop      =   $(window).scrollTop();
    var rangeTop    =   200;
    var rangeBottom =   500;
    $('.navmenu').find('.scroll_btn a').each(function(){
        contentTop.push( $( $(this).attr('href') ).offset().top );
        contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
    })
    $.each( contentTop, function(i){
        if ( winTop > contentTop[i] - rangeTop && winTop < contentBottom[i] - rangeBottom ){
            $('.navmenu li.scroll_btn')
            .removeClass('active')
            .eq(i).addClass('active');
        }
    })
};

jQuery(document).ready(function() {
    //MobileMenu
    if ($(window).width() < 768){
        jQuery('.menu_block .container').prepend('<a href="javascript:void(0)" class="menu_toggler"><span class="fa fa-align-justify"></span></a>');
        jQuery('header .navmenu').hide();
        jQuery('.menu_toggler, .navmenu ul li a').click(function(){
            jQuery('header .navmenu').slideToggle(300);
        });
    }

    // if single_page
    if (jQuery("#page").hasClass("single_page")) {
    }
    else {
        $(window).scroll(function(event) {
            calculateScroll();
        });
        $('.navmenu ul li a, .mobile_menu ul li a, .btn_down').click(function() {
            $('html, body').animate({scrollTop: $(this.hash).offset().top - 80}, 1000);
            return false;
        });
    };
});



// utility functions 
function homeHeight(){
    var wh = jQuery(window).height() - 0;
    var ww = jQuery(window).width();
    var wmh = jQuery('#siteHeader').outerHeight();
    wmh = wmh-1;
    if( ww > 767 ){
         jQuery('.top_slider, .top_slider .slides li').css('height', wh);
     }else{
        jQuery('.top_slider, .top_slider .slides li').css({'height':'350px'});
         jQuery('.top_slider').css({'margin-top':wmh + 'px'});
     }
    

}

});

jQuery(window).load(function(){

    if( jQuery('.compo-portfolio').length != 0 ){
         var panelGrid = jQuery('.compo-portfolio').closest('.panel-row-style');
         var ht = panelGrid.outerHeight(); 
         panelGrid.css('height', ht+'px');
         panelGrid.find('.panel-grid-cell').css('align-self' , 'flex-start' );
    }

});
