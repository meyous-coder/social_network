<?php include "partials/_header.php" ?>
<div class="container">
    <div class="row">
        <?php if (!empty($_GET['id']) && $_GET['id'] === get_session('user_id')): ?>
            <div class="col-md-6 col-md-offset-3">
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
                                               required="required"
                                               value="<?= get_input_data('name') ? get_input_data('name') : e($user->name) ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">Ville
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" name="city" id="city" class="form-control"
                                               required="required"
                                               value="<?= get_input_data('city') ? get_input_data('city') : e($user->city) ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="avatar">Changer mon avatar</label>
                                        <div id="queue"></div>
                                        <input type="file" id="avatar" name="avatar" multiple="false"/>
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
                                               required="required"
                                               value="<?= get_input_data('country') ? get_input_data('country') : e($user->country) ?>"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sex">Sexe
                                            <small class="text-danger">*</small>
                                        </label>
                                        <select type="text" name="sex" id="sex" class="form-control"
                                                required="required">
                                            <option value="H" <?= e($user->sex) == 'H' ? "selected" : "" ?>>
                                                Homme
                                            </option>
                                            <option value="F" <?= e($user->sex) == 'F' ? "selected" : "" ?>>
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
                                        <input type="text" name="twitter" id="twitter" class="form-control"
                                               value="<?= get_input_data('twitter') ? get_input_data('twitter') : e($user->twitter) ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="github">Github</label>
                                        <input type="text" name="github" id="github" class="form-control"
                                               value="<?= get_input_data('github') ? get_input_data('github') : e($user->github) ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="available_for_hiring">
                                            <input type="checkbox" name="available_for_hiring" id="available_for_hiring"
                                                <?= e($user->available_for_hiring) ? "checked" : "" ?> />
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
                                                  placeholder="Je suis un amoureux de la programmation..."><?= get_input_data('bio') ? get_input_data('bio') : e($user->bio) ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Valider" name="update">

                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div><!-- /.container -->

<!-- SCRIPTS -->

<script src="assets/js/jquery-3.7.0.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="libraries/parsley/parsley.min.js"></script>
<script src="libraries/uploadify/jquery.uploadifive.js"></script>
<script src="libraries/alertifyjs/alertify.min.js"></script>
<script src="libraries/parsley/i18n/fr.js"></script>
<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function () {
        $('#avatar').uploadifive({
            'auto': true,
            'fileObjName':'avatar',
            'buttonText': 'Parcourir',
            'checkScript': 'libraries/uploadify/check-exists.php',
            'formData': {
                'timestamp': '<?php echo $timestamp;?>',
                'token': '<?php echo md5('unique_salt' . $timestamp);?>',
                'user_id':'<?= get_session('user_id')?>'
            },
            'queueID': 'queue',
            'uploadScript': 'libraries/uploadify/uploadifive.php',
            'onError'          : function(file, fileType, data) {
                alertify.error("Erreur lors de l'upload du ficher, Veuillez réessayer SVP")
            },
            'onUploadComplete': function (file, data) {
                alertify.success("Votre avatar a été uploadé avec succès !");
                window.location = '/profile.php';
            }
        });
    });
</script>

</body>
</html>
