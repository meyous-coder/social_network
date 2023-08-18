<?php include "partials/_header.php" ?>

    <div class="container">

        <div class="col-md-6">

            <h1 class="lead">Connexion</h1>
            <?php include "partials/_errors.php" ?>
            <form data-parsley-validate action="" method="post" class="well" autocomplete="off">

                <!-- Identifiant field -->

                <div class="form-group">
                    <label class="control-label" for="identifiant"> Pseudo ou Adresse électronique : </label>
                    <input type="text" id="identifiant" name="identifiant" value="<?= get_input_data("identifiant") ?>"
                           placeholder="Pseudo ou Email"
                           class="form-control" data-parsley-minlength="3" data-parsley-trigger="keypress" required>
                </div>

                <!-- Password field -->
                <div class="form-group">
                    <label class="control-label" for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password"
                           placeholder="Mot de passe" class="form-control" data-parsley-minlength="6"
                           data-parsley-trigger="keypress" required>
                </div>

                <!--Remember me-->
                <div class="form-group">
                    <label class="control-label" for="remember_me">
                        <input type="checkbox" name="remember_me" id="remember_me">
                        Garder ma session active
                    </label>

                </div>


                <input type="submit" name="login" value="Connexion" class="btn btn-primary">

            </form>

        </div>

    </div><!-- /.container -->

<?php include "partials/_footer.php" ?>