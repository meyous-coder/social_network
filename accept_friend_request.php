<?php
session_start();

$title = 'Édition de Profil';

require ('includes/init.php');
include ('filters/auth_filter.php');

if(!empty($_GET['id']) && $_GET['id'] !== get_session('user_id')){
    $q = $db->prepare("UPDATE friends_relationships SET status = '1' WHERE (user_id1 = :user_id1 AND user_id2 = :user_id2) OR ( user_id2 = :user_id1 AND user_id1 = :user_id2)");
    $q->execute([
        'user_id1'=>get_session('user_id'),
        'user_id2'=> $_GET['id']
    ]);

    set_flash("Vous êtes à présent ami avec cet utilisateur !");
    redirect('profile.php?id'.$GET['id']);
}else {
    redirect('profile.php?id'.get_session('user_id'));
}
