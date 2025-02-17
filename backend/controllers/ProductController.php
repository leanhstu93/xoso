<?php

namespace backend\controllers;

use frontend\models\ProductCategory;
use frontend\models\DataLang;
use Yii;
use backend\controllers\BaseController;
use frontend\models\Product;
use frontend\models\ProductImage;
use frontend\models\ConfigPage;
use frontend\models\RlProductCategory;
use frontend\models\Router;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\MyHelpers;
/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BaseController
{

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel =  new Product();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' =>$searchModel
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $formData = Yii::$app->request->post();
        $dataLang = [];
        # language
        $listLanguage = Yii::$app->params['listLanguage'];
        foreach ($listLanguage as $key => $value) {
            if ($value['default']) continue;
            $dataLang[$key] = new DataLang();
        }

        if (!empty($formData)) {
            $model->load($formData);
            $model->user_id = Yii::$app->user->identity->id;
            $model->date_update = time();
            $model->count_view = 1;
            $dataImage =  empty($formData['Product']['images']) ? [] : array_filter($formData['Product']['images']);
            if (count($dataImage) > 0) {
                $model->image = array_shift($dataImage);
            }
            $model->seo_name = Product::processSeoName($model->seo_name,$model->id);

            if ($model->save()) {
                #xu ly node
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_PRODUCT]);
                #xu ly hinh anh
                if (count($dataImage) > 0) {
                    $this->saveProductImage($dataImage, $model->id);
                }
                if (!empty($formData['Product']['category_ids'])) {
                    $this->saveProductCategory($formData['Product']['category_ids'], $model->id);
                }

                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                   $this->saveDataLang($_POST['DataLang'],$model->id);
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
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $dataLang = [];
        # language
        $listLanguage = Yii::$app->params['listLanguage'];
        foreach ($listLanguage as $key => $value) {
            if ($value['default']) continue;
            $dataLang[$key] = DataLang::find()->where(['type' => DataLang::TYPE_PRODUCT,'id_object' => $id, 'code_lang' => $key])->one();

            if (empty($dataLang[$key])) {
                $dataLang[$key] = new DataLang();
            }
        }
        /**
         * @var Product $model
         */
        $model = $this->findModel($id);
        # lay danh sach hinh anh
        $modelProductImage = ProductImage::find()->select('image')->where(['product_id' => $id])->asArray()->all();
        $model->images = array_merge([$model->image],array_column($modelProductImage,'image'));

        # lay danh sach danh muc
        $model->getCategoryIds();

        $formData = Yii::$app->request->post();
        if (!empty($formData)) {
            $model->load($formData);
            $model->date_update = time();
            $dataImage = array_filter($formData['Product']['images']);

            if (!empty($dataImage)) {
                $model->image = array_shift($dataImage);
            }
            $model->seo_name = Product::processSeoName($model->seo_name,$model->id);
            if ($model->save()) {
                #xu ly node
                Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' =>Router::TYPE_PRODUCT],'update');
                if (!empty($formData['Product']['images'][0])) {
                    $this->saveProductImage($dataImage, $model->id);
                }

                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id );
                }
                #end save data lang

                if (!empty($formData['Product']['category_ids'])) {
                    $this->saveProductCategory($formData['Product']['category_ids'], $model->id);
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'dataLang' => $dataLang
        ]);
    }

    /**
     * @param $data
     */
    private function saveProductImage($data,$id)
    {
        ProductImage::deleteAll(['product_id' => $id]);
        if (!empty($data)) {
            foreach ($data as $value) {
                $modelProductImage = new ProductImage();
                $modelProductImage->product_id = $id;
                $modelProductImage->image = $value;
                $modelProductImage->save();
            }
        }
    }

    /**
     * @param $data
     */
    private function saveProductCategory($data,$id)
    {
        if (!empty($data)) {
            RlProductCategory::deleteAll(['product_id' => $id]);

            foreach ($data as $value) {
                $modelRLProductCategory = new RlProductCategory();
                $modelRLProductCategory->product_id = $id;
                $modelRLProductCategory->category_id = $value;
                $modelRLProductCategory->save();
            }
        }
    }

    public function actionConfig()
    {
        $dataLang = [];
        if ($model =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_PRODUCT])->one() === null) {
            $model = new ConfigPage();
            $model->type = ConfigPage::TYPE_PRODUCT;
        } else {
            $model =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_PRODUCT])->one();
        }

        # language
        $listLanguage = Yii::$app->params['listLanguage'];
        foreach ($listLanguage as $key => $value) {
            if ($value['default']) continue;

            $dataLang[$key] = DataLang::find()->where(['type' => DataLang::TYPE_PAGE_PRODUCT, 'code_lang' => $key])->one();

            if (empty($dataLang[$key])) {
                $dataLang[$key] = new DataLang();
            }
        }

        if ($model->load(Yii::$app->request->post(),'ConfigPage')) {
            $model->seo_name = Product::processSeoName($model->seo_name,$model->id);
            if ($model->save()) {
                #xu ly node
                $router = Router::find()->where(['type' => Router::TYPE_PRODUCT_PAGE])->one();
                if ($router) {
                    Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' => Router::TYPE_PRODUCT_PAGE],'update');
                } else {
                    Router::processRouter(['seo_name' => $model->seo_name, 'id_object' => $model->id, 'type' => Router::TYPE_PRODUCT_PAGE],'create');
                }
                #save Data Lang
                if (!empty($_POST['DataLang'])) {
                    $this->saveDataLang($_POST['DataLang'],$model->id,DataLang::TYPE_PAGE_PRODUCT );
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
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        #xu ly node
        Router::processRouter([ 'id_object' => $id, 'type' =>Router::TYPE_PRODUCT],'delete');
        ProductImage::deleteAll(['product_id' => $id]);
        # xoa data lang
        DataLang::deleteAll(['type' => DataLang::TYPE_PRODUCT, 'id_object' => $id]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
