<?php
use yii\widgets\LinkPager;
use frontend\models\Product;

/**
 * @var $categories
 * @var $pages
 * @var $bread
 */

echo $this->render("//element/page-title",['name' => 'Giỏ hàng', 'bread' => $bread]);
$cart = Yii::$app->cart;
?>
<!--Start cart area-->
<section class="cart-area">
    <div class="container">
        <form action="/site/add-cart/" method="get">
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="table-outer">
                        <table class="cart-table">
                            <thead class="cart-header">
                            <tr>
                                <th class="prod-column">Sản phẩm</th>
                                <th>&nbsp;</th>
                                <th>Số lượng</th>
                                <th class="price">Giá tiền</th>
                                <th>Thành tiền</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach ($cart->getItems() as $item) {
                                $product = $item->getProduct();
                            ?>
                            <tr>
                                <input type="hidden" name="products[<?= $i ?>][product_id]" value="<?= $product->id ?>" />
                                <td colspan="2" class="prod-column">
                                    <div class="column-box">
                                        <div class="prod-thumb">
                                            <a href="#">
                                                <img src="<?= $product->image ?>" alt="" width="70px">
                                            </a>
                                        </div>
                                        <div class="title">
                                            <h3 class="prod-title"><?= $product->name ?></h3>
                                        </div>
                                    </div>
                                </td>
                                <td class="qty">
                                    <input class="quantity-spinner" type="text" value="<?= $item->getQuantity() ?>" name="products[<?= $i ?>][quantity]">
                                </td>
                                <td class="price"><?= $product->getPriceFormat() ?></td>
                                <td class="sub-total"><?= number_format($item->getCost()) ?></td>
                                <td>
                                    <a href="/cart/?action=delete&product_id=<?= $product->id ?>">
                                        <div class="remove">
                                            <span class="icon-cross"></span>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row cart-middle">
                <div class="col-xl-6 col-lg-9 col-md-8 col-sm-12">
                    <div class="apply-coupon">

                    </div>
                </div>
                <div class="col-xl-6 col-lg-3 col-md-4 col-sm-12">
                    <div class="apply-coupon-button">
                        <a class="btn-one thm-bg-clr" href="/checkout" type="button">Thanh toán</a>
                    </div>

                    <div class="update-cart pull-right">
                        <button class="btn-one thm-bg-clr" name="action" value="update-all" type="submit">Cập nhật</button>
                    </div>

                </div>
            </div>
        </form>
            <!--Start cart total -->
            <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12">
                <div class="cart-total">
                    <div class="shop-title-box">
                        <h3>Thông tin giỏ hàng</h3>
                    </div>
                    <ul class="cart-total-table">
                        <li class="clearfix">
                            <span class="col col-title">Tổng cộng</span>
                            <span class="col"><?= number_format($cart->getTotalCost()) ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--End cart total -->
        </div>
    </div>
</section>
<!--End cart area-->

<?php echo $this->render("//element/news-letter-home"); ?>