<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class CategoriesModel extends CI_Model
{
    public function liste()
    {
        $this->load->database();
        $aCategories = $this->db->query("SELECT * FROM `jarditou_categories`")->result();
    
    return $aCategories; 
    }
    public function ajouter() 
    {
        $this->load->database();
    }
    public function modifier() 
    {
        $this->load->database();
    }
    public function supprimer() 
    {
        $this->load->database();
    }
}