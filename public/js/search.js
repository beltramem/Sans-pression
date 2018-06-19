function CheckFiltre(item)
{
	if (item != 'null')
	{
		item.classList.toggle('glyphicon-unchecked');	
		item.classList.toggle('glyphicon-check');
	}
	var pays = "";
	var couleurs ="";
	var typeBieres ="";
	var typeConteneurBiere ="";
	var productName ="";
	$("#drop-down-filtre-paysBiere .glyphicon-check").each(function(){
		pays = pays.concat($(this).attr('id'));
	});
	$("#drop-down-filtre-couleurBiere .glyphicon-check").each(function(){
		couleurs = couleurs.concat($(this).attr('id'));
	});
	$("#drop-down-filtre-typeBiere .glyphicon-check").each(function(){
		typeBieres = typeBieres.concat($(this).attr('id'));
	});
	$("#drop-down-filtre-typeConteneurBiere .glyphicon-check").each(function(){
		typeConteneurBiere = typeConteneurBiere.concat($(this).attr('id'));
	});
	pays = pays.substring(0,pays.length-1)
	couleurs = couleurs.substring(0,couleurs.length-1)
	typeBieres = typeBieres.substring(0,typeBieres.length-1)
	typeConteneurBiere = typeConteneurBiere.substring(0,typeConteneurBiere.length-1)
	if ($('.name-search').val().length >= 2)
	{
		productName = '%'+$('.name-search').val()+'%'
		console.log(productName)
	}
	else 
	{
		productName = 'null'
	}
	if (pays.length == 0)
	{
		pays = "null";
	}
	if (couleurs.length == 0){
		couleurs = "null";
	}
	if (typeBieres.length == 0)
	{
		typeBieres = "null";
	}
	if (typeConteneurBiere.length == 0){
		typeConteneurBiere = "null";
	}
	$.ajax({
                url:"pays=" + pays +"/couleurs=" + couleurs + "/typeBieres=" + typeBieres + "/volumes=" + typeConteneurBiere + "/productName=" + productName,
                type: "GET",
                dataType: "html",
                data: {
                    "pays": pays,
					"couleurs" : couleurs,
					"typeBieres" : typeBieres,
					"volumes" : typeConteneurBiere
                },
                async: true,
                success: function (data)
                {
                    console.log(data)
                    $('#ajax-results').html(data);

                }
            });
}

$(document).ready(function() {
	$('.name-search').keyup(function(){
		if ($('.name-search').val().length >=3)
		{
			CheckFiltre('null')
		}
	});
});
