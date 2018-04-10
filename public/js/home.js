function menuLeft(){
	$(".section-produit-biere").css('display', 'none');
}

$(document).ready(function() {
	$(".glyphicon-menu-left").click(function() {
		menuLeft();
	});}
);