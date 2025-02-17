<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/menu/styles.css',
        'libs/swipper/swiper-bundle.min.css',
        'libs/fontawesome5/css/all.min.css',
        'https://fonts.googleapis.com/css?family=Montserrat%3A400%2C700%7CRoboto%3A100%2C300%2C400%2C700&#038;ver=5.6.2',
        'https://fonts.googleapis.com/css?family=Roboto:400,500,600,700',
        'https://fonts.googleapis.com/css?family=Roboto+Condensed:700%2C300%7CRoboto:400%2C700%2C100%2C500',
        'libs/fancybox-master/jquery.fancybox.min.css',
        'libs/animate4.1/animate.min.css',
        'css/style.css'
    ];
    public $js = [
//        'js/jquery.js',
        'js/slimScroll/jquery.slimscroll.min.js',
        'libs/swipper/swiper-bundle.min.js',
        'js/menu/script.js',
        'libs/fancybox-master/jquery.fancybox.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
