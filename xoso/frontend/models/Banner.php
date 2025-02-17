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
 * @property string $name
 * @property string $seo_name
 * @property string $desc
 * @property int $category_id
 * @property string $content
 * @property int $active
 * @property int $date_create
 * @property int $user_id
 * @property int $date_update
 * @property string $image
 */
class Banner extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date_update', 'user_id', 'date_create'], 'required'],
            [['desc', 'content'], 'string'],
            [['category_id', 'date_update', 'active','user_id', 'date_create', 'order'], 'integer'],
            [['name', 'image','link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tiêu đề',
            'desc' => 'Mô tả',
            'category_id' => 'Danh mục',
            'content' => 'Nội dung',
            'active' => 'Active',
            'date_create' => 'Ngày tạo',
            'date_update' => 'Ngày cập nhật',
            'user_id' => 'user_id',
            'image' => 'image',
            'link' => 'Đường dẫn',
            'order' =>'Sắp xếp',
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

    public static function getDataByCustomSetting($key)
    {
        $custom = Custom::getSettingCustomTemplate();

        $custom_image =  (object)$custom[Custom::KEY_IMAGE][$key];

        $result = [
            'images' => null,
            'category' => null
        ];
        $result = (object) $result;
        if(!empty($custom_image->data)) {
            $result->category = BannerCategory::find()->where(['id' => $custom_image->data, 'active' => 1])->one();
            if($custom_image->limit == 1) {
                $result->images = self::find()->where(['category_id' => $custom_image->data, 'active' => 1])->one();
            } elseif ($custom_image->limit == 0) {
                $result->images = self::find()->where(['category_id' => $custom_image->data, 'active' => 1])->all();
            } else {
                $result->images = self::find()->where(['category_id' => $custom_image->data, 'active' => 1])
                    ->orderBy(['order' => SORT_DESC,'id' => SORT_DESC])->limit($custom_image->limit)->all();
            }

            return $result;
        }

    }

    public function listMapLanguage()
    {
        return [
            'name' => 'name',
            'desc' => 'desc',
            'content' => 'content'
        ];
    }
}
