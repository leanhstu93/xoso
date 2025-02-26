<?php

namespace frontend\models;

use frontend\models\Base;
use Yii;

/**
 * This is the model class for table "data_lang".
 *
 * @property int $id
 * @property int $id_object
 * @property string $name
 * @property string $desc
 * @property string $content
 * @property int $type
 * @property string $code_lang
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 */
class DataLang extends Base
{
    const TYPE_PRODUCT= 1;
    const TYPE_PAGE_PRODUCT= 3;
    const TYPE_PRODUCT_CATEGORY= 5;
    const TYPE_NEWS= 7;
    const TYPE_PAGE_NEWS= 9;
    const TYPE_PAGE_GALLERY_IMAGE= 11;
    const TYPE_GALLERY_IMAGE= 13;
    const TYPE_SINGLE_PAGE= 15;
    const TYPE_NEWS_CATEGORY= 17;
    const TYPE_BANNER= 19;
    const TYPE_PAGE_VIDEO= 21;
    const TYPE_VIDEO= 23;
    const TYPE_TEMPLATE_CATEGORY = 25;
    const TYPE_TEMPLATE = 27;
    const TYPE_SERVICE = 29;
    const TYPE_SERVICE_CATEGORY = 31;
    const TYPE_PAGE_SERVICE = 33;
    const TYPE_PAGE_TEMPLATE = 35;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_object', 'name', 'type', 'code_lang'], 'required'],
            [['id_object', 'type'], 'integer'],
            [['desc', 'content'], 'string'],
            [['name', 'meta_title', 'meta_desc', 'meta_keyword'], 'string', 'max' => 255],
            [['code_lang'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_object' => 'Id Object',
            'name' => 'Name',
            'desc' => 'Desc',
            'content' => 'Content',
            'type' => 'Type',
            'code_lang' => 'Code Lang',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keyword' => 'Meta Keyword',
        ];
    }
}
