<article class="media status-media">
    <div class="pull-left">
        <img src="<?= $user->avatar? $user->avatar:get_avatar_url($user->email) ?>" alt="<?= $user->pseudo; ?>" class="avatar-xs">
    </div>
    <div class="media-body">
        <h4 class="media-heading"><?= e($user->pseudo) ?></h4>
        <p><i class="fa fa-clock-o"></i> <span class="timeago" title="<?= $micropost->created_at;?>"><?= $micropost->created_at;?></span></p>
        <?= nl2br(replace_links(e($micropost->content))); ?>
    </div>
</article>