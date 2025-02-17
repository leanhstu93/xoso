<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'member_id',
            'date_create',
            'fullname',
            'email:email',
            //'phone',
            //'receive_fullname',
            //'receive_email:email',
            //'receive_phone',
            //'address',
            //'receive_address',
            //'note:ntext',
            //'status',
            //'total_cost',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
