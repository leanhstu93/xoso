<?php use frontend\models\ConfigPage;
use frontend\models\SinglePage; ?>
<section class="section__design-website-pro w100">
    <div class="w1000">
        <div class="wrapper-title">
            THINK DESIGNER THIẾT KẾ WEBSITE CHUYÊN NGHIỆP
        </div>
        <?php
        $oneFooter = SinglePage::getDataByCustomSetting('one_about_home');
        if($oneFooter) {
        ?>
        <div class="wrapper-content">
            <div class="item">
                <a href="<?php echo $oneFooter->desc ?>" data-fancybox="gallery">
                    <img src="<?php echo $oneFooter->image ?>" class="w100">
                </a>
            </div>
            <div class="item">
                <h3 class="name">
                    <?php echo $oneFooter->name ?>
                </h3>
                <div class="text-content">
                    <?php echo $oneFooter->content ?>
                </div>
                <div class="wrapper-button">
                    <?php
                    $model =  ConfigPage::find()->where(['id' => ConfigPage::TYPE_PRODUCT])->one();

                    ?>
                    <a class="btn  btn-outline-primary" href="<?php echo $model->getUrl() ?>">
                        Kho giao diện
                    </a>
                    <a class="btn  btn-outline-primary" href="<?php echo $model->getUrl() ?>">
                        Cửa hàng thiết kế
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
