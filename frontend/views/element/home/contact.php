<?php

use frontend\models\Banner;
use frontend\models\ConfigPage;
use frontend\models\News;
use frontend\models\TemplateCategory;
use frontend\models\Template;
?>
<section class="contact__home w100 ">
    <div class="w1000">
        <div class="wrapper-content w100">
            <div class="col-left">
                <div class="title-section-home">
                    THÀNH VIÊN THINK DESIGNER
                </div>
                <ul class="list-info">
                    <li>
                        <div class="wrapper-icon">
                            <i class="fal fa-map-marker-alt"></i>
                        </div>
                        <div class="info">
                            <div class="info-main">
                                <?= $this->params['company']->address ?>
                            </div>
                            <div class="info-sub">
                                Địa chỉ hoạt động:
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="wrapper-icon">
                            <i class="fal fa-envelope"></i>
                        </div>
                        <div class="info">
                            <div class="info-main">
                                <?= $this->params['company']->email ?>
                            </div>
                            <div class="info-sub">
                                Hãy gửi lại lời nhắn qua Email:
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="wrapper-icon">
                            <i class="fal fa-phone"></i>
                        </div>
                        <div class="info">
                            <div class="info-main">
                                <?= $this->params['company']->phone ?>
                            </div>
                            <div class="info-sub">
                                Hotline 24/7
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="wrapper-icon">
                            <i class="fal fa-clock"></i>
                        </div>
                        <div class="info">
                            <div class="info-main">
                                Thứ hai - thứ sáu: 8:30AM - 5:30PM

                            </div>
                            <div class="info-sub">
                                Thời gian làm việc tại Think Designer
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-right">

            </div>
        </div>
    </div>
</section>