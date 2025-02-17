<?php use frontend\models\Banner;
?>
<section class="review-home w100">
    <div class="w1000">
        <div class="wrapper-content">
            <div class="col-left">
            </div>
            <div class="col-right">
                <div class="title-section-home">
                    KHÁCH HÀNG THINK DESIGNER
                </div>
                <div class="wrapper-slider-review js__slider-review w100">
                    <div class="swiper-wrapper">
                    <?php
                    $banners = Banner::getDataByCustomSetting('banner_review');
                    foreach ($banners->images as $banner) { ?>
                        <div class="item swiper-slide">
                            <div class="wrapper-image center">
                                <img src="<?php echo $banner->image ?>">
                            </div>
                            <div class="title w100">
                                <?php echo $banner->name ?>
                            </div>
                            <div class="fullname w100">
                                <?php echo $banner->getDescriptionCut(50) ?>
                            </div>
                            <div class="content w100">
                                <?php echo $banner->getContentCut(410) ?>
                            </div>
                        </div>
                    <?php }
                    ?>
                    </div>

                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
                <!-- start brand -->
                <div class="wrapper-brand">
                    <?php
                    $banners = Banner::getDataByCustomSetting('banner_brand');
                    foreach ($banners->images as $banner) { ?>
                    <div class="item ">
                        <a href="<?php echo $banner->link ?>">
                            <img src="<?php echo $banner->image ?>">
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
