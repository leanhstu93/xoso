<article class="post">
    <figure class="post-thumb">
        <a  href="<?= $data->getUrl() ?>">
            <img width="80" height="80"
                src="<?= $data->image ?>"
                class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" />
        </a>
    </figure>
    <h5>
        <a href="<?= $data->getUrl() ?>"><?= $data->name ?></a>
    </h5>
    <div class="post-info"><?= date('d/m/Y',$data->date_update) ?></div>
    <div class="link">
        <a  href="<?= $data->getUrl() ?>"
            class="theme-btn"><span class="icon-arrow"></span>Xem thêm</a></div>
</article>