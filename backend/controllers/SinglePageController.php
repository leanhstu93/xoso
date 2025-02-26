<?php

namespace backend\controllers;

use frontend\models\DataLang;
use frontend\models\Router;
use frontend\models\SinglePage;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SinglePageController implements the CRUD actions for SinglePage model.
 */
class SinglePageController extends BaseController
{

    /**
     * Lists all SinglePage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel =  new SinglePage();
        $dataProvider = new ActiveDataProvider([
            'query' => SinglePage::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' =>$searchModel
        ]);
    }

    /**
     * Displays a single SinglePage model.
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
     * Creates a new SinglePage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SinglePage();
        # language
        $listLanguage = Yii::$app->params['listLanguage'];
        $dataLang = [];
        foreach ($listLanguage as $key => $value) {
            if ($value['default']) continue;
            $dataLang[$key] = new DataLang();
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->identity->id;
            $model->date_update = time();
            $model->date_create = time();
            $model->count_view = 1;
            $model->order = 0;
            $model->seo_name = Router::processSeoName($model->seo_name,$model->id);
            if ($model->save()) {
                #xu ly node
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_SINGLE_PAGE]);

                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id,DataLang::TYPE_SINGLE_PAGE);
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
     * Updates an existing SinglePage model.
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
            $dataLang[$key] = DataLang::find()->where(['type' => DataLang::TYPE_SINGLE_PAGE,'id_object' => $id, 'code_lang' => $key])->one();

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
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_SINGLE_PAGE],'update');
                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id ,DataLang::TYPE_SINGLE_PAGE);
                }
                #end save data lang
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
     * Deletes an existing SinglePage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        #xu ly node
        Router::processRouter([ 'id_object' => $id, 'type' =>Router::TYPE_SINGLE_PAGE],'delete');
        #XU LY DATA LANG
        DataLang::deleteAll(['type' => DataLang::TYPE_SINGLE_PAGE, 'id_object' => $id]);
        Yii::$app->session->setFlash('success', "Xóa thành công");

        return $this->redirect(['index']);
    }

    /**
     * Finds the SinglePage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SinglePage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SinglePage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
