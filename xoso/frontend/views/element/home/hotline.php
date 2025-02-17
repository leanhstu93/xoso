<?php

use frontend\models\ConfigPage;
use frontend\models\TemplateCategory;
use frontend\models\Template;
?>
<section class="hotline__home w100 ">
    <div class="w1000">
        <ul>
            <li class="wrapper-icon">
                <i class="fas fa-phone-volume"></i>
            </li>
            <li class="phone">
                <a href="tel:<?= $this->params['company']->phone ?>" class="">
                    <?= $this->params['company']->phone ?>
                </a>
            </li>
            <li class="text">
                Có một dự án cho chúng tôi? Gọi ngay!
            </li>
        </ul>
    </div>
</section>