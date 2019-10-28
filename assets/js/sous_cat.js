$(document).ready(function(){
    $("#sous_categorie").hide();
    $("#label_sous_categorie").hide();
    $("#categorie").on('change',function(){	
	var cat_id = $(this).val();
	$.post({
            url: "http://localhost/hotrod/index.php/Produits/get_modele_json/" + cat_id,
            success:    function(toto){			
                            var contenu = '';
                            $.each(toto, function(key, val){				
                                contenu += "<option value='" + val.cat_id + "'>" + val.cat_id + " - " + val.cat_nom + "</option>\n";
                            });
                            $("#sous_categorie").show();
                            $("#label_sous_categorie").show();
                            $("#sous_categorie").html(contenu);
                            //$("#sous_categorie2").html(contenu);
			}			
	});
    });		
});