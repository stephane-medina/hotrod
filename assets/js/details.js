
$("#popin1").hide(); 
$('.click1').click(function(){
    $.post('http://localhost/hotrod/index.php/Produits/get_modele_details',{ 
    	pro_id: $(this).attr('id') 
    },
    function(data){
    	if (data){			
            $('#content1').html(data);
            //$("#popin1").modal('handleUpdate');
            $("#popin1").show();
    	} 
    	else{
            alert('nope');
    	}		
    });
});