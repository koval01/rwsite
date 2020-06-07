$('.owl-carousel').owlCarousel({
	items: 1,
	loop: true,
	margin: 10,
	nav: false,
	dots: true,
	slideTransition: 'ease',
	autoplay: true,
	autoplayTimeout: 4000
});
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
$('.more-news').click(function() {
	$('.more-news-show').slideDown();
	$(this).animate({
		opacity:0,
		margin:0,
		padding:0
	});
})