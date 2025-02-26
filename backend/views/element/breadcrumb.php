<?php

use common\widgets\Alert;
use yii\widgets\Breadcrumbs;

?>

    <div class="page-header">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <h1 class="page-title"><?= $this->title  ?></h1>
        <?php echo $this->render("//element/toolbar"); ?>
    </div>
<?= Alert::widget() ?>