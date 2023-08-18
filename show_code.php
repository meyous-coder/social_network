<?php
/*****************************************************************/
session_start();
/*****************************************************************/
$title = "Affichage de code source";
include "includes/init.php";
include "filters/auth_filter.php";
include "includes/constants.php";
include "config/database.php";
include "includes/functions.php";
include "bootstrap/locale.php";
/*****************************************************************/
if (!empty($_GET['id'])) {

    $data = find_code_by_id($_GET['id']);

    if (!$data) {
        redirect("share_code.php");
    }

} else {
    redirect("share_code.php");
}
/*****************************************************************/
require "views/show_code.view.php";
/*****************************************************************/