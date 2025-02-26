<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ServiceCategory */

$this->title = 'Create Service Category';
$this->params['breadcrumbs'][] = ['label' => 'Service Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
