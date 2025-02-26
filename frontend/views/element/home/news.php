<?php

use frontend\models\Banner;
use frontend\models\ConfigPage;
use frontend\models\News;
use frontend\models\TemplateCategory;
use frontend\models\Template;
?>
<section class="news__home w100 ">
    <div class="w1000">
        <div class="title-section-home">
            Tin tức & Kiến thức
        </div>
        <div class="title-section-large">
            Tin tức và sự kiện mới nhất
        </div>
        <div class="title-section-desc text-center">
            Nơi mà bạn cập nhật những thông tin và kiến thức mà Think Designer mang lại cho  bạn,
            ngoài những dịch vụ mà chúng tôi mang cung cấp. Think Designer – Giải pháp tiếp thị thông minh.
        </div>
        <div class="wrapper-content w100">
            <?php

            $data = News::find()
                ->where(['option' => News::OPTION_HOT, 'active' => 1])
                ->limit(5)
                ->orderBy(News::ORDER_BY)->all();
            ?>
            <div class="js__slide-news css__block-news">
                <div class="swiper-wrapper">
                <?php
                foreach ($data as $item) {
                    echo $this->render("//element/news-category/item", ['data' => $item]);
                }
                ?>
                </div>
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>