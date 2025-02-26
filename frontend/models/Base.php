<?php

namespace frontend\models;

use Yii;

class Base extends \yii\db\ActiveRecord
{

    const ORDER_BY = ' id DESC';

    public function setTranslate()
    {
        $type = 0;
        if (method_exists($this, 'listMapLanguage')) {
            switch ($this->tableName()) {
                case 'product_category':
                    $type = DataLang::TYPE_PRODUCT_CATEGORY;
                    break;
                case 'product':
                    $type = DataLang::TYPE_PRODUCT;
                    break;
                case 'news':
                    $type = DataLang::TYPE_NEWS;
                    break;
                case 'banner':
                    $type = DataLang::TYPE_BANNER;
                    break;
                case 'single_page':
                    $type = DataLang::TYPE_SINGLE_PAGE;
                    break;
                case 'config_page':
                    if ($this->type === ConfigPage::TYPE_PRODUCT) {
                        $type = DataLang::TYPE_PAGE_PRODUCT;
                    } else if ($this->type === ConfigPage::TYPE_NEWS) {
                        $type = DataLang::TYPE_PAGE_NEWS;
                    } else if ($this->type === ConfigPage::TYPE_GALLERY_IMAGE) {
                        $type = DataLang::TYPE_PAGE_GALLERY_IMAGE;
                    }
                    break;
            }
        }

        if ($type == 0) {
            return $this;
        }

        #xu ly ngon ngu
        $session = Yii::$app->session;
        $code_lang = $session->get('language');

        $listLanguage = Yii::$app->params['listLanguage'];

        if ($listLanguage[$code_lang]['default']) {
            return $this;
        }

        if (!empty($this->id)) {
            $dataLang = DataLang::find()->where(['id_object' => $this->id, 'code_lang' => $code_lang, 'type' => $type])->one();
            if ($dataLang) {
                foreach ($this->listMapLanguage() as $key => $value) {
                    $this->$key = $dataLang->$value;
                }
            }
        }
        return $this;
    }

    public static function processSeoName($seo_name, $id = null)
    {
        if (empty($id)) {
            $model = Router::find()->where(['seo_name' => $seo_name])->one();
        } else {
            $model = Router::find()->where(['seo_name' => $seo_name])->andWhere('id_object != :id_object', ['id_object' => $id])->one();
        }

        while ($model != null) {
            $seo_name = $seo_name . '-' . time() . rand(10, 99);
            if (empty($id)) {
                $model = Router::find()->where(['seo_name' => $seo_name])->one();
            } else {
                $model = Router::find()->where(['seo_name' => $seo_name])->andWhere('id_object != :id_object', ['id_object' => $id])->one();
            }
        }

        return $seo_name;
    }

    public function getSeoName()
    {
        $model = Router::find()->where(['id_object' => $this->id, 'type' => static::TYPE_ROUTER])->one();
        return $model ? $model->seo_name : '';
    }

    public function getImage()
    {
        return Yii::$app->homeUrl.$this->image;
    }

    public function getUrl()
    {
        return Yii::$app->homeUrl .$this->getSeoName();
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

    public static function getAll()
    {
        return self::find()->where(['active' => 1])->all();
    }

    public function getImageDecode()
    {

        $imageEx = explode('/',$this->image);
        $nameImage = array_pop($imageEx);
        $nameImage = urldecode($nameImage);

        $linkFolder =implode("/",$imageEx);

        return $linkFolder. '/'.$nameImage;
    }

    public function getDescriptionCut($count)
    {
        $data = strip_tags($this->desc);
        $data = trim($data);
        $data = str_replace("&nbsp;", " ", $data);

        if (strlen($data) <= $count) {
            return $data;
        }

        for ($i = $count; $i >= 0; $i--) {
            if ($data[$i] == ' ') {
                echo $data[$i];
                return mb_substr($data, 0,$i). '...';
            }
        }

        return '';
    }

    public function getContentCut($count)
    {
        $data = strip_tags($this->content);
        $data = trim($data);
        $data = str_replace("&nbsp;", " ", $data);

        if (strlen($data) <= $count) {
            return $data;
        }

        for ($i = $count; $i >= 0; $i--) {
            if ($data[$i] == ' ') {
                echo $data[$i];
                return mb_substr($data, 0,$i). '...';
            }
        }

        return '';
    }
}
