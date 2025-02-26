<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
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
            <?= $form->field($model, 'name')->textInput(['class' => 'js__title form-control'])->label('Tiêu đề') ?>
            <div class="form-group">
                <label class="required control-label">
                    Đường dẫn
                </label>
                <div class="input-group input-group-icon">
                    <?= Html::textInput('GalleryImage[seo_name]',$model->seo_name,array('class'=>'js__alias form-control')) ?>
                    <span class="input-group-addon">
                      <span class="checkbox-custom checkbox-default">
                        <input type="checkbox" id="inputCheckbox" class="js__toggle-auto-get-alias" name="inputCheckbox" checked="">
                        <label for="inputCheckbox"></label>
                          Lấy đường dẫn tự động
                      </span>
                    </span>
                </div>
            </div>

            <?= $form->field($model, 'desc')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'content')->textarea(['class' => 'js-editor' ,
                'rows' => 3]);
            ?>

        </div>
        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'image',['template' => '<div class="input-group input-group-file js__select-image">{input}<span class="input-group-btn">
                      <span class="btn btn-success btn-file">
                        <i class="icon wb-upload" aria-hidden="true"></i>
                       
                      </span>
                    </span></div>'], [
                'buttonLabel' => 'Chọn hình',
                'model' => $model,
            ])->textInput(['class' => 'js__image-value form-control']) ?>

        </div>

        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">

            <?= $form->field($model, 'active')->dropDownList(\frontend\models\GalleryImage::listActive()) ?>

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
