<?php

namespace backend\controllers;

use Yii;
use yii\base\Event;
use frontend\models\Router;
use frontend\models\BannerCategory;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BannerCategoryController implements the CRUD actions for BannerCategory model.
 */
class BannerCategoryController extends Controller
{

    /**
     * Lists all BannerCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel =  new BannerCategory();
        $dataProvider = new ActiveDataProvider([
            'query' => BannerCategory::find(),
        ]);
        Event::on('*', '*', function ($event) {
            // triggered for any event at any class
            Yii::debug('trigger event: ' . $event->name);
        });

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' =>$searchModel
        ]);
    }

    /**
     * Displays a single BannerCategory model.
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
     * Creates a new BannerCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BannerCategory();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->identity->id;
            $model->date_update = time();
            $model->date_create = time();
            $model->seo_name = Router::processSeoName($model->seo_name,$model->id);
            if ($model->save()) {
                #xu ly node
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_BANNER_CATEGORY]);
                Yii::$app->session->setFlash('success', "Lưu thành công");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Lưu thất bại");
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BannerCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->seo_name = Router::processSeoName($model->seo_name,$model->id);
            $model->date_update = time();
            if ( $model->save()) {
                #xu ly node
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_BANNER_CATEGORY],'update');
                Yii::$app->session->setFlash('success', "Lưu thành công");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('danger', "Lưu thất bại");
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BannerCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        #xu ly node
        Router::processRouter([ 'id_object' => $id, 'type' =>Router::TYPE_BANNER_CATEGORY],'delete');
        Yii::$app->session->setFlash('success', "Xóa thành công");
        return $this->redirect(['index']);
    }

    /**
     * Finds the BannerCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BannerCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BannerCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
