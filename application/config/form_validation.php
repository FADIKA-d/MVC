<?php

$config = array(
        'produits/ajouter' => array(
            array(
                'field' => 'pro_ref',
                'label' => 'Référence',
                'rules' => 'required|trim|stripslashes|strip_tags|alpha_numeric_spaces|is_unique[jarditou_produits.pro_ref]',
                'errors'=> array(
                    'required' => 'La %s doit être renseignée.',
                    'is_unique' => 'La %s existe déjà.',
                    'alpha_numeric_spaces' => 'La %s n\'est pas valide.'
                ),
            ),
            array(
                'field' => 'pro_cat_id',
                'label' => 'Catégorie',
                'rules' => 'required',
                'errors'=> array(
                    'required' => 'La %s doit être renseignée.'
                ),
            ),
            array(
                'field' => 'pro_libelle',
                'label' => 'Libellé',
                'rules' => 'required|trim|alpha_numeric_spaces',
                'errors'=> array(
                    'required' => 'Le %s doit être renseigné.',
                    'alpha_numeric_spaces' => 'Le %s n\'est pas valide.'
                ),
            ),
            array(
                'field' => 'pro_description',
                'label' => 'Description',
                'rules' => 'trim|alpha_numeric_spaces',
                'errors'=> array(
                    'alpha_numeric_spaces' => 'La %s n\'est pas valide.'
                ),
            ),
            array(
                'field' => 'pro_prix',
                'label' => 'Prix',
                'rules' => 'required|trim|decimal',
                'errors'=> array(
                    'required' => 'Le %s doit être renseignée.',
                    'decimal' => 'Un format décimal est requis.'
                ),
            ),
            array(
                'field' => 'pro_stock',
                'label' => 'Stock',
                'rules' => 'trim|is_natural',
                'errors'=> array(
                    'is_natural' => 'La valeur n\'est pas valide.'
                ),
            ),
            array(
                'field' => 'pro_couleur',
                'label' => 'Password',
                'rules' => 'trim|alpha',
                'errors'=> array(
                    'alpha' => 'La %s n\'est pas valide.'
                ),
            ),
            array(
                'field' => 'pro_photo',
                'label' => 'Photo',
                'rules' => 'trim|alpha',
                'errors'=> array(
                    'alpha' => 'L\'extension %s n\'est pas valide.'
                ),
            ),
            array(
                'field' => 'pro_bloque',
                'label' => 'Bloqué',
                'rules' => 'trim|exact_length[1]|is_natural',
                'errors'=> array(
                    'is_natural' => 'La valeur n\'est pas valide.',
                    'exact_length' => 'La valeur n\'est pas valide.',

                ),
            )
            ),
        'produits/modifier' => array(
            array(
                'field' => 'pro_ref',
                'label' => 'Référence',
                'rules' => 'required|trim|alpha_numeric_spaces',
                'errors'=> array(
                    'required' => 'La %s doit être renseignée.',
                    'alpha_numeric_spaces' => 'La %s n\'est plus valide.'
                ),
            ),
            array(
                'field' => 'pro_cat_id',
                'label' => 'Catégorie',
                'rules' => 'required',
                'errors'=> array(
                    'required' => 'La %s doit être renseignée.'
                ),
            ),
            array(
                'field' => 'pro_libelle',
                'label' => 'Libellé',
                'rules' => 'required|trim|alpha_numeric_spaces',
                'errors'=> array(
                    'required' => 'Le %s doit être renseigné.',
                    'alpha_numeric_spaces' => 'Le %s n\'est plus valide.'
                ),
            ),
            array(
                'field' => 'pro_description',
                'label' => 'Description',
                'rules' => 'trim|alpha_numeric_spaces',
                'errors'=> array(
                    'alpha_numeric_spaces' => 'La %s n\'est plus valide.'
                ),
            ),
            array(
                'field' => 'pro_prix',
                'label' => 'Prix',
                'rules' => 'required|trim|decimal',
                'errors'=> array(
                    'required' => 'Le %s doit être renseignée.',
                    'decimal' => 'Un format décimal est requis.'
                ),
            ),
            array(
                'field' => 'pro_stock',
                'label' => 'Stock',
                'rules' => 'trim|is_natural',
                'errors'=> array(
                    'is_natural' => 'La valeur n\'est plus valide.'
                ),
            ),
            array(
                'field' => 'pro_couleur',
                'label' => 'Password',
                'rules' => 'trim|alpha',
                'errors'=> array(
                    'alpha' => 'La %s n\'est plus valide.'
                ),
            ),
            array(
                'field' => 'pro_photo',
                'label' => 'Photo',
                'rules' => 'trim|alpha',
                'errors'=> array(
                    'alpha' => 'L\'extension %s n\'est plus valide.'
                ),
            ),
            array(
                'field' => 'pro_bloque',
                'label' => 'Bloqué',
                'rules' => 'trim|exact_length[1]|is_natural',
                'errors'=> array(
                    'is_natural' => 'La valeur n\'est plus valide.',
                    'exact_length' => 'La valeur n\'est plus valide.',

                ),
            )
        )
);