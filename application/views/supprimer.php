<!-- application/views/supprimer.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Supprimer</title>
    <?php include "header_link.php" ?> 
</head>
<body>
<?php include "nav.php" ?> 
<button class="btn btn-outline-secondary"><i class="fas fa-reply"></i><a href="<?= site_url("produits/produit"); ?>"> Retour au produit</a></button>
<?php echo form_open(); ?>
<div class="form-group">
    <label for="pro_supp" class="form-check-label">Voulez-vous vraiment supprimer le produit ? </label>
    <input type= 'checkbox' name="pro_supp" id="pro_supp" value = "1" class="form-check-group">
</div>
<button class="btn btn-outline-secondary" type="submit" >Valider</button>
</form>
</form>
</div>
<?php include "footer_link.php" ?>

</body>
</html>