<?php include "partials/_header.php"?>

    <div class="container">

        <div class="col-md-6">

            <h1 class="lead">Inscription</h1>
            <?php include "partials/_errors.php"?>
            <form action="" method="post" class="well" autocomplete="off">

                <!-- Name field -->

                <div class="form-group">
                    <label class="control-label" for="name">Nom et Prenoms : </label>
                    <input type="text" name="name" value="<?= get_input_data("name")?>" placeholder="Nom" class="form-control" required>
                </div>

                <!-- Pseudo field -->

                <div class="form-group">
                    <label class="control-label" for="pseudo">Pseudo :</label>
                    <input type="text" name="pseudo" value="<?= get_input_data("pseudo")?>" placeholder="Pseudo" class="form-control" required>
                </div>

                <!-- Email field -->

                <div class="form-group">
                    <label class="control-label" for="pseudo">Email :</label>
                    <input type="text" name="email" value="<?= get_input_data("email")?>" placeholder="Email" class="form-control" required>
                </div>

                <!-- Password field -->

                <div class="form-group">
                    <label class="control-label" for="password">Mot de passe :</label>
                    <input type="password" name="password" placeholder="Mot de passe" class="form-control" required>
                </div>


                <!-- Password confirm field -->

                <div class="form-group">
                    <label class="control-label" for="password_confirm">Confirmer mot de passe :</label>
                    <input type="password" name="password_confirm" placeholder="Confirmer votre mot de passe" class="form-control" required>
                </div>


                <!--  Send Button -->

                <input type="submit" name="register" value="Inscription" class="btn btn-primary">

            </form>

        </div>

    </div><!-- /.container -->

<?php include "partials/_footer.php"?>