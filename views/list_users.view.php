<?php include "partials/_header.php" ?>
<div class="container">
  <h1 class="lead">Liste des utilisateurs</h1>
  <?php foreach ($users as $user): ?>
    <div class="user_block">
      <a href="profile.php?id=<?= $user->id ?>">
        <img src="<?= get_avatar_url($user->email, 80) ?>" class="img-circle">
      </a>
      <a href="profile.php?id=<?= $user->id ?>">
        <h4 class="user_block_username">
          <?= $user->pseudo ?>
        </h4>
      </a>
    </div>
  <?php endforeach; ?>
</div><!-- /.container -->
<?php include "partials/_footer.php" ?>