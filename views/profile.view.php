<?php include "partials/_header.php" ?>

    <div class="container">


        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Profil de : <?= e($user->pseudo)?></h3>
                    </div>
                    <div class="panel-body">
                        <?php $gravatar_url = "http://gravatar.com/avatar/".md5(strtolower(trim(e($user->email)))) ?>
                        <div class="row">
                            <div class="col-md-5">
                                <img src="<?= get_avatar_url($user->email)?>" alt="image de profil de <?= e($user->pseudo)?>" class="img-circle">
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
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Complèter mon profil</h3>
                    </div>
                    <div class="panel-body">
                        <?php include('partials/_errors.php'); ?>
                        <form data-parsley-validate method="post" autocomplete="off">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nom
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" name="name" id="name" class="form-control"
                                               required="required" value="<?= get_input_data('name') ? get_input_data('name') : e($user->name)?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">Ville
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" name="city" id="city" class="form-control"
                                               required="required" value="<?= get_input_data('city') ? get_input_data('city') : e($user->city)?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="avatar">Changer mon avatar</label>
                                        <input id="avatar" type="file" name="avatar"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Pays
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" name="country" id="country" class="form-control"
                                               required="required" value="<?= get_input_data('country') ? get_input_data('country') : e($user->country)?>"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sex">Sexe
                                            <small class="text-danger">*</small>
                                        </label>
                                        <select type="text" name="sex" id="sex" class="form-control"
                                                required="required">
                                            <option value="H" <?= e($user->sex) == 'H' ? "selected" : "" ?> >
                                                Homme
                                            </option>
                                            <option value="F" <?= e($user->sex) == 'F' ? "selected" : "" ?> >
                                                Femme
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" name="twitter" id="twitter" class="form-control" value="<?= get_input_data('twitter') ? get_input_data('twitter') : e($user->twitter)?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="github">Github</label>
                                        <input type="text" name="github" id="github" class="form-control" value="<?= get_input_data('github') ? get_input_data('github') : e($user->github)?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="available_for_hiring">
                                            <input type="checkbox" name="available_for_hiring" id="available_for_hiring" <?= e($user->available_for_hiring) ? "checked" : "" ?>/>
                                            Disponible pour emploi ?
                                        </label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="twitter">Biographie<span class="text-danger">*</span></label>
                                        <textarea name="bio" id="bio" cols="30" rows="10" required="required"
                                                  class="form-control"
                                                  placeholder="Je suis un amoureux de la programmation..."><?= get_input_data('bio') ? get_input_data('bio') : e($user->bio)?></textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Valider" name="update" >

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container -->

<?php include "partials/_footer.php" ?>