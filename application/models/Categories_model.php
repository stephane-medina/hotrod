<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categories_model extends CI_Model
{
///-----------------------------------------------------------------------------
/// \brief                  Fonction d'affichage de la liste complète des catégories de la BDD hotrod
/// \details                Affiché sous forme d'un select dans les formulaires d'ajout et de modif de la partie admin du site Jarditou 
/// \param                  $aListe_cat     Contient le SELECT * de la table des catégories
/// \return                 $aView          Le résultat du SELECT * de la table des catégories
/// \author                 Madsteph
/// \date                   02/05/2019
    /*------------------------------------------------------------------------*/
    public function select_cat()
    {
        $results = $this->db->query('SELECT * FROM categories WHERE cat_parent IS NULL ORDER BY cat_nom ASC');
        $aListe_cat = $results->result();
        return $aListe_cat;
    }
    /*------------------------------------------------------------------------*/    
    public function select_cat_menu()
    {
        $results = $this->db->query('SELECT * FROM categories WHERE cat_parent IS NOT NULL ORDER BY cat_nom ASC');
        $aListe_cat_menu = $results->result();
        return $aListe_cat_menu;
    }
    /*------------------------------------------------------------------------*/    
    public function select_sous_cat($cat_id)
    {
        $results = $this->db->query('SELECT * FROM categories WHERE cat_parent= ?', array($cat_id),'ORDER BY cat_nom ASC');
        $Liste_sous_cat = $results->result();
        return $Liste_sous_cat;
    }
}
?>