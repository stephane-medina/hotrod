<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class Users_model extends CI_Model
    {
        //Initialisation du constructeur.
        function __construct()
        {
            parent::__construct();
        }
    /*------------------------------------------------------------------------*/
        //Récupération de la page courante.
        public function get_current_page_records($limit, $page)
        {

            $this->db->select('*');
            $this->db->from('users');
            $this->db->limit($limit, $page);
            $view = $this->db->get();
            $result = $view->result();
            return $result;
        }
        public function get_total()
        {
            $this->db->from('users');
            return $total_records = $this->db->count_all_results();
        }
        /*--------------------------------------------------------------------*/
        //Liste de tous les utilisateurs classée par ordre descendant.
         public function listeUsers() 
         {
             $results = $this->db->query('SELECT * FROM users ORDER BY DESC');
             $aListe = $results->result(); 
             return $aListe; 
         }
         /*-------------------------------------------------------------------*/
         //Résultat du search.
         public function liste7($word)
         {
             $results = $this->db->query("SELECT *, MATCH (pro_description) AGAINST ('%$word%') AS pertinence FROM produits WHERE MATCH (pro_description) AGAINST ('%$word%') > 0 ORDER BY pertinence DESC");   //on prépare la requête SQL.

             $aListe7 = $results->result();
             return $aListe7;
         }
         /*-------------------------------------------------------------------*/
         //Alimentation des pages paginées du search.
         public function listeUsers8($tab)
         {
             $limit = 5;
             $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
             $word=$tab[0];
             $nb=count($tab);
             for($i=1 ; $i<$nb; $i++)
             {
                 $word =$word.','.$tab[$i];
             }
                 $view=$this->db->query("SELECT *, MATCH (pseudo) AGAINST ('%$word%') AS pertinence FROM users WHERE MATCH (pseudo) AGAINST ('%$word%') > 0 ORDER BY pertinence DESC LIMIT $page, $limit");   //on prépare la requête SQL.
                 $aListeUsers8 = $view->result();
                 return $aListeUsers8;
         }
         /*-------------------------------------------------------------------*/
         //Compte du nombre de résultat du search.
         public function count_liste8($tab)
         {
             $word=$tab[0];
             $nb=count($tab);
             for($i=1 ; $i<$nb; $i++)
             {
                 $word =$word.','.$tab[$i];
             }

             $view=$this->db->query("SELECT *, MATCH (pseudo) AGAINST ('%$word%') AS pertinence FROM produits WHERE MATCH (pseudo) AGAINST ('%$word%') > 0 ORDER BY pertinence DESC");   //on prépare la requête SQL.
             $aListe8 = count($view->result());
             return $aListe8;
         }
        /*---------------------------------------------------------------------*/
         //Récupération des caractéristiques d'un id.
         public function modif_forbidden($id)
         {
             $results = $this->db->query("SELECT * FROM users WHERE id= ?", array($id));
             $aListe = $results->row();
             return $aListe;
         }
        /*--------------------------------------------------------------------*/
         //Update de la table users.
         public function modif_allowed($id,$data)
         {
             $this->db->where('id', $id);
             $this->db->update('users', $data);
         }
        /*--------------------------------------------------------------------*/
         //Suppression d'un utilisateur par son id.
         public function suppr($id,$data)
         {
             $this->db->where('id', $id);
             $this->db->delete('users', $data);
         }
        /*--------------------------------------------------------------------*/
         //Création d'un utilisateur et ajout dans la BDD.
         public function ajout($data)
         {
             $this->db->insert("users", $data);
         }
        /*--------------------------------------------------------------------*/
         //Récupération des caractéristiques de l'id en cours.
         public function pick($id)
         {
             $query = 'SELECT * FROM users WHERE `id` = ?';
             $results = $this->db->query($query, array($id));
             return $results;
         }
    }
?>
