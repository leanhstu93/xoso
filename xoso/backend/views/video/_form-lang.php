<?php
/* @var $dataLang app\models\DataLang */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$listLanguage = Yii::$app->params['listLanguage'];

if(!empty($dataFieldLang) && count($listLanguage) > 0) {
    foreach ($listLanguage as $code => $lang) {
        if($lang['default']) continue;
        ?>
    <div class="css-tab-language js-tab-language js-tab-language-<?= $code ?>" data-code="<?= $code ?>">
        <?php foreach ($dataFieldLang as $key => $value) {
            extract($value);
            /**
             * @var $type
             * @var $name
             * @var $required
             * @var $class
             */
            if ($name == 'seo_name') { ?>
                <div class="form-group">
                    <label class="required control-label">
                        Đường dẫn
                    </label>
                    <div class="input-group input-group-icon">
                        <?= Html::textInput('DataLang[' . $code . '][seo_name]', $model[[$code]]->seo_name, array('class' => 'js__alias form-control')) ?>
                        <span class="input-group-addon">
                      <span class="checkbox-custom checkbox-default">
                        <input type="checkbox" id="inputCheckbox" class="js__toggle-auto-get-alias" name="inputCheckbox"
                               checked="">
                        <label for="inputCheckbox"></label>
                          Lấy đường dẫn tự động
                      </span>
                    </span>
                    </div>
                </div>

                <?php
            } else if($name == 'content') {
                echo$form->field($model[$code], 'content')->textarea(['class' => 'js-editor',
                    'rows' => 3]);
            } else if($name == 'desc') {
                echo $form->field($model[$code], 'desc')->textarea(['rows' => 3,'name' => 'DataLang['.$code.']['.$name.']']);
            } else {
               echo $form->field($model[$code], $name)->textInput(['name' => 'DataLang['.$code.']['.$name.']','class' => 'js__title form-control', $required])->label(null, ['class' => $required]);
            }
        }
        echo "</div>";
    }
}
?>

