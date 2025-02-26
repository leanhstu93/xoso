<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use iutbay\yii2kcfinder\KCFinderInputWidget;
use frontend\models\NewsCategory;

/* @var $this yii\web\View */
/* @var $model frontend\models\NewsCategory */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel">
        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">
            <div class="css-tab-language js-tab-language js-tab-language-vi" data-code="vi">
                <?= $form->field($model, 'parent_id')->dropDownList($listCate,['class' => 'form-control'])->label('Danh mục cha') ?>

                <?= $form->field($model, 'name')->textInput(['class' => 'js__title form-control'])->label('Tiêu đề') ?>

                <div class="form-group">
                    <label>
                        Đường dẫn
                    </label>
                    <div class="input-group input-group-icon">
                        <?= Html::textInput('NewsCategory[seo_name]',$model->seo_name,array('class'=>'js__alias form-control')) ?>

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

                <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>
            </div>
            <?php
            $dataFieldLang = [
                [
                    'type' => 'text',
                    'name' => 'name',
                    'required' => 'required',
                    'class' => 'required'
                ],
                [
                    'type' => 'textarea',
                    'name' => 'desc',
                    'required' => '',
                    'class' => ''
                ],
                [
                    'type' => 'textarea',
                    'name' => 'content',
                    'required' => '',
                    'class' => ''
                ],
            ] ;
            ?>
            <?= $this->render('_form-lang',['model' => $dataLang,'dataFieldLang' => $dataFieldLang,'form' => $form])  ?>

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

            <?= $form->field($model, 'option')->dropDownList(NewsCategory::listOption()) ?>

            <?= $form->field($model, 'active')->dropDownList(NewsCategory::listActive()) ?>

        </div>
        <?= $this->render('//element/panel-heading', array_pop($menu)) ?>
        <div class="panel-body container-fluid">
            <div class="css-tab-language js-tab-language js-tab-language-vi">
                <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'meta_keyword')->textInput(['maxlength' => true]) ?>
            </div>
            <?php
            $dataFieldLang = [
                [
                    'type' => 'text',
                    'name' => 'meta_title',
                    'required' => '',
                    'class' => ''
                ],
                [
                    'type' => 'text',
                    'name' => 'meta_desc',
                    'required' => '',
                    'class' => ''
                ],
                [
                    'type' => 'text',
                    'name' => 'meta_keyword',
                    'required' => '',
                    'class' => ''
                ],
            ] ;
            ?>
            <?= $this->render('_form-lang',['model' => $dataLang,'dataFieldLang' => $dataFieldLang,'form' => $form])  ?>
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
