<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\BannerCategory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách bài viết soi cầu';
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
                        'attribute' => 'title',
                    ],
                    [
                        'class'=>'kartik\grid\EnumColumn',
                        'attribute'=>'status',
                        'vAlign'=>'middle',
                        'enum' => \frontend\models\Base::listActive()
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'header' => 'Thao tác',
                        'width' => '100px',
                        'updateOptions' => ['title' => 'Cập nhật', 'data-toggle' => 'tooltip'],
                        'deleteOptions' => ['title' => 'Xóa', 'data-toggle' => 'tooltip','data-style' => 'top:100px' ],
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                        'template' => '{update} {delete}'
                    ],
                ];
                ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
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
