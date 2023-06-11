<?php
/*****************************************************************/
session_start();
/*****************************************************************/
$title = "Affichage de code source";
include "filters/auth_filter.php";
include "includes/constants.php";
include "config/database.php";
include "includes/functions.php";
/*****************************************************************/
if (!empty($_GET['id'])) {
    $q = $db->prepare("SELECT id,code FROM codes WHERE id = ?");
    $q->execute([$_GET['id']]);
    $data = $q->fetch(PDO::FETCH_OBJ);

    if (!$data) {
        redirect("share_code.php");
    }

} else {
    redirect("share_code.php");
}
/*****************************************************************/
require "views/show_code.view.php";
/*****************************************************************/