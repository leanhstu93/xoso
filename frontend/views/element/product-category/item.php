<!--Start single product item-->
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
    <div class="single-product-item text-center">
        <div class="img-holder">
            <img src="<?= $data->image ?>" alt="<?= $data->name ?>">

            <?php if ($data->getPriceDiscount() != 0) { ?>
            <label class="discount">
                Giảm <?= $data->getPriceDiscount() ?>
            </label>
            <?php } ?>
        </div>
        <div class="title-holder text-center">
            <h3 class="title text-center"><a href="<?= $data->getUrl() ?>"><?= $data->name ?></a></h3>
            <div class="rate-review-box">
                <div class="rate-box float-left">
                    <?php if (!empty($data->price_sale)) { ?>
                        <del><?= $data->getPriceSaleFormat() ?></del>
                    <?php } ?>
                    <strong><?= $data->getPriceFormat() ?></strong>
                </div>
                <div class="review-box float-right">
                    <ul>
                        <li><i class="fa fa-star active"></i></li>
                        <li><i class="fa fa-star active"></i></li>
                        <li><i class="fa fa-star active"></i></li>
                        <li><i class="fa fa-star active"></i></li>
                        <li><i class="fa fa-star active"></i></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<!--End single product item-->
