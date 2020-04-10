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
    //  public function ajouter()
    //  {     
    //      if($this->input->post())
    //      {
    //          //2ème appel de la vue : traitement du formulaire
    //          $data = $this->input->post();
    //          // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
    //          $this->form_validation->set_rules("pro_ref", "Référence", "required");
    //          $this->form_validation->set_rules("pro_cat_id", "Catégorie", "required");
    //          $this->form_validation->set_rules("pro_libelle", "Libellé", "required");
    //          $this->form_validation->set_rules("pro_description", "Description", "required");
    //          $this->form_validation->set_rules("pro_prix", "Prix", "required");
    //          $this->form_validation->set_rules("pro_stock", "Stock", "required");
    //          $this->form_validation->set_rules("pro_couleur", "Couleur", "required");
    //          $this->form_validation->set_rules("pro_photo", "Photo", "required");
    //          $this->form_validation->set_rules("pro_bloque", "Bloqué", "required");
    //          $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');  
    //          // $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');  
                     
         
    //          if ($this->form_validation->run() == FALSE)
    //              { // Echec de la validation, on réaffiche la vue formulaire 
         
                     
    //                  $this->load->view('ajouter');
    //              }
    //              else
    //              { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base
         
    //                  $this->db->insert('jarditou_produits', $data);
                             
    //                  redirect("produits/liste");
    //              }
    //      }
    //      else
    //      {     
    //          // 1er appel de la vue : affichage du formulaire
    //          $this->load->view('ajouter');
    //      }
    //  }
 
    //  public function modifier()
    //  {
    //      $id = $this->uri->segment(3);
         
 
    //      // requete de sélection de l'enregistrement
    //      $produit = $this->db->query("SELECT * FROM jarditou_produits WHERE pro_id=?", $id);
    //      $aView["produit"] = $produit->row(); 
    //      // var_dump($produit->row());
 
 
    //      if($this->input->post())
    //      {
    //          //2ème appel de la vue : traitement du formulaire
    //          $data = $this->input->post();
    //          // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
    //          $this->form_validation->set_rules("pro_ref", "Référence", "required");
         
             
    //          if ($this->form_validation->run() == FALSE)
    //              { // Echec de la validation, on réaffiche la vue formulaire 
         
    //                  // $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');  
    //                  $this->load->view('modifier', $aView);
    //              }
    //              else
    //              { // validation réussi, insertion en base de données
         
    //                  $this->db->update('jarditou_produits', $data);
    //                  $this->db->where('pro_id', $id);
                             
    //                  redirect("produits/liste");
    //              }
    //      }
    //      else
    //      {     
    //          // 1er appel de la vue : affichage du formulaire
    //          $this->load->view('modifier',$aView);
    //      }
    //  }
    //  public function supprimer()
    //  {
    //  }
 
 }