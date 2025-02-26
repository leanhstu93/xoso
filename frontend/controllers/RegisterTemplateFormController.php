<?php

namespace frontend\controllers;

use frontend\models\RegisterTemplateForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class RegisterTemplateFormController extends Controller
{
    /**
     * {@inheritdoc}
     */
  public function actionSave()
  {
      $model = new RegisterTemplateForm();
      //return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);

      if ($model->load(Yii::$app->request->post())) {
          $model->date_created = time();
          $model ->status = RegisterTemplateForm::STATUS_NEW;
          if ($model->save()) {
              Yii::$app->session->setFlash('success', "Lưu thành công!");
          }
      } else {
          Yii::$app->session->setFlash('error', "Lưu thất bại!");
      }

      return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
  }
}
