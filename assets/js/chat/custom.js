$(document).ready(
	function() 
	{
		$("ul.chat-message").niceScroll({
			cursorcolor: "#2f2e2e",
			cursoropacitymax: 0.6,
			boxzoom: false,
			touchbehavior: false
		});
		
		$("ul.chat-message").scroll(function()
		{
		  $(this).getNiceScroll().resize();
		});
		
		$("ul.chat-message").animate({ scrollTop: 999999 }, 'fast');
	}
);