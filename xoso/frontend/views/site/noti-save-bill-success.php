<?php
use yii\widgets\LinkPager;
use frontend\models\Product;

/**
 * @var $categories
 * @var $pages
 * @var $bread
 */

echo $this->render("//element/page-title",['name' => 'Thanh toán', 'bread' => $bread]);
$cart = Yii::$app->cart;
?>
<section class="cart-area">
    <div class="container">
        <?php
        if (Yii::$app->session->hasFlash('success')) {
        ?>
        <h1> <?= Yii::$app->session->getFlash('success') ?></h1>
        <?php } else {
            Yii::$app->response->redirect(['/']);
        } ?>
    </div>
</section>
