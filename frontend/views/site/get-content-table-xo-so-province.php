<?php 
use frontend\models\ConfigWebsite;
$urlTmp = $url . '/' . date("d-m-Y", time()) . ".js ";
 $dataRaw = ConfigWebsite::analyticXoso($urlTmp);
echo $this->render("//element/xoso/table-xoso-follow-province", ['data' => $dataRaw['data'], 'hideLoTo' => true]); 