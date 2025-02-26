<?php

namespace frontend\models;

use Yii;
use frontend\models\ProductCategory;
/**
 * This is the model class for table "rl_product_category".
 *
 * @property int $id
 * @property int $product_id
 * @property int $category_id
 */
class RlProductCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rl_product_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'category_id'], 'required'],
            [['product_id', 'category_id'], 'integer'],
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
            'category_id' => 'Category ID',
        ];
    }

    public function getProductIds($idCategory)
    {
        $idProducts = self::find()->where(['category_id' => $idCategory])->asArray()->all();

        return array_column($idProducts,'product_id');
    }

    public function getProductIdsRL($idProduct)
    {
        $RL = self::find()->where(['product_id' => $idProduct])->asArray()->all();
        $cateIds =  array_column($RL,'category_id');
        $RLWithCate = self::find()
            ->where(['in','category_id' , $cateIds])
            ->andWhere('product_id != :product_id',['product_id' => $idProduct])
            ->asArray()
            ->all();
        $productIds = array_column($RLWithCate,'product_id');
        return $productIds;
    }

}
