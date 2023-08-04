<?php include "partials/_header.php" ?>

    <div class="container">

        <div class="row">

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Profil de : <?= e(get_session('pseudo'))?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="<?= get_avatar_url(get_session('email'),100)?>" alt="image de profil de <?= e(get_session('pseudo'))?>" class="img-circle">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <strong><?= e($user->pseudo)?></strong>
                                <br>
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;<a href="mailto:<?=e($user->email) ?>"><?=e($user->email) ?></a>
                                <br>
                                <?=
                                !empty($user->city && $user->country) ? '<i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;'.e($user->city).' - '.e($user->country).'</a>': '';
                                ?>
                                <br>
                                <a href="//maps.google.com?q=<?=e($user->city).' '.e($user->country)?>" target="_blank">Voir sur google maps</a>
                            </div>
                            <div class="col-sm-6">
                                <?=
                                !empty($user->twitter) ? '<i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;<a href="//twitter.com/'.e($user->twitter).'">@'.e($user->twitter).'</a>': '';
                                ?>
                                <br>
                                <?=
                                !empty($user->github) ? '<i class="fa fa-github" aria-hidden="true"></i>&nbsp;<a href="//github.com/'.e($user->github).'">'.e($user->github).'</a>': '';
                                ?>
                                <br>
                                <?=
                                !empty($user->sex == 'H') ? '<i class="fa fa-male" aria-hidden="true"></i>': '<i class="fa fa-female" aria-hidden="true"></i>';
                                ?>
                                <?=
                                !empty($user->available_for_hiring) ? 'Disponible pour emploi': 'Non disponible pour emploi';
                                ?>


                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 well">
                                <h5>Petite biographie de <?= e($user->name)?></h5>
                                <p>
                                    <?=
                                    !empty($user->bio) ? nl2br(e($user->bio)): 'Aucune biographie pour le moment ...';
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container -->

<?php include "partials/_footer.php" ?>