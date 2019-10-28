<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Produits_model extends CI_Model
{
    //Initialisation du constructeur.
    function __construct()
    {
        parent::__construct();
    }
    /*------------------------------------------------------------------------*/ 
    //Récupération de la page en cours.
    public function get_current_page_records($limit, $page)
    {
        $this->db->select('*');
        $this->db->from('produits');
        $this->db->limit($limit, $page);
        $view = $this->db->get();
        $result = $view->result();
        return $result;
     }
    
    public function get_total()
    {
        $this->db->from('produits');
        return $total_records = $this->db->count_all_results();
    }
    /*------------------------------------------------------------------------*/
    //Liste de tous les produits par classement descendant.
     public function liste() 
     {
         $results = $this->db->query('SELECT * FROM produits ORDER BY pro_rank DESC');
         $aListe = $results->result(); 
         return $aListe; 
     }
     /*-----------------------------------------------------------------------*/
     //Liste des produits classés par classement ascendant.
     public function liste2()
     {
         $results = $this->db->query('SELECT * FROM produits where pro_rank IS NOT NULL ORDER BY pro_rank ASC');
         $aListe2 = $results->result();
         return $aListe2;
     }
     /*-----------------------------------------------------------------------*/
     //Liste des produits classés par classement descendant.
     public function liste2Bis()
     {
         $results = $this->db->query('SELECT * FROM produits where pro_rank IS NOT NULL ORDER BY pro_rank DESC');
         $aListe2Bis = $results->result();
         return $aListe2Bis;
     }
     /*-----------------------------------------------------------------------*/
     //Liste aléatoire des plaques murales pour affichage dans le premier carousel.
     public function liste5()
     {
         $results = $this->db->query('SELECT * FROM produits WHERE pro_cat_id = 57 ORDER BY RAND()');
         $aListe5 = $results->result();
         return $aListe5;
     }
     /*-----------------------------------------------------------------------*/
     //Liste aléatoire des plaques murales pour affichage dans le deuxième carousel.
     public function liste6()
     {
         $results = $this->db->query('SELECT * FROM produits WHERE pro_cat_id = 57 ORDER BY RAND()');
         $aListe6 = $results->result();
         return $aListe6;
     }
     /*-----------------------------------------------------------------------*/
     //Liste les résultats du search.
     public function liste7($word)
     {
         $results = $this->db->query("SELECT *, MATCH (pro_description) AGAINST ('%$word%') AS pertinence FROM produits WHERE MATCH (pro_description) AGAINST ('%$word%') > 0 ORDER BY pertinence DESC");   //on prépare la requête SQL.
             
         $aListe7 = $results->result();
         return $aListe7;
     }
     /*-----------------------------------------------------------------------*/
     //Alimentation des pages paginées du search.
     public function liste8($tab)
     {
         $limit = 5;
         $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
         $word=$tab[0];
         $nb=count($tab);
         for($i=1 ; $i<$nb; $i++)
         {
             $word =$word.','.$tab[$i];
         }

             $view=$this->db->query("SELECT *, MATCH (pro_description) AGAINST ('%$word%') AS pertinence FROM produits WHERE MATCH (pro_description) AGAINST ('%$word%') > 0 ORDER BY pertinence DESC LIMIT $page, $limit");   //on prépare la requête SQL.
             $aListe8 = $view->result();
             return $aListe8;
      }
     /*-----------------------------------------------------------------------*/
     public function count_liste8($tab)
     {
         $word=$tab[0];
         $nb=count($tab);
         for($i=1 ; $i<$nb; $i++)
         {
             $word =$word.','.$tab[$i];
         }
         $view=$this->db->query("SELECT *, MATCH (pro_description) AGAINST ('%$word%') AS pertinence FROM produits WHERE MATCH (pro_description) AGAINST ('%$word%') > 0 ORDER BY pertinence DESC");   //on prépare la requête SQL.
         $aListe8 = count($view->result());
         return $aListe8;
     }
     /*-----------------------------------------------------------------------*/
     public function liste9()
     {
         $results = $this->db->query('SELECT * FROM produits where pro_rank IS NULL');
         $aListe9 = $results->result();
         return $aListe9;
     }
    /*------------------------------------------------------------------------*/
     public function modif_forbidden($pro_id)
     {
         $results = $this->db->query("SELECT * FROM produits WHERE pro_id= ?", array($pro_id));
         $aListe = $results->row();
         return $aListe;
     }
    /*------------------------------------------------------------------------*/
     public function modif_allowed($pro_id,$data)
     {
         $this->db->where('pro_id', $pro_id);
         $this->db->update('produits', $data);
     }
    /*------------------------------------------------------------------------*/
     public function suppr($pro_id,$data)
     {
         $this->db->where('pro_id', $pro_id);
         $this->db->delete('produits', $data);
     }
    /*------------------------------------------------------------------------*/
     public function ajout($data)
     {
         $this->db->insert("produits", $data);
     }
    /*------------------------------------------------------------------------*/
     
     public function pic($cat_id)
     {
         $query = 'SELECT * FROM produits WHERE `pro_cat_id` = ?';
         $results = $this->db->query($query, array($cat_id));
         
         return $results;
     }
    /*------------------------------------------------------------------------*/

     public function pick($pro_id)
     {
         $query = 'SELECT * FROM produits WHERE `pro_id` = ?';
         $results = $this->db->query($query, array($pro_id));
         
         return $results;
     }
}
?>
