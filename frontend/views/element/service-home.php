<?php

use frontend\models\Banner;
use frontend\models\ConfigPage;
use frontend\models\ProductCategory;

$pageProduct = ConfigPage::find()->where(['id' => ConfigPage::TYPE_PRODUCT])->one();
//$productCategory = ProductCategory::find()->where(['active' => 1 ])->all();
?>
<!-- Services section -->
<section class="services-section-two sp-two grey-bg" style="background-image:url(<?= $pageProduct->getImageDecode() ?>)">
    <div class="container">
        <div class="sec-title centered">
            <a href="#" class="theme-btn"><?= $pageProduct->name ?></a>
            <div class="title-section"><?= $pageProduct->desc ?></div>
            <div class="text"><?= $pageProduct->content ?></div>
        </div>
        <div class="row">
            <?php
            $slides = Banner::getDataByCustomSetting('list_banner_service');
            foreach ($slides->images as $item) {
                $item->setTranslate();
                ?>
            <div class="service-block-two col-lg-4 col-md-6">
                <div class="inner-box">
                    <div class="icon"><img src="<?= $item->image ?>" alt=""></div>
                    <h4><?= $item->name ?></h4>
                    <div class="text"><?= $item->desc ?></div>
                    <div class="link-btn"><a href="<?= $item->link ?>"><span class="icon-arrow"></span></a></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
