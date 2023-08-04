<?php
/*****************************************************************/
session_start();
/*****************************************************************/
$title = "Page de profil";
include "bootstrap/locale.php";
include "filters/auth_filter.php";
include "includes/constants.php";
include "config/database.php";
include "includes/functions.php";

/*****************************************************************/

if(!empty($_GET['id']))
{
    // Récupérer les informations de l' utilisateur en utilisant son identifiant
    $user = find_user_by_id($_GET['id']);


    if(! $user)
    {
        redirect("index.php");
    }
}else
{
    redirect("profile.php?id=".get_session('user_id'));
}

/*****************************************************************/

/*****************************************************************/
require "views/profile.view.php";
/*****************************************************************/