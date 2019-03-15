$(function() {
	$(window).scroll(function(){
		var scrollTop = $(window).scrollTop();
		if(scrollTop != 0) {
			$("#nav").stop().animate({'height':'0px'},300);
			$(".logo").stop().animate({'height':'64px', 'width':'64px'},300);
			$(".logo img").stop().animate({'top':'68%'},300);
		}
		else {
			$("#nav").stop().animate({'height':'35px'},300);
			$(".logo").stop().animate({'height':'120px', 'width':'120px'},300);
			$(".logo img").stop().animate({'top':'50%'},300);
		}
	});

	$("header").hover(function(){
		$("#nav").stop().animate({'height':'35px'},300);
		$(".logo").stop().animate({'height':'120px', 'width':'120px'},300);
		$(".logo img").stop().animate({'top':'50%'},300);
	});

	$('.menu__icon').on('click', function() {
		$(this).closest('#nav').toggleClass('menu_state_open');
	});

	$('.map_btn').on('click', function() {
		$(this).closest('.shop').toggleClass('state_open');
	});

	$().UItoTop({ easingType: 'easeOutQuart' });
});
