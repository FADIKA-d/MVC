<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class ProduitsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function liste()
    {
        
        $aProduits = $this->db->query("SELECT * FROM jarditou_produits")->result();
    
        return $aProduits; 
    }
    public function ajouter($data) 
    {
        $add = $this->db->insert('jarditou_produits', $data);
        if ($add)
        {
            return 'ajouté' ;
        }
        
    }
    public function produit($id)
    {
        $aProduits = $this->db->query("SELECT * FROM jarditou_produits WHERE pro_id= ?", $id)->result();
    
        return $aProduits; 
    }
    public function modifier($data, $id) 
    {
        // requete de sélection de l'enregistrement
        $aproduits = $this->db->query("SELECT * FROM jarditou_produits WHERE pro_id= ?", $id)->row();
        
        $update = $this->db->update('jarditou_produits', $data);
        $this->db->where('pro_id', $id);

    }
    public function supprimer() 
    {
        $this->db->delete('jarditou_produits');
        $this->db->where('pro_id', $id);
    }
}