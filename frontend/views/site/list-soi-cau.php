<?php

use frontend\models\Banner;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\ConfigWebsite;
use common\components\MyHelpers;
use yii\widgets\LinkPager;
?>
<div class="content-left">
    <div class="box-content">

        <div class="post-listing ">
            <?php 
         
            $dataFirst = array_shift($data);
            if (!empty( $dataFirst)) {
            ?>
            <article class="item-list item_1">
                <a href="<?php echo $dataFirst->getUrl()?>" title="<?php echo  $dataFirst->title ?>" class="full">
                    <img src="/<?= $dataFirst->url_image ?>"></a>
                <h2><a href="<?php echo $dataFirst->getUrl()?>" title="<?php echo  $dataFirst->title ?>" class="post-title-article font20">
                <?php echo  $dataFirst->title ?></a> </h2>
                <p class="post-sapo">
                <?php echo  $dataFirst->title ?></p>
            </article>
            <?php
            }
            foreach ($data as $item) {
            ?>
            <article class="item-list item_2">
                <h3><a href="<?php echo $dataFirst->getUrl()?>" title="<?php echo  $dataFirst->title ?>" class="post-title-article">
                <?php echo  $dataFirst->title ?></a> </h3>
            <a href="<?php echo $dataFirst->getUrl()?>" title="<?php echo  $dataFirst->title ?>" class="thumb-news">
                    <img src="/<?= $dataFirst->url_image ?>"></a>
               
                <p class="post-sapo">
                <?php echo  $dataFirst->title ?></p>
            </article>   
            <?php } ?>                       
        </div>
        
        <div class="w100">
        <?php
        echo LinkPager::widget([
            'pagination' => $pages,
            'options' => ['class' => 'pagination justify-content-center'], // Class cho <ul>
            'linkOptions' => ['class' => 'page-link'], // Class cho <a>
            'disabledPageCssClass' => 'page-item disabled', // Class cho <li> bị disable
            'disabledListItemSubTagOptions' => [ 'class' => 'page-link'],
            'activePageCssClass' => 'page-item active', // Class cho trang hiện tại
        ]);
        ?>
        </div>
    </div>
</div>
<?php  echo $this->render("//element/sidebar-midle"); ?>
<?php  echo $this->render("//element/sidebar-right"); ?>

