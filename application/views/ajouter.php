<!-- application/views/ajouter.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ajouter</title>
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css"); ?>"> 
    <link rel="stylesheet" href="<?= base_url("assets/css/style.img"); ?>"> 
    <link rel="stylesheet" href="<?= base_url("assets/css/style.js"); ?>"> 
</head>
<body>

    <a class="btn btn-secondary" href="<?= site_url("produits/liste");?> ">Retour</a>

    <?php 
        echo validation_errors(); 
        echo form_open_multipart(); 
    ?>
        <div class="form-group">
            <label for="pro_ref">Référence</label>
            <input type="text" name="pro_ref" id="pro_ref" class="form-control" value="<?php echo set_value('pro_ref'); ?>">
            <?php echo form_error('pro_ref'); ?>
        </div>
        
        <div class="form-group">
            <label for="pro_cat_id">Catégorie</label>
            <select name="pro_cat_id" id="pro_cat_id" class="form-control"> 
                <option value="" selected>Choisir une catégorie</option>
                <?php foreach($categories as $category) { ?>
                    <option value= "<?=$category->cat_id ?>" <?=(set_value('pro_cat_id') == $category->cat_id) ? 'selected' : '' ?>> <?= $category->cat_id.'. '.$category->cat_nom ?>
                    </option>
                <?php } ?>              
            </select>
            <?php echo form_error('pro_cat_id'); ?>
        </div>

        <div class="form-group">
            <label for="pro_libelle">Libellé</label>
            <input type="text" name="pro_libelle" id="pro_libelle" class="form-control" value="<?php echo set_value('pro_libelle'); ?>">
            <?php echo form_error('pro_libelle'); ?>
        </div>

        <div class="form-group">
            <label for="pro_description">Description</label>
            <input type="text" name="pro_description" id="pro_description" class="form-control" value="<?php echo set_value('pro_description'); ?>">
            <?php echo form_error('pro_description'); ?>
        </div>

        <div class="form-group">
            <label for="pro_prix">Prix</label>
            <input type="text" name="pro_prix" id="pro_prix" class="form-control" value="<?php echo set_value('pro_prix'); ?>">
            <?php echo form_error('pro_prix'); ?>
        </div>

        <div class="form-group">
            <label for="pro_stock">Stock</label>
            <input type="text" name="pro_stock" id="pro_stock" class="form-control" value="<?php echo set_value('pro_stock'); ?>">
            <?php echo form_error('pro_stock'); ?>
        </div>

        <div class="form-group">
            <label for="pro_couleur">Couleur</label>
            <input type="text" name="pro_couleur" id="pro_couleur" class="form-control" value="<?php echo set_value('pro_couleur'); ?>">
            <?php echo form_error('pro_couleur'); ?>
        </div>

       

        <div class="form-group">
            <label for="pro_photo">Téléchargement</label>
            <input type="file" name="pro_photo" id="pro_photo">
            <?php echo form_error('errors'); ?>
            <?php echo form_error('fichier'); ?>
        </div>

        <div class="form-group">
            <label for="pro_libelle" class="form-check-label">Produit bloqué : </label>
            <input type="checkbox" name="pro_bloque" id="pro_bloque" class="form-control" value=" 1" <?php (set_value('pro_bloque'))==1 ? 'checked': '' ?> data-toggle="toggle" data-on="Oui" data-off="Non" data-onstyle="secondary"
                data-offstyle="default">
        </div>

        <div class="form-group">
            <input type="hidden" name="pro_d_ajout" id="pro_d_ajout" class="form-control" value="">
        </div>

        <button type="submit" class="btn btn-secondary" >Ajouter</button>
    </form>

</body>
</html>
