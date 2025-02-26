<?php

namespace backend\controllers;

use common\components\MyHelpers;
use frontend\models\DataLang;
use Yii;
use frontend\models\Service;
use frontend\models\ConfigPage;
use frontend\models\Router;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * ServiceController implements the CRUD actions for Service model.
 */
class ServiceController extends BaseController
{

    /**
     * Lists all Service models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel =  new Service();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' =>$searchModel
        ]);
    }

    /**
     * Displays a single Service model.
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
     * Creates a new Service model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Service();

        # language
        $dataLang = [];
        $listLanguage = Yii::$app->params['listLanguage'];
        foreach ($listLanguage as $key => $value) {
            if ($value['default']) continue;
            if (empty($dataLang[$key])) {
                $dataLang[$key] = new DataLang();
            }
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->identity->id;
            $model->date_update = time();
            $model->date_create = time();
            $model->count_view = 1;
            $model->seo_name = Router::processSeoName($model->seo_name,$model->id);

            if ($model->save()) {
                #xu ly node
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_SERVICE]);
                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id,DataLang::TYPE_SERVICE);
                }
                #end save data lang
                Yii::$app->session->setFlash('success', "Lưu thành công");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Lưu thất bại");
            }
        }

        return $this->render('create', [
            'model' => $model,
            'dataLang' => $dataLang
        ]);
    }

    /**
     * Updates an existing Service model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        # language
        $dataLang = [];
        $listLanguage = Yii::$app->params['listLanguage'];
        foreach ($listLanguage as $key => $value) {
            if ($value['default']) continue;
            $dataLang[$key] = DataLang::find()->where(['type' => DataLang::TYPE_SERVICE,'id_object' => $id, 'code_lang' => $key])->one();

            if (empty($dataLang[$key])) {
                $dataLang[$key] = new DataLang();
            }
        }
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->seo_name = Router::processSeoName($model->seo_name,$model->id);
            $model->date_update = time();
            if ($model->save()) {
                #xu ly node
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_SERVICE],'update');
                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id ,DataLang::TYPE_SERVICE);
                }
                #end save data lang

                $this->saveLog('service:update:edit');
                Yii::$app->session->setFlash('success', "Lưu thành công");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Lưu thất bại");
            }
        }

        return $this->render('update', [
            'model' => $model,
            'dataLang' => $dataLang
        ]);
    }

    /**
     * Deletes an existing Service model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        #xu ly node
        Router::processRouter([ 'id_object' => $id, 'type' =>Router::TYPE_SERVICE],'delete');
        #XU LY DATA LANG
        DataLang::deleteAll(['type' => DataLang::TYPE_SERVICE, 'id_object' => $id]);
        Yii::$app->session->setFlash('success', "Xóa thành công");
        return $this->redirect(['index']);
    }

    /**
     * Finds the Service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Service the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Service::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionConfig()
    {
        if ($model =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_SERVICE])->one() === null) {
            $model = new ConfigPage();
            $model->type = ConfigPage::TYPE_SERVICE;
        } else {
            $model =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_SERVICE])->one();
        }
        # language
        $dataLang = [];
        $listLanguage = Yii::$app->params['listLanguage'];
        foreach ($listLanguage as $key => $value) {
            if ($value['default']) continue;
            $dataLang[$key] = DataLang::find()->where(['type' => DataLang::TYPE_PAGE_SERVICE, 'code_lang' => $key])->one();

            if (empty($dataLang[$key])) {
                $dataLang[$key] = new DataLang();
            }
        }

        if ($model->load(Yii::$app->request->post(),'ConfigPage')) {
            $model->seo_name = Service::processSeoName($model->seo_name,$model->id);
            if ($model->save()) {
                #xu ly node
                $router = Router::find()->where(['type' => Router::TYPE_SERVICE_PAGE])->one();

                if ($router) {
                    Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' => Router::TYPE_SERVICE_PAGE],'update');
                } else {
                    Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' => Router::TYPE_SERVICE_PAGE],'create');
                }

                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id,DataLang::TYPE_PAGE_SERVICE );
                }
                #end save data lang

                Yii::$app->session->setFlash('success', "Lưu thành công");
            } else {
                Yii::$app->session->setFlash('danger', "Lưu thất bại");
            }
            return $this->redirect(['config']);
        }

        return $this->render('config', [
            'model' => $model,
            'dataLang' => $dataLang
        ]);
    }


}
