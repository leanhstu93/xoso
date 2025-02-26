<?php
use yii\widgets\LinkPager;
use frontend\models\Product;

/**
 * @var $categories
 * @var $pages
 * @var $bread
 */

//echo $this->render("//element/page-title",['name' => $data->name, 'bread' => $bread]);
?>
<div class="w1000">
    <div class="content content-page page-video w100">
        <div class="page-left">

            <div class="w100 wrapper-video">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo \common\components\MyHelpers::getYoutubeIdFromUrl($data->source) ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            </div>
            <div class="title-detail w100">
                <?php echo $data->name ?>
            </div>
            <div class="breadcrumb w100">
                <ul>
                    <li>
                        <?php echo date('d-m-Y H:i') ?>
                    </li>
                </ul>
            </div>
            <div class="text-description">
                <?php echo $data->desc ?>
            </div>

            <div class="w100 wrapper-social-bottom">
                <div class="fb-like" data-href="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
            </div>
            <div class="wrapper-tags w100">
                <div class="tags-left">
                    <i class="fas fa-tags"></i> Tags
                </div>
                <div class="tags-right">
                    <ul>
                        <?php echo $data->tags ?>
                    </ul>
                </div>
            </div>
            <?php  echo $this->render("//element/comment"); ?>
            <div class="w100 border_bottom">
            </div>
            <div class="wrapper-news-relates w100">
                <div class="block-title w100">
                    <i class="gachccm"></i>
                    <?php echo Yii::$app->view->params['lang']->video_relates ?>
                </div>
                <div class="block-content w100">
                    <?php
                    foreach ($dataRL as $item) {
                    ?>
                    <div class="item">
                        <a href="<?php echo $item->getUrl() ?>">
                            <div class="w100 wrapper-image">
                                <img src="<?php echo $item->image ?>" class="w100">
                            </div>
                            <div class="tittle w100">
                                <?php echo $item->name ?>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php  echo $this->render("//element/sidebar"); ?>
    </div>
</div>
