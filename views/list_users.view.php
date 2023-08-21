<?php include "partials/_header.php" ?>
    <div class="container">
        <h1 class="lead">Liste des utilisateurs</h1>
        <?php foreach (array_chunk($users, 4) as $user_set): ?>
            <div class="row users">
                <?php foreach ($user_set as $user): ?>
                    <div class="user_block col-md-3">
                        <a href="profile.php?id=<?= $user->id ?>">
                            <img src="<?= $user->avatar ? $user->avatar : get_avatar_url($user->email, 100) ?>"
                                 alt="image de profil de <?= e($user->pseudo) ?>" class="avatar-md" >
                        </a>
                        <a href="profile.php?id=<?= $user->id ?>">
                            <h4 class="user_block_username">
                                <?= $user->pseudo ?>
                            </h4>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <div id="pagination"><?= $pagination ?></div>
    </div><!-- /.container -->
<?php include "partials/_footer.php" ?>