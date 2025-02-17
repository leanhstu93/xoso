<?php

use frontend\models\RegisterTemplateForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel */
/* @var $model frontend\models\BannerCategory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách đăng ký templte ';
$this->params['breadcrumbs'][] = $this->title;
$viewMsg = 'Xem';
$updateMsg = 'Cập nhật';
$deleteMsg = 'Xóa';
$scrollingTop = 10;
?>

<!-- Page -->
<div class="page">
    <?php echo $this->render("//element/breadcrumb"); ?>
    <div class="page-content css__table ">
        <div class="panel">
            <div class="panel-body">
                <?php echo $this->render("//element/message"); ?>
                <?php
                $gridColumns = [
                    ['class' => 'kartik\grid\CheckboxColumn'],
                    [
                        'attribute' => 'fullname',
                    ],
                    [
                        'class'=>'kartik\grid\EnumColumn',
                        'attribute' => 'category_id',
                        'enum' => \frontend\models\RegisterTemplateForm::listCategory(),
                        'value' => function($model) {
                            return RegisterTemplateForm::listCategory()[$model->status];
                        },
                    ],
                    [
                        'attribute' => 'phone',
                    ],
                    [
                        'attribute' => 'email',
                    ],
                    [
                        'class'=>'kartik\grid\EnumColumn',
                        'attribute'=>'status',
                        'vAlign'=>'middle',
                        'enum' => \frontend\models\RegisterTemplateForm::listStatus()
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'header' => 'Thao tác',
                        'width' => '100px',
                        'updateOptions' => ['title' => 'Cập nhật', 'data-toggle' => 'tooltip'],
                        'deleteOptions' => ['title' => 'Xóa', 'data-toggle' => 'tooltip','data-style' => 'top:100px' ],
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                        'template' => '{delete}'
                    ],
                ];
                ?>
                <?= GridView::widget([
                    'dataProvider' => $searchModel->search(Yii::$app->request->queryParams),
                    'columns' =>$gridColumns,
                    'showPageSummary' => false,
                    'striped' => false,
                    'hover' => true,
                    'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                    'toolbar' =>  [
                        ['content'=> ' '  ],
                    ],
                    'filterModel' => $searchModel,
                    'containerOptions' => ['style' => 'overflow: auto', 'class' => 'aa'], // only set when $responsive = false
                    'responsive' => true,
                    'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                    'pjax' => true, // pjax is set to always true for this demo
                    'persistResize' => false,
                    'toggleDataOptions' => ['minCount' => 10],
                    'itemLabelSingle' => 'banner',
                    'itemLabelPlural' => 'Danh sách banner'
                ]); ?>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
