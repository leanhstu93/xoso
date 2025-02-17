<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ConfigPage */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="config-page-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel">
        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">
            <div class="css-tab-language js-tab-language js-tab-language-vi" data-code="vi">
                <?= $form->field($model, 'name')->textInput(['class' => 'js__title form-control'])->label('Tiêu đề') ?>
                <div class="form-group">
                    <label>
                        Đường dẫn
                    </label>
                    <div class="input-group input-group-icon">
                        <?= Html::textInput('ConfigPage[seo_name]',$model->seo_name,array('class'=>'js__alias form-control')) ?>
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
            <!-- tab vn -->
            <!-- tab en -->
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
            <!-- end tab en -->
        </div>
            <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
            <div class="panel-body container-fluid">
                <?= $form->field($model, 'image',['template' => '<div class="input-group input-group-file js-open-file-manager">{input}<span class="input-group-btn">
                      <span class="btn btn-success btn-file">
                        <i class="icon wb-upload" aria-hidden="true"></i>
                       
                      </span>
                    </span></div>'], [
                    'buttonLabel' => 'Chọn hình',
                    'model' => $model,
                ]) ?>
        </div>
        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">
            <?= $form->field($model, 'tags')->textInput([' data-plugin' => 'tokenfield','autocomplete' => 'off']) ?>
        </div>

        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">
            <?= $form->field($model, 'status')->dropDownList(\frontend\models\ConfigPage::listStatus()) ?>
        </div>

        <?= $this->render('//element/panel-heading',array_pop($menu)) ?>
        <div class="panel-body container-fluid">
            <div class="css-tab-language js-tab-language js-tab-language-vi">
                <?= $form->field($model, 'meta_title')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'meta_desc')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'meta_keyword')->textarea(['rows' => 6]) ?>
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

            <div class="form-group">
                <?= Html::submitButton('Lưu', [ 'name' => 'aa' , 'class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>