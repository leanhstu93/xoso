<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "service_category".
 *
 * @property int $id
 * @property string $name
 * @property string $seo_name
 * @property string|null $desc
 * @property string|null $content
 * @property string|null $tags
 * @property int $option
 * @property string|null $meta_title
 * @property string|null $meta_desc
 * @property string|null $meta_keyword
 * @property int $display_order
 * @property string|null $image
 * @property int $active
 * @property int $user_id
 * @property int $date_create
 * @property int $date_update
 */
class ServiceCategory extends Base
{
    const TYPE_ROUTER = Router::TYPE_SERVICE_CATEGORY; # lấy type router dùng seo_name
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'seo_name', 'user_id', 'date_create', 'date_update'], 'required'],
            [['desc', 'content'], 'string'],
            [['option', 'display_order', 'active', 'user_id', 'date_create', 'date_update'], 'integer'],
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
            'name' => 'Name',
            'seo_name' => 'Seo Name',
            'desc' => 'Desc',
            'content' => 'Content',
            'tags' => 'Tags',
            'option' => 'Option',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keyword' => 'Meta Keyword',
            'display_order' => 'Display Order',
            'image' => 'Image',
            'active' => 'Active',
            'user_id' => 'User ID',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
        ];
    }

    //    cac ham viet them
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
