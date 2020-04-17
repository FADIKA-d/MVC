<?php
// application/controllers/Produits.php
 
defined('BASEPATH') OR exit('No direct script access allowed');

//début de la classe Controleur Porduit
class Produits extends CI_Controller 
{
    // fonction d'affichage de la table produit de la BDD
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

        // Chargement de la librairie 'upload'
        $this->load->library('upload');

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
                // réaffichage de la vue du formulaire ajoouter
                $this->load->view('ajouter', $aView);
                }
            else // sinon (réussite de la validation des filtres : insertion des valeurs en BDD)
                {
                    // condition si :il existe un post files
                    if($_FILES)
                    {
                        //extraction de l'extension du fichier dans la variable extension
                        $extension = substr(strrchr($_FILES["pro_photo"]["name"], "."), 1);
                    }
                    // chargement du modèle 'produitsModel' 
                    $this->load->model('ProduitsModel');
                    // appel de la méthode ajouter du modèle ProduitsModel
                    $aId = $this->ProduitsModel->ajouter($data); 
        
                    //recupération de l'id : id retourné de la méthode du modèle ajouter dans le tableau aView
                    $aView["id"] = $aId;

                    // chemin du fichier stocké
                    $config['upload_path'] = './assets/img/';
                    // nom du fichier
                    $config['file_name'] = $aId . '.' . $extension;
                    //fichiers autorisés
                    $config['allowed_types'] = 'gif|jpg|png';
                    //taille maximum  autorisée
                    $config['max_size'] = 300;
                    //largeur maximum  autorisée
                    $config['max_width'] = 1024;
                    //hauteur maximum  autorisée
                    $config['max_height'] = 768;
                    //chargement de la librairie 'upload' avec le tableau config
                    $this->load->library('upload');

                    // initialisation de config 
                    $this->upload->initialize($config);

                    // condition si : echec de l'upload
                    if(! $this->upload->do_upload('pro_photo'))
                    {
                        // récupération des erreurs dans une variable errors
                        $errors =  $this->upload->display_errors("<div class='alert alert-danger'>", "</div>");
                        $aView["errors"]= $errors;
                        // réaffichage de la vue du formulaire ajouter avec les donnés saisies et errors
                        $this->load->view('ajouter', $aView);
                    }
                    else
                    {
                        // fonction de redirection vers la page liste pour afficher le nouvel ajout
                        redirect('produits/liste');
                    }
                }
        }
        else
        {     
            // 1er appel de la vue : affichage du formulaire
            $this->load->view('ajouter', $aView);
        }
    }
    // fonction de modification d'un produit de la BDD
    public function modifier($id)
    {
        // chargement du modèle 'CategoriesModel' avec la requete ("SELECT * FROM jarditou_categories") ==> pour avoir la listes des catégories dans le formulaire
        $this->load->model('CategoriesModel');
        // appel de la méthode liste du modèle categoriesModel d'affichage d'une table de la BDD dans une variable
        $aCategories = $this->CategoriesModel->liste();
        //tableau retourné de la méthode du modèle dans le tableau aView
        $aView["categories"]= $aCategories;

        // chargement du modèle 'produitsModel' 
        $this->load->model('ProduitsModel');
        // appel de la méthode produit du modèle ProduitsModel d'affichage d'un produit de la BDD dans une variable
        $aProduit = $this->ProduitsModel->produit($id);
        //tableau retourné de la méthode du modèle dans le tableau aView
        $aView["produit"] = $aProduit;

        // Chargement de la librairie 'upload'
        $this->load->library('upload');
             
        // condition si : il existe des valeurs dans le tableau post
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
        
            // condition si : echec de la validation des filtres
            if ($this->form_validation->run() == FALSE)
                { 
                    // réaffichage de la vue formulaire 
                    $this->load->view('modifier', $aView);
                }
                else // sinon (réussite de la validation des filtres : insertion des valeurs en BDD)
                {
                    // condition si :il existe un post files
                    if($_FILES)
                    {
                        //extraction de l'extension du fichier dans la variable extension
                        $extension = substr(strrchr($_FILES["pro_photo"]["name"], "."), 1);
                    }
                    // chargement du moddèle 'produitsModel' 
                    $this->load->model('ProduitsModel');
                    // appel de la méthode modifier du modèle ProduitsModel
                    $this->ProduitsModel->modifier($data, $id);

                    // chemin du fichier stocké
                    $config['upload_path'] = './assets/img/';
                    // nom du fichier
                    $config['file_name'] = $id . '.' . $extension;
                    //fichiers autorisés
                    $config['allowed_types'] = 'gif|jpg|png';
                    //taille maximum  autorisée
                    $config['max_size'] = 400;
                    //largeur maximum  autorisée
                    $config['max_width'] = 1024;
                    //hauteur maximum  autorisée
                    $config['max_height'] = 768;
                    
                    //chargement de la librairie 'upload' avec le tableau config
                    $this->load->library('upload');

                    // initialisation de config 
                    $this->upload->initialize($config);

                    // condition si : echec de l'upload
                    if(!$this->upload->do_upload('pro_photo'))
                    {
                        // récupération des erreurs dans une variable errors
                        $errors =  $this->upload->display_errors("<div class='alert alert-danger'>", "</div>");
                        $aView["errors"]= $errors;
                        // réaffichage de la vue du formulaire modifier avec les donnés saisies et errors
                        $this->load->view('modifier', $aView);
                    }
                    else
                    {
                        // fonction de redirection vers la page liste pour afficher la modification                 
                        redirect("produits/liste");
                    }
                }
        }
        else
        {     
            // 1er appel de la vue : affichage du formulaire
            $this->load->view('modifier', $aView);
        }
    }
    // fonction de suppression d'un produit de la BDD
    public function supprimer($id)
    {
        // chargement du modèle 'produitsModel' 
        $this->load->model('ProduitsModel');
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
                // appel de la méthode supprimer du modèle ProduitsModel 
                $aSupp = $this->ProduitsModel->supprimer($id);
                // fonction de redirection vers la page liste                 
                redirect("produits/liste"); 
        }
        else
        {     
            // 1er appel de la vue : affichage du formulaire
            $this->load->view('supprimer', $aView);
        }
    }
    public function connexion()
    {
        // chargement du modèle 'UtilisateursModel' 
        $this->load->model('UtilisateursModel');

        if($this->input->post())
        {
            $data = $this->input->post();
           
            // appel de la méthode utilisateur du modèle UtilisateursModel
            $aUtilisateur = $this->UtilisateursModel->utilisateur($data['login_membre']); 
            //tableau retourné de la méthode du modèle dans le tableau aView

            if($aUtilisateur)
                {
                    if(!password_verify($this->input->post('password_membre'),$aUtilisateur->user_mdp)) 
                    {
                        
                        $errors = $this->form_validation->set_message('password_membre', 'le mot de passe est invalide');
                        // récupération des erreurs dans une variable errors
                        $aView["errors"]= $errors;
                        // réaffichage de la vue du formulaire modifier avec les donnés saisies et errors
                        $this->load->view('connexion', $aView);
                    }
                    else
                    {
                      if($this->session->has_userdata('login'))
                      {
                        $this->session->unset_userdata('login');
                      }
                      else
                      {
                        $this->session->set_userdata('login', $aUtilisateur);
                        // ajout de la date de connexion dans le formulaire post
                        $data["user_dd_connexion"] = date("Y-m-d");
                        // appel de la méthode ddConnexion du modèle UtilisateursModel
                        $aUtilisateur = $this->UtilisateursModel->ddConnexion($data["login_membre"], $data["user_dd_connexion"]); 

                        if($this->session->user_role == "administrateur")
                        {
                            $aView['role']= 'administrateur';
                        }
                        else
                        {
                            $aView['role']= 'visiteur';
                        }
                        // chargement du modèle 'produitsModel' avec la requete ("SELECT * FROM jarditou_produits") 
                        $this->load->model('ProduitsModel');
                        // appel de la méthode liste du modèle ProduitsModel
                        $aListe = $this->ProduitsModel->liste();
                        //tableau retourné de la méthode du modèle dans une variable
                        $aView["liste"]= $aListe;
                        $this->load->view('liste', $aView);
                      }
                    }
                    
                }
                else
                {
                    echo 'l\'identifiant n\'existe pas';
                }            
        }
        else
        {     
            // 1er appel de la vue : affichage du formulaire
            $this->load->view('connexion');
        }  
    }
    public function inscription()
    {
        // chargement du modèle 'UtilisateursModel' 
        $this->load->model('UtilisateursModel');

        // Chargement de la librairie 'upload'
        $this->load->library('upload');
        
        if($this->input->post())
        { //2ème appel de la vue : traitement du formulaire
            
            // valeur du post dans la variable data
            $data = $this->input->post();
            // ajout de la date d'inscription dans le formulaire post
            $data["user_d_inscription"] = date("Y-m-d");
            $password_plaintext = $data['user_mdp'];
            $data['user_mdp'] = password_hash($password_plaintext, PASSWORD_BCRYPT);

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');  
            
            // condition : si echec de la validation des filtres
            if ($this->form_validation->run() == FALSE)
                {
                     // réaffichage de la vue du formulaire d'inscription
                    $this->load->view('inscription');
                } 
            else
            {
                // condition si :il existe un post files
                if($_FILES)
                {
                    //extraction de l'extension du fichier dans la variable extension
                    $extension = substr(strrchr($_FILES["user_photo"]["name"], "."), 1);
                }
                if($this->session->has_userdata('login'))
                    {
                        $this->session->unset_userdata('login');
                    }
                else
                    {
                        // initialisation de la session avec les données 
                        $this->session->set_userdata('login', $data);
                        // chargement du modèle 'UtilisateursModel' 
                        $this->load->model('UtilisateursModel');
                        // appel de la méthode ajouter du modèle UtilisateursModel
                        $aId = $this->UtilisateursModel->ajouter($data); 
                    }

                // chemin du fichier stocké
                $config['upload_path'] = './assets/img/';
                // nom du fichier
                $config['file_name'] = $data["user_login"] . '.' . $extension;
                //fichiers autorisés
                $config['allowed_types'] = 'gif|jpg|png';
                //taille maximum  autorisée
                $config['max_size'] = 400;
                //largeur maximum  autorisée
                $config['max_width'] = 1024;
                //hauteur maximum  autorisée
                $config['max_height'] = 768;
                //chargement de la librairie 'upload' avec le tableau config
                $this->load->library('upload');

                // initialisation de config 
                $this->upload->initialize($config);

                // condition si : echec de l'upload
                if(! $this->upload->do_upload('user_photo'))
                    {
                    // récupération des erreurs dans une variable errors
                    $errors =  $this->upload->display_errors("<div class='alert alert-danger'>", "</div>");
                    $aView["errors"]= $errors;
                    // réaffichage de la vue du formulaire inscription avec les donnés saisies et errors
                    $this->load->view('inscription', $aView);
                                   
                    }
                else
                    {
                        // fonction de redirection vers la page liste pour afficher le nouvel ajout
                        redirect('produits/liste');
                    }
            }    
        }
        else
        {     
            // 1er appel de la vue : affichage du formulaire
            $this->load->view('inscription');
        }  
    }
    public function deconnexion()
    {
        // chargement du modèle 'UtilisateursModel' 
        $this->load->model('UtilisateursModel');
        
        if($this->session->has_userdata('login'))
        {
            $this->session->unset_userdata('login');
            // fonction de redirection vers la page liste pour afficher le nouvel ajout
            redirect('produits/liste');
        }
        else
        { 
            
        // fonction de redirection vers la page liste pour afficher le nouvel ajout
        redirect('produits/liste');
        }

    }
    public function profil()
    {
        if($this->session->has_userdata('login'))
            {
            // chargement du modèle 'UtilisateursModel' 
            $this->load->model('UtilisateursModel');
            // appel de la méthode produit du modèle ProduitsModel d'affichage d'un produit de la BDD dans une variable
            $aUtilisateur = $this->UtilisateursModel->utilisateur($login);
            //tableau retourné de la méthode du modèle dans le tableau aView
            $aView["utilisateur"] = $aUtilisateur;
            
            // Chargement de la librairie 'upload'
            $this->load->library('upload');
            
            if($this->input->post())
                { //2ème appel de la vue : traitement du formulaire

                // valeur du post dans la variable data
                $data = $this->input->post();
                // ajout de la date de connexion dans le formulaire post
                $data[""] = date("Y-m-d");
                // ne pas incluer le post id dans le tableau post
                unset($data["id"]);
                // designation de l'id du post dans une variable
                $id = $this->input->post('id');
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');  
                
                // $this->session->set_userdata($data);
                // condition : si echec de la validation des filtres
                if ($this->form_validation->run() == FALSE)
                    {
                        // réaffichage de la vue du formulaire d'inscription
                        $this->load->view('profil');
                    } 
                else
                    {
                    // condition si :il existe un post files
                    if($_FILES)
                        {
                            //extraction de l'extension du fichier dans la variable extension
                            $extension = substr(strrchr($_FILES["user_photo"]["name"], "."), 1);
                        }
                    // chargement du modèle 'UtilisateursModel' 
                    $this->load->model('UtilisateursModel');
                    // appel de la méthode ajouter du modèle UtilisateursModel
                    $this->UtilisateursModel->modifier($data, $login); 

                    // chemin du fichier stocké
                    $config['upload_path'] = './assets/img/';
                    // nom du fichier
                    $config['file_name'] = $data["user_login"] . '.' . $extension;
                    //fichiers autorisés
                    $config['allowed_types'] = 'gif|jpg|png';
                    //taille maximum  autorisée
                    $config['max_size'] = 300;
                    //largeur maximum  autorisée
                    $config['max_width'] = 1024;
                    //hauteur maximum  autorisée
                    $config['max_height'] = 768;
                    //chargement de la librairie 'upload' avec le tableau config
                    $this->load->library('upload');

                    // initialisation de config 
                    $this->upload->initialize($config);

                    // condition si : echec de l'upload
                    if(! $this->upload->do_upload('user_photo'))
                        {
                        // récupération des erreurs dans une variable errors
                        $errors =  $this->upload->display_errors("<div class='alert alert-danger'>", "</div>");
                        $aView["errors"]= $errors;
                        // réaffichage de la vue du formulaire inscription avec les donnés saisies et errors
                        $this->load->view('profil', $aView);
                                    
                        }
                    else
                        {
                            // fonction de redirection vers la page liste pour afficher le nouvel ajout
                            redirect('produits/liste');
                        }
                    }    
                }
            else
                {     
                    // 1er appel de la vue : affichage du formulaire
                    $this->load->view('profil');
                } 
            } 
        else 
        {
            echo 'Vous n\'êtes pas connecté';
        }
    }
    
}