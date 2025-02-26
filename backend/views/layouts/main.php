<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="animsition page-aside-fixed  page-aside-left">
<?php $this->beginBody() ?>
<?php echo $this->render("//element/header"); ?>
<?php echo $this->render("//element/menubar"); ?>
<?php echo $content; ?>
<?php $this->endBody() ?>
<script>
    Breakpoints();
</script>

<script>
    Config.set('assets', '../assets');
</script>

<?php if (isset($this->blocks['block1'])): ?>
    <?= $this->blocks['block1'] ?>
<?php endif; ?>

</body>
</html>
<?php $this->endPage() ?>
