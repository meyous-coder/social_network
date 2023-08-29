<?php
include "bootstrap/locale.php";
include "includes/constants.php";
include "config/database.php";
include "includes/functions.php";

if(!empty($_COOKIE['user_id']) && !empty($_COOKIE['pseudo'])){
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['pseudo'] = $_COOKIE['pseudo'];
    $_SESSION['avatar'] = $_COOKIE['avatar'];
}

$q = $db->prepare("SELECT id FROM notifications WHERE subject_id = :subject_id AND seen = '0'");
$q->execute([
    'subject_id'=>get_session('user_id')
]);

$notifications_count = $q->rowCount();

auto_login();