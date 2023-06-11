<?php include "partials/_header.php" ?>

<div class="main-content">
    <div class="main-content-share-code" id="main-content-share-code">

        <pre class="prettyprint linenums ">
            <?= $data->code; ?>
        </pre>

        <div class="btn-group nav-code">
            <a href="share_code.php?id=<?= $_GET['id'];?>" class="btn btn-warning">Cloner</a>
            <a href="share_code.php" class="btn btn-success">Nouveau</a>

        </div>

    </div>
</div><!-- /.container -->


<script src="assets/js/jquery1.12.4.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/prettify.min.js"></script>
<script>
    prettyPrint();
</script>

</body>
</html>
