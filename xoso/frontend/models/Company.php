<?php

namespace frontend\models;

use Yii;
use frontend\models\Base;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $favicon
 * @property string $logo
 * @property string $email
 * @property string $fax
 * @property string $tel
 * @property string $phone
 * @property string $facebook
 * @property string $twitter
 * @property string $google
 * @property string $youtube
 */
class Company extends Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'favicon', 'logo', 'email', 'fax', 'tel', 'phone', 'facebook', 'twitter', 'google', 'youtube','meta_title','meta_keyword', 'meta_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên công ty',
            'address' => 'Địa chỉ',
            'favicon' => 'Favicon',
            'logo' => 'Logo',
            'email' => 'Email',
            'fax' => 'Fax',
            'tel' => 'Tel',
            'phone' => 'Điện thoại',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'google' => 'Google',
            'youtube' => 'Youtube',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keyword' => 'Meta Keyword',
        ];
    }
}
