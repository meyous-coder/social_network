<?php include "partials/_header.php" ?>

    <div class="main-content">
        <div class="main-content-share-code" id="main-content-share-code">
            <form action="" autocomplete="off">
                <textarea name="code" id="code" placeholder="Entrer votre code ici ..." required ></textarea>

                <div class="btn-group nav">
<!--                    <a href="share_code.view.php" class="btn btn-danger">Tout effacer</a>-->
                    <input type="reset"  class="btn btn-danger" value="Tout effacer">
                    <input type="submit" name="save" class="btn btn-success" value="Enregistrer">
                </div>
            </form>
        </div>
    </div><!-- /.container -->


<script src="assets/js/jquery1.12.4.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/tabby.min.js"></script>
<script>
    $("#code").tabby();
    $("#code").height($(window).height()-50);
</script>
</body>
</html>
