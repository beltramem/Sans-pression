function getMemeBrasserie()
{
	brasserie = $('.brasserieName').text()
	nom = $('.nomProduit').text()
	$.ajax({
                url:"brasserie=" + brasserie +"/nom=" + nom,
                type: "GET",
                dataType: "html",
                data: {
                    "brasserie": brasserie,
					"nom": nom
                },
                async: true,
                success: function (data)
                {
                    $('#ajax-brasserie-results').html(data);

                }
            });
}

function getTypeColor()
{
	var get = $(".detail-type-couleur").text()
	var color = get.split("-");
	return color;
}

function getAlcool()
{
	var alcool = $(".detail-degree").text()
	alcool = alcool.substring(0,alcool.length-1);
	alcool = parseFloat(alcool)
	return alcool;
}

function getConseille()
{
	typeColor = getTypeColor();
	type = typeColor[0]
	color = typeColor[1]
	alcool = getAlcool()
	amertume = $('.noteAmertume')[0].id
	nom = $('.nomProduit').text()
	
	$.ajax({
                url:"type=" + type +"/color=" + color +"/alcool=" + alcool +"/amertume="+ amertume + "/nom=" + nom,
                type: "GET",
                dataType: "html",
                data: {
                    "type": type,
					"color": color,
					"alcool": alcool,
					"amertume": amertume,
					"nom" : nom
                },
                async: true,
                success: function (data)
                {
                    $('#ajax-conseille-results').html(data);

                }
            });
	
}

function setNoteAmertume()
{
	var note = $('.noteAmertume')[0].id;
	if (note <=0)
	{
		var indice = 6-Math.abs(note)
	}
	else
	{
		var indice = 6+Math.abs(note)
	}

	$('#noteAmertume'+indice)[0].innerHTML = "<div class='glyphicon glyphicon-ok'></div>"
}

function afficheBrasserie()
{
	$("#memeBrasserie").addClass("sous-titre-detail-active")
	$("#conseille").removeClass("sous-titre-detail-active")
	$(".produit-meme-brasserie").show();
	$(".produit-conseil").hide();
}

function afficheConseil()
{
	$("#conseille").addClass("sous-titre-detail-active")
	$("#memeBrasserie").removeClass("sous-titre-detail-active")
	$(".produit-meme-brasserie").hide();
	$(".produit-conseil").show();
}

$(document).ready(function() {
	setNoteAmertume()
	getMemeBrasserie()
	getConseille()
	
	$(".bouton-meme-brasserie").click(function() {afficheBrasserie()})
	$(".bouton-conseil").click(function() {afficheConseil()})
});	