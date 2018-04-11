function menuLeft(){
	if ($('.home-type-produit').text()=="Nos bières")
	{
		$('.home-type-produit').text("Divers");
		$(".section-produit-biere").toggle();
		$(".section-produit-diver").toggle();
	}	
	else if ($('.home-type-produit').text()=="Divers")
	{
		$('.home-type-produit').text("Nos verres");
		$(".section-produit-diver").toggle();
		$(".section-produit-verre").toggle();
	}	
	else if ($('.home-type-produit').text()=="Nos verres")
	{
		$('.home-type-produit').text("Nos alcools");
		$(".section-produit-verre").toggle();
		$(".section-produit-alcool").toggle();
	}	
	else if ($('.home-type-produit').text()=="Nos alcools")
	{
		$('.home-type-produit').text("Nos vins");
		$(".section-produit-alcool").toggle();
		$(".section-produit-vin").toggle();
	}	
	else if ($('.home-type-produit').text()=="Nos vins")
	{
		$('.home-type-produit').text("à la tireuse");
		$(".section-produit-vin").toggle();
		$(".section-produit-tireuse").toggle();
	}	
	else if ($('.home-type-produit').text()=="à la tireuse")
	{
		$('.home-type-produit').text("Nos bières");
		$(".section-produit-tireuse").toggle();
		$(".section-produit-biere").toggle();
	}
}
function menuRight(){
	if ($('.home-type-produit').text()=="Nos bières")
	{
		$('.home-type-produit').text("à la tireuse");
		$(".section-produit-biere").toggle();
		$(".section-produit-tireuse").toggle();
	}	
	else if ($('.home-type-produit').text()=="à la tireuse")
	{
		$('.home-type-produit').text("Nos vins");
		$(".section-produit-tireuse").toggle();
		$(".section-produit-vin").toggle();
	}	
	else if ($('.home-type-produit').text()=="Nos vins")
	{
		$('.home-type-produit').text("Nos alcools");
		$(".section-produit-vin").toggle();
		$(".section-produit-alcool").toggle();
	}	
	else if ($('.home-type-produit').text()=="Nos alcools")
	{
		$('.home-type-produit').text("Nos verres");
		$(".section-produit-alcool").toggle();
		$(".section-produit-verre").toggle();
	}	
	else if ($('.home-type-produit').text()=="Nos verres")
	{
		$('.home-type-produit').text("Divers");
		$(".section-produit-verre").toggle();
		$(".section-produit-diver").toggle();
	}	
	else if ($('.home-type-produit').text()=="Divers")
	{
		$('.home-type-produit').text("Nos bières");
		$(".section-produit-diver").toggle();
		$(".section-produit-biere").toggle();
	}
}

$(document).ready(function() {
	$(".glyphicon-menu-left").click(function() {
		menuLeft();
	});
	$(".glyphicon-menu-right").click(function() {
		menuRight();
	});
	}
);