<?php
use frontend\models\Banner;

$data  = Banner::getDataByCustomSetting('list_customer');

?>

<section class=" testimonial-section-three sp-one">
    <div class="container">
        <div class="sec-title centered">
            <div class="title-section"><?= $data->category->name ?></div>
            <div class="text"><?= $data->category->desc ?></div>
        </div>
        <div class="testimonial-carousel-two owl-carousel owl-theme owl-nav-none owl-dots-none">
            <?php
            foreach ($data->images as $slide) {
                $slide->setTranslate();
            ?>
            <div class="testimonial-block-three">
                <div class="inner-box">
                    <div class="text"><?= $slide->desc ?></div>
                    <div class="author">
                        <h4><?= $slide->name ?></h4>
                        <div class="designation"></div>
                        <div class="image">
                            <img width="80" height="80" src="<?= $slide->image ?>"
                                 class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                 alt=""/>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</section>
