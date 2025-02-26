<?php

namespace backend\controllers;

use yii\web\Controller;

class FileManagerController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
