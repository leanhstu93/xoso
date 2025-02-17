<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "quizz".
 *
 * @property int $id
 * @property string $name
 * @property int $order
 * @property int|null $active
 */
class Quizz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quizz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['order', 'active'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'order' => 'Order',
            'active' => 'Active',
        ];
    }

    public function listMapLanguage()
    {
        return [
            'name' => 'name',
        ];
    }

    public static function listActive()
    {
        return [
            self::ACTIVE => 'Hoạt động',
            self::INACTIVE => 'Ngưng hoạt động',
        ];
    }
}
