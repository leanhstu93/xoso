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
    <?php
    $this->registerCssFile("@web/css/login.min.css");
    ?>
    <?php $this->head() ?>
</head>
<body class="animsition page-login layout-full page-dark">
<?php $this->beginBody() ?>

<?php echo $content; ?>
<?php $this->endBody() ?>
<script>
    Breakpoints();
</script>
<script>
    Config.set('assets', '../assets');
</script>
</body>
</html>
<?php $this->endPage() ?>
