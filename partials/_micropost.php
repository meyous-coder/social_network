<article class="media status-media">
    <div class="pull-left">
        <img src="<?= $micropost->avatar? $micropost->avatar:get_avatar_url($micropost->email) ?>" alt="<?= $micropost->pseudo; ?>" class="avatar-xs">
    </div>
    <div class="media-body">
        <h4 class="media-heading"><?= e($micropost->pseudo) ?></h4>
        <p>
            <i class="fa fa-clock-o"></i>
            <span class="timeago" title="<?= $micropost->created_at;?>"><?= $micropost->created_at;?></span>
            <?php if($micropost->user_id == get_session('user_id')): ?>
            <a data-confirm="Voulez-vous vraiment supprimer cette publication ?" href="delete_micropost.php?id=<?= $micropost->m_id;?>" >
                <i class="fa fa-trash"></i>
                Supprimer
            </a>
            <?php endif;?>
        </p>
        <?= nl2br(replace_links(e($micropost->content))); ?>
    </div>
</article>