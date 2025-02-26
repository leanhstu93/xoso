<?php
use frontend\models\SinglePage;

$data = SinglePage::getDataByCustomSetting('one_middle_home');
$data_tree = SinglePage::getDataByCustomSetting('tree_middle_home');
?>
<!-- About section -->
<section class="about-section-three sp-tw grey-bg">
    <div class="container">
        <div class="sec-title centered">
            <a href="#" class="theme-btn"><?= $this->params['company']['name'] ?></a>
            <div class="title-section"><?= Yii::$app->view->params['lang']->professional_design ?></div>
        </div>
        <div class="row mb-50">
            <div class="col-lg-6">
                <div class="about-text-block ">
                    <div class="top-content">
                        <div class="inner-box">
                            <div class="icon"><span class="icon-chess"></span></div>
                            <div class="content-text">
                                <h4><?= Yii::$app->view->params['lang']->creation ?> - Marketing </h4>
                                <h2><?= $data->name?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="lower-content">
                        <h4><?= $data->desc?></h4>
                        <div class="text">
                            <?= $data->content?>
                        </div>
                        <div class="author-info border-none">
                            <div class="inner-box">
                                <div class="image"><img src="/images/hai.png" alt=""></div>
                                <div class="author-content">
                                    <div class="name">Sáng lập</div>
                                    <div class="designation">CEO Nguyen Hai</div>
                                </div>
                            </div>
                        </div>
                        <div class="year-of-service">Sáng lập 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="icon"><span class="icon-patent"></span></div>
                        <h4><?= Yii::$app->view->params['lang']->extend_2 ?></h4>
                        <div class="text"><?= Yii::$app->view->params['lang']->extend_3 ?></div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="icon"><span class="icon-passion"></span></div>
                        <h4><?= Yii::$app->view->params['lang']->extend_4 ?></h4>
                        <div class="text"><?= Yii::$app->view->params['lang']->extend_5 ?></div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="icon"><span class="icon-brain"></span></div>
                        <h4><?= Yii::$app->view->params['lang']->extend_6 ?></h4>
                        <div class="text"><?= Yii::$app->view->params['lang']->extend_7 ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($data_tree as $item) {
            ?>
            <!-- Feature block -->
            <div class="feature-block-two col-lg-4">
                <div class="inner-box">
                    <div class="image"><img src="<?= $item->image ?>" alt="<?= $item->name ?>">
                        <div class="caption-title"><?= $item->name ?></div>
                        <div class="overlay-content">
                            <div class="overlay-inner">
                                <div class="icon"><span class="icon-trust"></span></div>
                                <div class="text"><?= $item->desc ?></div>
                                <div class="shape-icon">M</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
    <div class="clearfix"></div>
</section>
