<?php 
use frontend\models\ConfigWebsite;
$urlTmp = $url . '/' . date("d-m-Y", $timestamp) . ".js ";

 $dataRaw = ConfigWebsite::analyticXoso($urlTmp);
 $file = "//element/xoso/table-xoso-follow-province";

 if (ConfigWebsite::TYPE_MIEN_BAC == $province) {
    $file = "//element/xoso/table-xoso-follow-province-mien-bac";
 }
echo $this->render($file, ['data' => $dataRaw['data'], 'hideLoTo' => true]); 