<div class="page-aside">

    <div class="page-aside-switch">
        <i class="icon wb-chevron-left" aria-hidden="true"></i>
        <i class="icon wb-chevron-right" aria-hidden="true"></i>
    </div>

    <div class="page-aside-inner page-aside-scroll js__page-aside-section">
        <div data-role="container" class="scrollable-container" style="height: 691px; width: 276px;">
            <div data-role="content" class="scrollable-content" style="width: 259px;">
                <section class="page-aside-section">
                    <h5 class="page-aside-title">Menu</h5>
                    <div class="list-group js__sidebar">
                        <?php foreach ($data as $key=>$value) { ?>
                        <a class="list-group-item list-group-item-action js__sidebar-item" data-link="<?= $value['link'] ?>" href="#<?= $value['link'] ?>">
                            <i class="<?= $value['icon'] ?>" aria-hidden="true"></i>
                            <?php echo $value['name'] ?>
                        </a>
                        <?php } ?>
                    </div>
                    <?php $listLanguage = Yii::$app->params['listLanguage'];
                    if (!empty($listLanguage) && count($listLanguage) > 0) {
                    ?>
                    <ul class="nav nav-tabs js-list-language">
                        <?php
                        foreach ($listLanguage as $key => $value) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link js-nav-item-<?= $key ?> js-nav-item <?= $value['default'] == true ? 'active' : '' ?>" href="javascript:void(0)" data-code="<?= $key ?>">
                            <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/<?= $value['icon'] ?>" width="15px"> <?= $value['name'] ?>
                            </a>
                        </li>
                    <?php } ?>
                    </ul>
                    <?php } ?>

                </section>
            </div>
        </div>
        <div class="scrollable-bar scrollable-bar-vertical is-disabled scrollable-bar-hide" draggable="false"><div class="scrollable-bar-handle"></div></div></div>
    <!---page-aside-inner-->
</div>