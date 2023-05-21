<?php include "partials/_header.php" ?>

    <div class="container">

        <div class="col-md-6">

            <h1 class="lead">Connexion</h1>
            <?php include "partials/_errors.php" ?>
            <form data-parsley-validate action="" method="post" class="well" autocomplete="off">

                <!-- Name field -->

                <div class="form-group">
                    <label class="control-label" for="identifiant"> Pseudo ou Adresse électronique : </label>
                    <input type="text" id="identifiant" name="identifiant" value="<?= get_input_data("identifiant") ?>" placeholder="Pseudo ou Email"
                           class="form-control" data-parsley-minlength="3" data-parsley-trigger="keypress" required>
                </div>

                <!-- Pseudo field -->

                <div class="form-group">
                    <label class="control-label" for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password"
                           placeholder="Mot de passe" class="form-control" data-parsley-minlength="6"
                           data-parsley-trigger="keypress" required>
                </div>


                <input type="submit" name="login" value="Connexion" class="btn btn-primary">

            </form>

        </div>

    </div><!-- /.container -->

<?php include "partials/_footer.php" ?>