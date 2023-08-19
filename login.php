<?php
session_start();
/*****************************************************************/
$title = "Connexion";
include "includes/init.php";
include "filters/guest_filter.php";
/*****************************************************************/

// Si le formulaire a éte soumis

if (isset($_POST['login'])) {
    // Si tous les champs ont été remplis

    if (not_empty(['identifiant', 'password'])) {
        extract($_POST);
        $q = $db->prepare("SELECT id, pseudo,email,avatar, password AS hashed_password FROM users 
                                 WHERE (pseudo = :identifiant OR  email = :identifiant)
                                 AND active ='0'");
        $q->execute([
            'identifiant' => $identifiant
        ]);

        $user = $q->fetch(PDO::FETCH_OBJ);
        
        if ($user && bcrypt_verify_password($password, $user->hashed_password)) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['pseudo'] = $user->pseudo;
            $_SESSION['email'] = $user->email;
            $_SESSION['avatar'] = $user->avatar;

            // Si l' utilisateur a choisi de garder sa session active
            if(isset($_POST['remember_me']) && $_POST['remember_me'] == 'on'){
                remember_me($user->id);
            }

            redirect_intent_or("profile.php?id=" . $user->id);
        } else {
            set_flash("Combinaison Identifiant/Mot de passe incorrect", 'danger');
        }
    } else {
        save_input_data();
    }
} else {
    clear_input_data();
}

/*****************************************************************/
require "views/login.view.php";
/*****************************************************************/