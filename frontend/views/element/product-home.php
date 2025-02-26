<?php

use frontend\models\ConfigPage;
use frontend\models\GalleryImage;
$model = new GalleryImage();
$configGall =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_GALLERY_IMAGE])->one()->setTranslate();
?>

<!--Case Section-->
<section class="case-section">
    <div class="container">
        <div class="row m-0 justify-content-md-between align-items-center">
            <div class="sec-title">
                <a href="#" class="theme-btn"><?= $configGall->name ?></a>
                <div class="title-section"><?= $configGall->desc ?></div>
            </div>
            <div class="link-btn ml-15 mb-30"><a href="<?= $model->getUrlAll() ?>" class="theme-btn btn-style-eleven">
                    <?= Yii::$app->view->params['lang']->see_more_projects ?>
                </a></div>
        </div>

        <div class="outer-container">

            <!--Case Tabs-->
            <div class="cases-tab">

                <div class="tab-btns-box">
                    <!--Tabs Header-->
                    <div class="tabs-header">
                        <ul class="cases-tab-btns clearfix">
                            <li class="p-tab-btn active-btn" data-tab="#p-tab-all"> <?= Yii::$app->view->params['lang']->all ?>  </li>
                        </ul>
                    </div>
                </div>

                <!--Tabs Content-->
                <div class="p-tabs-content">
                    <!--Portfolio Tab / Active Tab-->
                    <div class="p-tab active-tab" id="p-tab-all">
                        <div class="cases-carousel owl-theme owl-carousel">
                            <?php
                            $data = GalleryImage::find()->where(['active' => 1])->all();
                            foreach ($data as $item) {
                            ?>
                            <!--Case Block-->
                            <div class="case-block">
                                <a href="<?= $item->getUrl() ?>">
                                <div class="inner-box">
                                    <div class="image">
                                        <img src="<?= $item->image ?>" alt="" />
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <div class="category-title"><?= $item->name ?></div>
                                                <h2><?= $item->desc ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <?php } ?>


                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!--End Case section-->
