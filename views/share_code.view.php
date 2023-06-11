<?php include "partials/_header.php" ?>

    <div class="main-content">
        <div class="main-content-share-code" id="main-content-share-code">
            <form action="" method="post" autocomplete="off">
                <textarea name="code" id="code" placeholder="Entrer votre code ici ..." required ><?= $code?></textarea>

                <div class="btn-group nav-code">
                    <a href="share_code.php" class="btn btn-danger">Tout effacer</a>
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
    $("#code").height($(window).height()-130);
</script>
</body>
</html>
