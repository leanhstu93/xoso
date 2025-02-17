<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Service Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'seo_name',
            'desc:ntext',
            'content:ntext',
            //'tags',
            //'option',
            //'meta_title',
            //'meta_desc',
            //'meta_keyword',
            //'display_order',
            //'image',
            //'active',
            //'user_id',
            //'date_create',
            //'date_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
