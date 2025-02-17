<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        #libs
        'libs/sumo-select/sumoselect.min.css',
        'libs/multi-select/multi-select.min.css',
        'libs/bootstrap-select/bootstrap-select.min.css',
        'libs/bootstrap/bootstrap.min.css',
        'libs/bootstrap/bootstrap-extend.min.css',
        'libs/skintools/skintools.min.css',
        'libs/animsition/animsition.min.css',
        'libs/asscrollable/asScrollable.min.css',
        'libs/switchery/switchery.min.css',
        'libs/ntro-js/introjs.min.css',
        'libs/slidepanel/slidePanel.min.css',
        'libs/flag-icon-css/flag-icon.min.css',
        'libs/nprogress/nprogress.min.css',
        'libs/nestable/nestable.min.css',
        'libs/animation/animation.min.css',
        'libs/web-icons/web-icons.min.css',
        'libs/brand-icons/brand-icons.min.css',
        'libs/font-google/css.css',
        'libs/font-awesome/font-awesome.min.css?v4.0.2',
        'libs/jquery.fancybox-2.1.7/jquery.fancybox.css',
        'libs/bootstrap-tokenfield/bootstrap-tokenfield.min.css',
        'libs/chartist/chartist.min.css',
        # End libs
        # custom
        'css/site.min.css',
        'css/main.css'
        #end custom
    ];
    public $js = [
        #'libs/requirejs/require.js',
        'libs/babel-external-helpers/babel-external-helpers.js',
        'libs/skintools/skintools.min.js',
        'libs/breakpoints/breakpoints.min.js',
        'libs/popper-js/popper.min.js',
        'libs/bootstrap/bootstrap.min.js',
        'libs/bootstrap/bootstrap-anchor.min.js',
        'libs/animsition/animsition.min.js',
        'libs/mousewheel/jquery.mousewheel.js',
        'libs/asscrollable/jquery-asScrollable.min.js',
        'libs/ashoverscroll/jquery-asHoverScroll.min.js',
        'libs/switchery/switchery.min.js',
        'libs/intro-js/intro.min.js',
        'libs/screenfull/screenfull.js',
        'libs/slidepanel/jquery-slidePanel.min.js',
        'libs/jquery-appear/jquery.appear.js',
        'libs/nprogress/nprogress.js',
        'libs/Component/Component.min.js',
        'libs/sortable/Sortable.min.js',
        'libs/sortable/jquery-sortable.js',
        'libs/nestable/jquery.nestable.min.js',
        'libs/global/Plugin.min.js',
        'libs/global/Base.min.js',
        'libs/global/Config.min.js',
        'libs/Section/Menubar.min.js',
        'libs/Section/GridMenu.min.js',
        'libs/Section/Sidebar.min.js',
        'libs/Section/PageAside.min.js',
        'libs/Plugin/menu.min.js',
        'libs/global/colors.min.js',
        'libs/config/tour.min.js',
        'libs/sumo-select/jquery.sumoselect.js',
        'libs/multi-select/multi-select.min.js',
        'libs/bootstrap-select/bootstrap-select.min.js',
        'js/Site.min.js',
        'libs/global/asscrollable.min.js',
        'libs/global/jquery-asScrollbar.min.js',
        'libs/global/slidepanel.min.js',
        'libs/global/switchery.min.js',
        'libs/global/jquery-appear.min.js',
        'libs/global/nprogress.min.js',
        'libs/global/animation.min.js',
        #'libs/chartist/chartist.min.js',
        'libs/chartjs/chartjs.js',
        'libs/bootstrap-tokenfield/bootstrap-tokenfield.min.js',
//        'libs/nestable/nestable.min.js',
        'js/panel.min.js',
        'js/jquery.multi-select.js',
        'js/panel-actions.min.js',
        'libs/jquery.fancybox-2.1.7/jquery.fancybox.js',
        'ckeditor4/ckeditor.js',
        '/ckfinder/ckfinder.js',
        'js/base.js',
        'js/main.js',
        'https://unpkg.com/react@17/umd/react.development.js',
        'https://unpkg.com/react-dom@17/umd/react-dom.development.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
