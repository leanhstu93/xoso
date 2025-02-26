<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use iutbay\yii2kcfinder\KCFinderInputWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductCategory */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="product-form">
    <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
    <div class="row">
        <?php if(!empty($custom['CUSTOM_IMAGE'])){ ?>
            <?= $this->render('block-setting-image', array('data'=>$custom['CUSTOM_IMAGE'], 'form' => $form)); ?>
        <?php } ?>

        <?php if(!empty($custom['CUSTOM_SINGLE_PAGE'])){ ?>
            <?= $this->render('block-setting-single-page', array('data'=>$custom['CUSTOM_SINGLE_PAGE'], 'form' => $form)); ?>
        <?php } ?>

        <?php if(!empty($custom['CUSTOM_NEWS_CATEGORY'])){ ?>
            <?= $this->render('block-setting-news-category', array('data'=>$custom['CUSTOM_NEWS_CATEGORY'], 'form' => $form)); ?>
        <?php } ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
