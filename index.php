<?php
if(isset($_POST['envoyer'])){
    if(isset($_POST['lastname'],$_POST['firstname'],$_POST['message'])){
    extract($_POST);

    echo $firstname." ".$lastname." ".$message;
    }
}

require ("views/index.view.php");

