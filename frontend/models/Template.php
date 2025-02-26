<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "template".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string|null $link
 * @property string|null $seo_name
 * @property string|null $desc
 * @property string|null $content
 * @property string|null $image
 * @property string|null $image_pc
 * @property string|null $image_mobile
 * @property int $active
 * @property string|null $key
 */
class Template extends Base
{
    const TYPE_ROUTER = Router::TYPE_TEMPLATE; # lấy type router dùng seo_name
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['desc', 'content'], 'string'],
            [['active','sort', 'category_id', 'count_view', 'date_create'], 'integer'],
            [['name', 'link', 'seo_name', 'image', 'image_pc', 'image_mobile','meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
            [['key'], 'string', 'max' => 20],
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
            'link' => 'Link',
            'seo_name' => 'Seo Name',
            'desc' => 'Desc',
            'content' => 'Content',
            'image' => 'Image',
            'image_pc' => 'Image Pc',
            'image_mobile' => 'Image Mobile',
            'active' => 'Active',
            'sort' => 'Sắp xếp',
            'key' => 'Key',
            'category_id' => 'Danh mục',
            'date_create' => 'Ngày tạo'
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord|null
     * La61y danh mu5c
     */
    public function getCategory() {
        return $this->hasOne(TemplateCategory::className(), ['id' => 'category_id']);
    }

    public function search($params = []) {
        $query = self::find()->joinWith(['templateCategory']);

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
