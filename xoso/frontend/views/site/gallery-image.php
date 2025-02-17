<?php

use frontend\models\Product;
use yii\widgets\LinkPager;

/**
 * @var $categories
 * @var $page
 * @var $bread
 * @var $pages
 */


echo $this->render("//element/page-title",['name' => $page->name, 'bread' => $bread]);

$product = Product::findOne(40);
// Get component of the cart
//$cart = \Yii::$app->cart;
//// Add an item to the cart
//$cart->add($product, 2);
//debug($cart->getItems());
//debug($cart);
?>
<section data-kc-fullwidth="content" class="kc-elm kc-css-331200 kc_row">
    <div class="kc-row-container">
        <div class="kc-wrap-columns">
            <div class="kc-elm kc-css-786379 kc_col-sm-12 kc_column kc_col-sm-12">
                <div class="kc-col-container">

                    <section class="sm portfolio-section-two sp-one">
                        <div class="container">
                            <!-- Big Title -->

                            <div class="welcome-title">
                                <h3>
                                    <?php echo $page->desc ?>
                                </h3>
                            </div>

                            <div class="row">

                                <?php foreach ($data as $item) { ?>
                                    <?php echo $this->render("//element/project/item",['data' => $item,]); ?>
                                <?php } ?>

                            </div>
                            <?php
                            echo LinkPager::widget([
                                'pagination' => $pages,
                            ]);
                            ?>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->render("//element/news-letter-home"); ?>
