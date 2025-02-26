<?php

namespace frontend\models;

use Yii;
use yii\data\ActiveDataProvider;
use frontend\models\Base;

/**
 * This is the model class for table "product_category".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 * @property int $parent_id
 * @property int $display_order
 * @property string $image
 * @property int $option
 * @property int $active
 * @property string $content
 * @property string $desc
 * @property string $tags
 * @property int $user_id
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 */
class ProductCategory extends Base
{
    const OPTION_NEW = 1;
    const OPTION_HOT = 3;
    const TYPE_ROUTER = Router::TYPE_PRODUCT_CATEGORY; # lấy type router dùng seo_name

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_id', 'seo_name'], 'required'],
            [['name'], 'unique','message'=>'Danh mục này đã thêm'],
            [['parent_id','active', 'display_order', 'option', 'user_id'], 'integer'],
            [['content', 'desc'], 'string'],
            [['name','seo_name', 'image', 'tags', 'link_extend', 'meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
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
            'seo_name' => 'Seo Name',
            'parent_id' => 'Danh mục cha',
            'display_order' => 'Thứ tự',
            'image' => 'Hình ảnh',
            'option' => 'Option',
            'content' => 'Content',
            'active' => 'Hoạt động',
            'desc' => 'Mô tả',
            'tags' => 'Tags',
            'user_id' => 'User ID',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keyword' => 'Meta Keyword',
            'link_extend' => 'Đường dẫn mở rộng'
        ];
    }
    public function listMapLanguage()
    {
        return [
            'name' => 'name',
            'desc' => 'desc',
            'content' => 'content'
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

    public function getSeoName()
    {
        $model = Router::find()->where(['id_object' => $this->id,'type' => Router::TYPE_PRODUCT_CATEGORY])->one();
        return $model->seo_name;
    }

    public function getUrl()
    {
        return Yii::$app->homeUrl .$this->getSeoName();
    }

    public static function getBreadCrumb($idParent,$res)
    {
        $model = self::find()->where(['id' => $idParent])->one();

        if (!empty($model)) {
            $res[] = [
              'name' => $model->name,
              'link' => $model->getUrl()
            ];
        }

        if($model->parent_id > 0) {
            self::getBreadCrumb($model->parent_id,$res);
        } else {
            return $res;
        }
    }
}
