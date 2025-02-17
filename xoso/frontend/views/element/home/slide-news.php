<div class="BoxKinhDoanhTuTe2 clearfix qgcc <?php echo $class_name ?>">
    <div class="title_box">
        <?php echo $data->category->name ?>
    </div>
    <div class="wrapper-news-home w100">
        <div class="js__slider-news-home">
            <?php
            foreach ($data->data as $item) {
            ?>
            <div class="item">
                <a href="<?php echo $item->getUrl() ?>">
                    <img src="<?php echo $item->image ?>" class="w100">
                </a>
                <a class="title-content-li" href="<?php echo $item->getUrl() ?>"><?php echo $item->name ?>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>