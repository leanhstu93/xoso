<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ServiceCategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Service Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="service-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'seo_name',
            'desc:ntext',
            'content:ntext',
            'tags',
            'option',
            'meta_title',
            'meta_desc',
            'meta_keyword',
            'display_order',
            'image',
            'active',
            'user_id',
            'date_create',
            'date_update',
        ],
    ]) ?>

</div>
