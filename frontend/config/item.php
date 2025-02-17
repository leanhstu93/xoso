<!-- Post -->
<div id="post-879"
     class="post-879 post type-post status-publish format-standard has-post-thumbnail hentry category-blog-post-with-full-width tag-business tag-fiance tag-invest">

    <div class="news-block-three">
        <div class="inner-box">
            <div class="image">
                <img src="<?= $data->image ?>"
                     class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""/>
                <a href="<?= $data->getUrl() ?>"
                        class="overlay-link"><span class="icon-blogger"></span></a>
            </div>

            <div class="date"><?= date('d',$data->date_update) ?> <br>T<?= date('n',$data->date_update) ?></div>

            <div class="lower-content">

                <ul class="post-info">

                    <li class="category">
                        <ul class="post-categories">
                            <li>
                                <a href="<?= $data->getUrl() ?>"
                                   rel="category tag">
                                    <?= $page_title ?>
                                </a></li>
                        </ul>
                    </li>

                    <li class="author">
                        <a href="<?= $data->getUrl() ?>">
                            <span class="icon-user"></span> admin</a>
                    </li>
                </ul>

                <h3>
                    <a href="<?= $data->getUrl() ?>"><?= $data->name ?></a></h3>
                <div class="text"><p><?= $data->desc ?></p>
                </div>

                <div class="read-more">
                    <a href="<?= $data->getUrl() ?>"><span
                                class="icon-arrow"></span>Xem thêm</a></div>

            </div>
        </div>
    </div>                        <!-- blog post item -->
</div><!-- End Post -->