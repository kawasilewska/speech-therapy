var ypos,image;
	function parallex() {
		ypos = window.pageYOffset;
		image = document.getElementById('parallax');
		image.style.top = ypos * .8 + 'px'; 
	}
	window.addEventListener('scroll', parallex);

	$(document).ready(
		function() { 
			$("html").niceScroll();
		}
	);