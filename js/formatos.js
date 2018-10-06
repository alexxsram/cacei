$(document).ready( function() {
	$(".title").click(function() {
		var ul = $(this).parent().find("ul");
		
		ul.slideToggle(300, function() {
			if(ul.css('display') == 'none') {
				ul.parent().find(".arrow").html("&#9662;");
				ul.parent().find(".title").css("backgroundColor", "#101315");
			} else {
				ul.parent().find(".arrow").html("&#9652;");
				ul.parent().find(".title").css("backgroundColor", "#2ecc71");
			}
		});
	});
});