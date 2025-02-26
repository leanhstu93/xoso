<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 * @property int $category_id
 * @property int $order
 * @property string|null $image
 * @property string|null $image_standing
 * @property string|null $desc
 * @property string|null $content
 * @property string|null $alias
 * @property string|null $tags
 * @property int $user_id
 * @property int $date_create
 * @property int $date_update
 * @property int $count_view
 * @property string|null $meta_title
 * @property string|null $meta_desc
 * @property string|null $meta_keyword
 * @property int $active
 * @property int $option
 */
class Service extends Base
{
    public $category_ids;
    const STATUS_INACTIVE = 3;
    const STATUS_ACTIVE = 1;
    const OPTION_NEW = 1;
    const OPTION_HOT = 3;
    const OPTION_LONG_FORM = 5;
    const OPTION_ATTENTION = 7; # ĐÁNG CHÚ Ý
    const OPTION_SPECIAL = 9; # ĐÁNG CHÚ Ý

    const TYPE_ROUTER = Router::TYPE_SERVICE; # lấy type router dùng seo_name
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'seo_name', 'user_id', 'date_create', 'date_update', 'count_view'], 'required'],
            [['category_id', 'order', 'user_id', 'date_create', 'date_update', 'count_view', 'active', 'option'], 'integer'],
            [['desc', 'content'], 'string'],
            [['name', 'seo_name','icon', 'image','alias', 'tags', 'meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
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
            'category_id' => 'Category ID',
            'order' => 'Order',
            'image' => 'Image',
            'icon' => 'Biểu tượng',
            'desc' => 'Desc',
            'content' => 'Content',
            'alias' => 'Alias',
            'tags' => 'Tags',
            'user_id' => 'User ID',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'count_view' => 'Count View',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keyword' => 'Meta Keyword',
            'active' => 'Active',
            'option' => 'Option',
        ];
    }
    public function search($params) {
        $query = self::find();
        $query->joinWith(['category']);
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
            'service.active'=>$this->active,
            'service.option'=>$this->option,
        ]);

        $query->andFilterWhere(['like', 'news.name', $this->name]);
        if ($this->category) {
            $query->andFilterWhere(['=', 'news_category.id', $this->category->id]);
        }


        // filter by order amount

        return $dataProvider;
    }
    /**
     * @return array|\yii\db\ActiveRecord|null
     * La61y danh mu5c
     */
    public function getCategory() {
        return $this->hasOne(NewsCategory::className(), ['id' => 'category_id']);
    }

    public function getUrlAll()
    {
        $model = Router::find()->where(['type' => Router::TYPE_SERVICE_PAGE])->one();
        return Yii::$app->homeUrl .$model->seo_name;
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

    public static function listOption()
    {
        return [
            0 => '---Chọn--',
            self::OPTION_HOT => 'Hot',
            self::OPTION_NEW => 'Mới',
            self::OPTION_LONG_FORM => 'LONGFORM',
            self::OPTION_ATTENTION => 'Đáng chú ý',
            self::OPTION_SPECIAL => 'Đặc biệt'
        ];
    }
}
