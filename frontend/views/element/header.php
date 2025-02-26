<?php

use frontend\models\Banner;
use yii\bootstrap\Modal;
?>

<section class="w100 section__header-top aa">
    
    <div class="w1000">
        <div class="wrapper-col">
            <div class="col-left">
            <a href="<?php echo Yii::$app->homeUrl ?>" title="<?=  $this->params['company']->name ?>">
                    <img src="<?=  $this->params['company']->logo ?>"/>
                </a>
            </div>
            <div class="col-right">
            Hôm nay: Ngày <?php echo date('d-m-Y'); ?>
            </div>
        </div>
    </div>
    <a href="#menumobile" class="css_btn-menumobile"><span></span></a>
</section>
<section class="section_header w100">
    <div class="w1000">
        <div class="wrapper_col">
            <div class="column">
                <?php echo $this->render("//element/menu"); ?>
            </div>
        </div>
    </div>
</section>


