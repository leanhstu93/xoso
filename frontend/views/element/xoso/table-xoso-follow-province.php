
<?php

use frontend\models\Banner;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\ConfigWebsite;
use common\components\MyHelpers;
$listNumber = [];
?>
<div class="box-ketqua" 
    data-type="<?php echo ConfigWebsite::TYPE_MIEN_NAM ?>"
    id="mn_kqngay_kq"
    >
        <table class="table table-bordered text-center">
            <tbody>
            <?php 
            for($i = (count($data) - 1); $i >= 0; $i--) {
                $item = $data[$i];

                $classGrid = '';

                if (is_array($item)) {
                    if (count($item) >= 3) {
                        $classGrid = 'grid-3';
                    } elseif (count($item) >= 2) {
                        $classGrid = 'grid-2';
                    }
                }
              
                $classCol = 'col'.count($data);
                $classRed = $i == 8 || $i == 0 ? 'colorred' : '';
            ?>
            <tr class="<?php echo $i + 1 % 2 == 0 ? 'bgedf2fa' : '' ?>">
                <td class="giai-txt"> <?php echo $i == 0 ? 'ĐB' : $i ?> </td>

                <td class="number   <?php echo $classGrid ?> number font24 ">               
                    <?php 
                    if (is_array( $item)) { 
                        
                        foreach ($item as $k1 => $v1) {                          
                            $classGiai6Last = '';

                            if ($i == 4 && $k1 == 6) {
                                $classGiai6Last = 'giai-6-last';
                            } 
                            $listNumber[] = $v1;
                            echo '<span class=" '.$classGiai6Last.' xshover mb-2" id="TG_prize4_item0">'.$v1.'</span>';
                        }
                      
                    ?>
                    <?php } else {
                        $listNumber[] = $item;
                        echo '<span class="ab item '.$classRed.'  xshover font24" id="TG_prize8_item0">';
                        echo $item;
                        echo '</span>';
                        }
                    ?>
                    
                </td>
               
            </tr>
            <?php } ?>
            </tbody>
        </table>
</div>
<?php echo $this->render("//element/xoso/loto-province", array('data' => $listNumber)); ?>