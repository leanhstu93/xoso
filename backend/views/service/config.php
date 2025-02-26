<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Cấu hình trang tin tức';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$menu =   [
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
        'name' => 'Tags',
        'link' => 'js__tags',
        'icon' =>'icon wb-heart'
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

];
?>

<!-- Page -->
<div class="page">
    <div class="panel-body container-fluid">
        <?php echo $this->render("//element/page-aside",['data' => $menu]);?>
        <div class="page-main">
            <?php echo $this->render("//element/message"); ?>
            <div class="page-content">
                <?php echo $this->render("//element/breadcrumb"); ?>
                <?= $this->render('_form-config', [
                    'model' => $model,
                    'menu' => array_reverse($menu),
                    'dataLang' => $dataLang
                ]) ?>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
