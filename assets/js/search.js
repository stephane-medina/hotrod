
$("#popin").hide();
$('#search').click(function(){	
    var recherche = ($('#recherche').val());
    $('#dropzoneModalTitle').text('Veuillez saisir au moins un mot.');
    $.post('http://localhost/hotrod/index.php/Produits/search/' + recherche,
        function(data){
            if (data){
   		$('#dropzoneModalTitle').text('Résultats de la recherche.');
   		$('#content').html(data);
		//$("#popin").modal('handleUpdate');
		$("#popin").show();
            } 
            else{
   		alert('Veuillez saisir au moins un mot !');
            }
        });
});		
		
		
