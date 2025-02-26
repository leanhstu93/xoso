<?php
use frontend\models\News;

$data = News::getDataByCustomSetting('home_news');
//debug($data);
?>
<section class=" blog-section sp-two">
    <div class="container">

        <div class="sec-title centered">
            <a href="#" class="theme-btn"><?= Yii::$app->view->params['lang']->news ?></a>
            <div class="title-section"><?= Yii::$app->view->params['lang']->latest ?></div>
        </div>

        <div class="row">
            <?php foreach ($data->data as $item) {
                $item->setTranslate();
                ?>
            <div class="news-block col-lg-4">
                <div class="inner-box">
                    <div class="image">
                        <img src="<?= $item->image ?>"
                             alt="Image">
                        <a href="<?= $item->getUrl()?>"
                           class="overlay-link"><span class="icon-blogger"></span></a>
                    </div>
                    <div class="lower-content">
                        <ul class="post-info">
                            <li class="category">
                                <a href="<?= $item->getUrl()?>" rel="category tag" style="color: white">
                                    <?php if (!empty($data->category)) { ?>
                                        <?= $data->category->name ?>
                                    <?php } ?>
                                </a>
                            </li>
                            <li class="date"><?= date('d/m/Y', $item->date_update) ?></li>
                        </ul>

                        <h4>
                            <a href="<?= $item->getUrl() ?>">
                                <?= $item->name ?>
                            </a>
                        </h4>
                        <div class="text"><?= $item->desc ?>
                        </div>

                        <div class="author">
                            <a href="<?= $item->getUrl()?>">
                                <span class="icon-user"></span>admin</a></div>

                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</section>
