<?php

namespace frontend\models;

use Yii;
use frontend\models\Base;
use frontend\models\BannerCategory;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $url_image
 * @property int $status
 */
class NewsSoiCau extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_soi_cau';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content', 'url_image'], 'string'],
            [['status', 'id', 'province_type'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['date_created'], 'date', 'format' => 'php:Y-m-d'],
            [['province_type'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province_type' => 'Tỉnh / thành',
            'title' => 'Tiêu đề',
            'url_image' => 'Hình ảnh',
            'content' => 'Nội dung',
            'status' => 'Status',
            
        ];
    }

//    public function relations()
//    {
//        // NOTE: you may need to adjust the relation name and the related
//        // class name for the relations automatically generated below.
//        return array(
//            'banner_category' => array(self::BELONGS_TO,'Ba nnerCategory',array('category_id'=>'id')),
//        );
//    }

    public function getBannerCategory()
    {
        return $this->hasOne(BannerCategory::className(), ['id' => 'category_id']);
    }

    public function search($params = []) {
        $query = self::find()->joinWith(['bannerCategory']);

        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);
        /**
         * Setup your sorting attributes
         * Note: This is setup before the $this->load($params)
         * statement below
         */

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
