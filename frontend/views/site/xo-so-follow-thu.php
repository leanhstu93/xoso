<?php

use frontend\models\Banner;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\ConfigWebsite;
use common\components\MyHelpers;

$title = 'MIỀN NAM';
$titleSub = 'MN';
$aliasXoSoTheoMien = '/';
if ($type == ConfigWebsite::TYPE_MIEN_BAC) {
    $aliasXoSoTheoMien = '/xsmb-xo-so-mien-bac';
    $title = 'MIỀN BẮC';
    $titleSub = 'MB';
} else if ($type == ConfigWebsite::TYPE_MIEN_TRUNG) {
    $aliasXoSoTheoMien = '/xo-so-mien-trung';
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

                // Kiểm tra ngày hiện tại đến giờ xổ số chưa
                if ($date == date('Y-m-d') && !ConfigWebsite::checkTimeXoSo($type)) {
                    continue;
                }

                $aliasXoSoTheoThu = '/xo-so-mien-nam-' . (MyHelpers::getDayOfWeekInVietnamese($timestamp) != 'CN' ? MyHelpers::convertToSlug(MyHelpers::getDayOfWeekInVietnamese($timestamp)) : 'thu-chu-nhat');
                
                if ($type == ConfigWebsite::TYPE_MIEN_BAC) {
                    $aliasXoSoTheoThu = '/xo-so-mien-bac-' . (MyHelpers::getDayOfWeekInVietnamese($timestamp) != 'CN' ? MyHelpers::convertToSlug(MyHelpers::getDayOfWeekInVietnamese($timestamp)) : 'thu-chu-nhat');

                   $txtDate = date('d-m-Y', strtotime($date));
                    $dataXoSo = [
                        [
                            'label' => 'Miền Bắc',
                            'province_type' => ConfigWebsite::TYPE_PROVINCE_MIEN_BAC,
                            'url' => ConfigWebsite::URL_MIEN_BAC .  '/' .  $txtDate. '.js'
                        ],
                    ];
                } else if ($type == ConfigWebsite::TYPE_MIEN_TRUNG) {
                    $aliasXoSoTheoThu = '/xo-so-mien-trung-' . (MyHelpers::getDayOfWeekInVietnamese($timestamp) != 'CN' ? MyHelpers::convertToSlug(MyHelpers::getDayOfWeekInVietnamese($timestamp)) : 'thu-chu-nhat');
                    $dataXoSo = ConfigWebsite::getUrlXoSoFollowThuMienTrung($date);
                } else {
                    $dataXoSo = ConfigWebsite::getUrlXoSoFollowThu($date);
                }
              
                ?>

            <div class="tieude_xs text-center">
                <h2 class="title-post">
                    <a href="" title="Kết quả xổ số <?php echo  $title ?> - KQXS <?php echo  $titleSub ?>">Kết quả xổ số <?php echo  $title ?> - KQXS <?php echo  $titleSub ?></a></h2>
                <h3 class="title-xsmb-item" id="ketquamnlivehead">
                    <a href="<?php echo $aliasXoSoTheoMien  ?>" title="XS<?php echo  $titleSub ?>">XS<?php echo  $titleSub ?></a> » 
                    <a href="<?php echo $aliasXoSoTheoThu ?>">XS<?php echo  $titleSub ?> <?php echo MyHelpers::getDayOfWeekInVietnamese($timestamp) ?></a> » 
                    <a href="javascript:;" class="text-decoration-none">XS<?php echo  $titleSub ?> <?php echo date("d/m/Y", $timestamp) ?></a>
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
                    if (empty($dataXoSo)) continue;
                    echo $this->render("//element/xoso/table-xoso", ['data' => $dataXoSo]); 
                } else {
                    if (empty($dataXoSo[0]['data'])) continue;
                    
                    echo $this->render("//element/xoso/table-xoso-follow-province-mien-bac", ['data' =>  $dataXoSo[0]['data']]); 
                }  

              
            }
            ?>

        </div>
    </div>
            
    <div class="box-content">
        
    </div>
</div>
<?php  echo $this->render("//element/sidebar-midle"); ?>
<?php  echo $this->render("//element/sidebar-right"); ?>