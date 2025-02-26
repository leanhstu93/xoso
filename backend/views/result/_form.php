<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Form;
/* @var $this yii\web\View */
/* @var $model app\models\Form */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="product-form">
    <div class="row">
        <div class="col-xxl-7 col-lg-7">
            <div class="card card-shadow card-responsive">
                <div class="example-wrap">
                    <div class=" table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>
                                    Họ tên
                                </td>
                                <td>
                                    <?php echo $model->name ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email
                                </td>
                                <td>
                                    <?php echo $model->email ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Số điện thoại
                                </td>
                                <td>
                                    <?php echo $model->phone ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tin nhắn
                                </td>
                                <td>
                                    <?php echo $model->desc ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Ngày giờ
                                </td>
                                <td>
                                    <?php echo date("d/m/Y h:i:s",$model->date) ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xxl-5 col-lg-5">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'status')->dropDownList(Form::listStatus()) ?>
            <div class="form-group">
                <?= Html::submitButton('Lưu', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>


</div>
