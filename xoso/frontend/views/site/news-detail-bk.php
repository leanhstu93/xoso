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
    <div class="content page-home" id="streamItem">
    </div>
</div>
<div class="blog-page-container sp-two">
    <div class="container">
        <div class="row clearfix">
            <!-- sidebar area -->
            <!-- Main area -->
            <div class="wp-style blog-single-post content-side  col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                <!--Blog Detail-->
                <div class="single_post">

                    <div class="inner-box">
                        <div class="lower-content">
                            <div class="image">
                                <img width="1170" height="550"
                                     src="<?= $data->image ?>"
                                     class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""/>
                                <div class="date"><?= date('d',$data->date_update) ?> <br>T<?= date('n',$data->date_update) ?></div>
                            </div>

                            <div class="post_meta">
                                <ul class="post-info">
                                    <?php
                                    if (!empty($data->getCategory())) {
                                    ?>
                                    <li class="category">
                                        <ul class="post-categories">
                                            <li>
                                                <a href="<?= $data->getCategory()->getUrl() ?>" rel=" <?= $data->getCategory()->name ?>">
                                                    <?= $data->getCategory()->name ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php } ?>
                                    <li class="author">
                                        <a href="javascript:;">
                                            <span class="icon-user"></span> <?= $data->getUser()->username ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <h3><?= $data->name ?></h3>
                            <div class="text-box text">
                                <?= $data->content ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Content Side-->
            <!-- sidebar area -->
            <?=  $this->render("//element/news-category/right", ['newsHot' => $dataRL]); ?>
            <!--Sidebar-->
        </div>
    </div>
</div>
<?php echo $this->render("//element/news-letter-home"); ?>
