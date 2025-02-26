<?php

namespace backend\controllers;

use frontend\models\ConfigPage;
use Yii;
use frontend\models\Menu;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends BaseController
{

    /**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Menu::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menu model.
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
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    protected function buildMenu($data)
    {
        foreach ($data as $key => $value) {
            if (!isset($value['type'])) continue;
            $model = ConfigPage::find()->where(['type' => $value['type']])->one();
            if ($model) {
               $data[$key]['name'] = $model->name;
            }
        }
        return $data;
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id = 1)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $dataDecode = json_decode($model->data,true);
            $menuDefault = Yii::$app->params['menuDefault'];
            $dataMerge = array_merge(Yii::$app->params['menuDefault'],json_decode($model->data,true));

            foreach ($dataDecode as $key => $value) {
                foreach ($menuDefault as $key1 => $value1) {
                    if ($value['module'] == $value1['module']) {
                        $dataDecode[$key] = array_merge($menuDefault[$key1],$dataDecode[$key]);
                    }
                }
            }
            $model->data = json_encode($dataDecode);
            if ($model->save()) {
                return $this->redirect(['update']);
            }

        }
        $model->data = json_decode($model->data,true);
        $model->data = $this->buildMenu($model->data);
        $model->data = json_encode($model->data);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Menu model.
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
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
