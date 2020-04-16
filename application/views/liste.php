<!-- application/views/liste.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Liste des produits</title>
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css"); ?>"> 
    <script src="<?php echo base_url("assets/js/script.js"); ?>"></script>    
</head>
<body>
<?php 

if(!$this->session->has_userdata('login'))
{
    ?>
    <a href="<?= site_url("produits/connexion");?> ">Connexion</a>
    <a href="<?= site_url("produits/inscription");?> ">Inscription</a>
    
    <?php
}
else
{
    ?>
    <a href="<?= site_url("produits/deconnexion");?> ">Déconnexion</a>
    <p>Bonjour <?= $role ?> </p>
    <?php
}

?>

    <h1>Liste des produits</h1>
    <a href="<?= site_url("panier/afficherPanier");?> ">Panier</a>
    <div> Liste : </div>
    <table>
    <thead> 
        <th> Photo </th>
        <th> ID </th>  
        <th> Référence </th>  
        <th> Libellé </th>  
        <th> Description </th>  
        <th> Prix </th>  
        <th> Stock </th>  
        <th> Couleur </th>  
        <th> Date d'ajout </th>  
        <th> Date de modification </th>  
        <th> Produit Bloqué </th> 
    </thead>
    <?php foreach($liste as $value) 
    { 
    ?> 
    <tbody>
    <tr>
          
        <td> <img src="<?php echo base_url('assets/img/') .$value->pro_id.'.'.$value->pro_photo; ?>" alt="photo" title="photo" class="img-fluid"> </td> 
        <td> <?php echo $value->pro_id; ?> </td>  
        <td> <?php echo $value->pro_ref; ?> </td>  
        <td> <a href="<?= site_url('produits/modifier/') . $value->pro_id ?>"><?php echo $value->pro_libelle; ?></a> </td>  
        <td> <?php echo $value->pro_description; ?> </td>  
        <td> <?php echo $value->pro_prix; ?> </td>  
        <td> <?php echo $value->pro_stock; ?> </td>  
        <td> <?php echo $value->pro_couleur; ?> </td> 
        <td> <?php echo $value->pro_d_ajout; ?> </td>  
        <td> <?php echo $value->pro_d_modif; ?> </td>  
        <td> <?php echo $value->pro_bloque; ?> </td>  
        <td> 
        <?php
       echo form_open("panier/ajouterPanier") ;
       ?>
        <!-- quantité commandé -->
            <input type="number" class="form-control" name="pro_qte" id="pro_qte" value="1">
            <input type="hidden" name="pro_prix" id="pro_prix" value="<?= $value->pro_prix ?>">
            <input type="hidden" name="pro_id" id="pro_id" value="<?= $value->pro_id ?>">
            <input type="hidden" name="pro_libelle" id="pro_libelle" value="<?= $value->pro_libelle ?>">
    
            <!-- bouton d'ajout au panier -->
            <div class="form-group">
                <input type="submit" value="Ajouter au panier" class="btn btn-default btn-sm">            
            </div>
        </form>
        </td>
    </tr>
    </tbody>
    <?php
    }   
    ?>   
    </table>
    <a href="<?= site_url("produits/ajouter");?> ">Ajouter</a>
</body>
</html>