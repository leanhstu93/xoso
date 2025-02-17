<?php

use frontend\models\Banner;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\ConfigWebsite;
use common\components\MyHelpers;
?>
<div class="content-left">
    <div class="box-content">
        <div class="box-thong-ke text-center">
            <div class="xsmo-thuong-homnay">
                <div class="tieude_xs mothuong w100">
                    <h1 class="title-post">
                        XSMN - XỔ SỐ MIỀN NAM <?php echo MyHelpers::getDayOfWeekInVietnamese($time) ?>
                    </h1>
                </div>
                <div class="content"></div>
            </div>
        </div>
        <?php  echo $this->render("//element/table-thu"); ?>
    </div>
    <div class="box-kqxs">
        <div class="tructiepmn">
            <?php

            /// Hiển thị thông tin xổ số 5 ngay gần nhất
            $step = 0 ;
            for($i = 0; $i < 6; $i++) {
                $timestamp = $time - $step;
                $step = $step + (7 * 3600*24);
                $date = date('Y-m-d', $timestamp);
                $dataXoSo = ConfigWebsite::getUrlXoSoFollowThu($date);
                ?>

            <div class="tieude_xs text-center">
                <h2 class="title-post">
                    <a href="javascript:;" title="Kết quả xổ số Miền Nam - KQXS MN">Kết quả xổ số Miền Nam - KQXS MN</a></h2>
                <h3 class="title-xsmb-item" id="ketquamnlivehead">
                    <a href="javascript:;" title="XSMN">XSMN</a> » 
                    <a href="javascript:;">XSMN <?php echo MyHelpers::getDayOfWeekInVietnamese($timestamp) ?></a> » 
                    <a href="javascript:;">XSMN <?php echo date("d/m/Y", $timestamp) ?></a>
                </h3>
	        </div>

                <?php

                foreach($dataXoSo as $key => $value) {
                    $dataRaw = ConfigWebsite::analyticXoso($value['url']);

                    if ($dataRaw['code'] == 200) {
                        $dataXoSo[$key] = array_merge($value, [
                            'data' => $dataRaw['data']
                        ]);
                    }
                }

                echo $this->render("//element/xoso/table-xoso", ['data' => $dataXoSo, 'isRealtime' => 0]); 
            }
            ?>

        </div>
    </div>
            
    <div class="box-content">
        <?php // echo $this->render("//element/home/table-xo-so-mien-nam-hom-nay"); ?>
    </div>
</div>
<?php  echo $this->render("//element/sidebar-midle"); ?>
<?php  echo $this->render("//element/sidebar-right"); ?>