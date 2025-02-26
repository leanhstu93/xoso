<?php

use frontend\models\Banner;
use frontend\models\ConfigPage;
use frontend\models\TemplateCategory;
use frontend\models\Template;
?>
<section class="member__home w100 ">
    <div class="w1000">
        <div class="wrapper-title">
            THÀNH VIÊN THINK DESIGNER
        </div>
        <div class="title-section-large">
            Những người sáng tạo của Think Designer
        </div>
        <div class="title-section-desc text-center">
            <strong>Think – Designer</strong> là đơn vị thiết kế web chuyên nghiệp, uy tín chắc chắn sẽ không làm bạn thất vọng.
        </div>
        <div class="wrapper-slide-member w100">
            <div class="wrapper-content-slide js__slide-member">
                <div class="swiper-wrapper">
                    <?php
                    $banners = Banner::getDataByCustomSetting('banner_brand');
                    foreach ($banners->images as $banner) { ?>
                        <div class="item swiper-slide">
                            <div class="avatar">
                                <img src="<?php echo $banner->getImage() ?>" class="w100">
                            </div>
                            <div class="name">
                                <?php echo $banner->name ?>
                            </div>
                            <div class="desc">
                                <?php echo $banner->desc ?>
                            </div>
                            <div class="content">
                                <?php echo $banner->content ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

        </div>
    </div>
</section>