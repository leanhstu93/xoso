<?php

namespace backend\controllers;

use frontend\models\DataLang;
use frontend\models\Logs;
use frontend\models\Product;
use iutbay\yii2kcfinder\KCFinder;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\components\MyHelpers;

class BaseController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true
                    ],
                    [
                        'actions' => ['logout', 'index','create', 'update', 'delete', 'config', 'custom-language'  ],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
        ];
    }
    public function saveDataLang($data, $id_object = 0,$type = DataLang::TYPE_PRODUCT)
    {
        if (empty($data)) {
            return false;
        }

        foreach ($data as $key => $item) {
            if ($dataLang = DataLang::find()->where(['id_object' => $id_object,'code_lang' => $key, 'type' => $type])->one()) {
                $dataLang->load($item,'');
            } else {
                $dataLang = new DataLang();
                $dataLang->load($item,'');
                $dataLang->code_lang = $key;
                $dataLang->id_object = $id_object;
                $dataLang->type = $type;
            }

            if (!$dataLang->save()) {
                debug($dataLang->errors);
            }
        }
        return true;
    }

    /**
     * @param $action
     * @param $data
     * $action = news:add:insert
     */
    public function saveLog($action)
    {
        $modelLog = new Logs();
        $modelLog->action = $action;
        $modelLog->content = '';
        $modelLog->ip =MyHelpers::getClientIp();
        $modelLog->time = time();
        $modelLog->user_id = Yii::$app->user->id;
        if (!$modelLog->save()) {
            print_r($modelLog->errors);
            exit('aaa');
        }
    }
}