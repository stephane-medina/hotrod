//application/controllers/Contact.php
<?php
    // Controleur de gestion du formulaire de contact.
    class Contact extends CI_Controller
    {
        //Définition du constructeur.
        /* ------------------------------------------------------------------ */
        public function __construct()
        {
            parent::__construct();
            // Load contact model
            $this->load->model('Contact_model');
        }
        /* ------------------------------------------------------------------ */
        //Affichage du formulaire de contact.
        public function index()
        {
            // Load des librairies
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->helper('url');

            // Déclaration des règles contrôle du formulaire.
            $this->form_validation->set_rules('email', 'e-mail', 'trim|required' , array('required' => "Valid email required") );
            $this->form_validation->set_rules('title', 'Titre', 'trim|required', array('required' => "Title required") );
            $this->form_validation->set_rules('message', 'message', 'trim|required', array('required' => "Message required") );
            //Test de soumission du formulaire.
            if ($this->form_validation->run() === FALSE)
            {
                //Si le formulaire n'est pas validé, on le réaffiche.
                $this->displayForm();
            }
            else
            {
                //Si le formulaire est validé, on envoie le message.
                $this->Contact_model->sendMessage();
                redirect('');   //Redirection vers la page principale du site.
            }
        }
        /* ------------------------------------------------------------------ */
        //Affichage du formulaire.
        private function displayForm()
        {
            // Preparation des paramètres du mail.
            $data['headerTitle'] = 'Contact';
            $data['headerDescription'] = 'Page de contact';
            $data['title'] = 'Contact';

            // Affichage du formulaire.
            $this->load->view('templates/header', $data);
            $this->load->view('templates/alert', $data);
            $this->load->view('contact/index', $data);
            $this->load->view('templates/footer', $data);
        }
        /* ------------------------------------------------------------------ */
        public function sendMail()
        {
            $this->load->view('templates/header');
            $this->load->view('templates/alert');
            $this->load->view('contact/index');
            $this->load->view('templates/footer');
        }
    }
?>