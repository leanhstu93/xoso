<?php 
use frontend\models\ConfigWebsite;
?>
<div class="bang-loto">
 <table class="table table-bordered" id="bangkqloto_mn">
     <thead>
        <tr>
            <th class="td-title">Đầu</th>
            <?php 
            $i = 0;
            foreach ($data as $key => $value) {
                $data[$key] = ConfigWebsite::processingLoTo($value);
                $data[$i] = ConfigWebsite::processingLoTo($value);
                $i++;
            ?>
            <th class="td-title"><span title="<?php echo $key; ?>"><?php echo $key; ?></span></th>
            <?php } ?>
                </tr>
        </thead>
        <tbody>
            <?php 
            
            foreach ( $data[0] as $i => $item) {
            ?>
        <tr class="<?php echo $i % 2 == 0 ? 'bgedf2fa' : '' ?>">
            <td class="giai-txt colorred"> <?php echo  $i ?> </td>

            <td class="number loto font18 col3"><?php echo $item ?></td>
            <?php if (!empty($data[1])) { ?>
            <td class="number loto font18 col3"><?php echo $data[1][$i] ?></td>
            <?php } ?>
            <?php if (!empty($data[2])) { ?>
            <td class="number loto font18 col3"><?php echo $data[2][$i] ?></td>
            <?php } ?>
            <?php if (!empty($data[3])) { ?>
            <td class="number loto font18 col3"><?php echo $data[3][$i] ?></td>
            <?php } ?>
                </tr>
        <?php $i++; } ?>
       
        </tbody>
    </table>
</div>