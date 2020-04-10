<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class ProduitsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    // model de fonction d'affichage d'une table de la BDD
    public function liste()
    {
        //standart insert
        // $aProduits = $this->db->query("SELECT * FROM jarditou_produits")->result();
        
        //query builder pattern      
        $aProduits = $this->db->get('jarditou_produits')->result();

        return $aProduits; 
    }

    // model de fonction d'ajout d'un produit dans la BDD
    public function ajouter($data) 
    {
        //query builder pattern
        $add = $this->db->insert('jarditou_produits', $data);
        if ($add)
        {
            return 'ajouté' ;
        }
        
    }

    // model de fonction d'affichage d'un produit de la BDD
    public function produit($id)
    {
        $aProduits = $this->db->query("SELECT * FROM jarditou_produits WHERE pro_id= ?", $id)->row();
        return $aProduits; 
        //query builder pattern
        // $query=$this->db->get_where('jarditou_produits', array ('pro_id'=> $id))
    }

    // model de fonction de modification d'un produit de la BDD
    public function modifier($data, $id) 
    {
        //query builder pattern
        // $this->db->where('pro_id', $id);
        // $this->db->update('jarditou_produits', $data);
        //query bulder 2
        $this->db->update('jarditou_produits', $data, array('pro_id' => $id));

    }

    // model de fonction de suppression d'un produit de la BDD
    public function supprimer($id) 
    {
        //query builder pattern
        $this->db->where('pro_id', $id);
        $this->db->delete('jarditou_produits');
        //query bulder 2
        // $this->db->delete('jarditou_produits', array('pro_id'=>$id));
        
    }
}