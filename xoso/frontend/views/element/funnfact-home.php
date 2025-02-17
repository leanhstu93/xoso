<?php
use frontend\models\Banner;
use frontend\models\ConfigPage;

?>

<!-- Funnfact section -->
<?php
$banner = Banner::getDataByCustomSetting('background_middle_one');
?>
<section class="funfact-section sp-two" style="background-image:url('<?= $banner->images->image ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 fact-counter">
                <div class="sec-title light">
                    <a href="#" class="theme-btn">Về chúng tôi</a>
                    <div class="title-section"><?= $banner->images->name ?></div>
                    <div class="text"><?= $banner->images->desc ?></div>
                </div>
                <div class="outer-box">
                    <div class="row counter-area">

                        <!--Column-->
                        <article class="column counter-column col-lg-4">
                            <div class="item">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="2000" data-stop="9">0</span>
                                        <p>Năm cho <br>sự chuẩn bị</p>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <!--Column-->
                        <article class="column counter-column col-lg-4">
                            <div class="item">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="2000" data-stop="1001">0</span>
                                        <p>khách hàng <br>Hài Lòng</p>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <!--Column-->
                        <article class="column counter-column col-lg-4">
                            <div class="item">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="2000" data-stop="999">0</span>
                                        <p>Dự Án <br>Hoàn Thành</p>
                                    </div>
                                </div>
                            </div>
                        </article>

                    </div>
                    <div class="link-btn">
                        <?php
                        $myProduct = new \frontend\models\Product();
                        ?>
                        <a href="<?= $myProduct->getUrlAll() ?>" class="theme-btn btn-style-one">Dự án đã thực hiện</a>
                        <a href="<?= $banner->images->link ?>" class="theme-btn btn-style-seven">Nhận Tư Vấn Miễn Phí</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>