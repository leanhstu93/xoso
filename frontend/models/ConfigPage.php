<?php

namespace frontend\models;

use Yii;
use frontend\models\Base;

/**
 * This is the model class for table "config_page".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 * @property int $type
 * @property string $desc
 * @property string $content
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 * @property int $status
 * @property string $image
 * @property string $tags
 */
class ConfigPage  extends Base
{

    const TYPE_HOME = 99;
    const TYPE_PRODUCT = 1;
    const TYPE_NEWS = 7;
    const TYPE_GALLERY_IMAGE = 9;
    const TYPE_CONTACT = 11;
    const TYPE_VIDEO = 13;
    const TYPE_TEMPLATE = 15;
    const TYPE_SERVICE = 17;

   

    const STATUS_INACTIVE = 3;
    const STATUS_ACTIVE = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config_page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
        {
        return [
            [['name','seo_name', 'type'], 'required'],
            [['type', 'status'], 'integer'],
            [['desc', 'content', 'meta_title', 'meta_desc', 'meta_keyword'], 'string'],
            [['name', 'tags' ,'image','seo_name'], 'string', 'max' => 255],
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

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'seo_name' => 'Seo Name',
            'type' => 'Type',
            'desc' => 'Mô tả',
            'content' => 'Nội dung',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keyword' => 'Meta Keyword',
            'status' => 'Trạng thái',
            'image' => 'Hình ảnh',
            'tags' => 'Tags',
        ];
    }

    public static function listStatus()
    {
        return [
            self::STATUS_ACTIVE => 'Hoạt động',
            self::STATUS_INACTIVE => 'Ngưng hoạt động',
        ];
    }

    public function getSeoName()
    {
        $model = Router::find()->where(['id_object' => $this->id,'type' => $this->listMapConfigPageAndRouter()[$this->type]])->one();
        return $model->seo_name;
    }

    public function getUrl()
    {
        return Yii::$app->homeUrl .$this->getSeoName();
    }

    public static function getPageConfig($type)
    {
        $model = self::find()->where(['type' => $type])->one();
        return $model;
    }


    private function listMapConfigPageAndRouter()
    {
        return [
            self::TYPE_TEMPLATE => Router::TYPE_TEMPLATE_PAGE,
            self::TYPE_SERVICE => Router::TYPE_SERVICE_PAGE,
            self::TYPE_NEWS => Router::TYPE_NEWS_PAGE,
            self::TYPE_PRODUCT => Router::TYPE_PRODUCT_PAGE,
            self::TYPE_TEMPLATE => Router::TYPE_TEMPLATE_PAGE,
        ];
    }

    public function getTags()
    {
        $arrTags = explode(',', $this->tags);
        return $arrTags;
    }
}
