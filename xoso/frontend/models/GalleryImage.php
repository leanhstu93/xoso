<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "gallary_image".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $desc
 * @property string $content
 * @property int $date_create
 * @property int $active
 */
class GalleryImage  extends Base
{
    const TYPE_ROUTER = Router::TYPE_GALLERY_IMAGE; # lấy type router dùng seo_name
    public $field_lang = [
        'name' => 'name',
        'desc' => 'desc',
        'content' => 'content',
    ];

    const STATUS_INACTIVE = 3;
    const STATUS_ACTIVE = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desc', 'content'], 'string'],
            [['date_create','date_update','user_id', 'active'], 'integer'],
            [['name','seo_name', 'image'], 'string', 'max' => 255],
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
            'image' => 'Hình ảnh',
            'desc' => 'Mô tả',
            'content' => 'Nội dung',
            'date_create' => 'Ngày tạo',
            'active' => 'Hoạt động',
            'user_id' => 'Người đăng',
            'date_update' => 'Ngày cập nhật'
        ];
    }

    public function getUrlAll()
    {
        $model = Router::find()->where(['type' => Router::TYPE_GALLERY_IMAGE_PAGE])->one();

        return Yii::$app->homeUrl .$model->seo_name;
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

    public function getSeoName()
    {
        $model = Router::find()->where(['id_object' => $this->id,'type' => Router::TYPE_GALLERY_IMAGE])->one();
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
            'content' => 'content'
        ];
    }
}
