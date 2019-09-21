jQuery(document).ready(function($) {
		
	/* EVENT MOVIE TO TOP PAGE: */
	$("#goToTopAction").hide(); // HIDDEN BUTTON


	// SHOW WHEN SCROLL, HIDDEN WHEN VIEW AT TOP:
	$(document).scroll(function() { 
	   if($(window).scrollTop() === 0) {
	     $("#goToTopAction").hide();
	   }
	   if($(window).scrollTop() != 0) {
	     $("#goToTopAction").show();
	   }
	});

	/*JQUERY SCROLL TO...Top*/
	$("#goToTopAction").click(function (){
	    $('html, body').animate({
	        scrollTop: $(".scrollTopHeader").offset().top
	    }, 2000);
	});

	/* Show Or Hide Left SideBar */
	$("#titleSildeLeft").click(function(event) {
    	$("#contentLeftSidebarAcSlide").slideToggle("slow");    
    });

    /*Got Part Page*/
    $(".whatWeDo1").click(function(event) {
    	$('html, body').animate({
	        scrollTop: $("#whatWeDo1").offset().top - 100
	    }, 1000);
    });
    $(".processWork2").click(function(event) {
    	$('html, body').animate({
	        scrollTop: $("#processWork2").offset().top - 100
	    }, 1000);
    });
    $(".promiseOfWe3").click(function(event) {
    	$('html, body').animate({
	        scrollTop: $("#promiseOfWe3").offset().top - 100
	    }, 1000);
    });
    $(".outSoutJob4").click(function(event) {
    	$('html, body').animate({
	        scrollTop: $("#outSoutJob4").offset().top - 100
	    }, 1000);
    });
    $(".giftAndFree5").click(function(event) {
    	$('html, body').animate({
	        scrollTop: $("#giftAndFree5").offset().top - 100
	    }, 1000);
    });
    $(".teamInfor6").click(function(event) {
    	$('html, body').animate({
	        scrollTop: $("#teamInfor6").offset().top - 100
	    }, 1000);
    });

    /*Set fixed when scroll for row search*/    
	var distance = $('.searchRow').offset().top,
	    $window = $(window);
	$window.scroll(function() {
	    if ( $window.scrollTop() >= distance ) {
	        $("#rowSearchMain").addClass( "fixedForSearchRow" );
	    } else{
	    	$("#rowSearchMain").removeClass( "fixedForSearchRow" );
	    }
	});
});
