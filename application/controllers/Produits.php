<?php
// application/controllers/Produits.php
 
defined('BASEPATH') OR exit('No direct script access allowed');

//début de la classe Controleur Porduit
class Produits extends CI_Controller 
{
    // fonction d'affichage d'une table de la BDD
    public function liste()
    {
        // chargement du modèle 'produitsModel' avec la requete ("SELECT * FROM jarditou_produits") 
        $this->load->model('ProduitsModel');
        // appel de la méthode liste du modèle ProduitsModel
        $aListe = $this->ProduitsModel->liste();
        //tableau retourné de la méthode du modèle dans une variable
        $aView["liste"]= $aListe;
        // appel de la vue avec transmission du tableau en second argument de la méthode 
        $this->load->view('liste', $aView);
    
    }
    // fonction d'ajout d'un produit dans la BDD
    public function ajouter()
    {     
        // chargement du modèle 'CategoriesModel' avec la requete ("SELECT * FROM jarditou_categories") ==> pour avoir la listes des catégories dans le formulaire
        $this->load->model('CategoriesModel');
        // appel de la méthode liste du modèle categoriesModel
        $aCategories = $this->CategoriesModel->liste();
        //tableau retourné de la méthode du modèle dans une variable
        $aView["categories"]= $aCategories;

        // condition : si il existe des valeurs dans le tableau post
        if($this->input->post())
        { //2ème appel de la vue : traitement du formulaire

            // valeur du post dans la variable data
            $data = $this->input->post();
            // ajout d'une date d'ajout dans le formulaire post
            $data ["pro_d_ajout"] = date("Y-m-d");
          
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');  
            // $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');  
                    
            // condition : si echec de la validation des filtres
            if ($this->form_validation->run() == FALSE)
                { 
                // réaffichage de la vue formulaire 
                $this->load->view('ajouter', $aView);
                }
            else // sinon (réussite de la validation des filtres : insertion des valeurs en BDD)
                {
                // chargement du modèle 'produitsModel' 
                $this->load->model('ProduitsModel');
                // appel de la méthode ajouter du modèle ProduitsModel
                $aListe = $this->ProduitsModel->ajouter($data); 
                // fonction de redirection vers la page liste pour afficher le nouvel ajout                  
                redirect("produits/liste");

                }
        }
        else
        {     
            // 1er appel de la vue : affichage du formulaire
            $this->load->view('ajouter', $aView);
        }
    }
    // fonction de modification d'un produit de la BDD
    public function modifier()
    {
        // chargement du modèle 'CategoriesModel' avec la requete ("SELECT * FROM jarditou_categories") ==> pour avoir la listes des catégories dans le formulaire
        $this->load->model('CategoriesModel');
        // appel de la méthode liste du modèle categoriesModel d'affichage d'une table de la BDD dans une variable
        $aCategories = $this->CategoriesModel->liste();
        //tableau retourné de la méthode du modèle dans le tableau aView
        $aView["categories"]= $aCategories;

        // chargement du modèle 'produitsModel' 
        $this->load->model('ProduitsModel');
        //
        $id = $this->uri->segment(3);
        // appel de la méthode produit du modèle ProduitsModel d'affichage d'un produit de la BDD dans une variable
        $aProduit = $this->ProduitsModel->produit($id);
        //tableau retourné de la méthode du modèle dans le tableau aView
        $aView["produit"] = $aProduit;
             
        // condition : si il existe des valeurs dans le tableau post
        if($this->input->post())
        { //2ème appel de la vue : traitement du formulaire
            
            // valeurs du post dans data
            $data = $this->input->post();
            // ne pas incluer le post id dans le tableau post
            unset($data["id"]);
            // designation de l'id du post dans une variable
            $id = $this->input->post('id');
            // ajout d'une date d'ajout dans le formulaire post
            $data["pro_d_modif"] = date("Y-m-d");
            
            // $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 
        
            // condition : si echec de la validation des filtres
            if ($this->form_validation->run() == FALSE)
                { 
                    // réaffichage de la vue formulaire 
                    $this->load->view('modifier', $aView);
                }
                else // sinon (réussite de la validation des filtres : insertion des valeurs en BDD)
                {
                    // chargement du moddèle 'produitsModel' 
                    $this->load->model('ProduitsModel');
                    // appel de la méthode modifier du modèle ProduitsModel
                    $this->ProduitsModel->modifier($data, $id);
                    // fonction de redirection vers la page liste pour afficher la modification                 
                    redirect("produits/liste");
                }
        }
        else
        {     
            // 1er appel de la vue : affichage du formulaire
            $this->load->view('modifier', $aView);
        }
    }
    // fonction de suppression d'un produit de la BDD
    public function supprimer()
    {
        // chargement du modèle 'produitsModel' 
        $this->load->model('ProduitsModel');
        //
        $id = $this->uri->segment(3);
        // appel de la méthode produit du modèle ProduitsModel d'affichage d'un produit de la BDD dans une variable
        $aProduit = $this->ProduitsModel->produit($id);
        //tableau retourné de la méthode du modèle dans le tableau aView
        $aView["produit"] = $aProduit;

        // condition : si il existe des valeurs dans le tableau post
        if($this->input->post())
        {
            $data = $this->input->post();
               // chargement du modèle 'produitsModel' 
                $this->load->model('ProduitsModel');
                
                // appel de la méthode supprimer du modèle ProduitsModel d'affichage d'un produit de la BDD dans une variable
                $aSupp = $this->ProduitsModel->supprimer($id);
                // fonction de redirection vers la page liste pour afficher le nouvel ajout                  
                redirect("produits/liste"); 
        }
        else
        {     
            // 1er appel de la vue : affichage du formulaire
            $this->load->view('supprimer', $aView);
        }
    }

}