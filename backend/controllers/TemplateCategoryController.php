<?php

namespace backend\controllers;

use frontend\models\DataLang;
use frontend\models\ProductCategory;
use frontend\models\Router;
use Yii;
use frontend\models\TemplateCategory;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TemplateCategoryController implements the CRUD actions for TemplateCategory model.
 */
class TemplateCategoryController extends BaseController
{

    /**
     * Lists all TemplateCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel =  new TemplateCategory();

        $dataProvider = new ActiveDataProvider([
            'query' => TemplateCategory::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Displays a single TemplateCategory model.
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
     * Creates a new TemplateCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TemplateCategory();

        # language
        $listLanguage = Yii::$app->params['listLanguage'];
        $dataLang = [];
        foreach ($listLanguage as $key => $value) {
            if ($value['default']) continue;
            if (empty($dataLang[$key])) {
                $dataLang[$key] = new DataLang();
            }
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->seo_name = Router::processSeoName($model->seo_name,$model->id);
            if ($model->save()) {
                #xu ly node
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_TEMPLATE_CATEGORY]);
                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id,DataLang::TYPE_TEMPLATE_CATEGORY);
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
     * Updates an existing TemplateCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        # language
        $dataLang = [];
        $listLanguage = Yii::$app->params['listLanguage'];
        foreach ($listLanguage as $key => $value) {
            if ($value['default']) continue;
            $dataLang[$key] = DataLang::find()->where(['type' => DataLang::TYPE_TEMPLATE_CATEGORY,'id_object' => $id, 'code_lang' => $key])->one();

            if (empty($dataLang[$key])) {
                $dataLang[$key] = new DataLang();
            }
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->seo_name = Router::processSeoName($model->seo_name,$model->id);

            if ($model->save()) {
                #xu ly node
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_TEMPLATE_CATEGORY],'update');
                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id ,DataLang::TYPE_TEMPLATE_CATEGORY);
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
     * Deletes an existing TemplateCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        #xu ly node
        Router::processRouter([ 'id_object' => $id, 'type' =>Router::TYPE_NEWS_CATEGORY],'delete');
        #XU LY DATA LANG
        DataLang::deleteAll(['type' => DataLang::TYPE_NEWS_CATEGORY, 'id_object' => $id]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the TemplateCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TemplateCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TemplateCategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
