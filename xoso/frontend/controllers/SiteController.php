<?php
namespace frontend\controllers;

use frontend\models\Bill;
use frontend\models\BillDetail;
use frontend\models\GalleryImage;
use frontend\models\News;
use frontend\models\NewsCategory;
use frontend\models\Product;
use frontend\models\ProductCategory;
use frontend\models\ProductImage;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\SinglePage;
use frontend\models\Template;
use frontend\models\Video;
use frontend\models\VerifyEmailForm;
use frontend\models\ConfigWebsite;
use Yii;
use \yii\base\View;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Router;
use frontend\models\ConfigPage;
use frontend\models\RlProductCategory;
use yii\data\Pagination;
use yii\helpers\Json;
use yii\web\Response;


/**
 * Site controller
 */
class SiteController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Json
     * Check khung gio kqxs
     */
    public function actionCheckRangeTimeXoSo()
    {
        $response = [
            'code' => 200,
            'data' =>false
        ];

        $dateHourse = date('H');
        $dateMinu = date('i');

        if (isset($_GET['type'])) {
             $type = (int) $_GET['type'];

            if ($type == ConfigWebsite::TYPE_MIEN_NAM) {
                    
                if (ConfigWebsite::checkTimeXoSoMienNam())  {                    
                    $response['data'] = true;
                }
            } else if ($type == ConfigWebsite::TYPE_MIEN_BAC) {
                if (ConfigWebsite::checkTimeXoSoMienBac())  {
                    $response['data'] = true;
                }
            } else {
                if (ConfigWebsite::checkTimeXoSoMienTrung())  {
                    $response['data'] = true;
                }
            }
            

        }        
         // Thiết lập kiểu phản hồi là JSON
         Yii::$app->response->format = Response::FORMAT_JSON;

        echo json_encode($response); exit;
    }

    public function actionGetKqsx()
    {
        $response = [
            'code' => 400,
            'data' => []
        ];

        $type = isset($_GET['type']) ? $_GET['type'] : 1;

        $date = date('Y-m-d', time());
        $dataXoSo = ConfigWebsite::getUrlXoSoFollowThu($date);

        foreach($dataXoSo as $key => $value) {
            $dataRaw = ConfigWebsite::analyticXoso($value['url']);

            if ($dataRaw['code'] == 200) {
                $dataRaw['data'][0] = time();
                $dataRaw['data'][1] = '';

                $dataXoSo[$key] = array_merge($value, [
                    'data' => $dataRaw['data']
                ]);
            }
        }

        if ($dataRaw['code'] == 200) {
            $response = [
                'code' => 200,
                'data' => $dataXoSo
            ];
        }

         // Thiết lập kiểu phản hồi là JSON
         Yii::$app->response->format = Response::FORMAT_JSON;

        echo json_encode($response); exit;
    }

    public function actionRewriteUrl($alias)
    {
        if($alias == 'lien-he') {
            $type = 'contact';
        } else if($alias == 'gioi-thieu') {
            $type = 'about';
        } else if($alias == 'dich-vu') {
            $type = 'dich-vu';
        } else if($alias == 'cart') {
            $type = 'cart';
        } else if($alias == 'xsmb-xo-so-mien-bac') {
            $type = 'xsmb-xo-so-mien-bac';
        } else if($alias == 'save-bill') {
            $type = 'save-bill';
        } else if($alias == 'save-bill-noti') {
            $type = 'save-bill-noti';
        } else if (preg_match('/xo\-so\-mien\-[nam|bac|trung].*/i', $alias)) {
            
            // Xổ số theo miền, theo thu, theo ngay
            $type = 'xo-so-follow-rule';
        } else {
            $model = Router::find()->where(['seo_name' => $alias])->one();
            $type = $model->type;
        }

        if (!empty($type)) {
            switch ($type){
                case Router::TYPE_PRODUCT:
                    $res =  $this->getProductDetail($model->id_object);
                    break;
                case Router::TYPE_PRODUCT_CATEGORY:
                   $res =  $this->actionGetProductCategory($model->id_object);
                    break;
                case Router::TYPE_PRODUCT_PAGE :
                    $res =  $this->actionGetProductCategory(0);
                    break;
                case Router::TYPE_NEWS_CATEGORY :
                    $res = $this->actionGetNewsCategory($model->id_object);
                    break;
                case Router::TYPE_NEWS:
                    $res = $this->actionGetNewsDetail($model->id_object);
                    break;
                case Router::TYPE_SINGLE_PAGE:
                    $res = $this->getSinglePage($model->id_object);
                    break;
                case Router::TYPE_GALLERY_IMAGE_PAGE:
                    $res = $this->getGalleryImage($model->id_object);
                    break;
                case Router::TYPE_GALLERY_IMAGE:
                    $res = $this->getGalleryImageDetail($model->id_object);
                    break;
                case Router::TYPE_NEWS_PAGE:
                    $res = $this->actionGetNewsCategory($model->id_object);
                    break;
                case Router::TYPE_VIDEO:
                    $res = $this->actionVideoDetail($model->id_object);
                    break;
                case Router::TYPE_TEMPLATE_PAGE:
                    $res = $this->actionTemplate(0);
                    break;
                case Router::TYPE_TEMPLATE_CATEGORY:
                    $res = $this->actionTemplate($model->id_object);
                    break;
                case 'xo-so-follow-rule':
                    return $this->actionXoSoFollowRule($alias);                    
                    break;
                case 'xsmb-xo-so-mien-bac' :
                    $this->actionVideo();
                    break;
                case 'contact':
                    $res = $this->getContact();
                    break;
                case 'about':
                    $res = $this->getAbout();
                    break;
                case 'dich-vu':
                    $res = $this->getAllSecrvice();
                    break;
                case 'save-bill':
                    $res = $this->saveBill();
                    break;
                case 'cart':
                    $res['data'] = [
                        'data' => [],
                        'bread' => [
                            ['name' => 'Giỏ hàng', 'link' => 'javascrip:;'],
                            ['name' => 'Trang chủ', 'link' => '/'],
                        ]
                    ];
                    $res['file'] = 'cart';
                    break;
                case 'checkout':
                    $res['data'] = [
                        'data' => [],
                        'bread' => [
                            ['name' => 'Thanh toán', 'link' => 'javascrip:;'],
                            ['name' => 'Trang chủ', 'link' => '/'],
                        ]
                    ];
                    $res['file'] = 'checkout';
                    break;
                case 'save-bill-noti':
                    $res['data'] = [
                        'data' => [],
                        'bread' => [
                            ['name' => 'Thanh toán', 'link' => 'javascrip:;'],
                            ['name' => 'Trang chủ', 'link' => '/'],
                        ]
                    ];
                    $res['file'] = 'noti-save-bill-success';
                    break;
            }

            return $this->render($res['file'],$res['data']);
        }
    }

    public function actionXoSoFollowRule($alias)
    {
        // Loai mien
        $type = 0;

        if (preg_match('/xo\-so\-mien\-(nam|bac|trung).*/i', $alias, $match )) {
            if ($match[1] == 'name') {
                $type = ConfigWebsite::TYPE_MIEN_NAM;
            } else if ($match[1] == 'bac') {
                $type = ConfigWebsite::TYPE_MIEN_BAC;
            } else {
                $type = ConfigWebsite::TYPE_MIEN_TRUNG;
            }
        }

        if (preg_match('/xo\-so\-mien\-(nam|bac|trung)\-thu\-(2|3|4|5|6|7|chu\-nhat).*/i', $alias, $match )) {
            
            if ($match[1] == 'name') {
                $type = ConfigWebsite::TYPE_MIEN_NAM;
                $checkTimeSoXo = date('H') > ConfigWebsite::NUMBER_HOURSE_XOSO_MIEN_NAM ||  (
                    date('H') == ConfigWebsite::NUMBER_HOURSE_XOSO_MIEN_NAM && date('i') >= ConfigWebsite::NUMBER_MINUTE_XOSO_FROM);
            } else if ($match[1] == 'bac') {
                $type = ConfigWebsite::TYPE_MIEN_BAC;
                $checkTimeSoXo = date('H') > ConfigWebsite::NUMBER_HOURSE_XOSO_MIEN_BAC|| (
                    date('H') == ConfigWebsite::NUMBER_HOURSE_XOSO_MIEN_BAC && date('i') >= ConfigWebsite::NUMBER_MINUTE_XOSO_FROM
                );
            } else {
                $type = ConfigWebsite::TYPE_MIEN_TRUNG;
                $checkTimeSoXo = date('H') > ConfigWebsite::NUMBER_HOURSE_XOSO_MIEN_TRUNG ||(
                    date('H') == ConfigWebsite::NUMBER_HOURSE_XOSO_MIEN_TRUNG && date('i') >= ConfigWebsite::NUMBER_MINUTE_XOSO_FROM 
                );
            }

            $checkDateCurrent = false;
            $dateCurrentN = false;
            if ($match[2] == '2') {
                $dateCurrentN = date('N') == 1 && $checkTimeSoXo;
                $thu = date('Y-m-d', (date('N') >= 2) ? strtotime('monday this week') : strtotime('last monday'));
            } else if ($match[2] == '3') {
                $dateCurrentN = date('N') == 2 && $checkTimeSoXo;
                $thu = date('Y-m-d', (date('N') >= 3) ? strtotime('tuesday this week') : strtotime('last tuesday'));
            } else if ($match[2] == '4') {
                $dateCurrentN = date('N') == 3 && $checkTimeSoXo;
                $thu = $thu4 = date('Y-m-d', (date('N') >= 4) ? strtotime('wednesday this week') : strtotime('last wednesday'));
            } else if ($match[2] == '5') {
                $dateCurrentN = date('N') == 4 && $checkTimeSoXo;
                $thu = date('Y-m-d', (date('N') >= 5) ? strtotime('thursday this week') : strtotime('last thursday'));
            } else if ($match[2] == '6') {
                $dateCurrentN = date('N') == 5 && $checkTimeSoXo;
                $thu = date('Y-m-d', (date('N') >= 6) ? strtotime('friday this week') : strtotime('last friday'));
            } else if ($match[2] == '7') {
                $dateCurrentN = date('N') == 6 && $checkTimeSoXo;
                $thu =  date('Y-m-d', (date('N') >= 7) ? strtotime('saturday this week') : strtotime('last saturday'));
            } else if ($match[2] == 'chu-nhat') {
                $dateCurrentN = date('N') == 0 && $checkTimeSoXo;
                $thu =  date('Y-m-d', (date('N') == 7) ? strtotime('sunday this week') : strtotime('last sunday'));
            }

            if ($dateCurrentN) {
                $thu = date('Y-m-d');
            }
        }
        
        return $this->render('xo-so-follow-thu',[
            'type' =>  $type,
            'time' => strtotime($thu),
        ]);
    }
    public function actionSaveBillNoti()
    {
        $res['data'] = [
            'data' => [],
            'bread' => [
                ['name' => 'Thanh toán', 'link' => 'javascrip:;'],
                ['name' => 'Trang chủ', 'link' => '/'],
            ]
        ];
        $res['file'] = 'noti-save-bill-success';
        return $this->render($res['file'],$res['data']);
    }

    /**
     * change ngon ngu
     */
    public function actionChangeLanguage($param) {
        $listLanguage = Yii::$app->params['listLanguage'];
        $session = Yii::$app->session;

        if (!empty($listLanguage[$param])) {
            $session->set('language', $param);
        }
        $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionTemplate($id_object)
    {
        if ($id_object > 0) {


        } else {
            # get all
            $configPage =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_TEMPLATE])->one()->setTranslate();
            $this->setTagMeta($configPage);
            #query
            $dataQuery = [];
            $dataGet = Yii::$app->request->get();
            if (!empty($dataGet['keyword'])) {
                $dataQuery = [
                    'like', 'name', $dataGet['keyword']
                ];
            }
            $data = Template::find()->where($dataQuery)->andWhere(['active' => 1]);

            $countQuery = clone $data;
            $categories = [];
            // set breadcrumb
            $bread[] = [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ];
            $bread[] = [
                'name' => $configPage->name,
                'link' =>$configPage->getUrl()
            ];
            //end set breadcrumb
            # lấy danh mục con
            $categoryChild = ProductCategory::find()->where(['active'=>1])->all();
        }


        # phan trang
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 20;
        $models = $data->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('id DESC')
            ->all();
        # end phan trang



        return [
            'file' => 'template',
            'data' => [
                'data' => $models,
                'bread' => $bread,
                'pages' =>$pages
            ]
        ];
    }

    /**
     * hàm lấy danh sách sp theo dm
     */
    public function actionGetProductCategory($id_object = 0)
    {
        $this->layout = 'main';
        $myRlProductCategory = new RlProductCategory();
        if ($id_object > 0) {
            $arrIds = $myRlProductCategory->getProductIds($id_object);
            $data = Product::find()->where(['in', 'id', $arrIds]);

            $countQuery = clone $data;

            $categories = ProductCategory::find()->where(['id' => $id_object])->one();
            // set breadcrumb
            $bread[] = [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ];
            $bread = array_merge($bread, ProductCategory::getBreadCrumb($categories, []));
            # lấy danh mục con
            $categoryChild = ProductCategory::find()->where(['active'=>1,'parent_id' => $id_object])->all();
        } else {
            # get all
            #query
            $dataQuery = [];
            $dataGet = Yii::$app->request->get();
            if (!empty($dataGet['keyword'])) {
                $dataQuery = [
                    'like', 'name', $dataGet['keyword']
                ];
            }
            $data = Product::find()->where($dataQuery)->andWhere(['active' => 1]);
            $countQuery = clone $data;
            $categories = [];
            // set breadcrumb
            $bread[] = [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ];
            //end set breadcrumb
            # lấy danh mục con
            $categoryChild = ProductCategory::find()->where(['active'=>1])->all();
        }


        # phan trang
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 15;
        $models = $data->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('id DESC')
            ->all();
        # end phan trang

        # set meta
        $categories->setTranslate();
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $categories->meta_keyword
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $categories->meta_desc
        ]);
        $this->view->title = $categories->name;

        return [
            'file' => 'product-category',
            'data' => [
                'data' => $models,
                'categories' => $categories,
                'categoryChild' => $categoryChild,
                'bread' => $bread,
                'pages' =>$pages
            ]
        ];
    }

    /**
     * hàm lấy danh sách sp theo dm
     */
    public function actionGetNewsCategory($id = 0)
    {
        $this->layout = 'main';

        $sort = $this->getSort();

        if ($id > 0) {

            $arrIds = [$id];
            $newsCategory = NewsCategory::find()->where(['parent_id' => $id])->all();
             NewsCategory::getIdsChild($newsCategory,$arrIds);
            $data = News::find()->where(['in', 'category_id', $arrIds]);

            $countQuery = clone $data;
            $categories = NewsCategory::find()->where(['id' => $id])->one();
            // set breadcrumb
            $bread = NewsCategory::getBreadCrumb($categories, []);
            $bread[] = [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ];

            # set meta
            $categories->setTranslate();
            $this->view->registerMetaTag([
                'name' => 'keywords',
                'content' => $categories->meta_keyword
            ]);
            $this->view->registerMetaTag([
                'name' => 'description',
                'content' => $categories->meta_desc
            ]);
            $this->view->title = $categories->name;

        } else {
            # get all
            #query
            $dataQuery = [];
            $dataGet = Yii::$app->request->get();
            if (!empty($dataGet['keyword'])) {
                $dataQuery = [
                    'like', 'name', $dataGet['keyword']
                ];
            }

            $data = News::find()->where($dataQuery)->andWhere(['active' => 1]);
            $countQuery = clone $data;
            $categories = [];
            // set breadcrumb
            $bread[] = [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ];

            # set meta
            $configPage = new ConfigPage();
            $modelConfigPage = ConfigPage::getPageConfig(ConfigPage::TYPE_NEWS);
            $modelConfigPage->setTranslate();
            $this->view->registerMetaTag([
                'name' => 'keywords',
                'content' => $modelConfigPage->meta_keyword
            ]);
            $this->view->registerMetaTag([
                'name' => 'description',
                'content' => $modelConfigPage->meta_desc
            ]);
            $this->view->title = $modelConfigPage->name;
        }
        //end set breadcrumb
        $newsHot = News::find()->where(['option' => News::OPTION_HOT])->limit(3)->all();
        # phan trang
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 18;

        $models = $data->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('id DESC')
            ->all();
        # end phan trang

        return [
            'file' => 'news-category',
            'data' => [
                'data' => $models,
                'categories' => $categories,
                'bread' => $bread,
                'newsHot' => $newsHot,
                'pages' =>$pages
            ]
        ];
    }

    public function actionGetNewsDetail($id_object)
    {
        News::increaseView($id_object);
        $model = News::find()->where(['id'=>$id_object])->one();
        $newsCategory = NewsCategory::find()->where(['id' => $model->category_id])->all();
        # news lien quan
        $dataRL = News::find()->where(['category_id' => $model->category_id ])
            ->andWhere('id != :id',['id'=>$id_object])->limit(6)->all();
        #end news lien quan
        $bread[] = [
            'name' => 'Trang chủ',
            'link' => Yii::$app->homeUrl
        ];
        $bread = array_merge(
            $bread,
            NewsCategory::getBreadCrumb($newsCategory, [])
        );
        $bread[] = [
            'name' => $model->name,
            'link' => $model->getUrl()
        ];

        # set meta
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $model->meta_keyword
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $model->meta_desc
        ]);
        $this->view->title = $model->name;
        return [
            'file' => 'news-detail',
            'data' => [
                'data' => $model,
                'dataRL' => $dataRL,
                'bread' => $bread,
            ]
        ];
    }
    public function actionVideo($id_object)
    {
        $bread = [
            [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ],
            [
                'name' => $model->name,
                'link' => $model->getUrl()
            ],
        ];

        # set meta
        $model->setTranslate();
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $model->meta_keyword
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $model->meta_desc
        ]);
        $this->view->title = $model->name;

        return [
            'file' => 'xo-so-mien-bac',
            'data' => [
                'data' => $model,
                'dataRL' => $dataRL,
                'bread' => $bread,
            ]
        ];
    }
    public function getProductDetail($id_object)
    {
        $myRlProductCategory = new RlProductCategory();

        $model = Product::find()->where(['id'=>$id_object])->one();

        # sp lien quan
        $idsRL = $myRlProductCategory->getProductIdsRL($id_object);
        $dataRL = Product::find()->where(['in','id', $idsRL])->limit(3)->all();
        #end sp lien quan
        $dataImages = ProductImage::find()->where(['product_id' => $id_object])->all();
        $bread = [
            [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ],
            [
                'name' => $model->name,
                'link' => $model->getUrl()
            ],
        ];

        # set meta
        $model->setTranslate();
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $model->meta_keyword
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $model->meta_desc
        ]);
        $this->view->title = $model->name;

        return [
            'file' => 'product-detail',
            'data' => [
                'data' => $model,
                'dataRL' => $dataRL,
                'bread' => $bread,
                'dataImages' => $dataImages
            ]
        ];
    }
    public function getSinglePage($id_object)
    {
        $models = SinglePage::find()->where(['id'=>$id_object])->one();

        # set meta
        $models->setTranslate();
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $models->meta_keyword
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $models->meta_desc
        ]);
        $this->view->title = $models->name;
        $bread = [
            [
                'name' => $models->name,
                'link' => $models->getUrl()
            ],
            [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ],

        ];
        return [
            'file' => 'single-page',
            'data' => [
                'data' => $models,
                'bread' => $bread,
            ]
        ];
    }

    public function getContact()
    {
        $bread = [
            [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ],
            [
                'name' => 'Liên hệ',
                'link' => 'javascrip:;'
            ],
        ];

        $this->view->title = Yii::$app->view->params['lang']->contact;
        return [
            'file' => 'contact',
            'data' => [
                'bread' => $bread,
            ]
        ];
    }

    public function getAbout()
    {
        $bread = [
            [
                'name' => 'Trang chủ',
                'link' => Yii::$app->homeUrl
            ],
            [
                'name' => 'Giới thiệu',
                'link' => 'javascrip:;'
            ],
        ];

        $this->view->title = Yii::$app->view->params['lang']->about;
        return [
            'file' => 'about',
            'data' => [
                'data' => '',
                'bread' => $bread,
            ]
        ];
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function getAllSecrvice()
    {
        $categories = ProductCategory::find()->where(['parent_id' => 0])->all();


        $bread[] = [
            'name' => 'Trang chủ',
            'link' => Yii::$app->homeUrl
        ];
        $bread[] = [
            'name' => 'Dịch vụ',
            'link' => 'javascrip:;'
        ];

        return [
            'file' => 'product-category-all-custom',
            'data' => [
                'data' => $categories,
                'bread' => $bread,
            ]
        ];
    }

    public function getGalleryImage()
    {
        $modelConfigPage = ConfigPage::getPageConfig(ConfigPage::TYPE_GALLERY_IMAGE);
        $data = GalleryImage::find()->where(['active' => 1]);
        $countQuery = clone $data;
        $bread[] = [
            'name' => 'Trang chủ',
            'link' => Yii::$app->homeUrl
        ];
        $bread[] = [
            'name' => $modelConfigPage->name,
            'link' => 'javascrip:;'
        ];

        # phan trang
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 18;
        $models = $data->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        # end phan trang


        # set meta
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $modelConfigPage->meta_keyword
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $modelConfigPage->meta_desc
        ]);
        $this->view->title = $modelConfigPage->name;

        return [
            'file' => 'gallery-image',
            'data' => [
                'data' => $models,
                'bread' => $bread,
                'page' => $modelConfigPage,
                'pages' => $pages,
            ]
        ];
    }

    public function getGalleryImageDetail($id)
    {
        $data = GalleryImage::find()->where(['active' => 1,'id' => $id])->one();
        $dataRL = GalleryImage::find()->where('id != :id' , ['id' => $id])->andWhere(['active' => 1])->limit(6)->all();
        $bread[] = [
            'name' => 'Trang chủ',
            'link' => Yii::$app->homeUrl
        ];

        $bread[] = [
            'name' => $data->name,
            'link' => 'javascrip:;'
        ];

        $this->view->title = $data->name;

        return [
            'file' => 'gallery-image-detail',
            'data' => [
                'data' => $data,
                'bread' => $bread,
                'dataRL' => $dataRL
            ]
        ];
    }

    public function actionSearchJson()
    {
        if (Yii::$app->request->isAjax && isset($_GET['term'])) {

            sleep(2); // for test
            $keyword = $_GET['term'];
            $results = [];

            $q = addslashes($keyword);
            foreach (News::find()->where("(`name` like '%{$q}%')")->all() as $model) {
                $results[] = [
                    'id' => $model['id'],
                    'url' => $model->getUrl(),
                    'label' => $model['name'],
                ];
            }
            echo Json::encode($results);
        }
    }

    public function actionTest()
    {
        $response = [
            'code' => 200,
            'data' => []
        ];
        $url = ConfigWebsite::getUrlXoSoFollowThu();
        
        $milliseconds = floor(microtime(true) * 1000);

        $url = 'https://www.xoso.net/getkqxs/phu-yen/02-09-2024.js?_='.$milliseconds;
        $data = ConfigWebsite::analyticXoso($url);
      
    }
}
