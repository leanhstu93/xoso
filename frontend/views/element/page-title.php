<?php

use frontend\models\Banner;

$banner = Banner::getDataByCustomSetting('one_page_title');

?>
<section class="page-title" style="background-image:url(<?= $banner->images->image ?>)">
    <div class="container">
        <h1>  <?= $name ?></h1>
        <?php echo $this->render("//element/breadcrumb",['data' => $bread]); ?>
    </div>
</section>