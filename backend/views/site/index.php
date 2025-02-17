<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\models\Product */

$this->title = 'Trang chủ';
$this->params['breadcrumbs'][] = ['label' => 'site', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$viewMsg = 'Xem';
$updateMsg = 'Cập nhật';
$deleteMsg = 'Xóa';
$scrollingTop = 10;
?>

<!-- Page -->
<div class="page">
    <div class="page-content css__table ">
        <div class="panel">
            <div class="panel-body">
                Đang phát triển ...
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
