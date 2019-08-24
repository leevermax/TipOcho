$(window).ready(function() { 
    var wi = $(window).width();     
    var div = document.getElementById("facebookBoxFooder");

    if (wi <= 576){
        div.attr('data-width', '300px');
        }
    else if (wi <= 767){
        div.attr('data-width', '20px');
        }
    else if (wi <= 980){
        div.attr('data-width', '30px');
        }
    else if (wi <= 1200){
        div.attr('data-width', '70px');
        }
    else {
        div.attr('data-width', '120px');
        }        
});