<?php

use frontend\models\ServiceCategory;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$menu =  [
    [
        'name' => 'Tổng quan',
        'link' => 'js__overview',
        'icon' =>'icon wb-dashboard'
    ],
    [
        'name' => 'Hình ảnh',
        'link' => 'js__image',
        'icon' =>'icon wb-image'
    ],
    [
        'name' => 'Trạng thái',
        'link' => 'js__status',
        'icon' =>'icon wb-heart'
    ],
    [
        'name' => 'SEO',
        'link' => 'js__seo',
        'icon' =>'icon fa-google-plus'
    ],
    [
        'name' => 'Xử lý',
        'link' => 'js__save',
        'icon' =>'fa fa-hand-grab-o'
    ],
];
$listCate = ServiceCategory::find()->select('id,name')->where(['active' => 1])->asArray()->all();
$listCate = array_combine(array_column($listCate,'id'),array_column($listCate,'name'));
$listCate = $listCate;

?>


<!-- Page -->
<div class="page">
    <div class="panel-body container-fluid">
        <?php echo $this->render("//element/page-aside",['data' =>$menu]); ?>
        <div class="page-main ">
            <?php echo $this->render("//element/message"); ?>
            <div class="page-content css_page-main">
                <?php echo $this->render("//element/breadcrumb"); ?>
                <?= $this->render('_form', [
                    'model' => $model,
                    'menu' => array_reverse($menu),
                    'listCate' => $listCate,
                    'dataLang' => $dataLang
                ]) ?>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->

