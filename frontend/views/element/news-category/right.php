<?php
use frontend\models\ConfigPage;
use frontend\models\News;

$modelNews = new News();
$urlAllNews = $modelNews->getUrlAll();
?>
<div class="col-lg-4 col-md-4 col-sm-12">
    <div class="sidebar pl-lg-30 mb-30">
        <div id="search-2" class="mrside abc sidebar blog-sidebar widget sidebar-widget widget_search ">
            <div class="widget-content">
                <div class="sidebar-widget search-box">
                    <form action="<?= $urlAllNews ?>" method="get">
                        <div class="form-group">
                            <input type="search" name="keyword" placeholder="Tìm kiếm">
                            <button type="submit"><span class="icon fa fa-search"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="zuberia_recentnews1-2"
             class="mrside abc sidebar blog-sidebar widget sidebar-widget widget_zuberia_recentnews1 ">
            <div class="widget-content">
                <!-- Popular Posts -->
                <div class="sidebar-widget popular-posts-widget">
                    <div class="sidebar-title"><h4>Tin liên quan</h4></div>
                    <!-- Title -->
                    <?php use frontend\models\Banner;
                    use frontend\models\NewsCategory;

                    foreach ($newsHot as $item) { ?>
                        <?= $this->render("//element/news-category/item-hot", ['data' => $item]); ?>
                    <?php } ?>
                </div>


            </div>
        </div>
        <div id="categories-2" class="mrside abc sidebar blog-sidebar widget sidebar-widget widget_categories ">
            <div class="widget-content">
                <div class="sidebar-title"><h4>Danh mục</h4></div>
                <ul>
                    <?php
                    $newsCategory = NewsCategory::find()->where(['active' => 1,'parent_id' => 0])->all();
                    foreach ($newsCategory as $item) {
                    ?>
                    <li class="cat-item cat-item-68">
                        <a href="<?= $item->getUrl() ?>"><?= $item->name ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div id="text-5" class="mrside abc sidebar blog-sidebar widget sidebar-widget widget_text ">
            <div class="widget-content">
                <div class="textwidget">
                    <div class="sidebar-widget instagram-widget">
                        <div class="sidebar-title">
                            <h4>Instagram Feed</h4>
                        </div>
                        <div class="instagram-wrapper">
                            <?php
                            $banner = Banner::getDataByCustomSetting('list_instagram_feed');
                            foreach ($banner->images as $item) {
                            ?>
                            <div class="image">
                                <img src="<?= $item->image ?>"
                                     alt="<?= $item->name ?>">
                                <div class="overlay-link">
                                    <ul>
                                        <li><span class="fas fa-heart"></span>1k</li>
                                        <li><span class="fas fa-comment-dots"></span>84</li>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tag_cloud-2" class="mrside abc sidebar blog-sidebar widget sidebar-widget widget_tag_cloud ">
            <div class="widget-content">
                <div class="sidebar-title"><h4>Tags</h4></div>
                <div class="tagcloud">
                    <?php
                    $configPage = ConfigPage::find()->where(['type' => ConfigPage::TYPE_NEWS])->one();
                    $tags = $configPage->getTags();
                    foreach ($tags as $item) {
                    ?>
                    <a href="<?= $urlAllNews ?>?keyword=<?= $item ?>"
                                         class="tag-cloud-link tag-link-34 tag-link-position-1"
                                         style="font-size: 15.549019607843pt;"
                                         aria-label="<?= $item ?>"><?= $item ?></a>
                    <?php } ?>
                 </div>
            </div>
        </div>
        <div id="text-6" class="mrside abc sidebar blog-sidebar widget sidebar-widget widget_text ">
            <div class="widget-content">
                <div class="textwidget">
                    <div class="sidebar-widget newsletter-widget">
                        <div class="sidebar-title">
                            <h4>Newsletter</h4>
                        </div>
                        <div class="inner-content">
                            <div class="wrapper-box">
                                <div class="icon"><span class="icon-news"></span></div>
                                <h5>Subscribe & Get News <br>Latest Updates.</h5>
                            </div>
                            <form action="#">
                                <input type="email" placeholder="Email Address...">
                                <button class="theme-btn btn-style-one">Get Updates</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="text-7" class="mrside abc sidebar blog-sidebar widget sidebar-widget widget_text ">
            <div class="widget-content">
                <div class="textwidget">
                    <div class="sidebar-widget social-icon-widget">
                        <ul>
                            <li><a href="#" class="facebook"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fab fa-twitter-square" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#" class="googleplus"><i class="fab fa-google-plus-square "
                                                                  aria-hidden="true"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="skype"><i class="fab fa-skype" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="youtube"><i class="fab fa-youtube-square" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>