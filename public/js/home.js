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
		console.log("bite");
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

function dispoHappyHour(id)
{
	var happyHour = document.getElementsByClassName("dispo-happy-hour");
	for (var i = 0; i < 12; i++)
	{
		if(happyHour[i].innerHTML=="<div class=\"glyphicon glyphicon-ok-circle\"></div>Disponible en happy hour")
		{
			happyHour[i].style.color = "green";
		}
		else
		{
			happyHour[i].style.color = "red";
		}
	}
}

function afficheDescriptionTireuse(id)
{
	id=id.concat("-description")
	console.log(id)
	var divDescription = document.getElementsByClassName(id);
	divDescription=divDescription[0]
	$("#description-tireuse-active").attr("id","description-tireuse-inactive")
	$(divDescription).attr("id","description-tireuse-active");
}

function scrollTireuse()
{
	var speed = 750; // Durée de l'animation (en ms)
	$('html, body').animate( { scrollTop: $("#description-tireuse-active").offset().top }, speed ); // Go
	return false;
}

function scrollTo(div)
{
	var page = $(div).attr('href'); // Page cible
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
		afficheDescriptionTireuse(this.getAttribute('id'));
		scrollTireuse();
	});	
	$('.js-scrollTo').on('click', function() {
		scrollTo(this);
	});
	}
);