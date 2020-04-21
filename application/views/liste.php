<!-- application/views/liste.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Liste des produits</title>
    <?php include "header_link.php" ?> 
      
</head>
<body>

<div class="container-fluid">
<?php 
include "nav.php";

if($this->session->login != null)
{
    ?>
    <p>Bonjour <?= $this->session->login->user_role. ' '.$this->session->login->user_login ?> </p>
    <?php
    if($this->session->login->user_role=="administrateur")
    {
        ?>
        <button class="btn btn-outline-secondary"><i class="fas fa-plus"></i><a href="<?= site_url("produits/ajouter"); ?>"> Ajouter un produit</a></button>
        <?php
    }
}

?>

    <h1 class="col-12">Nos produits de jardinage</h1>
    <div class="d-flex justify-content-end col-10 "><a href="<?= site_url("panier/afficherPanier");?> "><i class="fas fa-3x fa-shopping-cart"></i></a></div>
    
    <?php 
    $nombreProduit =0;
    foreach($liste as $value) 
    { 
    ?> 
    <div class="d-flex justify-content-center col-10">
    <?php
        if($this->session->has_userdata('login'))
        {
            if($this->session->login->user_role=="administrateur")
            {
            ?>   
            <div class="d-flex-bloque col-3">
                <div> <?php echo 'ID produit : '.$value->pro_id; ?> </div>      
                <div> <?php echo 'Date d\'ajout : '.$value->pro_d_ajout; ?> </div>  
                <div> <?php echo 'Date de modification :  '.$value->pro_d_modif; ?> </div>  
                <div> <?php echo 'Produit bloqué : '.$value->pro_bloque; ?> </div> 
                <button type="button" class="btn "> <a href="<?= site_url('produits/modifier/') . $value->pro_id ?>">Modifier le produit </button> 
                <button type="button" class="btn " data-toggle="modal" data-target="#suppProduit"> Supprimer le produit </button>
                    <!-- modal  -->
                    <div class="modal fade" id="suppProduit" tabindex="-1" role="dialog" aria-labelledby="suppProduitLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="form-group">Voulez-vous supprimer le produit ? </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn " data-dismiss="modal">Non</button>
                            <button type="button" class="btn ">Oui</button>
                            
                        </div>
                    </div>
                    </div>
            </div>  
            <?php
            }
        }
    ?>
        <!-- div photo -->
        <div class="d-flex col-2"> 
            <div class=""> <img src="<?php echo base_url('assets/img/') .$value->pro_id.'.'.$value->pro_photo; ?>" alt="photo" title="photo" class="img-fluid"> </div> 
        </div>  
        <!-- div caractéristiques produits pour client -->
        <div class="d-block col-4"> 
            <div class="font-weight-bold"><a href="<?= site_url('produits/produit/') . $value->pro_id ?>"> <?php echo $value->pro_libelle; ?> </a></div>  
            <div> <?php echo $value->pro_ref; ?> </div> 
            <div> <?php echo 'Couleur : '.$value->pro_couleur; ?> </div> 
            <div> <?php echo $value->pro_description; ?> </div> 
        </div> 

        <!-- div appel à l'action -->
        <div class="d-block col-3">

            <!-- div prix -->
            <div class="text-danger font-weight-bold"> <?php echo $value->pro_prix.' €'; ?> </div>

            <!-- div stock -->
            <div> 
            <?php 
            
            if ($value->pro_stock<=5)
            {
                if($value->pro_stock==0)
                {
                    ?>
                    <div class="text-danger"> Produit en rupture de en stock ! </div>
                    <?php
                }
                else if($value->pro_stock==1)
                {
                    ?>
                    <div class="text-danger">Dernier article en stock!</div>
                    <?php
                }
                else
                {
                    ?>
                    <div class="font-weight-bold">Il ne reste que <?=$value->pro_stock?> articles en stock!</div>
                    <?php
                } 
            }
            else
            {
                ?>
                    <div class=""><?=$value->pro_stock?> articles en stock.</div>
                    <?php
            }
            ?> 
            </div> 
            
            <!-- div commander -->
            <div class="">
                <?php
                if($value->pro_stock>0)
                {
                    echo form_open("panier/ajouterPanier") ;
                    ?>
                    
                        <!-- quantité commandé -->
                        <div>
                            <div class="input-group w-75">
                            <!-- <label for="pro_qte">Quantité </label> -->
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantité</span>
                                </div>
                                <input type="number" class="form-control w-25" name="pro_qte" id="pro_qte" value="1">
                            </div>
                            
                            <input type="hidden" name="pro_prix" id="pro_prix" value="<?= $value->pro_prix ?>">
                            <input type="hidden" name="pro_id" id="pro_id" value="<?= $value->pro_id ?>">
                            <input type="hidden" name="pro_libelle" id="pro_libelle" value="<?= $value->pro_libelle ?>">
                            <input type="hidden" name="pro_photo" id="pro_photo" value="<?= $value->pro_photo ?>">
                        </div>

                        <!-- validation ajout commande -->
                        <div class="form-group">
                            <!-- <input type="submit" value="Ajouter au panier" class="btn btn-success"> -->
                            <button type="submit" value="Ajouter au panier" class="btn btn-success">Ajouter au panier         
        
                            <!-- info panier -->
                            <div class="d-inline">
                                <?php
                                if(isset($this->session->panier))
                                {
                                    // var_dump($this->session->panier);
                                    foreach($this->session->panier as $produit)
                                    {
                                        if($produit['pro_id']==$value->pro_id)
                                        {
                                            $nombreProduit +=1;
                                            if($produit['pro_qte']==1)
                                            {
                                                ?>
                                                <span class="badge badge-light"><?= $produit['pro_qte'].' article'?></span>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <span class="badge badge-light"><?= $produit['pro_qte'].' articles'?></span>
                                                <?php
                                            }
                                        }
                                    }
                                }
                                ?>
                            </div>
                            </button>
                        </div>
                    </form>
                <?php    
                }
                ?>
            </div>  
            
        </div>
        </div>
    <?php    
    }   
    ?>   
 
    </div>
    <?php include "footer_link.php" ?>
</body>
</html>