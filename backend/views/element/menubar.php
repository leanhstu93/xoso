<?php
$menubarAdmin = \Yii::$app->params['menubarAdmin'];
?>
<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                   <?php foreach($menubarAdmin as $key => $item) { ?>
                        <li class="site-menu-item has-sub">
                            <a href="<?php
                            echo (empty($item['link']) || $item['link'] == 'javascript:void(0)') ? 'javascript:void(0)' :
                                 Yii::$app->getUrlManager()->getBaseUrl(). '/' . $item['link'];
                            ?>">
                                <?php echo $item['icon'] ?>
                                <span class="site-menu-title"><?php echo $item['name'] ?></span>
                                <?php if(!empty($item['submenu'])){ ?>
                                  <span class="site-menu-arrow"></span>
                                <?php } ?>
                            </a>
                        <?php
                            if(!empty($item['submenu'])){ ?>
                                <ul class="site-menu-sub">
                         <?php  foreach($item['submenu'] as $key_sub => $item_sub) { ?>
                                     <li class="site-menu-item">
                                         <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl().'/'.$item_sub['link'] ?>">
                                             <span class="site-menu-title">
                                                 <?php echo $item_sub['name'] ?>
                                             </span>
                                         </a>
                                     </li>
                            <?php } ?>
                                </ul>
                        <?php } ?>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
