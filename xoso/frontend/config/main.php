<?php
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

$params = array_merge(
    require __DIR__ . '/../../backend/config/params.php',
    require __DIR__ . '/../../backend/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','gii'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'jsOptions' => [ 'position' => \yii\web\View::POS_HEAD ],
                ],
            ]
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'leanh.stu93@gmail.com',
                'password' => 'ijzbdkdgtxcibnxo',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'cart' => [
            'class' => 'devanych\cart\Cart',
            'storageClass' => 'devanych\cart\storage\SessionStorage',
            'calculatorClass' => 'devanych\cart\calculators\SimpleCalculator',
            'params' => [
                'key' => 'cart',
                'expire' => 604800,
                'productClass' => 'frontend\models\Product',
                'productFieldId' => 'id',
                'productFieldPrice' => 'price',
            ],
        ],
        'favorite' => [
            'class' => 'devanych\cart\Cart',
            'storageClass' => 'devanych\cart\storage\DbSessionStorage',
            'calculatorClass' => 'devanych\cart\calculators\SimpleCalculator',
            'params' => [
                'key' => 'favorite',
                'expire' => 604800,
                'productClass' => 'frontend\models\Product',
                'productFieldId' => 'id',
                'productFieldPrice' => 'price',
            ],
        ],
        'formatter' => [
            'thousandSeparator' => ',',
            'currencyCode' => 'VND',
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => $baseUrl,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
           // 'baseUrl' => $baseUrl,
            //'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,

            //'suffix' => '.html',
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(
                '<alias>' => 'site/rewrite-url',
//                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller>/<action>/<param>' => '<controller>/<action>',
//                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ],

    ],
    'params' => $params,
    'modules' => [
       'gii' => [
            'class' => 'yii\gii\Module',          
            'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '*'] // adjust this to your needs
        ],
        // ...
    ],
];
