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
            <a href="profile.php?id <?= $user->id ?>" title="">
                <img src="assets/images/img.jpg" width="40px" height="40px"  class="img-circle " alt="">&nbsp;<?= $user->name ?><br/> &nbsp;&nbsp;&nbsp;<?= $user->email ?>
            </a>
        </div>
        <?php
    }
}else {
    echo '<div class="display-box-user">Aucun utilisateur trouvé.</div>';
}

