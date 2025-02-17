<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use kartik\grid\GridView;
use \frontend\models\ServiceCategory;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\models\Service */

$this->title = 'Danh sách dịch vụ';
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
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
                        'attribute' => 'name',
                    ],
                    [
                        'attribute' => 'image',
                        'format'=>'raw',
                         'filter' => false,
                        'value' => function ($data) {
                            return Html::img( '/'.$data['image'],
                                ['width' => '60px']);
                        }
                    ],
                    [
                        'label' => 'Danh mục',
                        'attribute' => 'category_id',
                        'vAlign'=>'middle',
                        'width'=>'200px',
                        'value' => 'category.name',
                        'filter'=> ArrayHelper::map(ServiceCategory::find()->asArray()->all(), 'id', 'name'),
                        'filterInputOptions' => [
                            'class' => 'form-control',
                            'prompt' => 'Chọn'
                        ],
                        'format'=>'raw',

//                        'filter'=>ArrayHelper::map(NServiceCategory::find()->asArray()->all(), 'id', 'name'),
                    ],
                    [
                        'class'=>'kartik\grid\EnumColumn',
                        'attribute'=>'option',
                        'vAlign'=>'middle',
                        'width'=>'100px',
                        'filterInputOptions' => [
                            'class' => 'form-control',
                            'prompt' => 'Chọn'
                        ],
                        'enum' => \frontend\models\Service::listOption()
                    ],
                    [
                        'class'=>'kartik\grid\EnumColumn',
                        'attribute'=>'active',
                        'vAlign'=>'middle',
                        'filterInputOptions' => [
                            'class' => 'form-control',
                            'prompt' => 'Chọn'
                        ],
                        'enum' => \frontend\models\Service::listActive()
                    ],

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'header' => 'Thao tác',
                        'width' => '100px',
                        'updateOptions' => ['title' => 'Cập nhật', 'data-toggle' => 'tooltip'],
                        'deleteOptions' => ['title' => 'Xóa', 'data-toggle' => 'tooltip','data-style' => 'top:100px' ],
                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'delete' => function ($url, $model, $key) {
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,
                                    [
                                        'title' => Yii::t('app', 'Xóa'),
                                        'data-pjax' => '1',
                                        'data' => [
                                            'method' => 'post',
                                            'confirm' => Yii::t('app', 'Bạn chắc chắn thực hiện thao tác này?'),
                                            'pjax' => 1,],
                                    ]
                                );
                            },
                        ]
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
                    'itemLabelSingle' => 'dịch vụ',
                    'itemLabelPlural' => 'Danh sách dịch vụ'
                ]); ?>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
