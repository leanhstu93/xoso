<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\Member;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 * @property int $category_id
 * @property int $order
 * @property string $image
 * @property string $image_standing
 * @property string $desc
 * @property string $content
 * @property string $alias
 * @property string $tags
 * @property int $user_id
 * @property int $date_create
 * @property int $date_update
 * @property int $count_view
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 * @property int $active
 * @property int $option
 */
class News extends Base
{
    public $images;
    public $category_ids;
    const STATUS_INACTIVE = 3;
    const STATUS_ACTIVE = 1;
    const OPTION_NEW = 1;
    const OPTION_HOT = 3;
    const OPTION_LONG_FORM = 5;
    const OPTION_ATTENTION = 7; # ĐÁNG CHÚ Ý
    const OPTION_SPECIAL = 9; # ĐÁNG CHÚ Ý


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'seo_name', 'user_id', 'date_create', 'date_update', 'count_view'], 'required', 'message' => ' {attribute} không thể để trống'],
            [['category_id', 'order', 'user_id', 'date_create', 'date_update', 'count_view', 'active', 'option'], 'integer'],
            [['desc', 'content'], 'string'],
            [['name', 'seo_name', 'image', 'image_standing' , 'alias', 'tags', 'meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
            [['category'], 'safe'],
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
            'seo_name' => 'Đường dẫn',
            'category_id' => 'Category ID',
            'order' => 'Order',
            'image' => 'Hình ảnh',
            'image_standing' => 'Hình đứng',
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
            'option' => 'Trạng thái',
            'category.name' => 'Danh mục'
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
            'news.active'=>$this->active,
            'news.option'=>$this->option,
        ]);

        $query->andFilterWhere(['like', 'news.name', $this->name]);
        if ($this->category) {
            $query->andFilterWhere(['=', 'news_category.id', $this->category->id]);
        }


        // filter by order amount

        return $dataProvider;
    }

    public function getUrlAll()
    {
        $model = Router::find()->where(['type' => Router::TYPE_NEWS_PAGE])->one();
        return Yii::$app->homeUrl .$model->seo_name;
    }

    public static function getDataByCustomSetting($key)
    {
        $custom = Custom::getSettingCustomTemplate();
        $custom_news =  (object)$custom[Custom::KEY_NEWS_CATEGORY][$key];

        $result = [
            'data' => null,
            'category' => null
        ];

        $result = (object) $result;
        if(!empty($custom_news->data)) {
            $result->category = NewsCategory::find()->where(['id' => $custom_news->data, 'active' => 1])->one();
            if($custom_news->limit == 1) {
                $result->data = self::find()->where(['category_id' => $custom_news->data, 'active' => 1])->one();
            } elseif ($custom_news->limit == 0) {
                $result->data = self::find()->where(['category_id' => $custom_news->data, 'active' => 1])->orderBy('id DESC')->all();
            } else {
                $result->data = self::find()->where(['category_id' => $custom_news->data, 'active' => 1])->limit($custom_news->limit)->orderBy('id DESC')->all();
            }

            return $result;
        }
    }
    public function getSeoName()
    {
        $model = Router::find()->where(['id_object' => $this->id,'type' => Router::TYPE_NEWS])->one();
        return $model->seo_name;
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
            'content' => 'content',
            'meta_title' => 'meta_title',
            'meta_desc' => 'meta_desc',
            'meta_keyword' => 'meta_keyword',
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord|null
     */
    public function getUser() {
        return $this->hasOne(Member::className(), ['id' => 'user_id']);
    }

    /**
     * @return array|\yii\db\ActiveRecord|null
     * La61y danh mu5c
     */
    public function getCategory() {
        return $this->hasOne(NewsCategory::className(), ['id' => 'category_id']);
    }

    public function getCreateTimeToString()
    {
        $timeSubtraction = time() - $this->date_update;

        # thời gian update nhỏ hơn 59 phút thì qui ra phút
        if ($timeSubtraction < 3540) {
            return round($timeSubtraction/60). ' phút trước';
        } else if ($timeSubtraction < 86400) { # thời gian nhỏ hơn 24h
            return round($timeSubtraction/3600). ' giờ trước';
        } else if ($timeSubtraction < 86400) { # thời gian nhỏ hơn 24h
            return round($timeSubtraction/86400). ' ngày trước';
        } else {
            return date('d/m/Y H:i:s', $this->date_update);
        }
    }

    public static function listOption()
    {
        return [
            self::OPTION_HOT => 'Hot',
            self::OPTION_NEW => 'Mới',
            self::OPTION_LONG_FORM => 'LONGFORM',
            self::OPTION_ATTENTION => 'Đáng chú ý',
            self::OPTION_SPECIAL => 'Đặc biệt'
        ];
    }

    /**
     * tăng lượt xem
     */
    public static function increaseView($id)
    {
        $model = self::findOne($id);
        $session = Yii::$app->session;

        if ($model && !$session->has('news_'.$id)) {
            $model->count_view = $model->count_view + 1;
            if ($model->save()) {
                $session->set('news_'.$id,1);
            }
        }
    }
}
