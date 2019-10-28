<?php

    if (!defined('BASEPATH'))
    {    
        exit('No direct script access allowed');
    }
    class Produits extends CI_Controller {
        /* ------------------------------------------------------------------ */
        //Déclaration du constructeur.
        public function __construct() 
        {
            parent::__construct();

            // load librairie de pagination.
            $this->load->library('pagination');
            // load URL helper
            $this->load->helper('url');
        }

    /* ---------------------------------------------------------------------- */
    //Fonction d'affichage de la liste de tous les produits dans un tableau.
    public function liste()
    {
        //Récupération du nombre total d'items.
        $this->load->model('Produits_model');
        $total_records = $this->Produits_model->get_total();
        if ($total_records > 0)
        {
            // init params
            $params = array();
            $this->load->library('pagination');
            $limit = 5;
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $aListe = $this->Produits_model->get_current_page_records($limit, $page);
            $params['liste_produits'] = $aListe;
            // Définition des paramètres pour le wrapper de pagination.
            $config['base_url'] = 'http://localhost/hotrod/index.php/Produits/liste';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
            $config['num_links'] = 4;
            $config['full_tag_open'] = '<div class="pagination pagination_design">';
            $config['full_tag_close'] = '</div>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<span class="pagination_design">';
            $config['first_tag_close'] = '</span>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<span class="pagination_design">';
            $config['last_tag_close'] = '</span>';
            $config['next_link'] = '';
            $config['next_tag_open'] = '<span class=" fa fa-angle-right pagination_design">';
            $config['next_tag_close'] = '</span>';
            $config['prev_link'] = '';
            $config['prev_tag_open'] = '<span class=" fa fa-angle-left pagination_design">';
            $config['prev_tag_close'] = '</span>';
            $config['cur_tag_open'] = '<span class="curlink pagination_design">';
            $config['cur_tag_close'] = '</span>';
            $config['num_tag_open'] = '<span class="numlink pagination_design">';
            $config['num_tag_close'] = '</span>';
            //Initialisation du wrapper de pagination et de ses paramètres.
            $this->pagination->initialize($config);
        }
        //Chargement de la page d'affichage de la liste des produits.
        $this->load->view('liste', $params);
    }
    /* ---------------------------------------------------------------------- */
    //Fonction d'affichage de la page principale du site.
    public function accueil() 
    {
        $this->load->model('Produits_model');
        $this->load->model('Categories_model');
        $aListe1 = $this->Categories_model->select_cat_menu();
        $aListe2 = $this->Categories_model->select_cat();
        $aListe3 = $this->Produits_model->liste();
        $aListe4 = $this->Produits_model->liste2();
        $aListe2Bis = $this->Produits_model->liste2Bis();
        $aListe5 = $this->Produits_model->liste5();
        $aListe6 = $this->Produits_model->liste6();
        $aListe_noRank = $this->Produits_model->liste9();
        $aView["Liste_cat_menu"] = $aListe1;
        $aView["Liste_cat"] = $aListe2;
        $aView["Liste_pro"] = $aListe3;
        $aView["Liste_pro_asc"] = $aListe4;
        $aView["Liste_pro_desc"] = $aListe2Bis;
        $aView["Liste_plaques"] = $aListe5;
        $aView["Liste_plaques1"] = $aListe6;
        $aView["Liste_noRank"] = $aListe_noRank;
        $this->load->view('index', $aView);
    }
    /* ---------------------------------------------------------------------- */
    //Fonction assignée au champs de recherche de la page principale.( Recherche dans le catalogue produits ).
    public function search($recherche)
    {
        //Prise en compte et préparation de l'input.
        $recherche = strtolower($recherche);                //on passe en minuscule
        $mots = str_replace('+', ' ', trim($recherche));    //on remplace les + par des espaces
        $mots = str_replace('\'', ' ', $mots);              //idem pour \
        $mots = str_replace(',', ' ', $mots);               //idem pour ,
        $mots = str_replace(':', ' ', $mots);               //idem pour :
        //Initialisation du tableau des données résultantes de la requête.
        $bListe_search = [];
        //Découpage de l'input de l'utilisateur pour identifier la demande en mot à mot.
        $tab = explode('%20', $mots);
        //Compte du nombre de mots demandés
        $nb = count($tab);
        for ($i = 0; $i < $nb; $i++)
        {
            $word = $tab[$i];
            $this->load->model('Produits_model');
            $aListe_search = $this->Produits_model->liste7($word);
            $nb1 = count($aListe_search);
            for ($j = 0; $j < $nb1; $j++)
            {
                $bListe_search[$i + $j] = $aListe_search[$j];
            }
        }
        //Test si pas de résultat.
        if (count($bListe_search) == 0)
        {
            echo '<p style="color:red;">Aucun produit ne correspond à votre requête.</p>';    //Message provisoire.
        }
        $searchView['liste'] = $bListe_search;
        $aListe4 = $this->Produits_model->liste2();
        $searchView['Liste_pro_asc'] = $aListe4;
        $this->load->view('popinCat', $searchView);
    }
    /* ---------------------------------------------------------------------- */
    //Fonction de recherche assignée au champs de recherche de la liste des produits de l'espace d'administration.( Recherche dans le catalogue produits ).
    public function search1()
    {
        if ($this->input->post())
        {
            $recherche = $this->input->post('recherche');
            $this->session->recherche = $recherche;
        }
        else
        {
            $recherche = $this->session->recherche;
        }
        //Prise en compte et préparation de l'input.
        $recherche = strtolower($recherche);                //on passe en minuscule
        $mots = str_replace('+', ' ', trim($recherche));    //on remplace les + par des espaces
        $mots = str_replace('\'', ' ', $mots);              //idem pour \
        $mots = str_replace(',', ' ', $mots);               //idem pour ,
        $mots = str_replace(':', ' ', $mots);               //idem pour :
        //Initialisation du tableau de résultat.
        $bListe_search = [];
        //Découpage de l'input utilisateur en mot à mot.
        $tab = explode(' ', $mots);
        //Comptage du nombre d'éléments dans le tableau.
        $nb = count($tab);
        // init params
        $params = array();                                              //Initialisation du tableau de paramètres.
        $limit = 5;                                                     //Fixation du nombre d'items par page.
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;  //Définition du segment de l'URI pour passer le numéro de page.
        
        $this->load->model('Produits_model');
        $aListe_search = $this->Produits_model->liste8($tab);
        $params['liste_produits'] = $aListe_search;
        // Définition des paramètres pour le wrapper pagination.
        $config['base_url'] = 'http://localhost/hotrod/index.php/Produits/search1';
        $config['total_rows'] = $this->Produits_model->count_liste8($tab);
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['num_links'] = 4;
        $config['full_tag_open'] = '<div class="pagination pagination_design">';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<span class="pagination_design">';
        $config['first_tag_close'] = '</span>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<span class="pagination_design">';
        $config['last_tag_close'] = '</span>';
        $config['next_link'] = '';
        $config['next_tag_open'] = '<span class="fa fa-angle-right pagination_design">';
        $config['next_tag_close'] = '</span>';
        $config['prev_link'] = '';
        $config['prev_tag_open'] = '<span class="fa fa-angle-left pagination_design">';
        $config['prev_tag_close'] = '</span>';
        $config['cur_tag_open'] = '<span class="curlink pagination_design">';
        $config['cur_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span class="numlink pagination_design">';
        $config['num_tag_close'] = '</span>';
        //Initialisation du wrapper de pagination et de ses paramètres.
        $this->pagination->initialize($config);
        //Test de la présence de données et affichage d'un message si le tableau est vide.
        if (count($aListe_search) == 0)
        {
            echo '<p style="color:red;">Aucun produit ne correspond à votre requête.</p>';    //Message provisoire.
        }
        //Chargement de la page d'affichage de la liste des produits.
        $this->load->view('liste', $params);
    }
    /* ---------------------------------------------------------------------- */
    //Fonction d'ajout d'un nouveau produit dans la BDD.
    public function ajout()
    {
        $this->load->model('Categories_model');
        $aListe_cat = $this->Categories_model->select_cat();
        $aView['liste_categories'] = $aListe_cat;
        //Création du tableau de gestion des contrôles et messages du formulaire d'ajout d'un nouveau produit.
        $config1 = array(
            array(
                'field' => 'pro_libelle',
                'label' => 'libellé',
                'rules' => 'required',
                'errors' => array
                (
                    'required' => 'Vous devez saisir un %s.',
                ),
            ),
        );
        //Chargement du wrapper de validation de formulaire avec les règles de contrôle indiquées dans '$config1'.
        $this->form_validation->set_rules($config1);
        //Test de soumission du formulaire.
        if ($this->form_validation->run() == TRUE)
        {
            $data = $this->input->post();   //Récupération des données du formulaire.
            $date = date('Y-m-d');          //Format de la date d'ajout.
            $data['pro_d_ajout'] = $date;   //Insertion de la date d'ajout dans le tableau de données à ajouter dans la BDD.
            //Test du choix d'une sous-catégorie qui devra servir de catégorie lors de l'insertion.
            if (isset($data['sous_cat_id']))
            {
                $data['pro_cat_id'] = $data['sous_cat_id'];
                unset($data['sous_cat_id']);
            }
            //Récupération du fichier d'upload de la photo du produit.
            $name = $_FILES['pro_photo']['name'];               //Récupération du nom du fichier.
            $file_ext = pathinfo($name, PATHINFO_EXTENSION);    //Récupération de l'extension du fichier uploadé.
            //Chargement du model d'ajout du nouveau produit dans la BDD.
            $this->load->model('Produits_model');
            $this->Produits_model->ajout($data);
            //Chargement des paramètres du wrapper d'upload.
            $config = [];
            $config['upload_path'] = FCPATH . 'assets/img/';
            $config['file_name'] = $this->db->insert_id() . '.' . $file_ext;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['overwrite'] = TRUE;
            $config['max_size'] = '1024';
            $config['max_width'] = '3000';
            $config['max_height'] = '2000';
            //Initialisation du wrapper d'upload et de ses paramètres '$config'.
            $this->load->library('upload', $config);
            //Création du nouveau nom du fichier photo.
            $pro_id = $this->db->insert_id();               //Récupération de l'id en cours.
            $data['pro_photo'] = $pro_id . '.' . $file_ext; //Insertion du nouveau nom de fichier upload dans le tableau des données à traiter.
            //Chargement du model d'insertion dans la BDD.
            $this->load->model('produits_model');
            $this->produits_model->modif_allowed($pro_id, $data);

            //Test de la validité de l'opération et message d'erreur si NOK et retour sur la page d'ajout.
            if (!$this->upload->do_upload('pro_photo'))
            {
                $errors = array('error' => $this->upload->display_errors());
                $aView1['errors'] = $errors;
                $this->load->view('ajout', $aView1);
            }
            //Si OK, redirection vers la liste des produits afin de vérifier de visu la présence des données insérées.
            redirect('Produits/liste');
        }
        else
        {
            //Si la procédure n'est pas complète, retour sur la page d'ajout.
            $this->load->view('ajout', $aView);
        }
    }
    /* ---------------------------------------------------------------------- */
    //Fonction de récupération des sous-catégories de produits.
    public function get_modele_json($cat_id) 
    {

        $this->load->model('Categories_model');
        $modeles = $this->Categories_model->select_sous_cat($cat_id);

        $this->output->set_content_type('application/json');
        $this->output->set_status_header(200);
        $this->output->set_output(json_encode($modeles));
    }
    /* ---------------------------------------------------------------------- */
    //Fonction de récupération de la liste des produits par catégories.
    public function get_modele_cat() 
    {
        $cat_id = $this->input->post('cat_id');
        $this->load->model('Produits_model');
        $modeles = $this->Produits_model->pic($cat_id);
        $aListe4 = $this->Produits_model->liste2();
        $aListeNoRank = $this->Produits_model->liste9();
        $modelesView["Liste_no_rank"] = $aListeNoRank;
        $modelesView["Liste_pro_asc"] = $aListe4;
        $modelesView['liste'] = $modeles->result();
        $this->load->view('popinCat', $modelesView);
    }
    /* ---------------------------------------------------------------------- */
    //Fonction de récupération des informations de détails d'un produit.
    public function get_modele_details() 
    {
        $pro_id = $this->input->post('pro_id');
        $this->load->model('Produits_model');
        $modeles = $this->Produits_model->pick($pro_id);
        $aListe4 = $this->Produits_model->liste2();
        $aListeNoRank = $this->Produits_model->liste9();
        $modelesView["Liste_no_rank"] = $aListeNoRank;
        $modelesView["Liste_pro_asc"] = $aListe4;
        $modelesView['liste'] = $modeles->result();
        $this->load->view('details', $modelesView);
    }
    /* ---------------------------------------------------------------------- */
    //Fonction de modification des caractéristiques d'un produit.
    public function modif($pro_id)
    {
        //définition du fuseau horaire pour la date de modification.
        date_default_timezone_set('Europe/Paris');
        //Chargement du model de requête des catégories.
        $this->load->model('Categories_model');
        $aListe_cat = $this->Categories_model->select_cat();
        $aListe_cat_menu = $this->Categories_model->select_cat_menu();
        $aView['liste_categories'] = $aListe_cat;
        $aView['liste_sous_categories'] = $aListe_cat_menu;
        //Création du tableau de gestion des contrôles et messages du formulaire de modification d'un produit.
        $config1 = array
        (
            array
            (
                'field' => 'pro_libelle',
                'label' => 'libellÃ©',
                'rules' => 'required',
                'errors' => array
                (
                    'required' => 'Vous devez saisir un %s.',
                ),
            ),
        );
        //Chargement du wrapper de validation de formulaire avec les règles de contrôle indiquées dans '$config1'.
        $this->form_validation->set_rules($config1);
        //Test de soumission du formulaire.
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->model('produits_model');
            $aListe = $this->produits_model->modif_forbidden($pro_id);
            $aView['produits'] = $aListe;       // première ligne du résultat
            $this->load->model('Categories_model');
            $aListe_cat = $this->Categories_model->select_cat();
            $aListe_cat_menu = $this->Categories_model->select_cat_menu();
            $aView['liste_categories'] = $aListe_cat;
            $aView['liste_sous_categories'] = $aListe_cat_menu;
            $this->load->view('modif', $aView);
        }
        else
        {
            //Récupération des données postées.
            $data = $this->input->post();
            //Définition du format de la date de modification.
            $date = date('Y-m-d H:i:s');
            //Insertion de la date de modification dans le tableau de résultats.
            $data['pro_d_modif'] = $date;
            //Test du choix d'une sous-catégorie qui devra servir de catégorie lors de l'insertion.
            if (isset($data['sous_cat_id']))    //Test de présence d'une sous-catégorie.
            {
                $data['pro_cat_id'] = $data['sous_cat_id']; //Remplacement de la catégorie par la sous-catégorie.
                unset($data['sous_cat_id']);                //Suppression de la sous-catégorie.
            }
            //Récupération du fichier d'upload de la photo du produit.
            $name = $_FILES['pro_photo']['name'];
            $file_ext = pathinfo($name, PATHINFO_EXTENSION);    //Récupération de l'extension du fichier uploadé.
            //récupération de l'id en cours.
            $pro_id = $this->input->post('pro_id');
            //Chargement du model de modification de la BDD.
            $this->load->model('produits_model');
            $this->produits_model->modif_allowed($pro_id, $data);
            //Chargement des paramètres du wrapper d'upload.
            $config['upload_path'] = FCPATH . 'assets/img/';    //Chemin de sauvegarde du nouveau fichier.
            $config['file_name'] = $pro_id . '.' . $file_ext;   //Construction du nom du nouveau fichier.
            $config['allowed_types'] = 'gif|jpg|png';           //Types MIME acceptés.
            $config['overwrite'] = TRUE;                        //Ecraser l'ancien fichier si déjà existant.
            $config['max_size'] = '1024';                       //Taille maxi du fichier upload.
            $config['max_width'] = '1024';                      //Largeur maxi du fichier upload.
            $config['max_height'] = '768';                      //Hauteur maxi du fichier upload.
            //Chargement de la librairie d'upload.
            $this->load->library('upload', $config);
            //Test de non-validité de l'upload
            if (!$this->upload->do_upload('pro_photo'))
            {
                $errors = array('error' => $this->upload->display_errors());
                $aView1['errors'] = $errors;
                $this->load->view('ajout', $aView1);
            }
            redirect('produits/liste');
        }
    }
    /* ---------------------------------------------------------------------- */
    //Fonction de suppression d'un produit de la BDD.
    public function suppr($pro_id) 
    {
        //Récupération de l'id.
        $data = $this->input->get();
        //Chargement du modèle selection des données afférantes à l'id.
        $this->load->model('produits_model');
        $this->produits_model->suppr($pro_id, $data);
        //Redirection vers la liste des produits.
        redirect('produits/liste');
    }

}
?>