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
        // 'libs/swipper/swiper-bundle.min.css',
        // 'libs/fontawesome5/css/all.min.css',
        // 'libs/fancybox-master/jquery.fancybox.min.css',
        // 'libs/animate4.1/animate.min.css',
        'libs/mmenu/mmenu.css',
        'libs/mmenu/demo.css',
        'css/style-client.css',
        'css/style.css?v=1' 
    ];
    public $js = [
//        'js/jquery.js',
        // 'js/slimScroll/jquery.slimscroll.min.js',
        // 'libs/swipper/swiper-bundle.min.js',
        'js/menu/script.js',
        //'libs/fancybox-master/jquery.fancybox.js',
        'libs/mmenu/mmenu.js',
        'js/main.js?v=1',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
