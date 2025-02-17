<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bill_detail".
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $image
 * @property int $quantity
 * @property int $price
 * @property int $bill_id
 */
class BillDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bill_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'quantity', 'price', 'bill_id'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'name' => 'Name',
            'image' => 'Image',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'bill_id' => 'Bill ID',
        ];
    }
}
