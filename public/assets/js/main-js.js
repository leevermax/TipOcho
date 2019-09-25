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

    /*Goto 1-6 Part Page*/
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


	/*Set Chiều cào phấn top bài viết*/
	if ($(".imgTitlePostViewDetail").height() > $(".titlePostViewPostDetail").height()) {
		$(".contentViewPost1").height($(".imgTitlePostViewDetail").height());
	}else {
		$(".contentViewPost1").height($(".titlePostViewPostDetail").height() );
	}

	/* Top infor of post when hover..*/ 
	$(".contentViewPost1").mouseenter(function(){
		$(".datePostViewPost").slideDown('slow');
	});
	$(".contentViewPost1").mouseleave(function(){
		$(".datePostViewPost").slideUp('slow');
	});

	/* Action click to view Image*/
	$(".imgToView").click(function(){		
		$("#imgShowToView").attr("src", $(this).attr("src"));
		$("#captionViewImages").text($(this).attr("alt"));
  		$("#myModalViewImages").show();
	});
	$(".closeViewImages").click(function(){
  		$("#myModalViewImages").hide();
	});
	$(document).keydown(function(e){
	   if(e.keyCode === 27){
	   	$("#myModalViewImages").hide();
	   }
	});

	/*process on Page Price Table*/
	getSumWeb();
	$(".screenNumberWeb").change(function(){
		if($(this). val() < 0){
			$(this). val(0);
		}
		getSumWeb();
	});
    
    /* Get and Show Sum fee Of web price table*/
	function getSumWeb(){
		var s1 = $("input[name=screenNumberWeb1]").val() * $("#screenNumberWeb1").val();
		var s2 = $("input[name=screenNumberWeb2]").val() * $("#screenNumberWeb2").val();
		var s3 = $("input[name=screenNumberWeb3]").val() * $("#screenNumberWeb3").val();
		var s4 = $("input[name=screenNumberWeb4]").val() * $("#screenNumberWeb4").val();
		var s5 = $("input[name=screenNumberWeb5]").val() * $("#screenNumberWeb5").val();
		var s6 = $("input[name=screenNumberWeb6]").val() * $("#screenNumberWeb6").val();
		var s7 = $("input[name=screenNumberWeb7]").val() * $("#screenNumberWeb7").val();
		var s8 = $("input[name=screenNumberWeb8]").val() * $("#screenNumberWeb8").val();
		
		var s1to8 = s1 + s2 + s3 + s4 + s5 + s6 + s7 + s8;
		var adOfWeb = (s1to8*20/100) * $("#screenAdminWeb").val();
		var sumFee = s1to8 + adOfWeb;

		var sumScr = Number($("input[name=screenNumberWeb1]").val()) + Number($("input[name=screenNumberWeb2]").val()) + 
					Number($("input[name=screenNumberWeb3]").val()) + Number($("input[name=screenNumberWeb4]").val()) + 
					Number($("input[name=screenNumberWeb5]").val()) + Number($("input[name=screenNumberWeb6]").val()) + 
					Number($("input[name=screenNumberWeb7]").val()) + Number($("input[name=screenNumberWeb8]").val());
		$("#sumScreenWebsite").text(sumScr);	
		$("#sumFeeWebsite").text(sumFee+" đ");	
	}	
});