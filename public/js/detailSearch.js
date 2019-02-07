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

$(document).ready(function() {
	getMemeBrasserie()
});	