<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <?= WEBSITE_NAME ?>
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                <li class="<?= set_active("index") ?>"><a href="index.php">Accueil</a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"> <img src="<?= get_avatar_url(get_session('email'))?>" alt="image de profil de <?= get_session('email')?>" class="img-circle"> <span class="caret"></span></a>
                    <ul class="dropdown-menu">


                        <?php if (is_logged_in()): ?>
                            <li class="<?= set_active("profile") ?>"><a
                                    href="profile.php?id=<?= get_session("user_id") ?>">Mon
                                    profil</a></li>
                            <li class="<?= set_active("share_code") ?>"><a href="share_code.php">Partager</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="<?= set_active("logout") ?>"><a href="logout.php">Déconnexion</a></li>
                        <?php else: ?>
                            <li class="<?= set_active("register") ?>"><a href="register.php">Inscription</a></li>
                            <li class="<?= set_active("login") ?>"><a href="login.php">Connexion</a></li>
                        <?php endif; ?>

                    </ul>
                </li>



            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>