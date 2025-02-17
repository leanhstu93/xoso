<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "template_category".
 *
 * @property int $id
 * @property string $name
 * @property string|null $seo_name
 * @property string|null $desc
 * @property int|null $date_create
 * @property int $active
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 */
class TemplateCategory extends Base
{
    const TYPE_ROUTER = Router::TYPE_TEMPLATE_CATEGORY; # lấy type router dùng seo_name
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['desc'], 'string'],
            [['date_create', 'active'], 'integer'],
            [['name', 'seo_name', 'meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
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
            'date_create' => 'Date Create',
            'active' => 'Active',
            'meta_desc' => 'Meta desc',
            'meta_keyword' => 'Meta keyword',
            'meta_title' => 'Meta title',
        ];
    }
//    các hàm viết thêm
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

    public function getSeoName()
    {
        $model = Router::find()->where(['id_object' => $this->id,'type' => Router::TYPE_NEWS_CATEGORY])->one();
        return $model->seo_name;
    }

    public function getUrl()
    {
        return Yii::$app->homeUrl .$this->getSeoName();
    }

    public static function listActive()
    {
        return [
            1 => 'Có',
            0=> 'Không',
        ];
    }
}
