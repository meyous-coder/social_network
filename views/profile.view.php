<?php include "partials/_header.php" ?>

<div class="container">

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Profil de : <?= e(get_session('pseudo')) ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="<?= $user->avatar ? $user->avatar : get_avatar_url($user->email, 100) ?>"
                                 alt="image de profil de <?= e($user->pseudo) ?>" class="avatar-md">
                        </div>
                        <div class="col-md-7">
                            <?php if (!empty($_GET['id']) && get_session('user_id') !== $_GET['id']): ?>
                                <?php if (if_a_friend_request_has_already_been_sent(get_session('user_id'),$_GET['id'])): ?>
                                <p>Demande d'amitié déjà envoyée <a href="delete_friend.php?id=<?= $_GET['id']?>">Annuler la demande</a></p>
                                <?php else: ?>
                                    <a href="add_friend.php?id=<?= $_GET['id'] ?>" class="btn btn-primary pull-right"><i
                                                class="fa fa-plus"></i> Ajouter comme un ami</a>
                                <?php endif; ?>

                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong><?= e($user->pseudo) ?></strong>
                            <br>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;<a
                                    href="mailto:<?= e($user->email) ?>"><?= e($user->email) ?></a>
                            <br>
                            <?=
                            !empty($user->city && $user->country) ? '<i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;' . e($user->city) . ' - ' . e($user->country) . '</a>' : '';
                            ?>
                            <br>
                            <a href="//maps.google.com?q=<?= e($user->city) . ' ' . e($user->country) ?>"
                               target="_blank">Voir sur google maps</a>
                        </div>
                        <div class="col-sm-6">
                            <?=
                            !empty($user->twitter) ? '<i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;<a href="//twitter.com/' . e($user->twitter) . '">@' . e($user->twitter) . '</a>' : '';
                            ?>
                            <br>
                            <?=
                            !empty($user->github) ? '<i class="fa fa-github" aria-hidden="true"></i>&nbsp;<a href="//github.com/' . e($user->github) . '">' . e($user->github) . '</a>' : '';
                            ?>
                            <br>
                            <?=
                            !empty($user->sex == 'H') ? '<i class="fa fa-male" aria-hidden="true"></i>' : '<i class="fa fa-female" aria-hidden="true"></i>';
                            ?>
                            <?=
                            !empty($user->available_for_hiring) ? 'Disponible pour emploi' : 'Non disponible pour emploi';
                            ?>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 well">
                            <h5>Petite biographie de <?= e($user->name) ?></h5>
                            <p>
                                <?=
                                !empty($user->bio) ? nl2br(e($user->bio)) : 'Aucune biographie pour le moment ...';
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <?php if (!empty($_GET['id']) && $_GET['id'] === get_session('user_id')): ?>
                <div class="status-post">
                    <form action="microposts.php" method="post" data-parsley-validate>
                        <div class="form-group">
                            <label for="content" class="sr-only">Statut : </label>
                            <textarea name="content" id="content" rows="3" class="form-control"
                                      placeholder="Alors quoi de neuf ?" required data-parsley-minlength="3"
                                      data-parsley-maxlength="140"></textarea>
                        </div>
                        <div class="status-post-submit">
                            <div class="form-group">
                                <input type="submit" name="publish" value="Publier"
                                       class="btn btn-default btn-xs"></input>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
            <?php if (count($microposts) != 0) : ?>
                <?php foreach ($microposts as $micropost) : ?>
                    <?php include "partials/_micropost.php" ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Cet utilisateur n'a rien posté pour le moment ...</p>
            <?php endif; ?>
        </div>
    </div>

</div><!-- /.container -->

<?php include "partials/_footer.php" ?>
<script src="libraries/parsley/parsley.min.js"></script>
<script src="libraries/parsley/i18n/fr.js"></script>
<!--Live query permet de recharger la page sans actualisation -->
<!--<script src="assets/js/jquery.livequery.min.js"></script>-->
<script src="assets/js/jquery.timeago.js"></script>
<script src="assets/js/jquery.timeago.fr.js"></script>
<script type="text/javascript">
    window.ParsleyValidator.setLocale('fr');
    // $(document).ready(function () {
    //     $(".timeago").livequery(function () {
    //         $(this).timeago();
    //     });
    // });

    $(document).ready(function () {
        $(".timeago").timeago();
    });
</script>
