<?php
session_start();

$title = 'Édition de Profil';

require('includes/init.php');
include('filters/auth_filter.php');

if (!empty($_GET['id']) && $_GET['id'] !== get_session('user_id')) {

    if (!if_a_friend_request_has_already_been_sent(get_session('user_id'), $_GET['id'])) {

        $id = $_GET['id'];

        // Sauvegarde d' une demande d' amitié
        $q = $db->prepare("INSERT INTO friends_relationships (user_id1 , user_id2) VALUES ( :user_id1 , :user_id2) ");
        $q->execute([
            'user_id1'=>get_session('user_id'),
            'user_id2'=>$_GET['id']
        ]);


        // Sauvegarde de la notification
        $q = $db->prepare("INSERT INTO notifications (subject_id,name,user_id) VALUES (:subject_id,:name,:user_id)");
        $q->execute([
            'subject_id'=>$id,
            'name'=>'friend_request_send',
            'user_id'=>get_session('user_id')
        ]);

        set_flash("Votre demande d' amitié a été envoyé avec succès !");
        redirect('profile.php?id='.$id);

    } else {
        set_flash("Cet utilisateur vous a déjà envoyé une demande d' amitié.");
        redirect('profile.php?id='.get_session('user_id'));
    }

    set_flash("Votre demande d' amitié a été envoyée avec succès !");
    redirect("profile.php?id" . $_GET['id']);
} else {
    redirect('profile.php?id' . get_session('user_id'));
}

