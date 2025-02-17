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
<!--Start Checkout area-->
<form method="get" action="/save-bill">
    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
<div class="checkout-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="form billing-info">
                    <div class="shop-title-box">
                        <h3>NGƯỜI MUA HÀNG</h3>
                    </div>

                        <div class="row js__info-register">
                            <div class="col-md-12">
                                <div class="field-label">Họ và tên</div>
                                <div class="field-input">
                                    <input type="text" name="Bill[fullname]" placeholder="Nguyễn Văn A" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field-label">Email</div>
                                <div class="field-input">
                                    <input type="text" name="Bill[email]" placeholder=aaa@gmail.com" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field-label">Điện thoại</div>
                                <div class="field-input">
                                    <input type="text" name="Bill[phone]" placeholder="0900 999 000" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field-label">Địa chỉ *</div>
                                <div class="field-input">
                                    <input type="text" name="Bill[address]" placeholder="222 Pham B, P.4, Q.8, TP.HCM" required>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="form shipping-info">
                    <div class="shop-title-box">
                        <h3>NGƯỜI NHẬN HÀNG</h3>
                    </div>
                        <div class="row row js__info-receive">
                            <div class="col-md-12">
                                <div class="field-label">Họ và tên</div>
                                <div class="field-input">
                                    <input type="text" name="Bill[receive_fullname]" placeholder="Nguyễn Văn A" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field-label">Email</div>
                                <div class="field-input">
                                    <input type="text" name="Bill[receive_email]" placeholder=aaa@gmail.com" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field-label">Điện thoại</div>
                                <div class="field-input">
                                    <input type="text" name="Bill[receive_phone]" placeholder="0900 999 000" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field-label">Địa chỉ *</div>
                                <div class="field-input">
                                    <input type="text" name="Bill[receive_address]" placeholder="222 Pham B, P.4, Q.8, TP.HCM" required>
                                </div>
                            </div>
                            <a href="#" class="js__copy-receive">
                                <i class="fa fa-copy"></i>
                                Sử dụng thông tin người mua hàng
                            </a>

                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="table">
                        <div class="shop-title-box">
                            <h3>Thông tin đơn hàng</h3>
                        </div>
                        <table class="cart-table">
                            <thead class="cart-header">
                            <tr>
                                <th class="product-column">Sản phẩm</th>
                                <th>&nbsp;</th>
                                <th>Số lượng</th>
                                <th class="price">Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach ($cart->getItems() as $item) {
                                $product = $item->getProduct();
                                ?>
                            <tr>
                                <td colspan="2" class="product-column">
                                    <div class="column-box">
                                        <div class="prod-thumb">
                                            <a href="javascript:;"><img src="<?= $product->image ?>" alt="" width="100px"></a>
                                        </div>
                                        <div class="product-title">
                                            <h3><?= $product->name ?></h3>
                                        </div>
                                    </div>
                                </td>
                                <td class="qty">
                                    <input class="quantity-spinner" type="text" value="<?= $item->getQuantity() ?>" name="quantity">
                                </td>
                                <td class="price"><?= number_format($item->getCost()) ?></td>
                            </tr>
                          <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="cart-total">
                        <div class="shop-title-box">
                            <h3>Thông tin đơn hàng</h3>
                        </div>
                        <ul class="cart-total-table">
                            <li class="clearfix">
                                <span class="col col-title">Phụ phí</span>
                                <span class="col">0</span>
                            </li>
                            <li class="clearfix">
                                <span class="col col-title">Phí shipping</span>
                                <span class="col">0</span>
                            </li>
                            <li class="clearfix">
                                <span class="col col-title">Tộng cộng</span>
                                <span class="col"><?= number_format($cart->getTotalCost()) ?></span>
                            </li>
                        </ul>
                        <div class="payment-options">

                            <div class="placeorder-button text-left">
                                <button class="btn-one" type="submit">Đặt hàng ngay</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
<!--End Checkout area-->

<?php echo $this->render("//element/news-letter-home"); ?>
