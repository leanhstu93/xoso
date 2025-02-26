<?php

use frontend\models\ProductCategory;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $dataLanguage */
/* @var $model app\models\Custom */

$this->title = 'Cập nhật';
$this->params['breadcrumbs'][] = ['label' => 'Tùy chỉnh ngôn ngữ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$menu = [
    [
        'name' => 'Tổng quan',
        'link' => 'js__overview',
        'icon' =>'icon wb-dashboard'
    ],
    [
        'name' => 'Lưu lại',
        'link' => 'js__save',
        'icon' =>'fa fa-hand-grab-o'
    ],

];
?>

<!-- Page -->
<div class="page">
    <div class="panel-body container-fluid">
        <?php echo $this->render("//element/page-aside", ['data' => $menu]); ?>
        <div class="page-main">
            <?php echo $this->render("//element/message"); ?>
            <div class="page-content">
                <?php echo $this->render("//element/breadcrumb"); ?>
                <?= $this->render('_form-language', [
                    'model' => $model,
                    'dataLanguage' => $dataLanguage,
                ]) ?>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->

