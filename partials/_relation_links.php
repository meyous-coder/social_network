

<?php if (relation_link_to_display($_GET['id']) == CANCEL_RELATION_LINK): ?>
    <p> Demande d' amitié déjà envoyée <a href="delete_friend.php?id=<?= $_GET['id'] ?>"
                                          class="btn btn-primary pull-right">Annuler la demande</a></p>

<?php elseif (relation_link_to_display($_GET['id']) == ACCEPT_REJECT_RELATION_LINK): ?>
    <a href="accept_friend_request.php?id=<?= $_GET['id'] ?>" class="btn btn-success ">Accepter</a>
    <a href="delete_friend.php?id=<?= $_GET['id'] ?>" class="btn btn-danger ">Décliner</a>

<?php elseif (relation_link_to_display($_GET['id']) == DELETE_RELATION_LINK): ?>
    Vous êtes déjà ami <br/>
    <a href="delete_friend.php?id=<?= $_GET['id'] ?>" class="btn btn-primary pull-right">Rétirer de ma liste d' ami</a>

<?php elseif (relation_link_to_display($_GET['id']) == ADD_RELATION_LINK) : ?>
    <h3><a href="add_friend.php?id=<?= $_GET['id'] ?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>
            Ajouter comme un ami </a></h3>
<?php endif; ?>