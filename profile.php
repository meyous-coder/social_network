<?php
/*****************************************************************/
session_start();
/*****************************************************************/
$title = "Page de profil";
include "includes/init.php";
include "filters/auth_filter.php";
/*****************************************************************/
if (!empty($_GET['id'])) {
    // Récupérer les informations de l' utilisateur en utilisant son identifiant
    $user = find_user_by_id($_GET['id']);

    if (!$user) {
        redirect("index.php");
    } else {

//        $q = $db->prepare("SELECT id,content, created_at FROM microposts WHERE user_id = :user_id  ORDER BY created_at DESC ");
        $q = $db->prepare("SELECT U.id user_id, U.pseudo, U.email, U.avatar, M.id m_id, M.content, M.created_at,M.like_count
                                    FROM users U,
                                         microposts M,
                                         friends_relationships F
                                    WHERE M.user_id = U.id
                                      AND CASE
                                              WHEN F.user_id1 = :user_id
                                                  THEN F.user_id2 = M.user_id
                                              WHEN F.user_id2 = :user_id
                                                  THEN F.user_id1 = M.user_id
                                        END
                                      AND F.status > 0
                                    ORDER BY M.created_at DESC");
        $q->execute(['user_id' => $user->id]);
        $microposts = $q->fetchAll(PDO::FETCH_OBJ);

    }
} else {
    redirect("profile.php?id=" . get_session('user_id'));
}
/*****************************************************************/
require "views/profile.view.php";
/*****************************************************************/