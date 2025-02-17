<?php

use frontend\models\News;
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
    $page_title = 'Tin tức';
    $page_des = '';
    $category_id =0;
}
echo $this->render("//element/breadcrumb",['name' => 'Liên hệ', 'data' => $bread]);
?>
<section class="page__news-category w100">
    <div class="w1000">
        <div class="list-news w100">
            <?php
            foreach ($data as $item) {
            ?>
                <div class="item">
                    <div class="wrapper-image">
                        <img src="<?php echo $item->image ?>" class="w100">
                    </div>
                    <div class="wrapper-info w100">
                        <h3 class="ele-entry-title">
                            <?php echo $item->name ?>
                        </h3>
                        <div class="date w100">
                            <?php echo $item->getCreateTimeToString() ?>
                        </div>
                        <div class="wrapper-desc w100">
                            <?php echo $item->getDescriptionCut(350) ?>
                        </div>
                        <div class="btn-read">
                            Chi tiết
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
