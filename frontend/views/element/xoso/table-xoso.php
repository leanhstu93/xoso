
<?php

use frontend\models\Banner;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\ConfigWebsite;
use common\components\MyHelpers;

?>
<div class="box-ketqua" 
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
                            <span title="<?php echo $item['label'] ?>" 
                            class="title-ttp textlotoblue"><?php echo $item['label'] ?></span>
                        </td>
                <?php } ?>
                
                </tr>
            <?php
            if (!empty($data)) {
                $listNumber = array();
               
                for($i = (count($data[0]['data']) - 1); $i >= 0; $i--) {
                    $dataTmp1 =  $data[0];

                    if (!isset($listNumber[$dataTmp1['label']])) {
                        $listNumber[$dataTmp1['label']] = array();
                    }
                  
                    $dataTmp2 =  isset($data[1]) ? $data[1] : array();

                    if (!empty($dataTmp2['label']) && !isset($listNumber[$dataTmp2['label']]) && !empty($dataTmp2)) {
                        $listNumber[$dataTmp2['label']] = array();
                    }

                    $dataTmp3 =  isset($data[2]) ? $data[2] : array() ;

                    if (!empty($dataTmp3['label']) && !isset($listNumber[$dataTmp3['label']]) && !empty($dataTmp3)) {
                        $listNumber[$dataTmp3['label']] = array();
                    }

                    $item = $data[0]['data'][$i];
                    $item2 = isset( $data[1]) ? $data[1]['data'][$i] : [];
                    $item3 = isset($data[2]) ? $data[2]['data'][$i] : [];
                    $classCol = 'col'.count($data);
                    $classRed = $i == 8 || $i == 0 ? 'colorred' : '';
                  
            ?>
                    <tr class="<?php echo $i + 1 % 2 == 0 ? 'bgedf2fa' : '' ?>">
                        <td class="giai-txt"> <?php echo $i == 0 ? 'ĐB' : $i ?> </td>

                        <td class="number <?php echo $classCol ?>">               
                                <?php if (is_array( $item)){ 
                                    foreach ($item as $k1 => $v1) {
                                        $listNumber[$dataTmp1['label']][] = $v1;
                                        echo '<span class="item  xshover font24" id="TG_prize4_item0">'.$v1.'</span>';
                                    }
                                ?>
                                    <?php } else {
                                      
                                        $listNumber[$dataTmp1['label']][] = $item;
                                        echo '<span class="item '.$classRed.'  xshover font24" id="TG_prize8_item0">';
                                        echo $item;
                                        echo '</span>';
                                        }
                                    ?>
                            
                        </td>
                        <td class="number <?php echo $classCol ?>">
                        <?php if (is_array( $item2 )){ 
                                    foreach ($item2 as $k1 => $v1) {
                                        $listNumber[$dataTmp2['label']][] = $v1;
                                        echo '<span class="item  xshover font24" id="TG_prize4_item0">'.$v1.'</span>';
                                    }
                                 } else {
                                        $listNumber[$dataTmp2['label']][] = $item2;
                                        echo '<span class="item '.$classRed.'  xshover font24" id="TG_prize8_item0">';
                                        echo $item2;
                                        echo '</span>';
                                        }
                                    ?>
                        </td>
                        <?php if (count($data) >= 3) { 
                            $item3 = $data[2]['data'][$i];
                            ?>
                            <td class="number <?php echo $classCol ?>">
                            <?php if (is_array( $item3)){ 
                                    foreach ($item3 as $k1 => $v1) {
                                        $listNumber[$dataTmp3['label']][] = $v1;
                                        echo '<span class="item  xshover font24" id="TG_prize4_item0">'.$v1.'</span>';
                                    }
                                ?>
                                    <?php } else {
                                        $listNumber[$dataTmp3['label']][] = $item3;
                                        echo '<span class="item '.$classRed.'  xshover font24" id="TG_prize8_item0">';
                                        echo $item3;
                                        echo '</span>';
                                        }
                                    ?>
                            </td>
                        <?php } ?>

                        <?php if (count($data) == 4) {                            
                            $item4 = $data[3]['data'][$i];
                            $dataTmp4 = $data[3];
                            if (!isset($listNumber[$dataTmp4['label']])) {
                                $listNumber[$dataTmp4['label']] = array();
                            }
                            
                            ?>
                            <td class="number <?php echo $classCol ?>"> 
                            <?php if (is_array( $item4)){ 
                                    foreach ($item4 as $k1 => $v1) {
                                        $listNumber[$dataTmp4['label']][] = $v1;
                                        echo '<span class="item  xshover font24" id="TG_prize4_item0">'.$v1.'</span>';
                                    }
                                ?>
                                    <?php } else {
                                        $listNumber[$dataTmp4['label']][] = $item4;
                                        echo '<span class="item '.$classRed.'  xshover font24" id="TG_prize8_item0"> ';
                                        echo $item4;
                                        echo '</span>';
                                        }
                                    ?>
                            </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
</div>

<?php echo $this->render("//element/xoso/loto-multi-province", array('data' => $listNumber)); ?>