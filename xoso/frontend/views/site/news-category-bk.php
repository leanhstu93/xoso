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

?>
<div class="w1000">
    <div class="content content-page page-category w100">
        <div class="page-left">
            <?php
            $item = array_shift($data);

            if (!empty($item)) {
                ?>
                <div class="block-top w100">
                    <div class="block-top-left">
                        <div class="wrapper-title-category">
                            <div class="title-category">
                                <?php echo $page_title ?>
                            </div>
                        </div>
                        <div class="block-top-left-top w100">
                            <div class="wrapper-image">
                                <img src="<?php echo $item->image ?>" class="w100">
                            </div>
                            <div class="wrapper-info">
                                <div class="title">
                                    <a href="<?php echo $item->getUrl() ?>">
                                        <?php echo $item->name ?>
                                    </a>
                                </div>
                                <div class="wrapper-time">
                                    <?php echo  date('d/m/Y H:i:s',$item-> date_update)  ?>
                                </div>
                                <div class="wrapper-desc w100">
                                    <?php echo $item->getDescriptionCut(150) ?>
                                </div>
                            </div>
                        </div>
                        <div class="block-top-left-bottom w100">
                            <?php
                            $item = array_shift($data);
                            if (!empty($item)) {
                                ?>
                                <div class="item">
                                    <div class="wrapper-item-image w100">
                                        <img src="<?php echo $item->image ?>" class="w100">
                                    </div>
                                    <div class="wrapper-time">
                                        <?php echo  date('d/m/Y H:i:s',$item-> date_update)  ?>
                                    </div>
                                    <div class="wrapper-title w100">
                                        <?php echo $item->name ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php
                            $item = array_shift($data);
                            if (!empty($item)) {
                                ?>
                                <div class="item">
                                    <div class="wrapper-item-image w100">
                                        <img src="<?php echo $item->image ?>" class="w100">
                                    </div>
                                    <div class="wrapper-time">
                                        <?php echo  date('d/m/Y H:i:s',$item-> date_update)  ?>
                                    </div>
                                    <div class="wrapper-title w100">
                                        <?php echo $item->name ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="block-top-right">
                        <div class="wrapper-title-category">
                            <div class="title-category">
                                <?php echo Yii::$app->view->params['lang']->read_a_lot ?>
                            </div>
                        </div>
                        <div class="wrapper-list-a-lost">
                            <ul class="js__scroll_read_multi">
                                <?php
                                $time = strtotime("-10 day");

                                $dataQuery = 'category_id = '.$category_id.'  and date_update > '.$time;
                                $dataHot = News::find()->where($dataQuery)->andWhere(['active' => 1])
                                    ->limit(10)
                                    ->orderBy('date_update DESC')->all();
                                foreach ($dataHot as $item) {
                                    ?>
                                    <li>
                                        <a href="<?php echo $item->getUrl()?>">
                                            <?php echo $item->name?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="border_bottom w100"></div>
            <div class="list-item-news w100">
                <?php
                foreach ($data as $item) {
                    ?>
                    <div class="item">
                        <div class="wrapper-title w100">
                            <a href="<?php echo $item->getUrl() ?>">
                                <?php echo $item->name ?>
                            </a>
                        </div>
                        <div class="wrapper-item-image">
                            <img src="<?php echo $item->image ?>" class="w100">
                        </div>
                        <div class="wrapper-info">
                            <div class="date w100">
                                <?php echo $item->getCreateTimeToString() ?>
                            </div>
                            <div class="wrapper-desc w100">
                                <?php echo $item->getDescriptionCut(350) ?>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>

            <div class="theme_pagination">
                <?php
                echo LinkPager::widget([
                    'pagination' => $pages,
                ]);
                ?>
            </div>
        </div>
        <?php  echo $this->render("//element/sidebar"); ?>
    </div>
</div>
