
<?php

use frontend\models\Banner;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\ConfigWebsite;
use common\components\MyHelpers;
?>
<div class="box-ketqua <?php echo $isRealtime ? 'js__table-load-kqsx' :  '' ?>" 
    data-type="<?php echo ConfigWebsite::TYPE_MIEN_NAM ?>"
    id="mn_kqngay_kq"
    >
    <table class="table table-bordered text-center">
        <tbody>
        <tr class="bgedf2fa">
            <td class="giai-txt"> G </td>
            <?php 
                foreach($data as $item) {
                ?>
                    <td class="number col3">
                        <span title="<?php echo $item['label'] ?>" class="title-ttp textlotoblue"><?php echo $item['label'] ?></span>
                    </td>
            <?php } ?>
            
            </tr>
        <?php 
      
        for($i = (count($data[0]['data']) - 1); $i >= 0; $i--) {
            $item = $data[0]['data'][$i];
            $item2 = $data[1]['data'][$i];
            $item3 = $data[2]['data'][$i];
            $classCol = 'col'.count($data);
            $classRed = $i == 8 || $i == 0 ? 'colorred' : '';
        ?>
        <tr class="<?php echo $i + 1 % 2 == 0 ? 'bgedf2fa' : '' ?>">
            <td class="giai-txt"> <?php echo $i == 0 ? 'ĐB' : $i ?> </td>

            <td class="number <?php echo $classCol ?>">               
                    <?php if (is_array( $item)){ 
                        foreach ($item as $k1 => $v1) {
                            echo '<span class="item  xshover font24" id="TG_prize4_item0">'.$v1.'</span>';
                        }
                    ?>
                        <?php } else {
                            echo '<span class="item '.$classRed.'  xshover font24" id="TG_prize8_item0">';
                            echo $item;
                            echo '</span>';
                            }
                        ?>
                
            </td>
            <td class="number <?php echo $classCol ?>">
            <?php if (is_array( $item2 )){ 
                        foreach ($item2 as $k1 => $v1) {
                            echo '<span class="item  xshover font24" id="TG_prize4_item0">'.$v1.'</span>';
                        }
                    ?>
                        <?php } else {
                            echo '<span class="item '.$classRed.'  xshover font24" id="TG_prize8_item0">';
                            echo $item2;
                            echo '</span>';
                            }
                        ?>
            </td>
            <td class="number <?php echo $classCol ?>">
            <?php if (is_array( $item3)){ 
                        foreach ($item3 as $k1 => $v1) {
                            echo '<span class="item  xshover font24" id="TG_prize4_item0">'.$v1.'</span>';
                        }
                    ?>
                        <?php } else {
                            echo '<span class="item '.$classRed.'  xshover font24" id="TG_prize8_item0">';
                            echo $item3;
                            echo '</span>';
                            }
                        ?>
            </td>
            <?php if (count($data) == 4) { 
                 $item4 = $data[3]['data'][$i];
                ?>
                <td class="number <?php echo $classCol ?>">
                <?php if (is_array( $item4)){ 
                        foreach ($item4 as $k1 => $v1) {
                            echo '<span class="item  xshover font24" id="TG_prize4_item0">'.$v1.'</span>';
                        }
                    ?>
                        <?php } else {
                            echo '<span class="item '.$classRed.'  xshover font24" id="TG_prize8_item0">';
                            echo $item4;
                            echo '</span>';
                            }
                        ?>
                </td>
            <?php } ?>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- 
<div class="bang-loto">
    <table class="table table-bordered" id="bangkqloto_mn">
        <thead>
            <tr>
                <th class="td-title">Đầu</th>
                <?php 
                foreach($data as $item) {
                ?>
                <th class="td-title">
                    <span title="<?php echo $item['label'] ?>"><?php echo $item['label'] ?></span></th>
                <?php } ?>
                    </tr>
            </thead>
            <tbody>
           
            <tr class="">
                <td class="giai-txt colorred"> 0 </td>

                <td class="number loto font18 col3"></td>
                <td class="number loto font18 col3">6;</td>
                <td class="number loto font18 col3"></td>
                    </tr>
          
            <tr>
                <td class="giai-txt colorred"> 1 </td>

                <td class="number loto font18 col3">2;6;7;9;</td>
                <td class="number loto font18 col3">2;7;</td>
                <td class="number loto font18 col3">6;8;</td>
                                </tr>
            <tr class="bgedf2fa">
                <td class="giai-txt colorred"> 2 </td>

                <td class="number loto font18 col3"></td>
                <td class="number loto font18 col3">1;</td>
                <td class="number loto font18 col3">5;8;</td>
                                </tr>
            <tr>
                <td class="giai-txt colorred"> 3 </td>

                <td class="number loto font18 col3">8;</td>
                <td class="number loto font18 col3">4;</td>
                <td class="number loto font18 col3">2;<span style="color: #FF3322">6;</span> </td>
                                </tr>
            <tr class="bgedf2fa">
                <td class="giai-txt colorred"> 4 </td>

                <td class="number loto font18 col3">2;4;9;</td>
                <td class="number loto font18 col3"></td>
                <td class="number loto font18 col3">2;</td>
                                </tr>
            <tr>
                <td class="giai-txt colorred"> 5 </td>

                <td class="number loto font18 col3">1;9;</td>
                <td class="number loto font18 col3">6;8;9;</td>
                <td class="number loto font18 col3">4;6;</td>
                                </tr>
            <tr class="bgedf2fa">
                <td class="giai-txt colorred"> 6 </td>

                <td class="number loto font18 col3">3;</td>
                <td class="number loto font18 col3">3;6;</td>
                <td class="number loto font18 col3">6;8;</td>
                                </tr>
            <tr>
                <td class="giai-txt colorred"> 7</td>

                <td class="number loto font18 col3">5;</td>
                <td class="number loto font18 col3"></td>
                <td class="number loto font18 col3"></td>
                                </tr>
            <tr class="bgedf2fa">
                <td class="giai-txt colorred"> 8</td>

                <td class="number loto font18 col3">4;<span style="color: #FF3322">6;</span> </td>
                <td class="number loto font18 col3">3;<span style="color: #FF3322">5;</span> 5;8;</td>
                <td class="number loto font18 col3">5;</td>
                                </tr>
            <tr>
                <td class="giai-txt colorred"> 9</td>

                <td class="number loto font18 col3">8;9;</td>
                <td class="number loto font18 col3">1;5;</td>
                <td class="number loto font18 col3">2;6;</td>
                                </tr>
            </tbody>
    </table>
</div>
 -->