<?php
/**
 * @var $bread
 */

use frontend\models\Template;
use frontend\models\TemplateCategory;
use yii\widgets\LinkPager;

echo $this->render("//element/breadcrumb",['name' => 'Liên hệ', 'data' => $bread]);
?>
<section class="page-content w100 page-template">
    <div class="w1000">
        <div class="content w100">
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
                                <div class="list-template">
                                    <?php
                                    foreach ($templates as $tem) {
                                        ?>
                                        <div class="item">
                                            <a href="<?php echo $tem->getUrl() ?>">
                                                <div class="wrapper-rel w100">
                                                    <img src="<?php echo $tem->image ?>" class="w100">
                                                    <div class="wrapper-button">
                                                        <div class="btn-reg js__btn-register-template"
                                                        data-id="<?= $tem->id ?>">
                                                            Đăng ký
                                                        </div>
                                                    </div>
                                                </div>
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

            <div class="wrapper-pagination">
                <?php
                echo \yii\bootstrap4\LinkPager::widget([
                        'pagination' => $pages,
                        'options' => [
                         //   'class' => 'ip-mosaic__pagin-list',
                        ],
                ]);
                ?>
            </div>
        </div>
    </div>
</section>
<?php echo  \Yii::$app->view->render('@app/views/modal/form-register-template'); ?>