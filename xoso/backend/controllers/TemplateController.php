<?php

namespace backend\controllers;

use frontend\models\ConfigPage;
use frontend\models\DataLang;
use frontend\models\Template;
use frontend\models\Router;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TemplateController implements the CRUD actions for Template model.
 */
class TemplateController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Template models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel =  new Template();
        $dataProvider = new ActiveDataProvider([
            'query' => Template::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' =>$searchModel
        ]);
    }

    /**
     * Displays a single Template model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Template();

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
            $model->date_create = time();
            $model->count_view = 1;
            $model->seo_name = Router::processSeoName($model->seo_name,$model->id);

            if ($model->save()) {
                #xu ly node
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_TEMPLATE]);
                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id,DataLang::TYPE_TEMPLATE);
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
     * Updates an existing Template model.
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
            $dataLang[$key] = DataLang::find()->where(['type' => DataLang::TYPE_TEMPLATE,'id_object' => $id, 'code_lang' => $key])->one();

            if (empty($dataLang[$key])) {
                $dataLang[$key] = new DataLang();
            }
        }
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->seo_name = Router::processSeoName($model->seo_name,$model->id);
            if ($model->save()) {
                #xu ly node
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_TEMPLATE],'update');
                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id ,DataLang::TYPE_TEMPLATE);
                }
                #end save data lang

                $this->saveLog('template:update:edit');
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

    public function actionConfig()
    {
        $dataLang = [];
        if ($model =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_TEMPLATE])->one() === null) {
            $model = new ConfigPage();
            $model->type = ConfigPage::TYPE_TEMPLATE;
        } else {
            $model =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_TEMPLATE])->one();
        }

        # language
        $listLanguage = Yii::$app->params['listLanguage'];
        foreach ($listLanguage as $key => $value) {
            if ($value['default']) continue;

            $dataLang[$key] = DataLang::find()->where(['type' => DataLang::TYPE_PAGE_TEMPLATE, 'code_lang' => $key])->one();

            if (empty($dataLang[$key])) {
                $dataLang[$key] = new DataLang();
            }
        }

        if ($model->load(Yii::$app->request->post(),'ConfigPage')) {
            $model->seo_name = Template::processSeoName($model->seo_name,$model->id);
            if ($model->save()) {
                #xu ly node
                $router = Router::find()->where(['type' => Router::TYPE_TEMPLATE_PAGE])->one();
                if ($router) {
                    Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' => Router::TYPE_TEMPLATE_PAGE],'update');
                } else {
                    Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' => Router::TYPE_TEMPLATE_PAGE],'create');
                }
                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id,DataLang::TYPE_TEMPLATE_PAGE );
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

    /**
     * Deletes an existing Template model.
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
     * Finds the Template model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Template the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Template::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
