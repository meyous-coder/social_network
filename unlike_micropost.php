<?php
session_start();
require("includes/init.php");
include('filters/auth_filter.php');
if (!empty($_GET['id'])) {

    if (user_has_already_liked_the_micropost($_GET['id'])) {

        $q = $db->prepare('DELETE FROM micropost_like  WHERE user_id = :user_id AND micropost_id = :micropost_id');
        $q->execute([
            'user_id' => get_session('user_id'),
            'micropost_id' => $_GET['id']
        ]);

        $q = $db->prepare('UPDATE microposts SET like_count = like_count - 1 WHERE id = :micropost_id ');
        $q->execute([
            'micropost_id' => $_GET['id']
        ]);
    }


}
redirect('profile.php?id=' . get_session('user_id').'#micropost'.$_GET['id']);