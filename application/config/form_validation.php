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
        ),
        'produits/inscription' => array(
            array(
                'field' => 'user_last_name',
                'label' => 'prénom',
                'rules' => 'required|trim|alpha_numeric_spaces',
                'errors'=> array(
                    'required' => 'Le %s doit être renseigné.',
                    'alpha_numeric_spaces' => 'La %s n\'est pas valide.'
                ),
            ),
            array(
                'field' => 'user_name',
                'label' => 'nom',
                'rules' => 'required',
                'errors'=> array(
                    'required' => 'Le %s doit être renseigné.'
                ),
            ),
            array(
                'field' => 'user_email',
                'label' => 'email',
                'rules' => 'required|trim',
                'errors'=> array(
                    'required' => 'L\'%s doit être renseigné.'
                ),
            ),
            array(
                'field' => 'user_login',
                'label' => 'identifiant',
                'rules' => 'required|trim|is_unique[jarditou_users.user_login]|alpha_numeric_spaces',
                'errors'=> array(
                    'required' => 'L\'%s doit être renseigné.',
                    'is_unique' => 'L\'%s existe déjà.',
                    'alpha_numeric_spaces' => 'Le %s n\'est pas valide.'
                ),
            ),
            array(
                'field' => 'user_mdp',
                'label' => 'mot de passe',
                'rules' => 'required|trim|min_length[8]|max_length[60]',
                'errors'=> array(
                    'required' => 'Le %s doit être renseigné.',
                    'min_length' => 'Le %s est trop court.',
                    'max_length' => 'Le %s est trop long.'
                ),
            ),
            array(
                'field' => 'user_role',
                'label' => 'role',
                'rules' => 'required|trim',
                'errors'=> array(
                    'required' => 'Le %s doit être renseigné.'
                ),
            ),
            array(
                'field' => 'user_photo',
                'label' => 'photo de profil',
                'rules' => 'trim|alpha',
                'errors'=> array(
                    'alpha' => 'L\'extension %s n\'est pas valide.'
                ),
            )
        ),
        'produits/profil' => array(
            array(
                'field' => 'user_name',
                'label' => 'nom',
                'rules' => 'required|trim|stripslashes|strip_tags|alpha_numeric_spaces',
                'errors'=> array(
                    'required' => 'Le %s doit être renseigné.',
                    'alpha_numeric_spaces' => 'La %s n\'est pas valide.'
                ),
            ),
            array(
                'field' => 'user_last_name',
                'label' => 'prénom',
                'rules' => 'required',
                'errors'=> array(
                    'required' => 'Le %s doit être renseigné.'
                ),
            ),
            array(
                'field' => 'user_email',
                'label' => 'email',
                'rules' => 'required|trim',
                'errors'=> array(
                    'required' => 'L\'%s doit être renseigné.'
                ),
            ),
            array(
                'field' => 'user_login',
                'label' => 'identifiant',
                'rules' => 'required|trim|is_unique|alpha_numeric_spaces',
                'errors'=> array(
                    'required' => 'L\'%s doit être renseigné.',
                    'is_unique' => 'L\'%s existe déjà.',
                    'alpha_numeric_spaces' => 'Le %s n\'est pas valide.'
                ),
            ),
            array(
                'field' => 'user_mdp',
                'label' => 'mot de passe',
                'rules' => 'required|trim|min_length[8]|max_length[60]',
                'errors'=> array(
                    'required' => 'Le %s doit être renseigné.',
                    'alpha_numeric_spaces' => 'Le %s n\'est pas valide.',
                    'min_length' => 'Le %s est trop court.',
                    'max_length' => 'Le %s est trop long.'
                ),
            ),
            array(
                'field' => 'user_role',
                'label' => 'role',
                'rules' => 'required|trim',
                'errors'=> array(
                    'required' => 'Le %s doit être renseigné.'
                ),
            ),
            array(
                'field' => 'user_photo',
                'label' => 'photo de profil',
                'rules' => 'trim|alpha',
                'errors'=> array(
                    'alpha' => 'L\'extension %s n\'est pas valide.'
                ),
            )
        ),
         'produits/connexion' => array(
                array(
                    'field' => 'login_membre',
                    'label' => 'login membre',
                    'rules' => 'required',
                    'errors'=> array(
                        'required' => 'Le %s doit être renseignée.'
                    ),
                ),
                array(
                    'field' => 'password_membre',
                    'label' => 'mot de passe du membre',
                    'rules' => 'required|trim|min_length[8]|max_length[60]',
                    'errors'=> array(
                        'required' => 'Le %s doit être renseigné.',
                        'min_length' => 'Le %s est trop court.',
                        'max_length' => 'Le %s est trop long.'
                    ),
                )
         )
);