<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Service', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'seo_name',
            'category_id',
            'order',
            //'image',
            //'image_standing',
            //'desc:ntext',
            //'content:ntext',
            //'alias',
            //'tags',
            //'user_id',
            //'date_create',
            //'date_update',
            //'count_view',
            //'meta_title',
            //'meta_desc',
            //'meta_keyword',
            //'active',
            //'option',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
