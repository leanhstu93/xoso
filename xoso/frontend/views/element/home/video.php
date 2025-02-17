<?php
use frontend\models\Video;
use common\components\MyHelpers;
?>
<section class="wrapper-video w100">
    <div class="w1000">
        <div class="title-section">
            Video của chúng tôi
        </div>
        <div class="wrapper-items">
            <div class="item">
                <iframe class="js__wrapper-video-main" width="100%" height="350"
                        src="https://www.youtube.com/embed/dFJP2TEdvBE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="item">
                <ul>
                    <?php
                    $data = Video::find()->where(['active'=> 1,])->limit(4)->all();

                    foreach($data as $item) {
                    ?>
                    <li class="js-handle-view-video"
                        data-id="<?php echo  MyHelpers::getYoutubeIdFromUrl($item->source) ?>">
                        <div class="wrapper-image">
                            <img src="<?php echo $item->image ?>" class="w100">
                            <div class="btn-play">
                                Đang xem
                            </div>
                        </div>
                        <label>
                            <?php echo $item->name ?>
                        </label>
                    </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </div>
</section>
