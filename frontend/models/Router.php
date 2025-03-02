<?php

namespace frontend\models;

use Yii;
use frontend\models\Base;
/**
 * This is the model class for table "router".
 *
 * @property int $id
 * @property int $id_object
 * @property string $seo_name
 * @property int $type
 */
class Router extends Base
{

    const TYPE_PRODUCT=1;
    const TYPE_PRODUCT_CATEGORY=3;
    const TYPE_NEWS = 5;
    const TYPE_NEWS_CATEGORY=7;
    const TYPE_SINGLE_PAGE=9;
    const TYPE_VIDEO=11;
    const TYPE_VIDEO_CATEGORY=13;
    const TYPE_PRODUCT_PAGE=15;
    const TYPE_NEWS_PAGE = 17;
    const TYPE_BANNER_CATEGORY = 19;
    const TYPE_BANNER = 21;
    const TYPE_GALLERY_IMAGE = 25;
    const TYPE_GALLERY_IMAGE_PAGE = 23;
    const TYPE_VIDEO_PAGE=27;
    const TYPE_TEMPLATE_CATEGORY=29;
    const TYPE_TEMPLATE = 31;
    const TYPE_SERVICE_CATEGORY= 33;
    const TYPE_SERVICE= 35;
    const TYPE_SERVICE_PAGE = 37;
    const TYPE_TEMPLATE_PAGE = 39;
    const TYPE_NEWS_SOI_CAU = 40;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'router';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_object', 'seo_name', 'type'], 'required'],
            [['id_object', 'type'], 'integer'],
            [['seo_name'], 'string', 'max' => 255],
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
            'seo_name' => 'Seo Name',
            'type' => 'Type',
        ];
    }

    public static function processRouter($data,$exc = 'create')
    {
        extract($data);
        /**
         * @var $seo_name
         * @var $id_object
         * @var $type
         */
        if ($router = self::find()->where(['id_object' => $id_object,'type' => $type])->one() && $exc != 'delete') {
            $exc = 'update';
        }

        switch ($exc) {
            case 'create':
                $self = new Router;
                $self->setAttributes($data);
                $self->save();
                break;
            case 'update':
                $router = self::find()->where(['id_object' => $id_object,'type' => $type])->one();
                if(!empty($router)) {
                    $router->seo_name = $seo_name;
                    $router->save();
                }
                break;
            case 'delete':
               self::deleteAll("id_object = :id_object AND type = :type",
                    ['id_object' => $id_object,'type' => $type]);
                break;
        }

    }
}
