<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class users extends CI_Controller
    {
        //Controleur de gestion des utilisateurs.
        public function __construct()
        {
            parent::__construct();
            // load librairie de pagination.
            $this->load->library('pagination');
            // load URL helper
            $this->load->helper('url');
        }
        /**********************************************************************/
        //Fonction d'affichage de la liste de tous les utilisateurs dans un tableau.
        public function listeUsers()
        {
            //Chargement du model de comptage du nombre d'items.
            $this->load->model('Users_model');
            $total_records = $this->Users_model->get_total();
            //Test de présence de données.
            if ($total_records > 0)
            {
                // init params
                $params = array();                                              //Initialisation du tableau de résultats.
                $limit = 5;                                                     //Définition du nombre d'items par page.
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;  //définition du segment URI utilisé pour passer le numéro de page.
                //Chargement du mode de définition de la page en cours.
                $aListe = $this->Users_model->get_current_page_records($limit, $page);
                $params["liste_users"] = $aListe;
                $config['base_url'] = 'http://localhost/hotrod/index.php/users/listeUsers';
                $config['total_rows'] = $total_records;
                $config['per_page'] = $limit;
                $config["uri_segment"] = 3;
                // Définition des paramètres pour le wrapper de pagination.
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
            //Chargement de la vue listant tous les utilisateurs.
            $this->load->view('listeUsers', $params);
        }
        /**********************************************************************/
        //Fonction de modification des caractéristiques d'un utilisateur.
        public function modifUsers($id)
        {
            //définition du fuseau horaire pour la date de modification.
            date_default_timezone_set('Europe/Paris');
            //Création du tableau de gestion des contrôles et messages du formulaire de modification d'un produit.
            $config1 = array 
            (
                array 
                (
                    'field' => 'pseudo',
                    'label' => 'Pseudo',
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
                //Chargement du model de modification des caractéristiques d'un utilisateur dans la BDD.
                $this->load->model('users_model');
                $aListe = $this->users_model->modif_forbidden($id);
                $aView["users"] = $aListe;
                //Chargement du formulaire de modification des caractéristiques d'un utilisateur.
                $this->load->view('modifUsers', $aView);
            }
            else
            {
                //Récupération des données de l'input du formulaire de modification.
                $data = $this->input->post();
                //Mise en forme de la date de modification.
                $date=date('Y-m-d H:i:s');
                //Insertion de la date dans le tableau de données pour mise à jour.
                $data["user_d_modif"]= $date;
                //Récupération de l'id utilisateur.
                $id = $this->input->post("id");
                //Chargement du model de mise à jour dans la BDD.
                $this->load->model('users_model');
                $this->users_model->modif_allowed($id,$data);
                //Redirection vers la liste des utilisateurs.
                redirect('users/listeUsers');
            }
        }
        /**********************************************************************/
        //Fonction de récupération des caractéristiques personnelles d'un utilisateur.
        public function get_modif_details($id)
        {
            //Chargement du model de récupération des données de l'id en cours.
            $this->load->model('users_model');
            $modeles = $this->users_model->pick($id);
            $modelesView['users'] = $modeles->row();
            //Chargement de la vue du formulaire de modification des caractéristiques d'un utilisateur.
            $this->load->view('modifUsers', $modelesView);
        }
        /**********************************************************************/
        //Fonction d'affichage de la page d'ajout d'un utilisateur.
        public function get_create_users()
        {
            $this->load->view('ajoutUsers');
        }
        /**********************************************************************/
        //Fonction de recherche d'items dans la liste des utilisateurs. ( Récupération de l'input du champs de la barre de search ).
        public function search2()
        {
            //Prise en compte et préparation de l'input.
            if ($this->input->post()) {
                $recherche = $this->input->post('recherche');
                $this->session->recherche = $recherche;
            }
            else {
                $recherche = $this->session->recherche;
            }
            //Prise en compte et préparation de l'input.
            $recherche=strtolower($recherche);                  //on passe en minuscule
            $mots = str_replace("+", " ", trim($recherche));    //on remplace les + par des espaces
            $mots = str_replace("\"", " ", $mots);              //idem pour \
            $mots = str_replace(",", " ", $mots);               //idem pour ,
            $mots = str_replace(":", " ", $mots);               //idem pour :
            //Initialisation du tableau des données résultantes de la requête.
            $bListe_search=[];
            //Découpage de l'input de l'utilisateur pour identifier la demande en mot à mot.
            $tab=explode(" " , $mots);
            //Compte du nombre de mots demandés
            $nb=count($tab);
            // init params
            $params = array();                                              //Initialisation du tableau de résultats.
            $limit = 5;                                                     //Définition du nombre d'items par page.
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;  //définition du segment URI utilisé pour passer le numéro de page.

            $this->load->model('users_model');
            $aListe_search = $this->users_model->listeUsers8($tab);
            $params["liste_users"] = $aListe_search;
            $config['base_url'] = 'http://localhost/hotrod/index.php/users/search2';
            // init params
            $config['total_rows'] = $this->users_model->count_listeUsers8($tab);;
            $config['per_page'] = $limit;
            $config["uri_segment"] = 3;
            // Définition des paramètres pour le wrapper de pagination.
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
            //Test de la présence de données et affichage d'un message si le tableau est vide.
            if (count($aListe_search)== 0) {
                echo "<h3><p style='color:red;'>Aucun utilisateur ne correspond à votre requête.</p><h3>";    //Message provisoire.
            }
            //Chargement de la page d'affichage de la liste des utilisateurs.
            $this->load->view('listeUsers', $params);

        }
        /**********************************************************************/
        //Fonction de connexion d'un utilisateur.
        public function connexion() {
            $this->load->helper("form");
            //$this->load->library('form_validation');
            //$data["title"] = "Identification";
            $config2 = array 
            (
                array 
                (
                    'field' => 'pseudo',
                    'label' => 'pseudo',
                    'rules' => 'required',
                    'errors' => array 
                    (
                        'required' => 'Vous devez saisir un %s.',
                    ),
                ),
            );
            //Implémentation des règles de contrôle du formulaire.
            $this->form_validation->set_rules($config2);
            //Test de submit du formulaire.
            if ($this->form_validation->run() == TRUE) {
                $pseudo = $this->input->post('pseudo');     //Récupération de l'input du champs 'pseudo'.
                $email = $this->input->post('email');       //Récupération de l'input du champs 'email'.
                $password = $this->input->post('password'); //Récupération de l'input du champs 'password'.
                //Chargement de la méthode de login d'un utilisateur.
                $this->login( $pseudo, $email, $password);  //Appel de la fonction 'login' avec passage des variables.
                //Utilisation de la session pour passer des paramètres.
                $_SESSION['open']=true;
                $_SESSION['message']=true;
                $_SESSION['data']['result_class'] = "alert-success";
                $_SESSION['data']['title'] = "Résultat de connexion";
                $_SESSION['data']['result_message'] = " Bienvenue " . $_SESSION['users']['pseudo'] ."  !. Heureux de vous revoir. Nous vous souhaitons une bonne visite sur notre site.";
                //Redirection vers la page principale du site.
                redirect('');
            }
        }
        /**********************************************************************/
        //Fonction de login d'un utilisateur.
        public function login( $pseudo, $email, $password) {
            $user = $this->load_user( $pseudo);
            if (( $user !== NULL) && password_verify($password, $user->password)) {
                $this->id = $user->id;
                $this->pseudo = $user->pseudo;
                $this->email = $user->email;
                $this->save_session();
            } else {
                $this->logout();
            }
        }
        /**********************************************************************/
        protected function load_user( $pseudo) {
            return $this->db
            ->select('id, pseudo, email, password')
            ->from('users')
            ->where('pseudo', $pseudo)
            ->where('status', 'A')
            ->get()
            ->first_row();
        }
        /**********************************************************************/
        //Fonction de sauvegarde de la session.
        protected function save_session() {
            $this->session->users = [
                'id' => $this->id,
                'pseudo' => $this->pseudo
            ];
        }
        /**********************************************************************/
        //Fonction de déconnexion d'un utilisateur.
        public function bye_session() {
            $_SESSION['open']=false;
            $_SESSION['message1']=true;
            $_SESSION['data']['result_class'] = "alert-success";
            $_SESSION['data']['title'] = "Résultat de déconnexion";
            $_SESSION['data']['result_message'] = " Au revoir " . $_SESSION['users']['pseudo'] ."  !. En espérant vous revoir au plus vite sur notre site.";
            //Redirection vers la page principale du site.
            redirect('');
        }
        /**********************************************************************/
        //Fonction de destruction d'une session utilisateur.
        public function clear_session() {
            session_start();        // Démarrage ou restauration de la session
            $_SESSION = array();    // Réinitialisation du tableau de session
            session_destroy();      // Destruction de la session
            unset($_SESSION);       // Destruction du tableau de session
            redirect('');           //Redirection vers la page principale du site.
        }
        /**********************************************************************/
        protected function load_from_session() {
            if ($this->session->users) {
                $this->id = $this->session->users['id'];
                $this->pseudo = $this->session->users['pseudo'];
            } else {
                $this->clear_data();
            }
        }
    }
?>