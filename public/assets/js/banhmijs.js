var myCustomScrollbar = document.querySelector('.my-custom-scrollbar');
var ps = new PerfectScrollbar(myCustomScrollbar);

var scrollbarY = myCustomScrollbar.querySelector('.ps.ps--active-y>.ps__scrollbar-y-rail');

myCustomScrollbar.onscroll = function() {
    scrollbarY.style.cssText = `top: ${this.scrollTop}px!important; height: 400px; right: ${-this.scrollLeft}px`;
}


$('#exampleModalCenter').on('show.bs.modal', function(e) {
    $('#carouselExampleControls').carousel('pause')
});

$('#exampleModalCenter').on('hidden.bs.modal', function(e) {
    $('#carouselExampleControls').carousel({
        interval: 2000
    })
});
//Slider //


// Next/previous controls


// Thumbnail image controls