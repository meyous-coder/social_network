<?php include "partials/_header.php" ?>

    <div class="container">


        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Profil de : <?= e( $_SESSION['pseudo'])?></h3>
                    </div>
                    <div class="panel-body">
                        Image <br>
                        Pseudo <br>
                        Adresse email <br>
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
                                               required="required" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">Ville
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" name="city" id="city" class="form-control"
                                               required="required" value=""/>
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
                                               required="required" value=""/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sex">Sexe
                                            <small class="text-danger">*</small>
                                        </label>
                                        <select type="text" name="sex" id="sex" class="form-control"
                                                required="required">
                                            <option value="H" >
                                                Homme
                                            </option>
                                            <option value="F" >
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
                                        <input type="text" name="twitter" id="twitter" class="form-control" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="github">Github</label>
                                        <input type="text" name="github" id="github" class="form-control" value=""/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="available_for_hiring">
                                            <input type="checkbox" name="available_for_hiring" id="available_for_hiring"/>
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
                                                  placeholder="Je suis un amoureux de la programmation..."></textarea>
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