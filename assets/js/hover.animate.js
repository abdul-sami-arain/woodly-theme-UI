jQuery(document).ready(function ($) {



	// Banner Moving JS Start
	var lFollowX = 0,
		lFollowY = 0,
		x = 0,
		y = 0,
		friction = 1 / 30;

	function moveBackground() {
		x += (lFollowX - x) * friction;
		y += (lFollowY - y) * friction;

		//  translate = 'translateX(' + x + 'px, ' + y + 'px)';
		translate = 'translateX(' + x + 'px) translateY(' + y +'px)';

		$('.medi-animate_hover').css({
		'-webit-transform': translate,
		'-moz-transform': translate,
		'transform': translate
		});

		window.requestAnimationFrame(moveBackground);
	}

	$(window).on('mousemove click', function(e) {
		
		var isHovered = $('.medi-animate_hover:hover').length > 0;
		console.log(isHovered);
		
		//if(!$(e.target).hasClass('medi-animate_hover')) {
		if(!isHovered) {
			var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX)),
					lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));

			lFollowX = (20 * lMouseX) / 100;
			lFollowY = (10 * lMouseY) / 100;
		}
	});

	moveBackground();


	setShareLinks();

	function socialWindow(url) {
		var left = (screen.width - 570) / 2;
		var top = (screen.height - 570) / 2;
		var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;
		// Setting 'params' to an empty string will launch
		// content in a new tab or window rather than a pop-up.
		// params = "";
		window.open(url,"NewWindow",params);
	}

	function setShareLinks() {
		var pageUrl = encodeURIComponent(document.URL);
		var tweet = encodeURIComponent($("meta[property='og:description']").attr("content"));

		$(".social-share.facebook").on("click", function() {
			url = "https://www.facebook.com/sharer.php?u=" + pageUrl; socialWindow(url);
		});

		$(".social-share.twitter").on("click", function() {
			url = "https://twitter.com/intent/tweet?url=" + pageUrl + "&text=" + tweet;
			socialWindow(url);
		});

		$(".social-share.linkedin").on("click", function() {
			url = "https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl; socialWindow(url);
		})
	}
	
});
	// Banner Moving JS End