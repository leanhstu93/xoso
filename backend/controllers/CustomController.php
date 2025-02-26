<?php

namespace backend\controllers;

use Yii;
use frontend\models\Custom;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomController implements the CRUD actions for Custom model.
 */
class CustomController extends BaseController
{

    /**
     * Lists all Custom models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Custom::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $data
     * @param $key
     * @return bool
     * @throws NotFoundHttpException
     */
    protected function saveData($dataSave,$key)
    {
        $model = $this->findModel(1);

        if(!empty($dataSave)) {
            $dataCustom = json_decode($model->data,true);
            $dataCustom[$key] = $dataSave;
            $model->data = json_encode($dataCustom,JSON_UNESCAPED_UNICODE );
            if($model->save()) {
               return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Displays a single Custom model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Custom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Custom();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Custom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id = 1)
    {
        $custom = Custom::getSettingCustomTemplate();
        $model = $this->findModel($id);

        if(!empty($_POST['Custom'])) {
            if($this->saveData($_POST['Custom'],'settingTemplate')) {
                Yii::$app->session->setFlash('success', "Lưu thành công");
                $this->redirect(['update']);
            } else {
                Yii::$app->session->setFlash('danger', "Lưu thất bại");
            }
        }

        return $this->render('update', [
            'model' => $model,
            'custom' => $custom
        ]);
    }

    public function actionCustomLanguage($id = 1)
    {
        $dataLanguage = Custom::getSettingCustomLanguage();
        $model = $this->findModel($id);

        if(!empty($_POST['Custom'])) {

            if($this->saveData($_POST['Custom'],'settingLanguage')) {
                Yii::$app->session->setFlash('success', "Lưu thành công");
                $this->redirect(['custom-language']);
            } else {
                Yii::$app->session->setFlash('danger', "Lưu thất bại");
            }
        }

        return $this->render('custom-language', [
            'model' => $model,
            'dataLanguage' => $dataLanguage
        ]);
    }

    /**
     * Deletes an existing Custom model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Custom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Custom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Custom::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
