jQuery(document).ready(function ($) {

  var $toggle = $('#header-toggle');
  var $menu = $('#header-menu');

  $toggle.click(function() {
    $(this).toggleClass('is-active');
    $menu.toggleClass('is-active');
  });

  $('.modal-button').click(function() {
    var target = $(this).data('target');
    $('html').addClass('has-modal-open');
    $(target).addClass('is-active');
  });

  $('.modal-background, .modal-close').click(function() {
    $('html').removeClass('has-modal-open');
    $(this).parent().removeClass('is-active');
  });


});


var menu = document.querySelector('.hero-footer');
var hero = document.querySelector('.hero');
var menuPosition = menu.getBoundingClientRect().top;
window.addEventListener('scroll', function() {
    if (window.pageYOffset >= menuPosition) {
        menu.style.position = 'fixed';
        menu.style.top = '0px';
        menu.style.left = '0px';
        menu.style.right = '0px';
		menu.style.boxShadow ="0 0 5px rgba(0, 0, 0, 0.2)";
    } else {
        menu.style.position = 'static';
        menu.style.top = '';
		menu.style.boxShadow ="none";
    }

});

var images = [ "bg1.jpg", "bg2.jpg", "parl.jpg"];

var rbg_slider = function(){
	if(images.indexOf())
	var bgurl = $('#bg-slider').css("background-image");
	var href = window.location.href;
	href.replace("index.html#", "");
	bgurl = bgurl.substring(href.length+1, bgurl.length-2);
	$('#bg-slider').css("background-image", "url('images/" + images[(images.indexOf(bgurl)+1)%images.length] + "')");
}

var lbg_slider = function(){
	if(images.indexOf())
	var bgurl = $('#bg-slider').css("background-image");
	var href = window.location.href;
	href.replace("index.html#", "");
	bgurl = bgurl.substring(href.length+1, bgurl.length-2);
	$('#bg-slider').css("background-image", "url('images/" + images[(images.indexOf(bgurl)+images.length-1)%images.length] + "')");
}
