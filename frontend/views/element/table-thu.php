<?php 

use frontend\models\ConfigWebsite;

$reffixUrl = 'xo-so-mien-nam';
$title = 'Miền Nam';
if ($type == ConfigWebsite::TYPE_MIEN_BAC) {
    $title = 'Miền Bắc';
    $reffixUrl = 'xo-so-mien-bac';
} elseif ($type == ConfigWebsite::TYPE_MIEN_TRUNG) {
    $title = 'Miền Trung';
    $reffixUrl = 'xo-so-mien-trung';
}
?>

<div class="box-thong-ke text-center">
    <div class="xsmo-thuong-homnay">
        <table class="table-bordered w100">
            <tbody>
            <tr>
                <td class="td col4"><a href="javascript:;" class="breadcrumb-item"><?php echo $title ?></a> </td>
                <td class="td col4"><a href="/<?php echo $reffixUrl ?>-thu-2" class="xs-thu">Thứ 2</a></td>
                <td class="td col4"><a href="/<?php echo $reffixUrl ?>-thu-3" class="xs-thu">Thứ 3</a></td>
                <td class="td col4"><a href="/<?php echo $reffixUrl ?>-thu-4" class="xs-thu">Thứ 4</a></td>
            </tr>
            <tr>
                <td class="td col4"><a href="/<?php echo $reffixUrl ?>-thu-5" class="xs-thu">Thứ 5</a></td>
                <td class="td col4"><a href="/<?php echo $reffixUrl ?>-thu-6" class="xs-thu">Thứ 6</a></td>
                <td class="td col4"><a href="/<?php echo $reffixUrl ?>-thu-7" class="xs-thu">Thứ 7</a></td>
                <td class="td col4"><a href="/<?php echo $reffixUrl ?>-thu-chu-nhat" class="xs-thu">CN</a></td>
            </tr>
            </tbody>
        </table>

    </div>
</div>