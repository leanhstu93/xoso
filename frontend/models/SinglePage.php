<?php

namespace frontend\models;

use frontend\models\Base;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "single_page".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 * @property int $date_create
 * @property int $date_update
 * @property string $desc
 * @property string $content
 * @property int $active
 * @property int $user_id
 */
class SinglePage extends Base
{
    const TYPE_ROUTER = Router::TYPE_SINGLE_PAGE; # lấy type router dùng seo_name
    const STATUS_INACTIVE = 3;
    const STATUS_ACTIVE = 1;
    const OPTION_NEW = 1;
    const OPTION_HOT = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'single_page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'seo_name' ,'date_create', 'date_update', 'user_id'], 'required'],
            [['date_create', 'date_update', 'active','order', 'user_id', 'count_view'], 'integer'],
            [['desc', 'content'], 'string'],
            [['name', 'seo_name','tags','image'], 'string', 'max' => 255],
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
            'image' => 'Hình ảnh',
            'tags' =>'tags',
            'seo_name' => 'Đường dẫn',
            'date_create' => 'Ngày tạo',
            'date_update' => 'Ngày cập nhật',
            'desc' => 'Mô tả',
            'content' => 'Nội dung',
            'active' => 'Active',
            'order' =>'Sắp xếp',
            'count_view' => 'Lượt xem',
            'user_id' => 'User ID',
        ];
    }

    public function search($params) {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);


        if (!($this->load($params))) {

            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'=>$this->id,
            'status'=>$this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);


        // filter by order amount

        return $dataProvider;
    }

    /**
     * @return array
     */
    public static function listActive()
    {
        return [
            self::STATUS_ACTIVE => 'Hoạt động',
            self::STATUS_INACTIVE => 'Ngưng hoạt động',
        ];
    }

    /**
     * @return array
     */
    public static function listOption()
    {
        return [
            self::OPTION_HOT => 'Hot',
            self::OPTION_NEW => 'Mới',
        ];
    }

    public function getSeoName()
    {
        $model = Router::find()->where(['id_object' => $this->id,'type' => Router::TYPE_SINGLE_PAGE])->one();
        return $model->seo_name;
    }

    public static function getDataByCustomSetting($key)
    {
        $custom = Custom::getSettingCustomTemplate();

        if (empty($custom[Custom::KEY_SINGLE_PAGE][$key])){
            return false;
        }
        $custom_image =  (object)$custom[Custom::KEY_SINGLE_PAGE][$key];

        if(!empty($custom_image->data) && is_array($custom_image->data)) {
            $data = implode(',',$custom_image->data);
            if(!empty($data)) {
                if ($custom_image->limit == 1) {
                    return self::find()->where('id IN (' . $data . ') AND active =1 ')->one();
                } elseif ($custom_image->limit == 0) {
                    return self::find()->where('id IN (' . $data . ') AND active =1 ')->orderBy('id DESC')->all();
                } else {
                    return self::find()->where('id IN (' . $data . ') AND active =1 ')->limit($custom_image->limit)->orderBy('id DESC')->all();
                }
            }
        }
    }

    public function getUrl()
    {
        return Yii::$app->homeUrl .$this->getSeoName();
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
