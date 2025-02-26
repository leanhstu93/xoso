<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use iutbay\yii2kcfinder\KCFinderInputWidget;
use frontend\models\ProductCategory;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductCategory */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel">
        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'title')->textInput(['class' => 'form-control'])->label('Tiêu đề') ?>

            <?= $form->field($model, 'content')->textarea(['rows' => 3, 'class' => 'js-editor']) ?>

        </div>
        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'status')->dropDownList(ProductCategory::listActive()) ?>

        </div>
     
        <div class="panel-body container-fluid">

            <div class="form-group">
                <?= Html::submitButton('Lưu', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
