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
	console.log($('.noteAmertume')[0].childNodes)
	console.log(indice)
	console.log($('#noteAmertume'+indice))
	$('#noteAmertume'+indice)[0].innerHTML = "<div class='glyphicon glyphicon-ok'></div>"
}

$(document).ready(function() {
	setNoteAmertume()
	getMemeBrasserie()
});	