<?php
echo $this->render("//element/page-title",['name' => $data->name, 'bread' => $bread]);
?>

<div class="kc_clfw"></div>
<!-- Services Single -->
<div class="single-service sp-two">
    <div class="container">
        <div class="row flex-lg-row-reverse">

            <!--Content Column-->
            <div class="content-column col-lg-8 col-xl-9">
                <div class="inner-column">
                    <div class="top-content">
                        <h4>Hdesign thiết kế chuyên nghiệp - Digital Margketing</h4>
                        <h2><?= $data->name ?></h2>
                        <div class="text">
                            <?= $data->desc ?>
                        </div>
                    </div>
                    <div class="css___content">
                        <?= $data->content ?>
                    </div>
                </div>
            </div>

            <!--Content Column-->
            <?php echo $this->render("//element/product-category/left",['id_category' => 1]); ?>

        </div>
    </div>
</div>
<?php echo $this->render("//element/news-letter-home"); ?>