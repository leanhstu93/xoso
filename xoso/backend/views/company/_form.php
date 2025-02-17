<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductCategory */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel">
        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'name')->textInput(['class' => 'form-control']) ?>

            <?= $form->field($model, 'address')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'favicon',['template' => '<label class="control-label" for="company-address">{label}</label><div class="input-group input-group-file js__select-image">{input}<span class="input-group-btn">
                      <span class="btn btn-success btn-file">
                        <i class="icon wb-upload" aria-hidden="true"></i>
                       
                      </span>
                    </span></div>'], [
                'buttonLabel' => 'Chọn hình',
                'model' => $model,
            ])->textInput(['class' => 'js__image-value form-control']) ?>

            <?= $form->field($model, 'logo',['template' => '<label class="control-label" for="company-address">{label}</label><div class="input-group input-group-file js__select-image">{input}<span class="input-group-btn">
                      <span class="btn btn-success btn-file">
                        <i class="icon wb-upload" aria-hidden="true"></i>
                       
                      </span>
                    </span></div>'], [
                'buttonLabel' => 'Chọn hình',
                'model' => $model,
            ])->textInput(['class' => 'js__image-value form-control']) ?>

            <?= $form->field($model, 'email')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'fax')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'tel')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'phone')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'facebook')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'twitter')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'google')->textInput(['class' => 'form-control'])?>

            <?= $form->field($model, 'youtube')->textInput(['class' => 'form-control'])?>

        </div>

        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'meta_keyword')->textInput(['maxlength' => true]) ?>
        </div>

        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <div class="form-group">
                <?= Html::submitButton('Lưu', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
