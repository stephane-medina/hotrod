<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Liste des users</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <link href='<?php echo base_url("assets/css/respon.css")?>' rel="stylesheet">
        <link href='<?php echo base_url("assets/css/CSS_responsive1.css")?>' rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    </head>
    <body enterprise2>
	<header>
            <nav id="navbar" class="navbar navbar-expand-sm bg-dark navbar-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                     <span class="navbar-toggler-icon"></span>
	    	</button>
	   	<div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
	        	<li class="nav-item">
                            <a class="nav-link create_users">CREATION D'UN UTILISATEUR</a>
	            	</li>
		        <li class="nav-item">
                            <ol class="breadcrumb breadcrumb-pad bg-dark ">                 
                                <li class="breadcrumb-item "><a href="<?php echo base_url() ?>" class="text-light">ACCUEIL</a></li>  
                                <li class="breadcrumb-item "><a href="<?php echo site_url("users/listeUsers"); ?>" class="text-light">GESTION DES UTILISATEURS</a></li>               
	                            <li class="breadcrumb-item text-light active" aria-current="page">Résultats de recherche</li>                 
                            </ol>
	            	</li>
                    </ul>
	    	</div> 
            </nav>
	</header>
	<div class="row">
            <div class="col-1 enterprise2"></div>
		<div class="col-10 enterprise3"><br>
                    <center>
                        <h1 class="card5" style="width: 50rem">LISTE des utilisateurs.</h1><br>
                        <div class="row">
                            <div class="col-3"></div>
                                <div class="col-5 container">
                                    <?php
                                        echo validation_errors(); 
                                        echo form_open("users/search2");
                                    ?>
                                            <div class="d-flex justify-content-end">
                                                <div class="searchbar">
                                                    <input class="search_input" type="text" name="recherche" id="recherche" placeholder="Search..." value= "">
                                                        <button id="search2" class="search_icon" type="submit"><i class="fas fa-search"></i></button>	
                                                </div>
                                            </div>
                                        </form>
				</div>
				<div class="col-1">
                                    <button type="button" style=" width: 58px; height: 58px" class="create_users button_create" data-animation=true data-toggle="popover" data-placement ="top" data-trigger="hover" data-content="Espace d'administration des produits. Cliquez ici pour accéder aux fonctionnalités. (C.R.U.D)." title="GESTION DES PRODUITS."><i class="fas fa-plus"></i></button>
				</div>
				<div class="col-3"></div>
                        </div><br>
                        <table id="table1" class="table table-striped thead-dark table-hover table-responsive table-sm-responsive">
                            <thead class="table thead-dark">

                                <th>Id</th>
                                <th>Pseudo</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Ajouté le :</th>
                                <th>Modifié le :</th>
                            </thead>
                            <?php 
                            foreach ($liste_users as $row){
                                echo"<tbody id='myTable'>";
                                echo"<tr>";?>
                                <td width="30"><button type="button" class="profil_detail buttonLink" id="<?php echo $row->id ?>" value="<?php echo $row->id ;?>"><?php echo $row->id ;?></button></td>
                                <?php   echo"<td width='100'>".$row->pseudo."</td>";
                                        echo"<td width='200'>".$row->email."</td>";
                                        echo"<td width='700'>".$row->password."</td>";
                                        echo"<td width='30'>".$row->status."</td>";
                                        echo"<td width='120'>".$row->user_d_ajout."</td>";
                                        echo"<td width='200'>".$row->user_d_modif."</td>";
                                        echo"</tr>";
                                        echo"</tbody>";
                            }
                                ?>
                        </table>
                        <nav aria-label="Page navigation">
                            <ul class="card6" style="width: 22rem">
	 			<?php echo $this->pagination->create_links(); ?>
                            </ul>
			</nav>
                    </center>
		</div>
		<div class="col-1 enterprise2"></div>
	</div>
	<div class="row" id="content3">
	</div>
	<div class="row" id="content4">
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
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="http://localhost/hotrod/assets/js/search.js"></script>
	<script src="http://localhost/hotrod/assets/js/modifDetails.js"></script>
	<script>
            $('.create_users').click(function() {
                $('#content3').hide();
                $('#content4').show();
                $('#content4').load('http://localhost/hotrod/index.php/users/get_create_users');
            });
	</script>
    </body>
</html>