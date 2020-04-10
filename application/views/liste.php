<!-- application/views/liste.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Liste des produits</title>
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css"); ?>"> 
    <link rel="stylesheet" href="<?= base_url("assets/css/style.img"); ?>"> 
    <link rel="stylesheet" href="<?= base_url("assets/css/style.js"); ?>"> 
</head>
<body>
    <h1>Liste des produits</h1>
    <div> Liste : </div>
    <table>
    <th></th>
    
    <?php foreach($liste as $value) 
    { 
    ?> 
    <tr>
        <td> <?php echo $value->pro_id; ?> </td>  
        <td> <?php echo $value->pro_ref; ?> </td>  
        <td> <?php echo $value->pro_libelle; ?> </td>  
        <td> <?php echo $value->pro_description; ?> </td>  
        <td> <?php echo $value->pro_prix; ?> </td>  
        <td> <?php echo $value->pro_stock; ?> </td>  
        <td> <?php echo $value->pro_couleur; ?> </td>  
        <td> <?php echo $value->pro_photo; ?> </td>  
        <td> <?php echo $value->pro_d_ajout; ?> </td>  
        <td> <?php echo $value->pro_d_modif; ?> </td>  
        <td> <?php echo $value->pro_bloque; ?> </td>  
    </tr>
    <?php
    }   
    ?>   
    </table> 
    <a href="<?= site_url("produits/modifier/7");?> ">Modifier</a>
    <a href="<?= site_url("produits/ajouter");?> ">Ajouter</a>
</body>
</html>