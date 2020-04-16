<?php
// application/controllers/Produits.php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Categories extends CI_Controller 
{
    public function liste()
    {
         // chargement du moddèle 'produitsModel' 
         $this->load->model('CategoriesModel');
         // appel de la méthode liste du modèle
         $aCategories = $this->CategoriesModel->liste();
         //tableau retourné de la méthode du modèle dans une variable
         $aView["categories"]= $aCategories;
         // appel de la vue avec transmission du tableau tableau en second argument de la méthode 
         // $this->load->view('liste', $aView);
         $this->load->view('ajouter', $aView);
     
     }
 }