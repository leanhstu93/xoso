<?php

namespace backend\controllers;

use frontend\models\ConfigPage;
use frontend\models\DataLang;
use frontend\models\ProductImage;
use frontend\models\Router;
use Yii;
use frontend\models\GalleryImage;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GalleryImageController implements the CRUD actions for GalleryImage model.
 */
class GalleryImageController extends BaseController
{

    /**
     * Lists all GalleryImage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel =  new GalleryImage();
        $dataProvider = new ActiveDataProvider([
            'query' => GalleryImage::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' =>$searchModel
        ]);
    }

    /**
     * Displays a single GalleryImage model.
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
     * Creates a new GalleryImage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GalleryImage();
        # language
        $listLanguage = Yii::$app->params['listLanguage'];
        foreach ($listLanguage as $key => $value) {
            if ($value['default']) continue;
            $dataLang[$key] = new DataLang();
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->seo_name = Router::processSeoName($model->seo_name,$model->id);
            $model->user_id = Yii::$app->user->identity->id;
            $model->date_update = time();
            $model->date_create = time();
            if ($model->save()) {
                #xu ly node
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_GALLERY_IMAGE]);

                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id,DataLang::TYPE_GALLERY_IMAGE);
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
     * Updates an existing GalleryImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        # language
        $listLanguage = Yii::$app->params['listLanguage'];
        foreach ($listLanguage as $key => $value) {
            if ($value['default']) continue;
            $dataLang[$key] = DataLang::find()->where(['type' => DataLang::TYPE_GALLERY_IMAGE,'id_object' => $id, 'code_lang' => $key])->one();

            if (empty($dataLang[$key])) {
                $dataLang[$key] = new DataLang();
            }
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->date_update = time();
            $model->seo_name = GalleryImage::processSeoName($model->seo_name,$model->id);
            if ($model->save()) {
                #xu ly node
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_GALLERY_IMAGE],'update');

                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id ,DataLang::TYPE_GALLERY_IMAGE);
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
        ]);
    }

    /**
     * Deletes an existing GalleryImage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        #xu ly node
        Router::processRouter([ 'id_object' => $id, 'type' =>Router::TYPE_GALLERY_IMAGE],'delete');
        #XU LY DATA LANG
        DataLang::deleteAll(['type' => DataLang::TYPE_PAGE_GALLERY_IMAGE, 'id_object' => $id]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the GalleryImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GalleryImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GalleryImage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionConfig()
    {
        if ($model =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_GALLERY_IMAGE])->one() === null) {
            $model = new ConfigPage();
            $model->type = ConfigPage::TYPE_GALLERY_IMAGE;
        } else {
            $model =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_GALLERY_IMAGE])->one();
        }

        # language
        $listLanguage = Yii::$app->params['listLanguage'];
        foreach ($listLanguage as $key => $value) {
            if ($value['default']) continue;
            $dataLang[$key] = DataLang::find()->where(['type' => DataLang::TYPE_PAGE_GALLERY_IMAGE, 'code_lang' => $key])->one();

            if (empty($dataLang[$key])) {
                $dataLang[$key] = new DataLang();
            }
        }

        if ($model->load(Yii::$app->request->post(),'ConfigPage')) {
            $model->seo_name = GalleryImage::processSeoName($model->seo_name,$model->id);
            if ($model->save()) {

                #xu ly node
                $router = Router::find()->where(['type' => Router::TYPE_GALLERY_IMAGE_PAGE])->one();
                if ($router) {
                    Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' => Router::TYPE_GALLERY_IMAGE_PAGE], 'update');
                } else {
                    Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' => Router::TYPE_GALLERY_IMAGE_PAGE], 'create');
                }

                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id,DataLang::TYPE_PAGE_GALLERY_IMAGE );
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
