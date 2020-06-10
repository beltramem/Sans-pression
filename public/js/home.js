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
		console.log ("bip");
		$('.home-type-produit').text("à la tireuse");
		$(".section-produit-vin").toggle();
		$(".section-produit-tireuse").toggle();
		$("#produit").css( "backgroundImage", "none" );
		$(".fond-noir-img").css("backgroundColor", "rgba(0,0,0,0)");
		$(".table-responsive-md").toggleClass("table-responsive-md-tireuse");
		$(".fond-img").toggleClass('fond-img-tireuse');
		
	}	
	else if ($('.home-type-produit').text()=="à la tireuse")
	{
		$('.home-type-produit').text("Nos bières");
		$(".section-produit-tireuse").toggle();
		$(".section-produit-biere").toggle();
		$("#produit").css( "backgroundImage", "url('../images/background/backgroundProduitHomePage.jpg')" );
		$(".fond-noir-img").css("backgroundColor", "rgba(0,0,0,0.4)");
		$(".table-responsive-md").toggleClass("table-responsive-md-tireuse");
		$(".fond-img-tireuse").toggleClass('fond-img-tireuse');
		
	}
}
function menuRight(){
	if ($('.home-type-produit').text()=="Nos bières")
	{
		$('.home-type-produit').text("à la tireuse");
		$(".section-produit-biere").toggle();
		$(".section-produit-tireuse").toggle();
		$("#produit").css( "backgroundImage", "none");
		$(".fond-noir-img").css("backgroundColor", "rgba(0,0,0,0)");
		$(".fond-img").toggleClass('fond-img-tireuse');
		$(".table-responsive-md").toggleClass("table-responsive-md-tireuse");
	}	
	else if ($('.home-type-produit').text()=="à la tireuse")
	{
		$('.home-type-produit').text("Nos vins");
		$(".section-produit-tireuse").toggle();
		$(".section-produit-vin").toggle();
		$("#produit").css( "backgroundImage", "url('../images/background/backgroundProduitHomePage.jpg')" );
		$(".fond-noir-img").css("backgroundColor", "rgba(0,0,0,0.4)");
		$(".table-responsive-md").toggleClass("table-responsive-md-tireuse");
		$(".fond-img-tireuse").toggleClass('fond-img-tireuse');
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

/*function dispoHappyHour(id)
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
} */

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

		$(".titre").fadeIn(2000);
		$(".semi").fadeIn(2000);
	}
);