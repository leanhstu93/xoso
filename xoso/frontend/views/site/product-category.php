<?php

use frontend\models\Banner;
use yii\widgets\LinkPager;
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
    $page_title = 'Sản phẩm';
    $page_des = '';
    $category_id =0;
}

echo $this->render("//element/page-title",['name' => $page_title, 'bread' => $bread]);
$banner_top = Banner::getDataByCustomSetting('one_banner_top_service');

?>
<div class="banner-top-product-category w100">
    <div class="container">
        <img width="100%" src="<?= $banner_top->images->image ?>" />
    </div>
</div>
<!-- Services Single -->
<div class="single-service sp-two">
    <div class="container">
        <div class="row flex-lg-row-reverse">

            <!--Content Column-->
            <div class="content-column col-lg-8 col-xl-9">
                <div class="inner-column">
                    <div class="top-content">
                        <h4> Hdesign thiết kế chuyên nghiệp - Digital Marketing </h4>
                        <h2><?php echo$page_title ?></h2>
                        <div class="text">
                            <?= $page_des ?>
                        </div>
                    </div>

                    <!--What We do -->
                    <div class="what-we-do">
                        <div class="row">
                            <?php
                            foreach ($data as $item) {
                                ?>
                                <?php echo $this->render("//element/product-category/item",['data' => $item,]); ?>
                            <?php } ?>
                        </div>
                        <?php
                        echo LinkPager::widget([
                            'pagination' => $pages,
                        ]);
                        ?>
                    </div>

                </div>
            </div>

            <!--Content Column-->
            <?php echo $this->render("//element/product-category/left",['data' => $categoryChild]); ?>

        </div>
    </div>
</div>

<?php echo $this->render("//element/news-letter-home"); ?>
