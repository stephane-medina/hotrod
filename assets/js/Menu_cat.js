       
    $("#popin").hide(); 
    	$('.click').click(function(){
    		$.post('http://localhost/hotrod/index.php/Produits/get_modele_cat',{ 
    			 	cat_id: $(this).attr('id') 
    		},
    		function(data){
                    if (data){			
    			$('#content').html(data);
    			//$("#popin").modal('handleUpdate');
    			$("#popin").show();
                    } 
                    else{
    			alert('nope');
                    }		
    		});
	});
                
