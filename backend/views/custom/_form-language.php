<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use iutbay\yii2kcfinder\KCFinderInputWidget;
use frontend\models\ProductCategory;

/* @var $this yii\web\View */
/* @var $dataLanguage */
/* @var $model frontend\models\ProductCategory */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="product-form">
    <div class="panel">
        <div class="panel-heading panel-heading-tab">
            <ul class="nav nav-tabs nav-tabs-solid" role="tablist">
                <?php
                 $listLanguage =  \Yii::$app->params['listLanguage'];
                 $i = 0;
                foreach ($listLanguage as $key => $language) {
                    $i++;
                ?>
                <li class="nav-item">
                    <a class="nav-link <?= $i == 1 ? 'active' : '' ?>"
                       data-toggle="tab"
                       href="#panelTab<?= $key ?>"
                       aria-controls="panelTab<?= $key ?>"
                       role="tab" aria-expanded="true">
                        <img src="/admin/<?= $language['icon'] ?>" width="20px" />
                        <?= $language['name'] ?>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="panel-body container-fluid pt-20">
            <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>

                <div class="tab-content">
                    <?php
                    $i = 0;
                    foreach ($listLanguage as $key => $language) {
                    $i++;
                    ?>
                    <div class="tab-pane <?= $i == 1 ? 'active' : '' ?>" id="panelTab<?= $key ?>">
                        <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th data-tablesaw-priority="3" class="tablesaw-priority-3">Ngôn ngữ mặc định</th>
                        <th data-tablesaw-priority="persist">Ngôn ngữ tùy chỉnh</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $langdefault =  \Yii::$app->params['settingLanguage'];

                    foreach ($langdefault as $key1 => $item1) {
                    ?>
                        <tr>
                            <td>
                                <?= $item1 ?>
                            </td>
                            <td>
                                <input class="form-control" type="text" name="Custom[<?= $key ?>][<?= $key1 ?>]" style="border-style: dashed"
                                value="<?= !isset($dataLanguage[$key][$key1]) ? $item1 : $dataLanguage[$key][$key1] ?>">
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>

                </table>
                    </div>
                    <?php } ?>
                </div>
            <div class="form-group">
                <?= Html::submitButton('Lưu', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
