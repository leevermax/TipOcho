$(document).ready(function(){

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
	
});
