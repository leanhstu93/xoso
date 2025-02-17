<?php

namespace frontend\models;

use frontend\models\Base;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "banner_category".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 * @property string $desc
 * @property string $content
 * @property int $active
 * @property int $user_id
 * @property int $date_create
 * @property int $date_update
 */
class BannerCategory extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'seo_name', 'date_create','user_id', 'date_update'], 'required'],
            [['desc', 'content'], 'string'],
            [['active','user_id','date_update','date_create'], 'integer'],
            [['name', 'seo_name'], 'string', 'max' => 255],
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
            'seo_name' => 'Seo Name',
            'desc' => 'Desc',
            'content' => 'Content',
            'active' => 'Active',
            'date_update' =>'Ngày cập nhật',
            'date_create' =>'Ngày tạo',
            'user_id' =>'user_id',
        ];
    }

    public function search($params) {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
        ]);

        /**
         * Setup your sorting attributes
         * Note: This is setup before the $this->load($params)
         * statement below
         */
        $dataProvider->setSort([
            'attributes'=>[
                'id',
                'name',
            ]
        ]);

        if (!($this->load($params))) {

            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'=>$this->id,
            'active'=>$this->active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        // filter by order amount

        return $dataProvider;
    }
}
