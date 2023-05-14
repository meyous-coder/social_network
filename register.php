<?php

/*****************************************************************/
$title = "Inscription";
include "includes/constants.php";
include "config/database.php";
include "includes/functions.php";
/*****************************************************************/

// Si le formulaire a éte soumis

if(isset($_POST['register']))
{
    // Si tous les champs ont été remplis

    if(not_empty(['name','pseudo','email','password','password_confirm']))
    {
        $errors = []; // Tableau contenant l' ensemble des erreurs
        extract($_POST);

        /* Validation des champs du formulaire */

        if(mb_strlen($name))
        {
            $errors[] = "Nom et Prénoms trop court ! (Minimum 3 caractères)";
        }

        if(mb_strlen($pseudo))
        {
            $errors[] = "Pseudo trop court ! (Minimum 3 caractères)";
        }

        if(! filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $errors[] = "Adresse Email invalide";
        }

        if(mb_strlen($password) < 6)
        {
            $errors[] = "Mot de passe trop court ! (Minimum 6 caractères)";
        }else
        {
            if($password != $password_confirm)
            {
                $errors[] = "Les deux mots de passe ne concordent pas";
            }
        }

        /* Unicité du pseudo et de l' adresse email de l' utilisateur */

        if(is_already_in_use('pseudo',$pseudo,'users'))
        {
            $errors[] = "Pseudo déjà utilisé !";
        }

        if(is_already_in_use('email',$email,'users'))
        {
            $errors[] = "Adresse email déjà utilisé !";
        }

        /* Si le nombre d' erreur est égal à o alors on enregistre les informations dans la base de données et un
        mail est envoyé à l' utilisateur pour la confirmation de son compte  */

        if(count($errors) == 0)
        {
            // Envoi d' un mail d' activation

            // Informer l' utilisateur pour qu' il vérifie sa boite de messagerie

            // Enregistrement de l' utilisateur

            // Message de bienvenue

            // Redirection vers la page de  connexion
        }


    }else
    {
        $errors[] = "Veuillez SVP remplir tous les champs ";
    }
}

/*****************************************************************/
require "views/register.view.php";
/*****************************************************************/