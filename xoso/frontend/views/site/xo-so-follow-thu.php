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
        <div class="box-thong-ke text-center">
            <div class="xsmo-thuong-homnay">
                <table class="table-bordered w100">
                    <tbody>
                    <tr>
                        <td class="td col4"><a href="javascript:;" class="breadcrumb-item">Miền Nam</a> </td>
                        <td class="td col4"><a href="javascript:;" class="xs-thu">Thứ 2</a></td>
                        <td class="td col4"><a href="javascript:;" class="xs-thu">Thứ 3</a></td>
                        <td class="td col4"><a href="javascript:;" class="xs-thu">Thứ 4</a></td>
                    </tr>
                    <tr>
                        <td class="td col4"><a href="javascript:;" class="xs-thu">Thứ 5</a></td>
                        <td class="td col4"><a href="javascript:;" class="xs-thu">Thứ 6</a></td>
                        <td class="td col4"><a href="javascript:;" class="xs-thu">Thứ 7</a></td>
                        <td class="td col4"><a href="javascript:;" class="xs-thu">CN</a></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
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

                echo $this->render("//element/xoso/table-xoso", ['data' => $dataXoSo, 'isRealtime' => $i == 0]); 
            }
            ?>

        </div>
    </div>
            
    <div class="box-content">
        <?php // echo $this->render("//element/home/table-xo-so-mien-nam-hom-nay"); ?>
    </div>
</div>
<?php // echo $this->render("//element/home/design-website-pro"); ?>
<?php // echo $this->render("//element/home/think-design-solution"); ?>
<?php // echo $this->render("//element/home/think-design-solution-smart"); ?>
<?php // echo $this->render("//element/home/review"); ?>
<?php // echo $this->render("//element/home/service"); ?>
<?php // echo $this->render("//element/home/template"); ?>
<?php // echo $this->render("//element/home/hotline"); ?>
<?php // echo $this->render("//element/home/ceo"); ?>
<?php // echo $this->render("//element/home/member"); ?>
<?php // echo $this->render("//element/home/news"); ?>
<?php // echo $this->render("//element/home/contact"); ?>
