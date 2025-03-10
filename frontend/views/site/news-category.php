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
        <div class="tieude_xs">
            <h1 class="title-post"><?php echo $categories->name ?></h1>
        </div>

        <div class="post-listing " id="loadMoreAjax">
            <?php 
         
            $dataFirst = array_shift($data);
            if (!empty( $dataFirst)) {
            ?>
            <article class="item-list item_1">
                <a href="<?php echo $dataFirst->getUrl()?>" title="<?php echo  $dataFirst->name ?>" class="full">
                    <img src="<?= $dataFirst->image ?>"></a>
                <h2><a href="<?php echo $dataFirst->getUrl()?>" title="<?php echo  $dataFirst->name ?>" class="post-title-article font20">
                <?php echo  $dataFirst->name ?></a> </h2>
                <p class="post-sapo">
                <?php echo  $dataFirst->name ?></p>
            </article>
            <?php
            }
            foreach ($data as $item) {
            ?>
            <article class="item-list item_2">
                <h3><a href="<?php echo $item->getUrl()?>" title="<?php echo  $item->name ?>" class="post-title-article">
                <?php echo  $item->name ?></a> </h3>
            <a href="<?php echo $item->getUrl()?>" title="<?php echo  $item->name ?>" class="thumb-news">
                    <img src="<?= $item->image ?>"></a>
               
                <p class="post-sapo">
                <?php echo  $item->name ?></p>
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
<?php // echo $this->render("//element/home/think-design-solution-smart"); ?>
<?php // echo $this->render("//element/home/review"); ?>
<?php // echo $this->render("//element/home/service"); ?>
<?php // echo $this->render("//element/home/template"); ?>
<?php // echo $this->render("//element/home/hotline"); ?>
<?php // echo $this->render("//element/home/ceo"); ?>
<?php // echo $this->render("//element/home/member"); ?>
<?php // echo $this->render("//element/home/news"); ?>
<?php // echo $this->render("//element/home/contact"); ?>
