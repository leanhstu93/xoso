<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Page -->
<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        <div class="brand">
            <img class="brand-img" src="<?php echo Yii::getAlias('@web') ?>/images/logo.webp" alt="...">
            <h2 class="brand-text">Remark</h2>
        </div>
        <p><?= Html::encode($this->title) ?></p>
        <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'enableClientScript' => true,
            ]); ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder' => 'Tài khoản'])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Mật khẩu'])->label(false) ?>

            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
        <?php ActiveForm::end(); ?>
        <p>Still no account? Please go to <a href="register.html">Register</a></p>

        <footer class="page-copyright page-copyright-inverse">
            <p>WEBSITE BY Creation Studio</p>
            <p>© 2018. All RIGHT RESERVED.</p>
            <div class="social">
                <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                    <i class="icon bd-twitter" aria-hidden="true"></i>
                </a>
                <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                    <i class="icon bd-facebook" aria-hidden="true"></i>
                </a>
                <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                    <i class="icon bd-dribbble" aria-hidden="true"></i>
                </a>
            </div>
        </footer>
    </div>
</div>
<!-- End Page -->