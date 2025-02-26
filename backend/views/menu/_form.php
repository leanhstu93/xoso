<?php

use \frontend\models\SinglePage;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductCategory */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="menu-form">
    <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-lg-6">
                    <h4 class="example-title">Hiện tại</h4>
                    <div class="dd js__init-sort-able" data-plugin="nestable">
                        <?= $form->field($model, 'data',['template' => '{input}',])->hiddenInput(['class' => 'form-control Ta_js-data-menu']) ?>

                        <ol class="dd-list  css__init-sort-able aa">
                            <?php
                            $dataId = [];
                            $dataArr = json_decode($model->data,true);

                            if (!empty($dataArr)) {
                            $dataId = array_column($dataArr,'id');
                            foreach ($dataArr as $key =>  $item) {
                                if(strpos($item['id'],'mn_single_page_') !== false) {
                                    $id = preg_replace('/mn_single_page_/','',$item['id']);
                                    $singlePage = SinglePage::find()->where(['active' => 1, 'id' => $id])->one();

                                    if (empty($singlePage)) {
                                       continue;
                                    }
                                }
                            ?>
                            <li class="dd-item dd-item-alt nested"  data-link="<?php echo $item['link'] ?>" data-module="<?php echo $item['module'] ?>" data-name="<?php echo $item['name'] ?>" data-id="<?php echo $item['id'] ?>">
                                <div class="dd-handle"></div>
                                <div class="dd-content"><?php echo $item['name'] ?>  [Module: <?php echo $item['module'] ?>]
                                    <span class="float-right wb-wrench"></span>
                                </div>
                                <?php
                                if (!empty($item['children'])) { ?>
                                <ol>
                                    <?php
                                    foreach ($item['children'] as $key1 =>  $item1) {
                                        if(strpos($item1['id'],'mn_single_page_') !== false) {
                                            $id = preg_replace('/mn_single_page_/', '', $item['id']);
                                            $singlePage = SinglePage::find()->where(['active' => 1, 'id' => $id])->one();

                                            if (empty($singlePage)) {
                                                continue;
                                            }
                                        }
                                    ?>
                                    <li class="dd-item dd-item-alt"
                                        data-link="<?php echo $item1['link'] ?>"
                                        data-module="<?php echo $item1['module'] ?>"
                                        data-name="<?php echo $item1['name'] ?>" data-id="<?php echo $item1['id'] ?>">
                                        <div class="dd-handle"></div>
                                        <div class="dd-content"><?php echo $item1['name'] ?>  [Module: <?php echo $item1['module'] ?>]
                                            <span class="float-right wb-wrench"></span>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ol>
                                <?php }?>
                            </li>
                            <?php }
                            }
                            ?>
                        </ol>
                    </div>
                    <div class="row">
                        <div class="form-group wrap-button">
                            <?= Html::submitButton('Lưu', ['class' => 'btn btn-primary js-submit-save-menu']) ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h4 class="example-title">Có sẵn</h4>
                    <div class="dd" data-plugin="nestable">
                        <ol class="dd-list css__init-sort-able">
                            <?php
                            $menuDefault = Yii::$app->params['menuDefault'];
                            $singlePage = SinglePage::getAll();

                            foreach ($singlePage as $value) {
                                $menuDefault[]  = [
                                    'name' => $value->name,
                                    'id' => 'mn_single_page_'.$value->id,
                                    'module' => 'single-page',
                                    'link' => '/single-page/update/'.$value->id,
                                ];
                            }

                            foreach ($menuDefault as $item) {
                            if(in_array($item['id'], $dataId)) continue;
                            ?>
                                <li class="dd-item dd-item-alt"  data-link="<?php echo $item['link'] ?>" data-module="<?php echo $item['module'] ?>" data-name="<?php echo $item['name'] ?>" data-id="<?php echo $item['id'] ?>">
                                    <div class="dd-handle"></div>
                                    <div class="dd-content"><?php echo $item['name'] ?>  [Module: <?php echo $item['module'] ?>]

                                        <span class="float-right wb-wrench"></span>
                                    </div>
                                </li>
                            <?php } ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
