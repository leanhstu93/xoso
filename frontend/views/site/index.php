<?php

use frontend\models\Banner;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\ConfigWebsite;
use common\components\MyHelpers;

/**
 * TODO Giao diện xổ số trang chủ và miền trung giống nhau
 * do đó khi sữa gì thì phải sữa 2 trang
 */
?>
<div class="content-left">
    <div class="box-content">
        <div class="box-thong-ke text-center">
            <div class="xsmo-thuong-homnay">
                <div class="tieude_xs mothuong w100">
                    <h1 class="title-post">
                        XSMN - XỔ SỐ MIỀN NAM HÔM NAY
                    </h1>
                </div>
                <div class="content"></div>
            </div>
        </div>
       
        <?php  echo $this->render("//element/table-thu" , ['type' => ConfigWebsite::TYPE_MIEN_NAM]); ?>

    </div>
    <div class="box-kqxs">
        <div class="tructiepmn js__list-table-xo-so-mien-nam">
            <?php

            /// Hiển thị thông tin xổ số 5 ngay gần nhất
            for($i = 0; $i < 6; $i++) {
                /**
                 * Nếu ngày hiên tại trước 16h35 thì không lấy , do chưa tới
                 * giờ xổ số
                 */
                if ($i == 0 && (
                     date('H') < 16 ||
                     date('H') == 16 &&  date('i') < 35
                )) {
                    continue;
                }

                $timestamp = strtotime("-".$i." day");
                $date = date('Y-m-d', $timestamp);
                $dataXoSo = ConfigWebsite::getUrlXoSoFollowThu($date);
                ?>

            <div class="tieude_xs text-center">
                <h2 class="title-post">
                    <a href="javascript:;" 
                    title="Kết quả xổ số Miền Nam - KQXS MN">Kết quả xổ số Miền Nam - KQXS MN</a></h2>
                <h3 class="title-xsmb-item" id="ketquamnlivehead">
                    <a href="/" title="XSMN">XSMN</a> » 
                    <a href="/xo-so-mien-nam-<?php echo MyHelpers::getDayOfWeekInVietnamese($timestamp) != 'CN' ? MyHelpers::convertToSlug(MyHelpers::getDayOfWeekInVietnamese($timestamp)) : 'thu-chu-nhat' ?>">XSMN <?php echo MyHelpers::getDayOfWeekInVietnamese($timestamp)  ?></a> » 
                    <a href="javascript:;" class="text-decoration-none">XSMN <?php echo date("d/m/Y", $timestamp) ?></a>
                </h3>
	        </div>

                <?php
                
                foreach($dataXoSo as $key => $value) {
                    $dataRaw = ConfigWebsite::analyticXoso($value['url'],$timestamp);
                 
                    if ($dataRaw['code'] == 200) {
                        $dataXoSo[$key] = array_merge($value, [
                            'data' => $dataRaw['data']
                        ]);
                    } else {
                        unset($dataXoSo[$key]);
                    }
                }
                // $dataXoSo = array_values($dataXoSo);
             
                if (empty($dataXoSo)) {
                  
                    continue;
                }
                echo $this->render("//element/xoso/table-xoso", ['data' => $dataXoSo]); 
            }
            ?>

        </div>
    </div>
            
    <div class="box-content">
        <?php // echo $this->render("//element/home/table-xo-so-mien-nam-hom-nay"); ?>
    </div>
</div>
<?php  echo $this->render("//element/sidebar-midle"); ?>
<?php    echo $this->render("//element/sidebar-right"); ?>

