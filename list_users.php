<?php
/*****************************************************************/
session_start();
/*****************************************************************/
$title = "Liste des utilisateurs";
include "includes/constants.php";
include "includes/functions.php";
include "bootstrap/locale.php";
include "config/database.php";

/*****************************************************************/
global  $db;
$q = $db->query("SELECT id,pseudo, email FROM users ORDER BY pseudo ASC");
$users = $q->fetchAll(PDO::FETCH_OBJ);

// var_dump($_SESSION);
// die();


/*****************************************************************/

/*****************************************************************/
require "views/list_users.view.php";
/*****************************************************************/