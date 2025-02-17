<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "province".
 *
 * @property int $id
 * @property string|null $_name
 * @property string|null $_code
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_name'], 'string', 'max' => 50],
            [['_code'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            '_name' => 'Name',
            '_code' => 'Code',
        ];
    }
}
