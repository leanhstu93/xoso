<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "news_category".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 * @property string $desc
 * @property string $content
 * @property string $tags
 * @property int $option
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 * @property int $parent_id
 * @property int $display_order
 * @property string $image
 * @property int $active
 * @property int $user_id
 * @property int $date_create
 * @property int $date_update
 */
class NewsCategory extends Base
{
    const OPTION_HOME = 1;
    const OPTION_NEW = 3;
    const OPTION_HOT = 5;
    const OPTION_SPECIAL = 7;
    const TYPE_ROUTER = Router::TYPE_NEWS_CATEGORY; # lấy type router dùng seo_name
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'seo_name', 'user_id', 'date_create', 'date_update'], 'required'],
            [['desc', 'content'], 'string'],
            [['option', 'parent_id', 'display_order', 'active', 'user_id', 'date_create', 'date_update'], 'integer'],
            [['name', 'seo_name', 'tags', 'meta_title', 'meta_desc', 'meta_keyword', 'image'], 'string', 'max' => 255],
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
            'seo_name' => 'Đường dẫn',
            'desc' => 'Mô tả',
            'content' => 'Nội dung',
            'tags' => 'Tags',
            'option' => 'Option',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keyword' => 'Meta Keyword',
            'parent_id' => 'Parent ID',
            'display_order' => 'Display Order',
            'image' => 'Hình ảnh',
            'active' => 'Hoạt động',
            'user_id' => 'User ID',
            'date_create' => 'Ngày tạo',
            'date_update' => 'Ngày cập nhật',
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

    /**
     * @return array
     */
    public static function listOption()
    {
        return [
            self::OPTION_HOT => 'Hot',
            self::OPTION_NEW => 'Mới',
            self::OPTION_HOME => 'Trang chủ',
            self::OPTION_SPECIAL => 'Đặc biệt',
        ];
    }

    /**
     * @return array
     */
    public static function listActive()
    {
        return [
            1 => 'Có',
            0=> 'Không',
        ];
    }

//    public function getUrl()
//    {
//        return Yii::$app->homeUrl .$this->getSeoName();
//    }

    static function getIdsChild($data,&$res)
    {
        if ($data) {
            foreach ($data as $item) {
                $res[] = $item->id;
                $newsCategory = self::find()->where(['parent_id' => $item->id])->all();
                 self::getIdsChild($newsCategory, $res);

            }
        }
    }

    public static function getBreadCrumb($idParent,$res)
    {
        $model = self::find()->where(['id' => $idParent])->one();

        if (!empty($model)) {
            $res[] = [
                'name' => $model->name,
                'link' => $model->getUrl()
            ];

            if($model->parent_id > 0) {
                self::getBreadCrumb($model->parent_id,$res);
            } else {
                return $res;
            }
        }

        return [];
    }

    public function listMapLanguage()
    {
        return [
            'name' => 'name',
            'desc' => 'desc',
            'content' => 'content',
            'meta_title' => 'meta_title',
            'meta_desc' => 'meta_desc',
            'meta_keyword' => 'meta_keyword',
        ];
    }
}
