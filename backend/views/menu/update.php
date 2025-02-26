<?php

use frontend\models\ProductCategory;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $custom */
/* @var $model app\models\Product */

$this->title = 'Cập nhật';
$this->params['breadcrumbs'][] = ['label' => 'Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Page -->
<div class="page">
    <div class="panel-body container-fluid">
        <div class="page-main">
            <?php echo $this->render("//element/message"); ?>
            <div class="page-content">
                <?php echo $this->render("//element/breadcrumb"); ?>
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->

