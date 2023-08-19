
<?php include('partials/_header.php'); ?>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Changer de mot de passe </h3>
                    </div>
                    <div class="panel-body">
                        <?php include('partials/_errors.php'); ?>
                        <form data-parsley-validate method="post" autocomplete="off">

                            <div class="form-group">
                                <label for="current_password">Mot de passe actuel</label>
                                <input type="password" name="current_password" id="current_password" class="form-control"
                                       required="required" />
                            </div>

                            <div class="form-group">
                                <label for="new_password">Nouveau mot de passe </label>
                                <input type="password" name="new_password" id="new_password" class="form-control"
                                       required="required" data-parsley-minlength="6" data-parsley-trigger="keypress"/>
                            </div>

                            <div class="form-group">
                                <label for="new_password_confirmation">Confirmer votre nouveau mot de passe</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control"
                                       required="required" data-parsley-equalto = "#new_password_confirmation" data-parsley-trigger="keypress"/>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Valider" name="change_password">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('partials/_footer.php'); ?>