<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Province */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="province-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, '_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
