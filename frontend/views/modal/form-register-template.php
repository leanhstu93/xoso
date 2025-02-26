<?php

use yii\helpers\Html;
use yii\bootstrap4\Modal;
use yii\bootstrap4\ActiveForm;
use frontend\models\RegisterTemplateForm;
Modal::begin([
    'id'=>'js__form-register-template',
    'size'=>Modal::SIZE_LARGE,
    'title' => 'Quý khách vui lòng nhập thông tin liên hệ',
    'class' => 'css__form-register-template'
]);
$model = new RegisterTemplateForm();
?>
    <div id='modalContent'>
        <?php $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'action' => '/register-template-form/save'
        ]); ?>

        <?php echo $form->field($model, 'fullname');?>
        <?php echo $form->field($model, 'phone');?>
        <?php echo $form->field($model, 'email');?>
        <?php echo $form->field($model, 'category_id')->radioList(RegisterTemplateForm::listCategory());?>
        <?php echo $form->field($model, 'content')->textarea(['rows' => 3]);?>
        <div class="form-group d-flex justify-content-center">
            <?= Html::submitButton('Gửi thông tin', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

<?php Modal::end() ?>