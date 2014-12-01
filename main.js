$("li").mouseenter(function() {
	$(this).animate({
		"background-color": "#e0e0e0"
	}, 'slow');
}).mouseleave(function() {
	$(this).css("background-color", "#fff");
});