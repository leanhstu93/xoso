
<?php 
use frontend\models\ConfigWebsite;

$dataDau = ConfigWebsite::processingLoTo($data);
$dataDuoi = ConfigWebsite::processingLoTo($data, 'duoi');
?>
<div class="bang-loto" id="kqngay_21102019_dd">
			<table class="table table-bordered">
				<thead>
				<tr>
					<th class="td-title">Đầu</th>
					<th class="td-title">Đuôi</th>
					<th class="td-title">Đầu</th>
					<th class="td-title">Đuôi</th>
				</tr>
				</thead>
				<tbody>
                <?php
                foreach ($dataDau as $i => $item) {
                    $itemDuoi = $dataDuoi[$i];
                ?>
				<tr class="<?php echo $i % 2 == 0 ? 'bgedf2fa' : '' ?>">
					<td class="giai-txt colorred"><?php echo  $i ?></td>
					<td class="number mb loto font18"><?php echo $item ?></td>
					<td class="number mb loto font18"><?php echo $itemDuoi ?></td>
					<td class="giai-txt colorred"><?php echo  $i ?></td>
				</tr>
                <?php $i++; } ?>
				
				</tbody>
			</table>
        </div>