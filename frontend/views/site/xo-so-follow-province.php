<?php

use frontend\models\Banner;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\ConfigWebsite;
use common\components\MyHelpers;

// timestamp Ngay Xo sO gan nhat tu api
$timeLast = ConfigWebsite::getDateXoSoLastFromUrl($url . ".js");
if (empty($timeLast)) {
    Yii::$app->response->redirect([''])->send();
exit;
}

?>
<div class="content-left">
    <div class="box-content">
        <div class="box-thong-ke text-center">
            <div class="xsmo-thuong-homnay">
                <div class="tieude_xs mothuong w100">
                    <h1 class="title-post">
                        XSMN - XỔ SỐ <?php echo $data['label'] ?>
                    </h1>
                </div>
                <div class="content"></div>
            </div>
        </div>
        <?php  echo $this->render("//element/table-thu", ['type' => $data['mien_type']]); ?>
    </div>
    <div class="box-kqxs">
        <div class="tructiepmn <?php echo $province == ConfigWebsite::TYPE_PROVINCE_MIEN_BAC ? 'js__list-table-xo-so-mien-bac' : '' ?>">
            <?php

            /// Hiển thị kết quả xổ số 5 kỳ gần nhất
            $step = 0 ;
           
            for($i = 0; $i < 6; $i++) {
                $timeLast = $timeLast - $step;
                $numStep = 7;
                /**
                 * HCM xổ số thứ 2 và thứ 7
                 */
                if ($province == ConfigWebsite::TYPE_PROVINCE_HO_CHI_MINH) {
                    // Thu 2
                    if (date('N', $timeLast) == 1) {
                        $numStep = 2; // 2 ngay
                    } elseif (date('N', $timeLast) == 6) { // Thu 7
                        $numStep = 5;
                    }
                } elseif ($province == ConfigWebsite::TYPE_PROVINCE_THUA_THIEN_HUE) {
                    if (date('N', $timeLast) == 1) {
                        $numStep = 1; // 2 ngay
                    } elseif (date('N', $timeLast) == 7) { // chu nhat
                        $numStep = 6;
                    }
                } elseif ($province == ConfigWebsite::TYPE_PROVINCE_MIEN_BAC) {
                    $numStep = 1;
                }
                
                $step = $numStep * 3600*24;
                
                $date = date('Y-m-d',$timeLast);
               
                ?>

                    <div class="tieude_xs text-center">
                        <h2 class="title-post">
                            <a href="javascript:;" 
                            title="Kết quả xổ số <?php echo $data['label'] ?>">
                            Kết quả xổ số <?php echo $data['label'] ?></a>
                        </h2>
                        <h3 class="title-xsmb-item" id="ketquamnlivehead">
                            <?php 
                            if ($province == ConfigWebsite::TYPE_PROVINCE_MIEN_BAC) {
                            ?>
                            <a href="/xsmb-xo-so-mien-bac" title="XSMN">XSMB</a> 
                            »                         
                        <a href="javascript:;">XSMB <?php echo date("d/m/Y",$timeLast) ?></a>
                        <?php } else { ?>
                                <a href="/" title="XSMN">XSMN</a> 
                                »                         
                        <a href="javascript:;">XSMN <?php echo date("d/m/Y",$timeLast) ?></a>
                                <?php } ?>
                           
                        </h3>
                    </div>

                <?php
                $urlTmp = $url . '.js';
                         
                if ($i > 0) {
                    $urlTmp = $url . '/' . date("d-m-Y", $timeLast) . ".js ";
                }   
        
                $dataRaw = ConfigWebsite::analyticXoso($urlTmp,  date("d-m-Y", $timeLast));
                
                if ($dataRaw['code'] == 200) {
                    if ($province != ConfigWebsite::TYPE_PROVINCE_MIEN_BAC){
                        
                        echo $this->render("//element/xoso/table-xoso-follow-province", ['data' => $dataRaw['data']]); 
                    } else {
                        echo $this->render("//element/xoso/table-xoso-follow-province-mien-bac", ['data' => $dataRaw['data']]); 
                    }   
                }
                
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