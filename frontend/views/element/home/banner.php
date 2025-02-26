<?php

use frontend\models\Banner;

?>
<section class="main-slider w100">
    <?php
    $banner = Banner::getDataByCustomSetting('banner_home');

    ?>
    <img src="<?php echo $banner->images->image ?>" class="w100">
</section>