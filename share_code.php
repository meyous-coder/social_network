<?php
/*****************************************************************/
session_start();
/*****************************************************************/
$title = "Partage de code source";
include "filters/auth_filter.php";
include "includes/constants.php";
include "config/database.php";
include "includes/functions.php";
/*****************************************************************/

if (!empty($_GET['id'])) {

    $data = find_code_by_id($_GET['id']);
    if ( ! $data) {
        $code = "";
    } else {

        $code = $data->code;
    }

}else{
    $code="";
}


if (isset($_POST['save'])) {
    if (not_empty(['code'])) {
        extract($_POST);

        $q = $db->prepare("INSERT INTO codes (code) VALUES (?)");
        $success = $q->execute([$code]);

        if ($success) {
            $id = $db->lastInsertId();
            redirect("show_code.php?id=" . $id);
        } else {
            set_flash("Erreur lors de l' ajout du code source. Veuillez réessayez SVP !");
            redirect("share_code.php");
        }
    } else {
        redirect("share_code.php");
    }
}
/*****************************************************************/
require "views/share_code.view.php";
/*****************************************************************/