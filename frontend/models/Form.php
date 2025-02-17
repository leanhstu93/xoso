<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "form".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property int $date
 * @property string $desc
 * @property int $status
 */
class Form extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'form';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'status'], 'integer'],
            [['desc'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 12],
            [['email'], 'string', 'max' => 30],
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
            'phone' => 'Phone',
            'email' => 'Email',
            'date' => 'Date',
            'desc' => 'Desc',
            'status' => 'Status',
        ];
    }
}
