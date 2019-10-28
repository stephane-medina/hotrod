<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Importation de voitures américaines, de v�hicules de collection europ�ens et asiatiques : voitures, 4x4, Harley Davidson, motos... de plus de 30 ans d'�ge">
        <meta name="keywords" content="voiture américaine, muscle car, voiture collection, garage harley, importation voiture americaine, restauration voiture collection"> 
        <meta name="robots" content="index,follow">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>FRANCE CUSTOMS IMPORT</title>
        <!-- START CSS  -->
        <!-- <link href="/assets/public/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="/assets/public/css/owl.carousel.css"> -->
        <!-- <link rel="stylesheet" href="/assets/public/css/owl.theme.css"> -->
        <!-- <link rel="stylesheet" href="/assets/public/css/animate.css"> -->
        <!-- <link rel="stylesheet" href="/assets/public/css/font-awesome.min.css"> -->
        <!-- <link href="/assets/public/fonts/fonts.css" rel="stylesheet"> -->
        <!-- <link href="/assets/public/css/main.css" rel="stylesheet"> -->
        <!-- <link href="/assets/public/css/main-responsive.css" rel="stylesheet"> -->
        <!-- <link href="/assets/public/css/menu.css" rel="stylesheet"> -->
        <!-- <link href="/assets/public/css/photobox.css" rel="stylesheet"> -->
        <!-- <link href="/assets/public/css/jquery.fancybox.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <link href="assets/css/CSS_responsive1.css" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <!-- <script src="bootstrap/js/popper.min.js"></script> -->
        <!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />

        <?php
            //Test de connexion d'un utilisateur et génération d'un message de bienvenue.
            if ((isset($_SESSION["message"]) == TRUE && $_SESSION["message"]) == TRUE) {
                //Chargement du popin contenant le message pour l'utilisateur.
                $this->load->view('messagesBoss');
            }
            //Test de déconnexion d'un utilisateur et génération d'un message d'au revoir.
            if ((isset($_SESSION["message1"]) == TRUE && $_SESSION["message1"]) == TRUE) {
                //Chargement du popin contenant le message pour l'utilisateur.
                $this->load->view('messagesBoss');
            }
        ?>
    </head>    
    <body id="body">
        <header>
            <div class="row">
                <div class="col-12">
                    <!-- Barre de navigation principale. -->
                    <nav id="navbar" class="navbar navbar-expand-sm bg-dark navbar-dark enterprise2 navbar-top fixed-top">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav">
                                <!-- Ancre vers le catalogue produits. -->
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="#">CATALOGUE</a>
                                </li>
                                <!-- Ancre vers les informations. -->
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="#catalogue">INFORMATIONS</a>
                                </li>
                                <!-- Ancre vers les promotions. -->
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="#informations">PROMOTIONS</a>
                                </li>
                                <!-- Ancre vers les incontournables. -->
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="#promotions">INCONTOURNABLES</a>
                                </li>
                                <!-- Formulaire de contact. -->
                                <li class="nav-item">
                                    <a class="nav-link text-light"  href="#" class="card-link" data-toggle="modal" data-target="#popin2" type="button">
                                        <div class="text-light" href="#" data-animation=true data-toggle="popover" data-placement ="bottom" data-trigger="hover" data-content="Cliquez ici pour nous envoyer un message." title="NOUS CONTACTER.">
                                            NOUS CONTACTER.
                                        </div>
                                    </a>
                                </li>
                                <?php
                                    // Test d'ouverture de la session utilisateur.
                                    if ((isset($_SESSION["open"]) == TRUE && $_SESSION["open"]) == TRUE) {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="<?php echo site_url("users/bye_session"); ?>" class="card-link">
                                        <div class="text-light" href="#" data-animation=true data-toggle="popover" data-placement ="bottom" data-trigger="hover" data-content="Cliquez ici pour vous déconnecter." title="SE DECONNECTER.">
                                            SE DECONNECTER.
                                        </div>
                                    </a>		
                                </li>
                                <?php
                                    } else {
                                ?>
                                <!-- Formulaire de connexion. -->
                                <li class="nav-item">
                                    <a class="nav-link text-light"  href="#" class="card-link" data-toggle="modal" data-target="#popin4" type="button">
                                        <div class="text-light" href="#" data-animation=true data-toggle="popover" data-placement ="bottom" data-trigger="hover" data-content="Cliquez ici pour vous connecter." title="SE CONNECTER.">
                                            SE CONNECTER.
                                        </div>
                                    </a>
                                </li>
                                <!-- Formulaire d'inscription. -->
                                <li class="nav-item">
                                    <a class="nav-link text-light"  href="#" class="card-link" data-toggle="modal" data-target="#popin3" type="button">
                                        <div class="text-light" href="#" data-animation=true data-toggle="popover" data-placement ="bottom" data-trigger="hover" data-content="Cliquez ici pour vous inscrire." title="S'INSCRIRE..">
                                            S'INSCRIRE.
                                        </div>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                                <!-- Ancre vers les mentions. -->
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="#cadeaux">MENTIONS</a>
                                </li>
                                <?php
                                    //Test d'ouverture de la session.
                                    if ((isset($_SESSION["open"]) == TRUE && $_SESSION["open"]) == TRUE) {
                                ?>
                                        <li class="nav-item justify-content-end">
                                            <h7 class="navbar-text navbar-right text-light justify-content-end">
                                                <?php echo $_SESSION['users']['pseudo'] . ' est connecté sur le site !'?>
                                            </h7>
                                        </li>
                                        <?php
                                    }
                                        ?>
                            </ul>
                        </div> 
                    </nav>
                </div>
            </div>
        </header>
        <br>
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-lg-2">
                    <center>
                        <!-- Logo. -->
                        <p><img src="assets/img/rock and rod.jpg" alt="custom_logo" id="img">
                        <div class="word"></div>
                    </center>
                </div>
                <div class="col-lg-10 enterprise2">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-3">
                            <article><br><h3>FRANCE CUSTOMS IMPORT.</h3><br>
                                <p><h6>.....quelque part entre Europe et Amérique.</h6>
                            </article>
                        </div>
                        <div class="col-lg-2">
                            <div class="row justify-content-around marge-nulle" >
                                <img src="assets/img/europe-removebg-preview.png" alt="custom_logo" id="img2">
                                <img src="assets/img/hot_rod_vintage.png" alt="custom_logo" id="img3">    						
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <br>
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-4">
                                    <!-- widget horloge. -->
                                    <script type="text/javascript"> var css_file = document.createElement("link");
                                        css_file.setAttribute("rel", "stylesheet");
                                        css_file.setAttribute("type", "text/css");
                                        css_file.setAttribute("href", "//s.bookcdn.com//css/cl/bw-cl-180x170r10.css");
                                        document.getElementsByTagName("head")[0].appendChild(css_file);
                                    </script> 
                                    <div id="tw_20_856559320">
                                        <div style="width:100px; height:120px; margin: 0 auto;">
                                            <a href="">NEW YORK</a><br>
                                        </div>
                                    </div> 
                                    <script type="text/javascript">
                                        function setWidgetData_856559320(data)
                                        {
                                            if (typeof (data) !== 'undefined' && data.results.length > 0)
                                            {
                                                for (var i = 0; i < data.results.length; ++i)
                                                {
                                                    var objMainBlock = '';
                                                    var params = data.results[i];
                                                    objMainBlock = document.getElementById('tw_' + params.widget_type + '_' + params.widget_id);
                                                    if (objMainBlock !== null)
                                                        objMainBlock.innerHTML = params.html_code;
                                                }
                                            }
                                        }
                                        var clock_timer_856559320 = -1;
                                    </script> 
                                    <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/time/info?ver=2&domid=581&type=20&id=856559320&scode=124&city_id=18103&wlangid=3&mode=2&details=0&background=ffffff&color=fafaf7&add_background=ffffff&add_color=333333&head_color=ffffff&border=0&transparent=0"></script>
                                </div>
                                <div class="col-lg-4">	
                                    <script type="text/javascript">
                                        var css_file = document.createElement("link");
                                        css_file.setAttribute("rel", "stylesheet");
                                        css_file.setAttribute("type", "text/css");
                                        css_file.setAttribute("href", "//s.bookcdn.com//css/cl/bw-cl-180x170r10.css");
                                        document.getElementsByTagName("head")[0].appendChild(css_file);
                                    </script> 
                                    <div id="tw_20_844661754">
                                        <div style="width:100px; height:120px; margin: 0 auto;">
                                            <a href="">PARIS</a><br/>
                                        </div>
                                    </div> 
                                    <script type="text/javascript">
                                        function setWidgetData_844661754(data)
                                        {
                                            if (typeof (data) !== 'undefined' && data.results.length > 0)
                                            {
                                                for (var i = 0; i < data.results.length; ++i)
                                                {
                                                    var objMainBlock = '';
                                                    var params = data.results[i];
                                                    objMainBlock = document.getElementById('tw_' + params.widget_type + '_' + params.widget_id);
                                                    if (objMainBlock !== null)
                                                        objMainBlock.innerHTML = params.html_code;
                                                }
                                            }
                                        }
                                        var clock_timer_844661754 = -1;
                                    </script> 
                                    <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/time/info?ver=2&domid=581&type=20&id=844661754&scode=124&city_id=18145&wlangid=3&mode=2&details=0&background=ffffff&color=fafaf7&add_background=ffffff&add_color=333333&head_color=ffffff&border=0&transparent=0"></script>
                                </div>
                                <div class="col-lg-2 socialPad">
                                    <nav class="nav icon-set">
                                        <div class="container">
                                            <ul class="nav navbar-nav bg dark border-aura">
                                                <!-- Lien vers Facebook -->
                                                <li class="facebook social">
                                                    <a href="#" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook fa-lg social fa-1x"></i></a>
                                                </li>
                                                <!-- Lien vers Twitter -->
                                                <li class="twitter social">
                                                    <a href="#" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter fa-lg social fa-1x"></i></a>
                                                </li>
                                                <!-- Lien vers Instagram -->
                                                <li class="instagram social">
                                                    <a href="#" data-toggle="tooltip" title="Instagram"><i class="fa fa-instagram fa-lg social fa-1x"></i></a>
                                                </li>
                                                <!-- Lien vers LinkedIn -->
                                                <li class="linkedin social">
                                                    <a href="#" data-toggle="tooltip" title="LinkedIn"><i class="fa fa-linkedin fa-lg social fa-1x"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Barre de navigation secondaire permettant d'afficher les options disponible selon le niveau d'habilitation de l'utilisateur -->
                    <nav id="navbar1" class="navbar navbar-expand-sm bg-dark navbar-dark navbar-middle enterprise">
                        <button id="button1" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav">
                                <!-- Chargement du tableau contenant la liste des produits, dédié à l'administrateur du site. -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("Produits/liste"); ?>">
                                        <div class="text-light" href="#" data-animation=true data-toggle="popover" data-placement ="top" data-trigger="hover" data-content="Espace d'administration des produits. Cliquez ici pour accéder aux fonctionnalités. (C.R.U.D)." title="GESTION DES PRODUITS.">
                                            PRODUITS.
                                        </div>
                                    </a>
                                </li>
                                <!-- Chargement du tableau contenant la liste des utilisateurs, dédié à l'administrateur du site. -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url("users/listeUsers"); ?>">
                                        <div class="text-light" href="#" data-animation=true data-toggle="popover" data-placement ="top" data-trigger="hover" data-content="Espace d'administration des utilisateurs. Cliquez ici pour accéder aux statistiques et fonctionnalités. (C.R.U.D)." title="GESTION DES USERS.">
                                            UTILISATEURS.
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <!-- Barre de search de la page principale permettant des recherches dans le catalogue produits. -->
                            <div class="container socialPad">
                                <?php
                                    echo validation_errors();
                                    echo form_open_multipart();
                                ?>
                                <div class="d-flex justify-content-end">
                                    <div class="searchbar">
                                        <input class="search_input" type="text" name="recherche" id="recherche" placeholder="Search..." value= "">
                                        <button id="search" class="search_icon" data-toggle="modal" data-target="#popin">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </nav>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="enterprise1" id="catalogue">.</div>
                    </div>	
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <!-- Alimentation de la liste des catégories et sous-catégories. -->
                        <ul class='list-group'>
                            <?php
                                foreach ($Liste_cat as $row1) {
                                    foreach ($Liste_cat_menu as $row) {
                                        if ($row1->cat_id == $row->cat_parent) {
                            ?>
                                            <li id=categories class="li1 list-group-item d-flex justify-content-between align-items-center bg-dark">
                                                <a id="<?= $row->cat_id ?>" class="click link" data-toggle="modal" data-target="#popin" type="button">
                                                    <?= $row1->cat_nom . ' : ' . $row->cat_nom ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                    }
                                }
                                            ?>
                        </ul>                    
                    </div>
                    <!-- Modal permettant l'affichage des produits selon catégorie. -->
                    <div class="modal" id="popin" data-keyboard="false" data-backdrop="false">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="dropzoneModalTitle" class="modal-title">produits par categorie.</h4>
                                    <button type="button" class="catBut" data-dismiss="modal">
                                        <img class= "imgBut" src="assets/img/retour.png">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row justify-content-around marge-nulle" id="content"></div>
                                </div>
                                <div class="modal-footer">
                                    <p><h5>Le custom incarne l'esprit de liberté des années 60. Dans les 50s, les soldats revenus de la guerre modifient bien évidemment autos et motos aux USA, mais dans la perspective de faire des courses illégales, de les rendre plus performantes. Le custom incarne autre chose : c'est un pied de nez à la société de consommation dont on devine, déjà, les subterfuges.</h5></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal d'affichage des détails d'un produit. -->
                    <div class="modal fade modal1" id="popin1" data-keyboard="false" data-backdrop="false">
                        <div class="modal-dialog modal-sm" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title col-11">Détails du produit.</h5>
                                    <button type="button" class="catBut" data-dismiss="modal">
                                        <img class= "imgBut1" src="assets/img/retour.png">
                                    </button>
                                </div>
                                <div class="modal-body" id="content1"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal d'affichage du formulaire de contact. -->
                    <div class="modal modal2" id="popin2" data-keyboard="false" data-backdrop="false">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">NOUS CONTACTER...</h4>
                                    <button type="button" class="catBut" data-dismiss="modal">
                                        <img class= "imgBut" src="assets/img/retour.png">
                                    </button>
                                </div>
                                <div class="modal-body flagFrance">
                                    <?php form_open('contact/index');?>
                                    <div class="form-group row">
                                        <label for="ID_email" class="col-3 text-left">E-mail :</label>
                                        <input name="email" required type="email" class="col-9 form-control" id="ID_email" placeholder="Entrer votre email ici" value="<?php set_value('email'); ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label for="ID_email" class="col-3 text-left">Titre :</label>
                                        <input name="title" required type="text" class="col-9 form-control" id="ID_email" placeholder="Titre" value="<?php set_value('title'); ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 mb-0">Message :</label>
                                        <textarea name="message" required class="col-9 form-control" id="ID_message" rows="10" placeholder="Entrez votre message ici">  
                                            <?php set_value('message')?>
                                        </textarea>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn bg-dark link">Envoyer</button>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer text-center">
                                    <h5>Nous nous efforcerons de répondre au mieux et dans les meilleurs délais.
                                        <br>Veillez à bien renseigner votre e-mail afin de garantir la reception de la réponse.
                                    </h5>
                                </div>	
                            </div>
                        </div>
                    </div>
                    <!-- Modal d'affichage du formulaire d'inscription. -->
                    <div class="modal modal2" id="popin3" data-keyboard="false" data-backdrop="false">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">S'INSCRIRE...</h4>
                                    <button type="button" class="catBut" data-dismiss="modal">
                                        <img class= "imgBut" src="assets/img/retour.png">
                                    </button>
                                </div>
                                <div class="modal-body flagFrance">
                                    <?php form_open('users/index');?>
                                        <div class="form-group row">
                                            <label for="pseudo" class="col-3 text-left">Pseudo :</label>
                                            <input name="pseudo" required type="text" class="col-9 form-control" id="pseudo" placeholder="Entrer votre pseudo ici" value="<?php set_value('pseudo'); ?>">
                                        </div>
                                        <div class="form-group row">
                                            <label for="ID_email" class="col-3 text-left">E-mail :</label>
                                            <input name="email" required type="email" class="col-9 form-control" id="ID_email" placeholder="Entrer votre email ici" value="<?= set_value('email'); ?>">
                                        </div>
                                        <div class="form-group row">
                                            <label for="password_email" class="col-3 text-left">Password :</label>
                                                <?= form_password(['name' => "password", 'id' => "password_email", 'class' => 'col-9 form-control', 'placeholder' => "Password"], set_value('password')) ?>
                                        </div>
                                        <div class="text-right">
                                            <button class="btn bg-dark link">Envoyer</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <p>
                                    <h5>Rejoignez notre communauté et profitez des avantages rattachés.<br>    
                                        <br>Si vous rencontrez un problème lors de l'inscription, utilisez l'onglet "NOUS CONTACTER" pour en avertir l'administrateur du site.
                                    </h5>
                                    </p>
                                </div>	
                            </div>
                        </div>
                    </div>
                    <!-- Modal d'affichage du formulaire de connexion. -->
                    <div class="modal modal2" id="popin4" data-keyboard="false" data-backdrop="false">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">SE CONNECTER...</h4>
                                    <button type="button" class="catBut" data-dismiss="modal">
                                        <img class= "imgBut" src="assets/img/retour.png">
                                    </button>
                                </div>
                                <div class="modal-body flagFrance">
                                    <?=form_open('users/connexion');?>
                                        <div class="form-group row">
                                            <label for="pseudo" class="col-3 text-left">Pseudo :</label>
                                            <input name="pseudo" required type="text" class="col-9 form-control" id="pseudo" placeholder="Entrer votre pseudo ici" value="<?= set_value('pseudo'); ?>">
                                        </div>
                                        <div class="form-group row">
                                            <label for="ID_email" class="col-3 text-left">E-mail :</label>
                                            <input name="email" required type="email" class="col-9 form-control" id="ID_email" placeholder="Entrer votre email ici" value="<?= set_value('email'); ?>">
                                        </div>
                                        <div class="form-group row">
                                            <label for="password_email" class="col-3 text-left">PASSWORD :</label>
                                                <?= form_password(['name' => "password", 'id' => "password_email", 'class' => 'col-9 form-control', 'placeholder' => "Password"], set_value('password')) ?>
                                        </div>
                                        <div class="text-right">
                                            <button class="btn bg-dark link">Envoyer</button>
                                        </div>
                                </form>
                                </div>
                                <div class="modal-footer">
                                    <p><h5>Si vous rencontrez un problème lors de la connexion, utilisez l'onglet "NOUS CONTACTER" pour en avertir l'administrateur du site.</h5></p>
                                </div>	
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-4">
                    <?php
                        //Utilisation d'une variable aléatoire pour sélection d'une vidéo.
                        $choose = rand(1, 3);
                        switch ($choose) {
                            case 1:
                                ?><iframe width="950" height="590" src="https://www.youtube.com/embed/FkUZHpldTME?&autoplay=1&loop=1" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"></iframe>
                            	<?php
				break;
                            case 2:
                                ?><iframe width="950" height="590" src="https://www.youtube.com/embed/R_yDiimhJw8?&autoplay=1&loop=1" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"></iframe>
                            	<?php
				break;
                            case 3:
                                ?><iframe width="950" height="590" src="https://www.youtube.com/embed/2XMDxAUivPU?&autoplay=1&loop=1" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"></iframe>
                            	<?php
				break;
                        }
                            ?> 
                    </div>
                    <div class="col-lg-4">
                        <div class="row justify-content-around marge-nulle enterprise2">
                            <div class="card2" style="width: 40rem">
                                <a id="57" class="click link1" data-toggle="modal" data-target="#popin" type="button">
                                    <div class="text-light" href="#" data-animation=true data-toggle="popover" data-placement ="top" data-trigger="hover" data-content="Plaque décorative d'esprit vintage, en métal peint ou émaillé. Cliquez ici pour découvrir tous les modèles en stock." title="PLAQUE MURALE VINTAGE">
                                        Decouvrez les réclames murales vintage.
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row justify-content-around marge-nulle enterprise2">
                            <div class="col-lg-6">
                                <div id="carouselExampleControls" class="carousel1 slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="card" style="width: 16.3rem;height: auto">
                                                <a id="118" href="#" class="card-link click1" data-toggle="modal" data-target="#popin1" type="button">
                                                    <img class="card-img-top imgPlaque" src="assets/img/118.jpg" alt="Card image cap">
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                            foreach ($Liste_plaques as $row5) {
                                        ?>
                                                <div class="carousel-item">
                                                    <div class="card" style="width: 16.3rem;height: auto">
                                                        <a id="<?= $row5->pro_id ?>" href="#" class="card-link click1" data-toggle="modal" data-target="#popin1" type="button">
                                                            <img class="card-img-top imgPlaque" src="assets/IMG/<?= $row5->pro_photo ?>" alt="Card image cap">
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                                ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="card" style="width: 16.3rem;height: auto">
                                                <a id="119" href="#" class="card-link click1" data-toggle="modal" data-target="#popin1" type="button">
                                                    <img class="card-img-top imgPlaque" src="assets/img/119.jpg" alt="Card image cap">
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                            foreach ($Liste_plaques1 as $row6) {
                                        ?>
                                                <div class="carousel-item">
                                                    <div class="card" style="width: 16.3rem;height: auto">
                                                        <a id="<?= $row6->pro_id ?>" href="#" class="card-link click1" data-toggle="modal" data-target="#popin1" type="button">
                                                            <img class="card-img-top imgPlaque" src="assets/IMG/<?= $row6->pro_photo ?>" alt="Card image cap">
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                                ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-around marge-nulle enterprise2">
                            <div class="card2" style="width: 40rem">Nos partenaires.</div>
                        </div>
                        <!-- Liste des partenaires. -->
                        <div class="row justify-content-around marge-nulle enterprise2">
                            <div class="card card2" style="width: 12rem;height: 8rem">
                                <img src="assets/img/hd.gif" alt="Card image cap">
                            </div>
                            <div class="card card2" style="width: 8rem;height: 8rem">
                                <img src="assets/img/indian.png" alt="Card image cap">
                            </div>
                            <div class="card card2" style="width: 8rem;height: 8rem">
                                <img src="assets/img/arlen-ness.png" alt="Card image cap">
                            </div>
                            <div class="card card2" style="width: 8rem;height: 8rem">
                                <img src="assets/img/sinister.jpg" alt="Card image cap">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="enterprise1" id="informations">.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row marge-nulle" >
            <div class="col-md-4 enterprise2">
                <div class="row marge-nulle">
                    <h4 class="enterprise card2" style="width: 40rem">
                        <div class="link" href="#" data-animation=true data-toggle="popover" data-placement ="top" data-trigger="hover" data-content="Toute l'année, nous vous proposons des promotions pendant la période de lancement de nouveaux produits." title="LES PROMOTIONS">
                            LES PROMOTIONS.
                        </div>
                    </h4>
                </div>
                <div class="row justify-content-around marge-nulle" >
                <?php
                    $compt = 0;
                    foreach ($Liste_pro_asc as $row4) {
                        $compt++;
                        if ($compt <= 3) {
                ?>
                            <a id="<?= $row4->pro_id ?>" class="card-link click1" data-toggle="modal" data-target="#popin1" type="button">
                                <div class="card1 cardx">
                                    <img class="card-img-top imgCat" src="assets/img/<?= $row4->pro_photo ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h6 class="card-title"><?= $row4->pro_libelle ?></h6>
                                        <div class="card-text">
                                            <ul class="list-unstyled list-inline rating mb-0">
                                                <?php
                                                    //Génération des étoiles et calculs des promotions.
                                                    $totalRows = count($Liste_pro_asc);
                                                    $level = count($Liste_pro_asc) / 5;
                                                    switch ($compt) {
                                                            case $compt <= $level:
                                                ?>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star fa-spin amber-text"></i></li>
                                                        <?php
                                                                $reduce = '25%';
                                                                break;
                                                            case $compt > $level && $compt <= $level * 2:
                                                        ?>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"></i></li>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                        <?php
                                                                $reduce = '20%';
                                                                break;
                                                            case $compt > $level * 2 && $compt <= $level * 3:
                                                        ?>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"></i></li>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                        <?php
                                                                $reduce = '15%';
                                                                break;
                                                            case $compt > $level * 3 && $compt <= $level * 4:
                                                        ?>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"></i></li>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                        <?php
                                                                $reduce = '10%';
                                                                break;
                                                            case $compt > $level * 4 && $compt <= $level * 5:
                                                        ?>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"></i></li>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                        <?php
                                                                $reduce = '5%';
                                                                break;
                                                    }
                                                        ?>
                                            </ul>
                                        </div>
                                        <h7><?= $row4->pro_prix ?>€ - <text style='color:red'><?= $reduce ?></text></h7>
                                        <h6 style='color:green'>=<?= round($row4->pro_prix * 0.75, 2); ?>€</h6>
                                    </div>
                                    <div class="card-body"></div>
                                </div>
                            </a>
                            <?php
                        }
                    }
                            ?>
                </div>
            </div>
            <div class="col-md-8 enterprise2">
                <div class="row marge-nulle">
                    <h4 class="enterprise card2" style="width: 80rem">
                        <div class="link" href="#" data-animation=true data-toggle="popover" data-placement ="top" data-trigger="hover" data-content="Profitez de votre cadeau du jour pour l'achat d'un des produits préférés de nos abonnés." title="LES INCONTOURNABLES.">
                            LES INCONTOURNABLES.
                        </div>
                    </h4>
                </div>
                <div class="row justify-content-around marge-nulle" >
                    <?php
                        $compt = 0;
                        foreach ($Liste_pro_desc as $row4) {
                            $compt++;
                            if ($compt <= 6) {
                    ?>
                                <a id="<?= $row4->pro_id ?>" class="card-link click1" data-toggle="modal" data-target="#popin1" type="button">
                                    <div class="card1 cardx">
                                        <img class="card-img-top imgCat" src="assets/IMG/<?= $row4->pro_photo ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h6 class="card-title"><?= $row4->pro_libelle ?></h6>
                                            <div class="card-text">
                                                <ul class="list-unstyled list-inline rating mb-0">
                                                    <?php
                                                        $totalRows = count($Liste_pro_desc);
                                                        $level = count($Liste_pro_desc) / 5;
                                                        switch ($compt) {
                                                                case $compt > $level * 4 && $compt <= $level * 5:
                                                    ?>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star fa-spin amber-text"></i></li>
                                                            <?php
                                                                    break;
                                                                case $compt > $level * 3 && $compt <= $level * 4:
                                                            ?>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"></i></li>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                            <?php
                                                                    break;
                                                                case $compt > $level * 2 && $compt <= $level * 3:
                                                            ?>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"> </i></li>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                            <?php
                                                                    break;
                                                                case $compt > $level && $compt <= $level * 2:
                                                            ?>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"></i></li>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                            <?php
                                                                    break;
                                                                case $compt <= $level:
                                                            ?>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star amber-text"></i></li>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                                    <li class="list-inline-item mr-0"><i class="fas fa-star star"></i></li>
                                                            <?php
                                                                    break;
                                                        }
                                                            ?>
                                                </ul>
                                            </div>
                                            <p><?= $row4->pro_prix ?> €</p>
                                        </div>
                                        <div class="card-body"></div>
                                    </div>
                                </a>
                                <?php
                            }
                        }
                                ?>
                    <div class="card1">
                        <div class="overlay-image">
                            <div class="card1">
                                <img class="card-img-top" src="assets/img/cadeau.jpg" alt="Cadeau">
                                <div class="card-body">
                                    <h6 class="card-title"></h6>
                                    <h7 class="card-text blink">POUR UN PRODUIT PHARE. VOTRE CADEAU..!</h7>
                                </div>
                            </div>
                            <div class="hover">
                                <div class="card">
                                    <img class="card-img-top" src="assets/img/biker-2649412_960_720.png" alt="Biker">
                                    <div class="card-body">
                                        <h6 class="card-title">CADEAU</h6>
                                        <p class="card-text">CADEAU PROMOS...</p>
                                    </div>
                                    <div class="card-body blink">
                                        <h5>GRATUIT</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="enterprise1" id="mentions">.</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <marquee direction="right" scrollamount="4">
                    <p><img src="assets/img/Titeuf-31782.gif" alt="Gaston" id="img5">
                </marquee>
            </div>
        </div>			
        <div class="row">
            <div class="col-12">
                <div class="enterprise1" id="bottom">.</div>
            </div>
        </div>
        <footer>
            <!-- Barre de navigation du footer. -->
            <nav id="navbar" class="navbar navbar-expand-sm bg-dark navbar-dark enterprise2">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="Mentions l�gales">Accueil</a>
                        </li>
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
        <script src="assets/js/carousel.js"></script>
        <script src="assets/js/word.js"></script>
        <script src="assets/js/Menu_cat.js"></script>
        <script src="assets/js/details.js"></script>
        <script src="assets/js/search.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
        <script>
            window.cookieconsent.initialise
            (
                {
                    "palette":
                    {
                        "popup":
                        {
                            "background": "#000"
                        },
                        "button":
                        {
                            "background": "#f1d600"
                        }
                    }
                }
            );
        </script>
    </body>
</html>
