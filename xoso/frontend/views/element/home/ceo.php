<?php

use frontend\models\Banner;
use frontend\models\ConfigPage;
use frontend\models\TemplateCategory;
use frontend\models\Template;
?>
<section class="ceo__home w100 ">
    <div class="w1000">
        <div class="wrapper-content">
            <div class="col-left">
                <?php
                $banner = Banner::getDataByCustomSetting('banner_ceo');

                if (!empty($banner->images)) {
                ?>
                <div class="wrapper-avatar">
                    <img src="<?php echo $banner->images->image ?>" class="w100">
                </div>
                <div class="wrapper-name">
                    <?php echo $banner->images->name ?>
                </div>
                <div class="wrapper-desc">
                    <?php echo $banner->images->desc ?>
                </div>
                <div class="content w100 text-center">
                    <?php echo $banner->images->content ?>
                </div>
                    <ul>
                        <li>
                            <i class="fas fa-phone-volume"></i> <?= $this->params['company']->phone ?>
                        </li>
                        <li>
                            <i class="fad fa-envelope"></i> <?= $this->params['company']->email ?>
                        </li>
                    </ul>

                    <ul class="list-social">
                        <li>
                            <a href="<?= $this->params['company']->facebook ?>" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->params['company']->youtube ?>" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
            <div class="col-right">

            </div>
        </div>
    </div>
</section>