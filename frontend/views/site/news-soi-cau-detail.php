<?php

use frontend\models\Banner;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\ConfigWebsite;
use common\components\MyHelpers;
?>
<div class="content-left">
    <div class="box-content single_detal">
        <div class="singer">
            <h1 class="title-post-singer"><?php echo $data->title ?></h1>
           
            <div class="entry">
            <?= $data->content ?>
            </div>
        </div>
    </div>

    <div class="relation">
	<div style=" font-weight:bold;margin: 5px 0;">Tin liên quan</div>
	<ul>
        <?php
        if (empty($preview)) {
            foreach ( $dataRL as $item) { ?>
                <li>
                <a href="<?php echo $item->getUrl()?>" 
                title="<?php echo $item->title ?>">
               <?php echo $item->title ?>
            </a>
            </li>
            <?php } 
        }
        ?>
			
		</ul>
</div>
</div>
<?php  echo $this->render("//element/sidebar-midle"); ?>
<?php  echo $this->render("//element/sidebar-right"); ?>
<?php // echo $this->render("//element/home/think-design-solution-smart"); ?>
<?php // echo $this->render("//element/home/review"); ?>
<?php // echo $this->render("//element/home/service"); ?>
<?php // echo $this->render("//element/home/template"); ?>
<?php // echo $this->render("//element/home/hotline"); ?>
<?php // echo $this->render("//element/home/ceo"); ?>
<?php // echo $this->render("//element/home/member"); ?>
<?php // echo $this->render("//element/home/news"); ?>
<?php // echo $this->render("//element/home/contact"); ?>
