<div class="col-1 enterprise2"></div>
<div class="col-10 enterprise3"><br>
    <?php
        echo validation_errors(); 
        echo form_open("users/modifrUsers");
    ?>
            <fieldset>
		<center><h5 class="card5" style="width: 50rem">MODIFICATION des utilisateurs.</h5></center>
                    <div class="form-group row">
			<div class="col-1"></div>							
			<label for="id" class="col-2 col-form-label">ID :</label>
			<div class="col-2">
                            <input type="text" class="form-control" name="id" id="id" value ="<?php echo $users->id ?>" placeholder="Id">
			</div>
                        <div class="col-1"></div>
        		<label for="status" class="col-1 col-form-label">Status :</label>
			<div class="col-2">
                            <input type="text" class="form-control" name="status" id="status" value ="<?php echo $users->status?>" placeholder="Status">
			</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-1"></div>
			<label for="pseudo" class="col-2 col-form-label">Pseudo :</label>
			<div class="col-6">
                            <input type="text" class="form-control" name="pseudo" id="pseudo" value ="<?php echo $users->pseudo?>" placeholder="Pseudo">
			</div>
                    </div>
                    <div class="form-group row">
			<div class="col-1"></div>
			<label for="email" class="col-2 col-form-label">Email :</label>
                            <div class="col-6">
				<input type="text" class="form-control" name="email" id="email" value ="<?php echo $users->email?>" placeholder="Email">
                            </div>
                    </div>  
                    <div class="form-group row">
                        <div class="col-1"></div>
                        <label for="password" class="col-2 col-form-label">Password :</label>
                            <div class="col-6">
                                <input type="text" class="form-control" name="password" id="password" value ="<?php echo $users->password?>" placeholder="Password">
                            </div>
                    </div>
            </fieldset>
            <div class="form-group row">
                <div class="col-1"></div>							
                <label for="user_d_ajout" class="col-2 col-form-label">Date d'ajout :</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="user_d_ajout" id="user_d_ajout" readonly value ="<?php echo $users->user_d_ajout?>">
                </div>
            </div>
            <div class="form-group row">
		<div class="col-1"></div>
		<label for="user_d_modif" class="col-2 col-form-label">Date de modification :</label>
		<div class="col-3">
                    <input type="text" class="form-control" name="user_d_modif" id="user_d_modif" readonly value ="<?php echo $users->user_d_modif?>">
		</div>
		<div class="col-4">
                    <input type="submit" value="UPDATE" id="update" class="btn btn-dark" onclick="return confirm('Etes vous sûr de vouloir modifier cet utilisateur  ?')">
                    	<a href="<?php echo site_url("users/supprUsers/".$users->id)?>" role="button" id="delete" class="btn btn-dark" onclick="return confirm('Etes vous sûr de vouloir supprimer cet utilisateur ?')">
                            DELETE
                        </a>
                    	<input type="reset" value="RESET" class="btn btn-dark">
                </div>
            </div>
	</form>
</div>
<div class="col-1 enterprise2"></div>
	
