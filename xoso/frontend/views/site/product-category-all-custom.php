<?php

use frontend\models\Product;

/**
 * @var $categories
 * @var $pages
 * @var $bread
 */
if (!empty($categories)) {
    $page_title = $categories->name;
    $page_des = $categories->desc;
    $category_id = $categories->id;
} else {
    $page_title = 'Dịch vụ';
    $page_des = '';
    $category_id =0;
}

echo $this->render("//element/page-title",['name' => $page_title, 'bread' => $bread]);
$product = Product::findOne(40);

?>
<section class="kc-elm kc-css-356837 kc_row">
    <div class="kc-row-container  kc-container">
        <div class="kc-wrap-columns">
            <div class="kc-elm kc-css-80485 kc_col-sm-12 kc_column kc_col-sm-12">
                <div class="kc-col-container">
                    <section class=" services-section sp-two style-two">
                        <div class="container">
                            <div class="row">
                                <?php
                                foreach ($data as $item) {
                                    $url = !empty($item->link_extend) ? $item->link_extend: $item->getUrl();

                                ?>
                                <div class="service-block col-md-4">
                                    <div class="inner-box">
                                        <div class="top-content">
                                            <h4><a href="<?= $url ?>"><?= $item->name ?></a></h4>
                                            <div class="image">
                                                <img width="370" height="175"
                                                     src="<?= $item->image ?>"
                                                     class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                                     alt="<?= $item->name ?>"/></div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="text"><?= $item->desc ?>
                                            </div>
                                            <div class="link-btn"><a href="<?= $url ?>"><span class="icon-arrow"></span></a></div>
                                        </div>
                                    </div>
                                </div>

                                <?php } ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
<section data-kc-fullwidth="content" class="kc-elm kc-css-474260 kc_row">
    <div class="kc-row-container">
        <div class="kc-wrap-columns">
            <div class="kc-elm kc-css-517297 kc_col-sm-12 kc_column kc_col-sm-12">
                <div class="kc-col-container">
                    <section class=" why-chooseus-section sp-two grey-bg">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="sec-title">
                                        <a href="#" class="theme-btn">HDESIGN</a>
                                        <div class="title-section">Quy trình<br> thực hiện tại Hdesign</div>
                                        <div class="text">Là một thương hiệu của sáng tạo <br> và giải pháp trực tuyến tiền phong trong lĩnh vực
                                        </div>
                                    </div>
                                    <ul class="list-style-one">
                                        <li>Sáng tạo thương hiệu ấn tượng</li>


                                        <li>Xây dựng chiến lược dài hạn</li>


                                        <li>Giải pháp marketing online</li>

                                    </ul>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">


                                        <div class="why-choose-block col-md-6">
                                            <div class="inner-box hvr-float-shadow">
                                                <div class="icon"><span class="icon-patent"></span></div>
                                                <h4>Tư vấn giải pháp<br>thiết kế</h4>
                                                <div class="shape-icon"><img
                                                            src="/images/s1.png"
                                                            alt="Image"></div>
                                            </div>
                                        </div>


                                        <div class="why-choose-block col-md-6">
                                            <div class="inner-box hvr-float-shadow">
                                                <div class="icon"><span class="icon-brain"></span></div>
                                                <h4>Tổng hợp biên tập <br>nội dung</h4>
                                                <div class="shape-icon"><img
                                                            src="/images/s2.png"
                                                            alt="Image"></div>
                                            </div>
                                        </div>


                                        <div class="why-choose-block col-md-6">
                                            <div class="inner-box hvr-float-shadow">
                                                <div class="icon"><span class="icon-team"></span></div>
                                                <h4>Lên thiết kế</h4>
                                                <div class="shape-icon"><img
                                                            src="/images/s3.png"
                                                            alt="Image"></div>
                                            </div>
                                        </div>


                                        <div class="why-choose-block col-md-6">
                                            <div class="inner-box hvr-float-shadow">
                                                <div class="icon"><span class="icon-passion"></span></div>
                                                <h4>Gửi mẫu  - chỉnh sữa <br> hoàn thiện</h4>
                                                <div class="shape-icon"><img
                                                            src="/images/s4.png"
                                                            alt="Image"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->render("//element/customer"); ?>

<?php echo $this->render("//element/news-letter-home"); ?>
