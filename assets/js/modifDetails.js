$(document).ready(function(){
    $('.profil_detail').click(function(){
	$('#content4').hide();
	$('#content3').show();
	var id= $(this).attr('id');
	$.post('http://localhost/hotrod/index.php/users/get_modif_details/' + id,{ 
	    id: id
	},
	function(data){
	    if (data){			
	    	$('#content3').html(data);
	    } 
	    else{
	    	alert('nope');
	    }		
	});
    });
});

    