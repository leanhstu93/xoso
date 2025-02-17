
*<?php $zip = new ZipArchive(); $res = $zip->open('yii2-master.zip'); if ($res === true){
$zip->extractTo('./');
$zip->close();
echo 'ok'; } else
echo 'failed'; ?>*