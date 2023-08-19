<?php
session_start();

$title = 'Modifier le mot de passe';

require ('includes/init.php');
include ('filters/auth_filter.php');

// Si le formulaire a été soumis

if ( isset( $_POST['change_password'] ) )
{
    // Si tous les champs ont été rempli
    if ( not_empty(['current_password', 'new_password','new_password_confirmation']) )
    {
        extract($_POST);
        $errors = [];


        if( mb_strlen($new_password) < 6 )
        {
            $errors[] = "Mot de passe trop court ! (Minimum 6 caractères)";
        }
        else
        {

            if($new_password != $new_password_confirmation)
            {
                $errors[] = "Les deux mots de passe ne concordent pas !";
            }
        }

        if( count($errors) == 0 ){

            $q = $db->prepare("SELECT  password AS hashed_password FROM users WHERE id = :id  AND  active = '0' ");
            $q->execute([
                'id' => get_session('user_id')
            ]);

            $user = $q->fetch(PDO::FETCH_OBJ);

            if ( $user && bcrypt_verify_password( $current_password, $user->hashed_password )){
                $q = $db->prepare('UPDATE users SET password = :password WHERE  id = :id');
                $q->execute([
                    'password' => password_hash($new_password,PASSWORD_BCRYPT),
                    'id' => get_session('user_id')
                ]);

                set_flash('Félicitations, votre mot de passe a été mis à jour !');
                redirect('profile.php?id='.get_session('user_id'));
            }else {
                save_input_data();
                $errors[] = "Le mot de passe actuel indiqué est incorrect !" ;
            }



        }

    }
    else{
        save_input_data();
        $errors[] = "Veillez remplir tous les champs qui ont été marqués par d'un (*)" ;
    }


} else {
    // S'il vient d'arriver fraichement su r la page,il n'y a aucune raison que les champs soient pré-remplis
    clear_input_data();
}


require ('views/change_password.view.php');