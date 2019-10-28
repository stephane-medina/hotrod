<script>
    $(document).ready(function(){
        $timer= 8000;
        $("#popinMessage").show();
        //setInterval('window.close()', 5000)
        setTimeout(function(){
            $('#popinMessage').hide();
        }, $timer);
    });
</script>
<div class="modal modal2" id="popinMessage" data-keyboard="false" data-backdrop="false">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
            	<h4 class="modal-title"><?php echo $_SESSION['data']['title']?></h4>
            	<a type="button" class="btn catBut" href="" data-dismiss="modal"><img class= "imgBut" src="assets/img/retour.png"></a>
            </div>
            <div class="modal-body flageuro">
                <div class="row alert <?= $_SESSION['data']['result_class']; ?>" role="alert">
                    <?= $_SESSION['data']['result_message'];
                        $_SESSION['message']= false;
                        $_SESSION['message1']=false;
                    ?>
                </div>
            </div>
            <div class="modal-footer">
            	<script>
                    window.setTimeout("document.form.time.value='8'",1000)
                    window.setTimeout("document.form.time.value='7'",2000)
                    window.setTimeout("document.form.time.value='6'",3000)
                    window.setTimeout("document.form.time.value='5'",4000) 
                    window.setTimeout("document.form.time.value='4'",5000) 
                    window.setTimeout("document.form.time.value='3'",6000) 
                    window.setTimeout("document.form.time.value='2'",7000) 
                    window.setTimeout("document.form.time.value='1'",8000) 
                    window.setTimeout("document.form.time.value='0';",9000)
                </script>
		<div class="row justify-content-around marge-nulle">
                    <h5>Cette fenêtre se fermera dans : &nbsp</h5>
                    <FORM METHOD=POST name="form"> 
                        <INPUT TYPE="text" NAME="time" class="middle" size="1"> secondes. 
                    </FORM>
    		</div>	
            </div>
        </div>
    </div>
</div>

 					
