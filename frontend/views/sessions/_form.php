<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Sessions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sessions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idSession')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipAddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idloai')->textInput() ?>

    <?= $form->field($model, 'lastVisit')->textInput() ?>

    <?= $form->field($model, 'session_start')->textInput() ?>

    <?= $form->field($model, 'userAgent')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
