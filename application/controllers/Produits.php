<?php
// application/controllers/Produits.php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Produits extends CI_Controller 
{
    public function liste()
    {
        // chargement du modèle 'produitsModel' 
        $this->load->model('ProduitsModel');
        // appel de la méthode liste du modèle
        $aListe = $this->ProduitsModel->liste();
        //tableau retourné de la méthode du modèle dans une variable
        $aView["liste"]= $aListe;
        // appel de la vue avec transmission du tableau tableau en second argument de la méthode 
        // $this->load->view('liste', $aView);
        $this->load->view('liste', $aView);
    
    }
    public function ajouter()
    {     
        // chargement du moddèle 'CategoriesModel' 
        $this->load->model('CategoriesModel');
        // appel de la méthode liste du modèle
        $aCategories = $this->CategoriesModel->liste();
        //tableau retourné de la méthode du modèle dans une variable
        $aView["categories"]= $aCategories;
      
        

        if($this->input->post())
        {
            //2ème appel de la vue : traitement du formulaire
            $data = $this->input->post();
            // ajout d'une date d'ajout dans le formulaire
            $data ["pro_d_ajout"] = date("Y-m-d");
            // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
            $this->form_validation->set_rules("pro_ref", "Référence", "required");
            $this->form_validation->set_rules("pro_cat_id", "Catégorie", "required");
            $this->form_validation->set_rules("pro_libelle", "Libellé", "required");
            $this->form_validation->set_rules("pro_description", "Description", "required");
            $this->form_validation->set_rules("pro_prix", "Prix", "required");
            $this->form_validation->set_rules("pro_stock", "Stock", "required");
            $this->form_validation->set_rules("pro_couleur", "Couleur", "required");
            $this->form_validation->set_rules("pro_photo", "Photo", "required");
            $this->form_validation->set_rules("pro_bloque", "Bloqué", "required");
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');  
            // $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');  
                    
        
            if ($this->form_validation->run() == FALSE)
                { // Echec de la validation, on réaffiche la vue formulaire 
        
                    $this->load->view('ajouter', $aView);
                }
                else
                { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base
        
                   // chargement du moddèle 'produitsModel' 
                $this->load->model('ProduitsModel');
                $aListe = $this->ProduitsModel->ajouter($data);                   
                redirect("produits/liste");

                }
        }
        else
        {     
            // 1er appel de la vue : affichage du formulaire
            $this->load->view('ajouter', $aView);
            
        }
    }

    public function modifier()
    {
        // chargement du moddèle 'CategoriesModel' 
        $this->load->model('CategoriesModel');
        // appel de la méthode liste du modèle
        $aCategories = $this->CategoriesModel->liste();
        //tableau retourné de la méthode du modèle dans une variable
        $aView["categories"]= $aCategories;

        // chargement du moddèle 'produitsModel' 
        $this->load->model('ProduitsModel');
        $id = $this->uri->segment(3);
        // appel de la méthode liste du modèle
        $aProduit = $this->ProduitsModel->produit($id);
        
        $aView["produit"] = $aProduit;
             

        if($this->input->post())
        {
            //2ème appel de la vue : traitement du formulaire
            $data = $this->input->post();
            // ajout d'une date d'ajout dans le formulaire
            $data ["pro_d_modif"] = date("Y-m-d");
            // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
            $this->form_validation->set_rules("pro_ref", "Référence", "required");
            $this->form_validation->set_rules("pro_cat_id", "Catégorie", "required");
            $this->form_validation->set_rules("pro_libelle", "Libellé", "required");
            $this->form_validation->set_rules("pro_description", "Description", "required");
            $this->form_validation->set_rules("pro_prix", "Prix", "required");
            $this->form_validation->set_rules("pro_stock", "Stock", "required");
            $this->form_validation->set_rules("pro_couleur", "Couleur", "required");
            $this->form_validation->set_rules("pro_photo", "Photo", "required");
            $this->form_validation->set_rules("pro_d_ajout", "Date d'ajout", "required");
            $this->form_validation->set_rules("pro_bloque", "Bloqué", "required");
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 
        
            
            if ($this->form_validation->run() == FALSE)
                { // Echec de la validation, on réaffiche la vue formulaire 
        
                    // $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');  
                    $this->load->view('modifier', $aView);
                }
                else
                { // validation réussi, insertion en base de données

                    // chargement du moddèle 'produitsModel' 
                    $this->load->model('ProduitsModel');
                    $aListe = $this->ProduitsModel->modifier($data, $id);
                            
                    redirect("produits/liste");
                }
        }
        else
        {     
            // 1er appel de la vue : affichage du formulaire
            $this->load->view('modifier', $aView);
        }
    }
    public function supprimer()
    {
        if($this->input->post())
        {
        }
        else
        {     
            // 1er appel de la vue : affichage du formulaire
            $this->load->view('supprimer', $aView);
        }
    }

}