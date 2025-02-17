<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string|null $image
 * @property string $source
 * @property int $date_create
 * @property int|null $date_update
 * @property int $user_id

 * @property int $option
 * @property int|null $order
 * @property string|null $desc
 * @property string|null $content
 * @property string|null $seo_name
 * @property string|null $tags
 * @property int|null $count_view
 * @property string|null $meta_title
 * @property string|null $meta_desc
 * @property string|null $meta_keyword
 */
class Video extends Base
{
    const STATUS_INACTIVE = 3;
    const STATUS_ACTIVE = 1;
    const OPTION_NEW = 1;
    const OPTION_HOT = 3;
    const OPTION_NORMAL = 5;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['source', 'date_create','name' ,'user_id', 'option'], 'required'],
            [['date_create', 'date_update', 'user_id', 'option', 'order', 'count_view', 'active'], 'integer'],
            [['desc', 'content'], 'string'],
            [['image', 'source', 'seo_name', 'tags', 'name', 'meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'source' => 'Đường dẫn youtube',
            'date_create' => 'Date Create',
            'date_update' => 'Data Update',
            'user_id' => 'User ID',
            'option' => 'Option',
            'order' => 'Order',
            'desc' => 'Desc',
            'content' => 'Content',
            'seo_name' => 'Seo Name',
            'tags' => 'Tags',
            'count_view' => 'Count View',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keyword' => 'Meta Keyword',
            'name' => 'Tiêu đề',
            'active' => 'active'
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
            'option'=>$this->option,
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
            self::OPTION_NORMAL => 'Bình thường',
            self::OPTION_HOT => 'Hot',
            self::OPTION_NEW => 'Mới',
        ];
    }

    public function getSeoName()
    {
        $model = Router::find()->where(['id_object' => $this->id,'type' => Router::TYPE_VIDEO])->one();
        return $model->seo_name;
    }

    public static function getDataByCustomSetting($key)
    {
        $custom = Custom::getSettingCustomTemplate();

        $custom_image =  (object)$custom[Custom::KEY_SINGLE_PAGE][$key];

        if(!empty($custom_image->data)) {
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
