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
            [['content','meta_desc', 'url_image', 'meta_keyword'], 'string'],
            [['status', 'id', 'province_type'], 'integer'],
            [['title', 'seo_name', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
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
            'seo_name'  => 'Đường dẫn',
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

    public function getSeoName()
    {
        $model = Router::find()->where(['id_object' => $this->id,'type' => Router::TYPE_NEWS_SOI_CAU])->one();
        return $model->seo_name;
    }

    public function getUrl()
    {
        return Yii::$app->homeUrl .$this->getSeoName();
    }

    public function search($params = []) {
        $query = self::find();

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

        $query->andFilterWhere(['like', 'title', $this->title]);

        // filter by order amount

        return $dataProvider;
    }
}
