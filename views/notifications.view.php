<?php include "partials/_header.php" ?>
    <div class="container">
        <h1 class="lead">Vos notifications</h1>
        <div class="row">
            <div class="col-md-10">
                    <ul class="list-group">
                        <?php foreach ($notifications as $notification): ?>
                            <li class="list-group-item <?= $notification->seen == '0' ? 'not_seen' : '' ?>">
                                <?php require("partials/notifications/{$notification->name}.php"); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div id="pagination"><?= $pagination ?></div>
            </div>
        </div>
    </div><!-- /.container -->
<?php include "partials/_footer.php" ?>
<script src="assets/js/jquery.timeago.js"></script>
<script src="assets/js/jquery.timeago.fr.js"></script>
<script type="text/javascript">
    window.ParsleyValidator.setLocale('fr');
    // $(document).ready(function () {
    //     $(".timeago").livequery(function () {
    //         $(this).timeago();
    //     });
    // });

    $(document).ready(function () {
        $(".timeago").timeago();
    });
</script>
