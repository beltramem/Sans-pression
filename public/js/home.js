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

function selectTireuse(id){
	var tireuse = document.getElementsByClassName(id)
	tireuse[0].style.textDecoration = "underline";
	tireuse[0].style.textDecorationColor = '#a7a129';
	tireuse[0].style.fontSize = '25px';
	tireuse[1].style.backgroundColor = 'rgba(0,0,0,0.4)';
}

function unselectTireuse(id)
{
	var tireuse = document.getElementsByClassName(id)
	tireuse[0].style.textDecoration = "none";
	tireuse[0].style.fontSize = '100%';
	tireuse[1].style.backgroundColor = 'rgba(0,0,0,0)';
}

function dispoHappyHour()
{
	var happyHour = document.getElementsByClassName("dispo-happy-hour");
	console.log(happyHour[0].innerHTML)
	if(happyHour[0].innerHTML=="<div class=\"glyphicon glyphicon-ok-circle\"></div>Disponible en happy hour")
	{
		happyHour[0].style.color = "green";
	}
	else
	{
		happyHour[0].style.color = "red";
		var happyIcon = document.getElementsByClassName("glyphicon glyphicon-ok-circle")
		happyIcon[0].className = "glyphicon glyphicon-remove-circle"
	}
}

function scrollTireuse()
{
	var speed = 750; // Durée de l'animation (en ms)
	$('html, body').animate( { scrollTop: $(".description-tireuse").offset().top }, speed ); // Go
	return false;
}

function scrollTo(div)
{
	var page = $(div).attr('href'); // Page cible
	console.log(page)
	var speed = 750; // Durée de l'animation (en ms)
	$('html, body').animate( { scrollTop: $("#produit").offset().top }, speed ); // Go
	return false;
}

$(document).ready(function() {
	dispoHappyHour();
	$(".glyphicon-menu-left").click(function() {
		menuLeft();
	});
	$(".glyphicon-menu-right").click(function() {
		menuRight();
	});
	$(".click-tireuse").hover(function(){
		selectTireuse(this.getAttribute('id'));
	});	
	$(".click-tireuse").mouseout(function(){
		unselectTireuse(this.getAttribute('id'));
	});
	$('.click-tireuse').on('click', function() {
		scrollTireuse();
	});	
	$('.js-scrollTo').on('click', function() {
		scrollTo(this);
	});
	}
);