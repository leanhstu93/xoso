<?php
namespace frontend\controllers;

use frontend\models\ConfigPage;
use frontend\models\Custom;
use frontend\models\GalleryImage;
use frontend\models\Router;
use frontend\models\SinglePage;
use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\data\Sort;
use yii\web\Controller;
use frontend\models\Company;
use frontend\models\Menu;
use frontend\models\Product;
use frontend\models\News;
use frontend\models\ProductCategory;
use frontend\models\NewsCategory;

class BaseController extends Controller
{

    private function doBuildMenu($data,&$res)
    {
      
        foreach ($data as $value) {
            extract($value);
            /**
             * @var $id
             * @var $name
             * @var $module
             * @var $link
             * @var $id_object
             */

            if (strpos($module,'single-page')) {
                $module = 'single-page';
            }

            switch ($module) {
                case 'product':
                    $productCate = ProductCategory::find()->where(['active' => 1, 'parent_id' => 0])->all();
                    $submenu = [];

                    foreach ($productCate as $item) {
                        $item->setTranslate();
                        $productCateSub1 = ProductCategory::find()->where(['active' => 1, 'parent_id' => $item->id])->all();
                        $submenu1 = [];
                        if (!empty($productCateSub1)) {
                            foreach ($productCateSub1 as $item1) {
                                $productCateSub2 = ProductCategory::find()->where(['active' => 1, 'parent_id' => $item1->id])->all();
                                $submenu2 = [];

                                if (!empty($productCateSub2)) {
                                    foreach ($productCateSub2 as $item2) {
                                        $submenu2[] = [
                                            'name' => $item2->name,
                                            'link' => $item2->getUrl()
                                        ];
                                    }
                                }

                                $submenu1[] = [
                                    'name' => $item1->name,
                                    'link' => $item1->getUrl(),
                                    'sub_menu' => $submenu2
                                ];
                            }
                        }

                        $submenu[] = [
                            'name' => $item->name,
                            'link' => $item->getUrl(),
                            'sub_menu' => $submenu1
                        ];
                    }
                    $configPageModel = ConfigPage::find()->where(['type' => ConfigPage::TYPE_PRODUCT])->one();
                    $config =  $configPageModel->setTranslate();
                    $myProduct = new Product();

                    $res[] = [
                        'name' => $config->name,
                        'link' => $myProduct->getUrlAll(),
                        'module' => $module,
                        'sub_menu' => $submenu
                    ];
                    break;
                case 'home':
                    $res[] = [
                        'name' => Yii::$app->view->params['lang']->home,
                        'module' => $module,
                        'link' => Url::base(true) . '/'
                    ];
                    break;
                case 'news':
                    $newsCate = NewsCategory::find()->where(['active' => 1,'parent_id' => 0])->all();
                    $submenu = [];

                    foreach ($newsCate as $item) {
                        #$item->setTranslate();
                        $newsCate1 = NewsCategory::find()->where(['active' => 1,'parent_id' => $item->id])->all();
                        $submenu1 = [];
                        foreach ($newsCate1 as $item1) {
                            $newsCate2 = NewsCategory::find()->where(['active' => 1,'parent_id' => $item1->id])->all();
                            foreach ($newsCate2 as $item2) {
                                $submenu2[] = [
                                    'name' => $item2->name,
                                    'link' => $item2->getUrl(),
                                ];
                            }
                            $submenu1[] = [
                                'name' => $item1->name,
                                'link' => $item1->getUrl(),
                                'sub_menu' => $newsCate2
                            ];
                        }

                        $submenu[] = [
                            'name' => $item->name,
                            'link' => $item->getUrl(),
                            'sub_menu' => $submenu1,
                        ];
                    }
                    $myNews = new News();
                    $config =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_NEWS])->one()->setTranslate();

                    $res[] = [
                        'name' => $config->name,
                        'link' => $myNews->getUrlAll(),
                        'module' => $module,
                        'sub_menu' => $submenu
                    ];
                    break;
                case 'single-page':
                    $idSinglePage = preg_replace('/mn_single_page_/','',$id);
                    $myModel = SinglePage::find()->where(['active' => 1,'id' =>$idSinglePage ])->one();
                    if (!$myModel) {
                        break;
                    }
                    $singlePage = $myModel->setTranslate();

                    if (!empty($singlePage)) {
                        $res[] = [
                            'name' => $singlePage->name,
                            'link' => $singlePage->getUrl(),
                            'module' => $module,
                        ];
                    }
                    break;
                case 'contact':
                    $res[] = [
                        'name' => Yii::$app->view->params['lang']->contact,
                        'link' =>  Url::base(true) . '/lien-he',
                        'module' => $module,
                    ];
                    break;
                case 'news-soi-cau':
                    $res[] = [
                        'name' => 'Soi cầu',
                        'link' =>  Url::base(true) . '/soi-cau',
                        'module' => $module,
                    ];
                    break;
                case 'gallery-image':
                    $myGallery = new GalleryImage();
                    $config =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_GALLERY_IMAGE])->one()->setTranslate();
                    $res[] = [
                        'name' => $config->name,
                        'link' =>  $myGallery->getUrlAll(),
                        'module' => $module,
                    ];
                    break;
                case 'template':
                    $config =  ConfigPage::find()->where(['type' => ConfigPage::TYPE_TEMPLATE])->one()->setTranslate();
                    $res[] = [
                        'name' => $config->name,
                        'link' =>  $config->getUrl(),
                        'module' => $module,
                    ];
                    break;
            }

            if (!empty($value['children'])) {
                $this->doBuildMenu($value['children'],$res[array_key_last($res)]['sub_menu']);
            }
        }
    }

    public function buildMenu ()
    {
        $menu = Menu::find()->where(['id' => 1])->one();
        
        $res = [];
        $data = json_decode($menu->data,true);

        $this->doBuildMenu($data,$res);
        
        return $res;
    }

    public function init()
    {
        parent::init();

        #xu ly ngon ngu
        $session = Yii::$app->session;
        $code_lang = $session->get('language');

        if (empty($code_lang)) {
        $listLanguage = Yii::$app->params['listLanguage'];
            foreach ($listLanguage as $key => $lang) {
                if ($lang['default'] === true) {
                    $session->set('language',$key);
                    $code_lang = $key;
                    break;
                }
            }
        }
        $this->layout = 'main';
        $company = Company::find()->where(['id' => 1])->one();
        $custom = new Custom();

        Yii::$app->view->params['company'] =  $company;
        $dataLang = $custom->getSettingCustomLanguage();
        Yii::$app->view->params['lang'] = (object) $dataLang[$code_lang];
        Yii::$app->view->params['menu'] =  $this->buildMenu();
        $this->view->title = $company->name;
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $company->meta_keyword
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $company->meta_desc
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function getSort()
    {
        return new Sort([
            'attributes' => [
                'id' => [
                    'default' => SORT_DESC,
                ],
            ],
        ]);
    }

    public function setTagMeta($data)
    {
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $data->meta_keyword
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => $data->meta_desc
        ]);
        $this->view->title = $data->name;
    }

}