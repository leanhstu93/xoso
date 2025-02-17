<?php

use frontend\models\Banner;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\ConfigWebsite;
use common\components\MyHelpers;

$title = 'MIỀN NAM';
$titleSub = 'MN';

if ($type == ConfigWebsite::TYPE_MIEN_BAC) {
    $title = 'MIỀN BẮC';
    $titleSub = 'MN';
} else if ($type == ConfigWebsite::TYPE_MIEN_TRUNG) {
    $title = 'MIỀN TRUNG';
    $titleSub = 'MT';
}


?>
<div class="content-left">
    <div class="box-content">
        <div class="box-thong-ke text-center">
            <div class="xsmo-thuong-homnay">
                <div class="tieude_xs mothuong w100">
                    <h1 class="title-post">
                    <?php echo  $titleSub ?> - XỔ SỐ <?php echo  $title ?> <?php echo MyHelpers::getDayOfWeekInVietnamese($time) ?>
                    </h1>
                </div>
                <div class="content"></div>
            </div>
        </div>
        <?php  echo $this->render("//element/table-thu", ['type' => $type]); ?>
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
                
                if ($type == ConfigWebsite::TYPE_MIEN_BAC) {
                   $txtDate = date('d-m-Y', strtotime($date));
                    $dataXoSo = [
                        [
                            'label' => 'Miền Bắc',
                            'province_type' => ConfigWebsite::TYPE_PROVINCE_MIEN_BAC,
                            'url' => ConfigWebsite::URL_MIEN_BAC .  '/' .  $txtDate. '.js'
                        ],
                    ];
                } else if ($type == ConfigWebsite::TYPE_MIEN_TRUNG) {
                    $dataXoSo = ConfigWebsite::getUrlXoSoFollowThuMienTrung($date);
                } else {
                    $dataXoSo = ConfigWebsite::getUrlXoSoFollowThu($date);
                }
                
                ?>

            <div class="tieude_xs text-center">
                <h2 class="title-post">
                    <a href="javascript:;" title="Kết quả xổ số <?php echo  $title ?> - KQXS <?php echo  $titleSub ?>">Kết quả xổ số <?php echo  $title ?> - KQXS <?php echo  $titleSub ?></a></h2>
                <h3 class="title-xsmb-item" id="ketquamnlivehead">
                    <a href="javascript:;" title="XSMN">XSMN</a> » 
                    <a href="javascript:;">XS<?php echo  $titleSub ?> <?php echo MyHelpers::getDayOfWeekInVietnamese($timestamp) ?></a> » 
                    <a href="javascript:;">XS<?php echo  $titleSub ?> <?php echo date("d/m/Y", $timestamp) ?></a>
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
             
                if ($type != ConfigWebsite::TYPE_MIEN_BAC){
                    echo $this->render("//element/xoso/table-xoso", ['data' => $dataXoSo]); 
                } else {
                    echo $this->render("//element/xoso/table-xoso-follow-province-mien-bac", ['data' =>  $dataXoSo]); 
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