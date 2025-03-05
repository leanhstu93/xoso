<?php
namespace frontend\controllers;

use common\components\MyHelpers;
use frontend\models\TemplateNews;
use frontend\models\NewsSoiCau;
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
use PSpell\Config;
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

    public function actionXoSoMienTrung()
    {
        return $this->render('xo-so-mien-trung', [
            'type' => ConfigWebsite::TYPE_MIEN_TRUNG,
            'province' => ConfigWebsite::TYPE_PROVINCE_MIEN_TRUNG
        ]);
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

        if ($type == ConfigWebsite::TYPE_MIEN_NAM) {
            $url = 'https://live.minhngoc.net/O0O/0/xstt/js_m1.js?_=' . time();
        }

        $content = file_get_contents($url);

        if (!empty($content)) {
            $content = 'kqxs.mn={run:1,tinh:"16,17,18",ntime:1729242078,delay:3000,kq:{16:{lv:"45VL42",8:"96",7:"691",6:["9890","9917","0379"],5:"7619",4:["85112","49721","60672","+++++","*****","*****","*****"],3:["*****","*****"],2:"*****",1:"*****",0:"******"},17:{lv:"10K42",8:"18",7:"773",6:["8843","6702","5831"],5:"0165",4:["13032","79682","08524","75578","+++++","*****","*****"],3:["*****","*****"],2:"*****",1:"*****",0:"******"},18:{lv:"33TV42",8:"87",7:"143",6:["4091","9649","7821"],5:"1974",4:["24689","55406","91967","26748","15892","+++++","*****"],3:["*****","*****"],2:"*****",1:"*****",0:"******"}}};';
            $response = [
                'code' => 200,
                'data' => $content
            ];
        }
        

         // Thiết lập kiểu phản hồi là JSON
         Yii::$app->response->format = Response::FORMAT_JSON;

        echo json_encode($response); exit;
    }

    public function actionRewriteUrl($alias)
    {
        if($alias == 'soi-cau') {
            $type = 'soi-cau';
        } else if($alias == 'gioi-thieu') {
            $type = 'about';
        } else if($alias == 'dich-vu') {
            $type = 'dich-vu';
        } else if($alias == 'cart') {
            $type = 'cart';
        } else if($alias == 'xsmb-xo-so-mien-bac') {
            $type = 'xsmb-xo-so-mien-bac';
        } else if($alias == 'xo-so-mien-trung') {
            $type = 'xo-so-mien-trung';
        } else if($alias == 'save-bill-noti') {
            $type = 'save-bill-noti';
        } else if (preg_match('/xo\-so\-mien\-[nam|bac|trung].*/i', $alias)) {
            // Xổ số theo miền, theo thu, theo ngay
            $type = 'xo-so-follow-rule';
        } else if (preg_match('/xoso\-.*/i', $alias)) {
            // Xổ số theo tinh
            $type = 'xo-so-theo-tinh';
        } else {
            $model = Router::find()->where(['seo_name' => $alias])->one();
            $type = $model->type;
        }
       
        if (!empty($type)) {
            switch ($type){
               
                case Router::TYPE_NEWS_CATEGORY :
                    $res = $this->actionGetNewsCategory($model->id_object);
                    break;
                case Router::TYPE_NEWS:
                   
                    $res = $this->actionGetNewsDetail($model->id_object);
                    break;
                case Router::TYPE_SINGLE_PAGE:
                    $res = $this->getSinglePage($model->id_object);
                    break;
               
                case Router::TYPE_NEWS_PAGE:
                    $res = $this->actionGetNewsCategory($model->id_object);
                    break;
                case Router::TYPE_NEWS_SOI_CAU:
                    // chi tiet soi cau
                    $res = $this->actionSoiCauDetail($model->id_object);
                    break;
              
                case 'xo-so-follow-rule':
                    return $this->actionXoSoFollowRule($alias);                    
                    break;                
                case 'xo-so-theo-tinh':
                    return $this->actionXoSoFollowProvince($alias);
                    break;
                case 'xsmb-xo-so-mien-bac':
                    return $this->actionXoSoFollowProvince($alias);
                    break;
                case 'xo-so-mien-trung':
                    return $this->actionXoSoMienTrung();
                case 'soi-cau':
                    return $this->actionListSoiCau();
                    break;
            
            
            }

            return $this->render($res['file'],$res['data']);
        }
    }

    public function actionGetLiveXoSo()
    {
        $url = 'https://live.minhngoc.net/O0O/0/xstt/js_m1.js?_=1729243507418';
        $data = file_get_contents($url);

        return $this->render('test',['data' => $data]);
    }

    private function getPronvinceFromAlias()
    {}

    public function actionXoSoFollowProvince($alias)
    {
        $list =  ConfigWebsite::getDataFollowProvince();
       // debug( $list);
        if ($alias == 'xsmb-xo-so-mien-bac') {
            $province = ConfigWebsite::TYPE_PROVINCE_MIEN_BAC;
            $url = ConfigWebsite::URL_MIEN_BAC ;
            $label = 'Miền Bắc';
            $data = ConfigWebsite::getDataFollowProvince(ConfigWebsite::TYPE_PROVINCE_MIEN_BAC);
           
        } elseif (preg_match('/xoso\-(.*)/i', $alias, $match )) {
            foreach($list as $key => $value) {
                if ($value['alias'] == $match[1]) {
                    $province =  $key;
                   
                    $data = ConfigWebsite::getDataFollowProvince($province);    
                    $url = $data['url'];
                }
            }
        }
       
        if (empty($province)) {
            return $this->actionIndex();    
        } else {
            return $this->render('xo-so-follow-province', [
                'province' => $province,
                'url' => $url,
                'data' => $data
            ]);
        }
    }

    public function actionXoSoFollowRule($alias)
    {
        // Loai mien
        $type = 0;

        if (preg_match('/xo\-so\-mien\-(nam|bac|trung).*/i', $alias, $match )) {
            if ($match[1] == 'nam') {
                $type = ConfigWebsite::TYPE_MIEN_NAM;
            } else if ($match[1] == 'bac') {
                $type = ConfigWebsite::TYPE_MIEN_BAC;
            } else {
                $type = ConfigWebsite::TYPE_MIEN_TRUNG;
            }
        }
        
        if (preg_match('/xo\-so\-mien\-(nam|bac|trung)\-thu\-(2|3|4|5|6|7|chu\-nhat).*/i', $alias, $match )) {
            if ($match[1] == 'nam') {
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
       
        if (empty($thu)) {
             return $this->actionIndex();
        } else {
            return $this->render('xo-so-follow-thu',[
            'type' =>  $type,
            'time' => strtotime($thu),
        ]);
        }
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
        $pages->defaultPageSize = 20;

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

    public function actionSoiCauDetail($id_object)
    {
        $model = NewsSoiCau::find()->where(['id'=>$id_object])->one();
        # news lien quan
        $dataRL = NewsSoiCau::find()->where(['status' => 1])
            ->andWhere('id != :id',['id'=>$id_object])->limit(6)->all();
        #end news lien quan
        $bread[] = [
            'name' => 'Trang chủ',
            'link' => Yii::$app->homeUrl
        ];
        
        $bread[] = [
            'name' => $model->title,
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
        $this->view->title = $model->title;
        return [
            'file' => 'news-soi-cau-detail',
            'data' => [
                'data' => $model,
                'dataRL' => $dataRL,
                'bread' => $bread,
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
        $result = array();
        for($i = 0; $i < 6; $i++) {
            /**
             * Nếu ngày hiên tại trước 16h35 thì không lấy , do chưa tới
             * giờ xổ số
             */
            if ($i == 0 && (
                 date('H') < 16 ||
                 date('H') == 16 &&  date('i') < 35
            )) {
                continue;
            }
//// daedea 
            $timestamp = strtotime("-".$i." day");
            $date = date('Y-m-d', $timestamp);
            $dataXoSo = ConfigWebsite::getUrlXoSoFollowThu($date);
        
            
            foreach($dataXoSo as $key => $value) {
                $dataRaw = ConfigWebsite::analyticXoso($value['url'],$timestamp);
             
                if ($dataRaw['code'] == 200) {
                    $dataXoSo[$key] = array_merge($value, [
                        'data' => $dataRaw['data']
                    ]);
                } else {
                    unset($dataXoSo[$key]);
                }
            }
            // $dataXoSo = array_values($dataXoSo);
            $isRealTime = 0;
            if (empty($dataXoSo)) {
               // $isRealTime = 1;
                continue;
            }
            $result[] = $dataXoSo;
        }

        debug($result);
    }

    public function actionTestCache()
    {
        $pass = MyHelpers::saveToFile('03-1-2025', 'test1.txt', 'aedad');

        debug($pass);
    }

    private function getTimeSoiCau($type)
    {
        if ($type == ConfigWebsite::TYPE_MIEN_NAM) {
            $checkTimeSoXo = date('H') > ConfigWebsite::NUMBER_HOURSE_XOSO_MIEN_NAM ||  (
                date('H') == ConfigWebsite::NUMBER_HOURSE_XOSO_MIEN_NAM && date('i') >= ConfigWebsite::NUMBER_MINUTE_XOSO_FROM);
        } else if ($type == ConfigWebsite::TYPE_MIEN_BAC) {
            $checkTimeSoXo = date('H') > ConfigWebsite::NUMBER_HOURSE_XOSO_MIEN_BAC|| (
                date('H') == ConfigWebsite::NUMBER_HOURSE_XOSO_MIEN_BAC && date('i') >= ConfigWebsite::NUMBER_MINUTE_XOSO_FROM
            );
        } else {
            $checkTimeSoXo = date('H') > ConfigWebsite::NUMBER_HOURSE_XOSO_MIEN_TRUNG ||(
                date('H') == ConfigWebsite::NUMBER_HOURSE_XOSO_MIEN_TRUNG && date('i') >= ConfigWebsite::NUMBER_MINUTE_XOSO_FROM 
            );
        }

        if ($checkTimeSoXo) {
            $dateTimeStamp = strtotime('+1 day');
        } else {
            $dateTimeStamp = time();
        } 

        return $dateTimeStamp;
    }

    public function actionCreateNewsSoiCau()
    {
        $templateNews = TemplateNews::find()->one();
        $type = isset($_GET['type']) ? $_GET['type'] : ConfigWebsite::TYPE_MIEN_NAM;
        $dateTimeStamp = $this->getTimeSoiCau($type);
        $date =  date('Y-m-d', $dateTimeStamp);
        
        if ($type == ConfigWebsite::TYPE_MIEN_NAM) {
            $dataProvince = ConfigWebsite::getUrlXoSoFollowThu($date);
        } else if ($type == ConfigWebsite::TYPE_MIEN_BAC) {
            $txtDate = date('d-m-Y', strtotime($date));
            $dataProvince = [
                [
                    'label' => 'Miềm Bắc',
                    'province_type' => ConfigWebsite::TYPE_PROVINCE_MIEN_BAC,                  
                    'url' => ConfigWebsite::URL_MIEN_BAC .  '/' .  $txtDate . '.js'
                ]
            ];
        } else {
            $dataProvince = ConfigWebsite::getUrlXoSoFollowThuMienTrung($date);
        }

        if (!empty($dataProvince)) {
            foreach($dataProvince as $item) {
                $news = NewsSoiCau::find()->where(['date_created' => $date, 'province_type' => $item['province_type']])->one();
           
                if (empty( $news) || !empty($_GET['preview'])) {
                    $myModel = new NewsSoiCau();
                    $myModel->title = "Dự đoán Soi cầu Xổ số " . $item['label'] ." " . date('d/m/Y', $dateTimeStamp);
                    $myModel->province_type = $item['province_type'];
                    $myModel->date_created = date('Y-m-d', $dateTimeStamp);
                    if ($type == ConfigWebsite::TYPE_MIEN_NAM) {
                        $myModel->url_image = 'upload/images/du-doan-xo-so-mien-nam-3-3-2025.png';
                    } else if ($type == ConfigWebsite::TYPE_MIEN_BAC) {
                        $myModel->url_image = 'upload/images/du-doan-xo-so-mien-nam-3-3-2025.png';
                    } else {
                        $myModel->url_image = 'upload/images/du-doan-xo-so-mien-nam-3-3-2025.png';
                    }
                    
                    $myModel->content = $templateNews->getContent($dateTimeStamp, $item['label'], $item['province_type'],  $type);
                    #xu ly node
                    $seoName = MyHelpers::convertToSlug($myModel->title);
                    $myModel->seo_name = Router::processSeoName( $seoName ,$myModel->id);
                    $myModel->status = 1;
                   
                 
                    if (!empty($_GET['preview']) && $_GET['preview'] == 1) {
                        return $this->render('news-soi-cau-detail', [
                            'data' => $myModel,
                            'preview' => 1,
                        ]);

                    }
                    if ($myModel->save()) {
                        Router::processRouter(['seo_name' =>$myModel->seo_name, 'id_object' => $myModel->id, 'type' =>Router::TYPE_NEWS_SOI_CAU]);
                        echo "Lưu thành công:" . $myModel->title . "<br>";
                    } else {
                        debug($myModel->getErrorSummary(true), 1);
                        echo "Lưu thất bại: ".  $myModel->title ." <br>";
                    }
                } else {
                    echo $item['province_type'];
                    echo $item['label'] ." Đã tồn tại! <br>";
                }
            }
        }
       
        exit('Không có dữ liệu');
    }

    public function actionSoiCau()
    {
        $data = TemplateNews::find()->one();

        return $this->render('soi-cau-detail', [
            'data' => $data,
        ]);
    }

    public function actionGetLoGan()
    {
        $content = '';
        $url = 'https://atrungroi.com/thong-ke-lo-gan-xsag.html';
        $dataRaw = MyHelpers::sendMessage($url);

        $preg = "/.*main.*Bảng thống kê 10 con lô gan.*<table(.*)<\/table>.*Bảng thống kê 10 cặp lô khan .*main.*/msi";
        $dataAna = preg_match_all($preg, $dataRaw, $result);

        if (!empty($result[1][0])) {
            $content = "<table". $result[1][0]."</table>";    
        }

       return $content;
    }

    public function actionListSoiCau()
    {  
        $this->layout = 'main';

        $sort = $this->getSort();
        #query
        $dataQuery = [];
        $dataGet = Yii::$app->request->get();
        if (!empty($dataGet['keyword'])) {
            $dataQuery = [
                'like', 'name', $dataGet['keyword']
            ];
        }
        
        $data = NewsSoiCau::find()->where($dataQuery)->andWhere(['status' => 1]);
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
      
        # phan trang
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->defaultPageSize = 20;

        $models = $data->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('id DESC')
            ->all();
        # end phan trang
        
        return $this->render('list-soi-cau', [
           'data' => $models,
                'bread' => $bread,
                'pages' =>$pages
        ]);
    }

    /**
     * Hien thi table xo so theo tinh thanh mien nam va mien trung
     */
    public function actionGetContentXoSoProvince()
    {
        $data = ConfigWebsite::getDataFollowProvince($_GET['province']);

        return $this->render('get-content-table-xo-so-province', [
            'province' =>  $_GET['province'],
            'url' =>$data['url'],
            'data' => $data
        ]);
    }
}
