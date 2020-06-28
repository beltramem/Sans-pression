

$(document).ready(function() {

		$(".titre").fadeIn(2000);
		$(".semi").fadeIn(2000);
		
		$( ".img-home-concept" ).hover(
		  function() {
			$( this ).addClass( "article-active" );
			$( this ).find("*").addClass( "active" );
		  },
		  function() {
			if($( this ).parent().parent().find("article.article-concept-description").css("display")=="none" && $( this ).parent().parent().find("article.article-concept-description").css("overflow")!="undefine" ) 
			{
				$( this ).removeClass( "article-active" );
				$( this ).find("*").removeClass( "active" );
			}
		}
		);
		
		

		$( ".img-home-concept" ).on("click", function() {
			var id = "#"+$( this ).attr("id");
			console.log(id);
			$( this ).parent().parent().find("article.article-concept-description"+id).toggle("slow");
			if($( this ).parent().parent().find("article.article-concept-description"+id).css("display")=="none")
			{
				$( this ).removeClass( "article-active" );
				$( this ).find("*").removeClass( "active" );
				
			}
		});
		
		$( ".img-home-concept" ).on("touchstart", function() {
			var id = "#"+$( this ).attr("id");
			console.log(id);
			$( this ).parent().parent().find("article.article-concept-description"+id).toggle("slow");
			if($( this ).parent().parent().find("article.article-concept-description"+id).css("display")=="none")
			{
				$( this ).removeClass( "article-active" );
				$( this ).find("*").removeClass( "active" );
				
			}
		});
		
}
);