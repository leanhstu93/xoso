<?php

use frontend\models\ConfigPage;
use frontend\models\TemplateCategory;
use frontend\models\Template;
?>
<section class="template__home w100 ">
    <div class="w1000">
        <div class="title-section-home">
            DỊCH VỤ THINK DESIGNER
        </div>
        <div class="title-section-large">
            Think Designer - Thiết kế của bạn
        </div>
        <div class="desc-section">
            Tìm kiếm một đơn vị thiết kế web uy tín không chỉ giúp bạn tiết kiệm được một phần chi phí đáng kể, mà còn mang lại một website hiệu quả cao. Cùng tìm hiểu về Think  Designer thiết kế web uy tín để có sự lựa chọn tốt nhất cho mình.
        </div>
        <div class="wrapper-content">
            <?php
            $data = TemplateCategory::find()->where([ 'active' => 1])->limit(10)->orderBy(TemplateCategory::ORDER_BY)->all();
            if ($data) {
               ?>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php
                foreach ($data as $key => $item) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $key == 0 ? 'active' : '' ?>"
                           id="template-<?php echo $item->id ?>-tab"
                           data-toggle="tab" href="#template-<?php echo $item->id ?>" role="tab"
                           aria-controls="template-<?php echo $item->id ?>" aria-selected="true">
                            <?php echo $item->name ?>
                        </a>
                    </li>
                <?php } ?>

            </ul>
            <?php } ?>
            <?php
            if ($data) {
            ?>
            <div class="tab-content" id="myTabContent">
                <?php
                foreach ($data as $key => $item) {
                ?>
                <div class="tab-pane fade <?php echo $key == 0 ? 'show active' : '' ?>"
                     id="template-<?php echo $item->id ?>" role="tabpanel" aria-labelledby="template-<?php echo $item->id ?>-tab">
                    <?php
                    $templates = Template::find()->where([ 'active' => 1, 'category_id' => $item->id])->limit(8)->orderBy(TemplateCategory::ORDER_BY)->all();
                    if ($templates) {?>
                        <div class="wrapper-list-template">
                            <?php
                            foreach ($templates as $tem) {
                            ?>
                            <div class="item">
                                <a href="<?php echo $tem->getUrl() ?>">
                                    <img src="<?php echo $tem->image ?>" class="w100">
                                    <div class="title">
                                        <?php echo $tem->name ?>
                                    </div>
                                </a>

                            </div>
                            <?php } ?>
                        </div>
                    <?php }
                    ?>
                </div>
                <?php } ?>
            </div>
            <?php } ?>

            <div class="wrapper-btn">
                <?php
                $pageTemplate = ConfigPage::getPageConfig(ConfigPage::TYPE_TEMPLATE)
                ?>
                <a class="btn btn-see-more" href="<?php echo $pageTemplate->getUrl() ?>">
                    <i class="fad fa-arrow-circle-down"></i> <?php echo Yii::$app->view->params['lang']->see_more ?>
                </a>
            </div>
        </div>
    </div>
</section>