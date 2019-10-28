<!DOCTYPE html>
<!-- Modification des caractéristiques d'un produit. -->
<html lang="fr-FR">
    <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=yes">
	<title>Formulaire de modification et de suppression d'un produit du site FRANCE_CUSTOMS| HTML 5</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href='<?php echo base_url("assets/css/respon.css")?>' rel="stylesheet">
	<link href='<?php echo base_url("assets/css/CSS_responsive1.css")?>' rel="stylesheet">
    </head>
    <body>
	<header>
            <nav id="navbar" class="navbar navbar-expand-sm bg-dark navbar-dark">
    		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                     <span class="navbar-toggler-icon"></span>
    	    	</button>
    	   	<div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
    	            	<li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url("produits/ajout"); ?>">CREATION D'UN PRODUIT</a>
    	            	</li>
    	            	<li class="nav-item">
                            <!-- Fil d'ariane. -->
                            <ol class="breadcrumb breadcrumb-pad bg-dark ">                 
                                <li class="breadcrumb-item "><a href="<?php echo base_url() ?>" class="text-light">ACCUEIL</a></li>                 
                                <li class="breadcrumb-item "><a href="<?php echo site_url("produits/liste"); ?>" class="text-light">LISTE DES PRODUITS</a></li>
    	                        <li class="breadcrumb-item text-light active" aria-current="page">MODIFICATION DES PRODUITS</li>                 
                            </ol>
    	            	</li>
                    </ul>
    	    	</div> 
            </nav>
	</header>
	<div class="row">
            <div class="col-1 enterprise2"></div>
            <div class="col-10 enterprise3"><br>
		<?php
                    // Formulaire de modification des caractéristiques d'un produit.
                    echo validation_errors(); 
                    echo form_open_multipart();
                ?>
			<fieldset>
                            <legend><center><h2 class="card5" style="width: 50rem">MODIFICATION des produits</h2></center></legend>
				<div class="form-group row">
                                    <div class="col-1"></div>							
                                        <label for="pro_id" class="col-2 col-form-label">ID :</label>
					<div class="col-3">
                                            <input type="text" class="form-control" name="pro_id" id="pro_id" value ="<?php echo $produits->pro_id?>" placeholder="Id">
					</div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-1"></div>
					<label for="pro_photo" class="col-2 col-form-label">Photo :</label>
                                            <div class="col-1">	
                                                <img class="photo card4" src="<?php echo base_url("assets/img/".$produits->pro_id)?>" alt="Vue du produit"/>
                                            </div>
                                            <div class="col-2">
                                                <h6 class="link2" style="width: 22rem"></h6>
                                            </div>
                                            <div class="col-4">
                                                <input type="file" class="input-file btn btn-dark" name="pro_photo" id="pro_photo">
                                            </div>
                                    </div>
                                    <div class="form-group row">
					<div class="col-1"></div>
					    <label for="categorie" class="col-2 col-form-label">Catégorie :</label>
                                            <div class="col-6">
						<select  class="form-control" name="pro_cat_id" id="categorie" value="<?= set_value("pro_cat_id") ?>">
                                                    <option selected disabled>
                                                        <?php 
                                                            foreach ($liste_sous_categories as $row1){
                                                                if ($row1->cat_id == $produits->pro_cat_id){
                                                                    foreach ($liste_categories as $row2){
                                                                        if ($row1->cat_parent == $row2->cat_id){
                                                                            $parent = $row1->cat_parent;
                                                                            echo '<option selected value='.$row2->cat_id.'>'.$row2->cat_nom.'</option>';
                                                                        }   else{
                                                                                echo '<option value='.$row2->cat_id.'>'.$row2->cat_nom.'</option>';
                                                                            }
                                                                    }
                                                                }

                                                            }
                                                        ?>
                                                    </option>
						</select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-1"></div>
					<label for="sous_categorie" id="label2_sous_categorie" class="col-2 col-form-label">Sous catégorie :</label>
                                        <div class="col-6">
                                            <select class="form-control" name="sous_cat_id" id="sous_categorie2">
                                                <option selected disabled>
                                                    <?php 
                                                        foreach ($liste_sous_categories as $row){
                                                            if ($row->cat_id == $produits->pro_cat_id){
                                                                echo '<option selected value='.$row->cat_id.'>'.$row->cat_nom.'</option>';
                                                            }
                                                            elseif ($row->cat_parent == $parent){
                                                                echo '<option value='.$row->cat_id.'>'.$row->cat_nom.'</option>';
                                                            }
                                                        }
                                                    ?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
					<div class="col-1"></div>
					<label for="pro_libelle" class="col-2 col-form-label">Libellé :</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="pro_libelle" id="pro_libelle" value ="<?php echo $produits->pro_libelle?>" placeholder="Libellé">
                                        </div>
                                    </div>
                                    <div class="form-group row">
					<div class="col-1"></div>
					<label for="pro_description" class="col-2 col-form-label">Description :</label>
					<div class="col-6">
                                            <input type="text" class="form-control" name="pro_description" id="pro_description" value ="<?php echo $produits->pro_description?>" placeholder="Description">
					</div>
                                    </div>  
                                    <div class="form-group row">
					<div class="col-1"></div>
					<label for="pro_prix" class="col-2 col-form-label">Prix :</label>
					<div class="col-6">
                                            <input type="text" class="form-control" name="pro_prix" id="pro_prix" value ="<?php echo $produits->pro_prix?>" placeholder="Prix">
					</div>
                                    </div>
                                    <div class="form-group row">
					<div class="col-1"></div>
					<label for="pro_stock" class="col-2 col-form-label">Stock :</label>
					<div class="col-6">
                                            <input type="text" class="form-control" name="pro_stock" id="pro_stock" value ="<?php echo $produits->pro_stock?>" placeholder="Stock">
					</div>
                                    </div> 
			</fieldset>
			<div class="form-group row">
                            <div class="col-1"></div>							
				<label for="pro_d_ajout" class="col-2 col-form-label">Date d'ajout :</label>
				<div class="col-3">
                                    <input type="text" class="form-control" name="pro_d_ajout" id="pro_d_ajout" readonly value ="<?php echo $produits->pro_d_ajout?>">
				</div>
                            </div>
                            <div class="form-group row">
				<div class="col-1"></div>
				<label for="pro_d_modif" class="col-2 col-form-label">Date de modification :</label>
				<div class="col-3">
                                    <input type="text" class="form-control" name="pro_d_modif" id="pro_d_modif" readonly value ="<?php echo $produits->pro_d_modif?>">
				</div>
                                <div class="col-4">
                                    <input type="submit" value="UPDATE" id="update" class="btn btn-dark" onclick="return confirm('Etes vous sûr de vouloir modifier cet item ?')">
                                        <a href="<?php echo site_url("Produits/suppr/".$produits->pro_id)?>" role="button" id="delete" class="btn btn-dark" onclick="return confirm('Etes vous sûr de vouloir supprimer cet item ?')">
                                            DELETE
                                        </a>
                                        <input type="reset" value="RESET" class="btn btn-dark">
                                </div>
                            </div>
                    </form>
            </div>
            <div class="col-1 enterprise2"></div>
	</div>
        <footer>
            <nav id="navbar" class="navbar navbar-expand-sm bg-dark navbar-dark">
	    	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
	    	</button>
	    	<div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
		       	<li class="nav-item">
                            <a class="nav-link" href="tableau1.html">Horaires</a>
	            	</li>
	            	<li class="nav-item">
                            <a class="nav-link" href="contact1.html">Plan du site</a>
	            	</li>
                    </ul>
	    	</div> 
            </nav>
	</footer>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="assets/js/js.js"></script>
	<script src="/hotrod/assets/js/sous_cat.js"></script>
    </body>
</html>