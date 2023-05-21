<?php
/*****************************************************************/
session_start();
/*****************************************************************/
$title = "Connexion";
include "includes/constants.php";
include "config/database.php";
include "includes/functions.php";
/*****************************************************************/

// Si le formulaire a éte soumis

if (isset($_POST['login'])) {
    // Si tous les champs ont été remplis

    if (not_empty(['identifiant', 'password'])) {
        extract($_POST);

        $q = $db->prepare("SELECT id FROM users 
                                 WHERE (pseudo = :identifiant OR  email = :identifiant)
                                 AND password = :password AND active ='0'");
        $q->execute([
           'identifiant' =>$identifiant,
           'password' => sha1($password)
        ]);
        $userHasBeenFound = $q->rowCount();

        if($userHasBeenFound)
        {
            redirect("profile.php");
        }else
        {
            set_flash("Combinaison Identifiant/Mot de passe incorrect",'danger');
        }
    }
    else
    {
        save_input_data();
    }
} else {
    clear_input_data();
}

/*****************************************************************/
require "views/login.view.php";
/*****************************************************************/