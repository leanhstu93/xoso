<?php
use yii\widgets\LinkPager;
/**
 * @var $categories
 * @var $pages
 * @var $bread
 * @var $dataRL
 */
echo $this->render("//element/page-title",['name' => $data->name, 'bread' => $bread]);

?>

<!--Start shop area-->
<section id="shop-area" class="single-shop-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="shop-content">
                    <!--Start single shop content-->
                    <div class="single-shop-content">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="img-holder">
                                    <div class="swiper-container gallery-top js__slider-top">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="<?= $data->image ?>" alt="<?=  $data->name ?>">
                                            </div>
                                            <?php
                                            foreach ($dataImages as $item) { ?>
                                                <div class="swiper-slide">
                                                    <img src="<?= $item->image ?>" alt="<?=  $data->name ?>">
                                                </div>
                                         <?php   }                                           ?>
                                        </div>
                                    </div>
                                    <div class="swiper-container gallery-thumbs js__gallery-thumbs">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="<?= $data->image ?>" alt="<?=  $data->name ?>">
                                            </div>
                                            <?php
                                            foreach ($dataImages as $item) { ?>
                                                <div class="swiper-slide">
                                                    <img src="<?= $item->image ?>" alt="<?=  $data->name ?>">
                                                </div>
                                            <?php   }                                           ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="content-box">
                                    <span class="price"><?= $data->getPriceFormat() ?> đ</span>
                                    <h3><?= $data->name ?></h3>
                                    <div class="review-box">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="text">
                                        <?= $data->desc ?>
                                    </div>

                                    <div class="addto-cart-box">
                                        <form action="/site/add-cart" method="get">
                                        <input class="quantity-spinner" type="text" value="1" name="quantity">
                                            <input name="product_id" value="<?= $data->id ?>">
                                            <input name="action" value="add" type="hidden">
                                            <button class="btn-one thm-bg-clr addtocart" type="submit">
                                                Thêm vào giỏ hàng
                                            </button>
                                        </form>
                                    </div>
                                    <div class="share-products">
                                        <h5>Chia sẻ ngay</h5>
                                        <ul class="sociallinks-style-two fix">
                                            <li><a href="#"><i class="fab fa-facebook-square fb" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter-square tw" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fab fa-google-plus-square pin" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin lin" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single shop content-->
                    <!--Start product tab box-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-tab-box tabs-box">
                                <ul class="tab-btns tab-buttons clearfix">
                                    <li data-tab="#desc" class="tab-btn"><span>Mô tả</span></li>
                                    <li data-tab="#review" class="tab-btn active-btn"><span>Đánh giá (2)</span></li>
                                </ul>
                                <div class="tabs-content">
                                    <div class="tab" id="desc">
                                        <div class="product-details-content">
                                            <div class="desc-content-box">
                                                <?= $data->content ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab active-tab" id="review">
                                        <div class="review-box-holder">
                                            <div class="row">
                                                <!--Start single review box-->
                                                <div class="col-xl-6">
                                                    <div class="single-review-box">
                                                        <div class="icon-holder">
                                                            <span class="icon-user-1"></span>
                                                        </div>
                                                        <div class="text-holder">
                                                            <div class="top">
                                                                <div class="name">
                                                                    <h3>Steven Rich <span>– September 17, 2019:</span></h3>
                                                                </div>
                                                                <div class="review-box">
                                                                    <ul>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star-half-alt"></i></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <p>Value for money , I use it from long time and it is very useful and good product.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End single review box-->
                                                <!--Start single review box-->
                                                <div class="col-xl-6">
                                                    <div class="single-review-box">
                                                        <div class="icon-holder">
                                                            <span class="icon-user-1"></span>
                                                        </div>
                                                        <div class="text-holder">
                                                            <div class="top">
                                                                <div class="name">
                                                                    <h3>William Cobus <span>– September 17, 2019:</span></h3>
                                                                </div>
                                                                <div class="review-box">
                                                                    <ul>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <p>We denounce with righteous indignation and dislike men who are so beguiled & demoralized.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End single review box-->
                                            </div>
                                        </div>
                                        <div class="review-form">
                                            <div class="title">
                                                <h3>Add Your Review</h3>
                                                <span>Your email address will not be published. Required fields are marked *</span>
                                            </div>

                                            <form id="review-form" action="#">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="field-label">
                                                            <p>Name<span>*</span></p>
                                                            <input type="text" name="fname" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="field-label">
                                                            <p>Email<span>*</span></p>
                                                            <input type="email" name="email" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="add-rating-box">
                                                            <div class="add-rating-title">
                                                                <h4>Your Rating</h4>
                                                            </div>
                                                            <div class="review-box">
                                                                <ul>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="field-label">
                                                            <p>Your Comments<span>*</span></p>
                                                            <textarea name="review" required=""></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button class="theme-btn btn-style-one" type="submit">Submit Now<span class="icon-thin-right-arrow"></span></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End product tab box-->
                    <!--Start related product box-->
                    <div class="related-product">
                        <div class="title">
                            <h3>Related Products</h3>
                        </div>
                        <div class="row">
                            <?php
                            foreach ($dataRL as $item) {
                                ?>
                                <?php echo $this->render("//element/product-category/item",['data' => $item,]); ?>
                            <?php } ?>

                        </div>
                    </div>
                    <!--End related product box-->
                </div>
            </div>

        </div>
    </div>
</section>
<!--End shop area-->


<?php echo $this->render("//element/news-letter-home"); ?>

