<!-- application/views/ajouter.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Supprimer</title>
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css"); ?>"> 
    <link rel="stylesheet" href="<?= base_url("assets/css/style.img"); ?>"> 
    <link rel="stylesheet" href="<?= base_url("assets/css/style.js"); ?>"> 
</head>
<body>
<?php echo form_open(); ?>
<div class="form-group">
    <label for="pro_supp" class="form-check-label">Voulez-vous vraiment supprimer le produit ? </label>
    <input type= 'checkbox' name="pro_supp" id="pro_supp" value = "1" class="form-check-group">
</div>
<button type="submit" >Valider</button>

</form>
</form>
</body>
</html>