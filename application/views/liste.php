<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Liste des produits du site hotrod</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link href='<?php echo base_url("assets/css/respon.css") ?>' rel="stylesheet">
        <link href='<?php echo base_url("assets/css/CSS_responsive1.css") ?>' rel="stylesheet">
        <link rel="stylesheet" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </head>
    <body class="enterprise2">
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
                        <ol class="breadcrumb breadcrumb-pad bg-dark ">                 
                            <li class="breadcrumb-item "><a href="<?php echo base_url() ?>" class="text-light">ACCUEIL</a></li>  
                            <li class="breadcrumb-item "><a href="<?php echo site_url("produits/liste"); ?>" class="text-light">LISTE DES PRODUITS</a></li>               
                            <li class="breadcrumb-item text-light active" aria-current="page">Résultats de recherche</li>                 
                        </ol>
                    </li>
                </ul>
            </div> 
        </nav>
        <div class="row">
            <div class="col-1 enterprise2"></div>
            <div class="col-10 enterprise3"><br>
                <center>
                    <h1 class="card5" style="width: 70rem">GESTION des produits</h1><br>
                    <div class="col-5 container">
                        <?php
                            echo validation_errors();
                            echo form_open("produits/search1");
                        ?>
                                <div class="d-flex justify-content-end">
                                    <div class="searchbar">
                                        <input class="search_input" type="text" name="recherche" id="recherche" placeholder="Search..." value= "">
                                        <button id="search1" class="search_icon" type="submit"><i class="fas fa-search"></i></button>	
                                    </div>
                                </div>
                            </form>
                    </div><br>
                    <table id="table1" class="table table-striped thead-dark table-hover table-responsive table-sm-responsive">
                        <thead class="table thead-dark">
                            <tr>
                                <th>Photo</th>
                                <th>Id</th>
                                <th>Libellé</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th>Ajouté le :</th>
                                <th>Modifié le :</th>
                                <th>Score :</th>
                            </tr>
                        </thead>
                        <?php
                            foreach ($liste_produits as $row){
                        ?>
                                <tbody id='myTable'>
                                    <tr>
                                        <td width='80'><img class='photo card4' alt='Photo du produit' src='<?php echo base_url("assets/img/".$row->pro_id) ?> '></td>
                                        <td width='20'><button class='buttonLink'><a href='<?php echo site_url("Produits/modif/".$row->pro_id) ?>' title="<?php echo $row->pro_id ?>"> <?php echo $row->pro_id ?></a></button></td>
                                        <td width='150'><?= $row->pro_libelle ?></td>
                                        <td width='400'><?= $row->pro_description ?></td>
                                        <td width='60'><?= $row->pro_prix ?></td>
                                        <td width='60'><?php $row->pro_stock ?></td>
                                        <td width='120'><?php $row->pro_d_ajout ?></td>
                                        <td width='220'><?php $row->pro_d_modif ?></td>
                                        <td width='120'><?php $row->pro_rank ?></td>
                                    </tr>
                                </tbody>
                        <?php
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="http://localhost/hotrod/assets/js/searchListe.js"></script>
    </body>
</html>