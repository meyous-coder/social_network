<?php
session_start();
require "../config/database.php";
require "../includes/functions.php";

extract($_POST);

$q = $db->prepare('SELECT id, name,pseudo, avatar, email FROM users WHERE (name LIKE :query OR pseudo LIKE :query OR email LIKE :query ) LIMIT 3');
$q->execute(['query'=>'%'.$query.'%']);

$users =  $q->fetchAll(PDO::FETCH_OBJ);

if(count($users) > 0)
{
    foreach ($users as $user)
    {
        ?>
        <div class="display-box-user">
            <a href="profile.php?id=<?= $user->id ?>">
                <img src="assets/image/default_avatar.png"  class="img-circle" width="25">&nbsp;<?= $user->name ?><br/> &nbsp;&nbsp;&nbsp;<?= $user->email ?>
            </a>
        </div>
        <?php
    }
}else {
    echo '<div class="display-box-user">Aucun utilisateur trouvé.</div>';
}

