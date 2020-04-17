<!-- application/views/liste.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Liste des produits</title>
    <?php include "header_link.php" ?> 
    <?php include "nav.php" ?>    
</head>
<body>
<div class="container-fluid">
<?php 

if($this->session->has_userdata('login'))
{
    ?>
    <p>Bonjour <?= $role. ' '.$login ?> </p>
    <i class="fas fa-user-cog"></i>
    <?php
    if($role=="administrateur")
    {
        ?>
        <a href="<?= site_url("produits/ajouter");?> ">Ajouter</a>
        <?php
    }
}

?>

    <h1 class="col-12">Nos produits de jardinage</h1>
    <div class="d-flex justify-content-end col-10 "><a href="<?= site_url("panier/afficherPanier");?> "><i class="fas fa-3x fa-shopping-basket "></i></a></div>
    
    <?php 
    $nombreProduit =0;
    foreach($liste as $value) 
    { 
    ?> 
    <div class="d-flex justify-content-center col-10">
        <!-- div photo -->
        <div class="d-flex col-2"> 
            <div class=""> <img src="<?php echo base_url('assets/img/') .$value->pro_id.'.'.$value->pro_photo; ?>" alt="photo" title="photo" class="img-fluid"> </div> 
        </div>  
        <!-- div caractéristiques produits pour client -->
        <div class="d-block col-4"> 
            <div> <?php echo $value->pro_libelle; ?></div>  
            <div> <?php echo $value->pro_ref; ?> </div> 
            <div> <?php echo 'Couleur : '.$value->pro_couleur; ?> </div> 
            <div> <?php echo $value->pro_description; ?> </div> 
        </div> 

        <!-- div appel à l'action -->
        <div class="d-block col-3">

            <!-- div prix -->
            <div class="text-danger"> <?php echo $value->pro_prix.' €'; ?> </div>

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
                    <div class="text-info">Il ne reste que <?=$value->pro_stock?> articles en stock!</div>
                    <?php
                } 
            }
            else
            {
                ?>
                    <div class="">Il reste <?=$value->pro_stock?> articles en stock.</div>
                    <?php
            }
            ?> 
            </div> 
            
            <!-- div commander -->
            <div class="">
                <?php
                echo form_open("panier/ajouterPanier") ;
                ?>
                
                    <!-- quantité commandé -->
                    <div class="d-inline">
                    <label for="pro_qte">Quantité</label>
                    <input type="number" class="form-control" name="pro_qte" id="pro_qte" value="1"></div>
                        
                        <input type="hidden" name="pro_prix" id="pro_prix" value="<?= $value->pro_prix ?>">
                        <input type="hidden" name="pro_id" id="pro_id" value="<?= $value->pro_id ?>">
                        <input type="hidden" name="pro_libelle" id="pro_libelle" value="<?= $value->pro_libelle ?>">
                        <input type="hidden" name="pro_photo" id="pro_photo" value="<?= $value->pro_photo ?>">
                    

                    <!-- validation ajout commande -->
                    <div class="form-group w-100">
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
            </div>  
            
        </div>
        </div>
        <?php
        if($this->session->has_userdata('login'))
        {
            if($role=="administrateur")
            {
            ?>   
                <div> <?php echo $value->pro_id; ?> </div>  
                <div> <a href="<?= site_url('produits/modifier/') . $value->pro_id ?>"></a> </div>    
                <div> <?php echo $value->pro_d_ajout; ?> </div>  
                <div> <?php echo $value->pro_d_modif; ?> </div>  
                <div> <?php echo $value->pro_bloque; ?> </div>  
                <div> 
            <?php
            }
        }
    
    }   
    ?>   
 
    </div>
</body>
</html>