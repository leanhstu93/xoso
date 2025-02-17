<?php

use frontend\models\News;
use frontend\models\SinglePage;
?>
<footer class="w100">
    <div class="w1000">
        <div class="menufooter">
            <ul>
                <?php
                foreach ($this->params['menu'] as $item) {
                    $class_sub = !empty($item['sub_menu']) ? 'dropdown' : '';
                    if ($item['module'] != 'news') {
                    ?>
                    <li><a href="<?= $item['link'] ?>"><?php echo $item['name'] ?></a>
                    </li>
                    <?php } else { ?>
                        <?php foreach ($item['sub_menu'] as $item1) {
                                $class_sub = !empty($item1['sub_menu']) ? 'dropdown' : '';
                                ?>
                                <li class="current <?= $class_sub ?>">
                                    <a href="<?= $item1['link'] ?>"><?= $item1['name'] ?>
                                        <?php if (!empty($item1['sub_menu'])) { ?>
                                            <i class="fas fa-angle-right"></i>
                                        <?php } ?>
                                    </a>
                                    <?php
                                    if (!empty($item1['sub_menu'])) {
                                        ?>
                                        <ul>
                                            <?php foreach ($item1['sub_menu'] as $item2) {
                                                $class_sub = !empty($item2['sub_menu']) ? 'dropdown' : '';
                                                ?>
                                                <li  class="current <?= $class_sub ?>">
                                                    <a href="<?= $item2['link'] ?>"><?= $item2['name'] ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        <?php } ?>
                <?php } ?>
            </ul>
        </div>

        <div class="row-footer">
            ©Copyright 2025 by xsmt.club All right reserved
            <br>
            Chuyên trang Kết quả Xổ Số, Phân tích, soi cầu, thống kê và Tường thuật trức tiếp kết quả xổ số Ba Miền nhanh nhất, chính xác nhất.
        </div>
    </div>
</footer>

<a href="#" class="scroll-top js_scroll-top">
    <i class="fal fa-arrow-up"></i>
</a>


