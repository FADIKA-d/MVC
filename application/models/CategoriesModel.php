<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class CategoriesModel extends CI_Model
{
    // constructeur
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    // model de fonction d'affichage d'une table de la BDD
    public function liste()
    {
        //query builder pattern      
        $aCategories = $this->db->get('jarditou_categories')->result();
        return $aCategories; 
    }
    // model de fonction d'affichage d'un produit de la BDD
    public function categorie($id)
    {        
        //query builder pattern
        $aCategories = $this->db->get_where('jarditou_categories', array ('cat_id'=> $id))->row();
        return $aCategories;
    }
    // model de fonction d'ajout d'une catégorie dans la BDD
    public function ajouter($data) 
    {
        //query builder pattern
        $this->db->insert('jarditou_categories', $data);
    }
    // model de fonction d'affichage d'une catégorie de la BDD
    public function modifier($data, $id) 
    {
        //query builder pattern
        $this->db->update('jarditou_categories', $data, array('cat_id' => $id));

    }
    public function supprimer() 
    {
        //query builder pattern
        $this->db->delete('jarditou_categories', array('cat_id'=>$id));
        
    }
}