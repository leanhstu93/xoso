<?php
/**
 * @var $id_category
 */

use frontend\models\Banner;
use frontend\models\ProductCategory;
?>
<div class="sidebar-column col-lg-4 col-xl-3">
    <div class="sidebar mb-30">
    <?php if (!empty($data)) { ?>
        <!--Category Widget-->
        <div class="sidebar-widget service-category-widget">
            <div class="widget-content">
                <div class="sidebar-title-two">
                    <h4>Danh mục sản phẩm</h4>
                </div>
                <ul>
                    <?php
                        foreach ($data as $item) {
                            if ($item['parent_id'] == 0) {
                                ?>
                                <li>
                                    <a href="<?php echo $item->getUrl() ?>"><?php echo $item['name'] ?></a>
                                </li>
                            <?php } ?>
                            <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
        <?php } ?>
        <!--Branch Widget-->
        <div class="sidebar-widget branch-widget">
            <div class="widget-content">
                <div class="sidebar-title-two">
                    <h4>Hotline: <?= $this->params['company']->phone ?></h4>
                </div>
                <ul>
                    <li><a href="#">Phòng kinh doanh<span class="price"><?= $this->params['company']->phone ?></span></a></li>
                    <li><a href="#">Phòng kỹ thuật<span class="price"><?= $this->params['company']->phone ?></span></a></li>
                    <li><a href="#">Giải quyết khiếu nại<span class="price"><?= $this->params['company']->phone ?></span></a></li>
                </ul>
            </div>
        </div>

        <!--Meeting Widget-->
        <?php
        $banner = Banner::getDataByCustomSetting('list_banner_single_page_left');
        foreach ($banner->images as $item) {
        ?>
        <div class="sidebar-widget consulting-widget">
            <div class="widget-content">
                <img src="<?= $item->image ?>">
            </div>
        </div>
        <?php } ?>
    </div>
</div>