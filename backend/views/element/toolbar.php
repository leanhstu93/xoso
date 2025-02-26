<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php if (Yii::$app->controller->action->id == 'index') { ?>
<div class="page-header-actions">
    <a type="button" href="<?=  Url::to(['create']) ?>" class="btn btn-primary ladda-button" data-style="slide-down" data-plugin="ladda">
      <span class="ladda-label">
          <i class="fa-plus-square-o fa-5 fa " aria-hidden="true"></i>
        Thêm mới
      </span>
        <span class="ladda-spinner"></span>
    </a>
</div>
<?php } ?>