<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        //debug($model->load(Yii::$app->request->post()),true);
       // debug($model,true);
        if ($model->load(Yii::$app->request->post())) {
            $model->password = md5($model->password);
            if($model->login()) {
                $kcfOptions = [
                    'files' => [
                        'upload' => true,
                        'delete' => true,
                        'copy' => true,
                        'move' => true,
                        'rename' => true,
                    ],
                    'dirs' => [
                        'create' => true,
                        'delete' => true,
                        'rename' => true,
                    ],
                ];
//                $session = Yii::$app->session;
//                if (!$session->isActive) {
//                    $session->open();
//                }
//                Yii::$app->session->set('KCF_ACCESS', $kcfOptions);
                return $this->goBack();
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}

