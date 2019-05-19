<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/auroramenu.css',
        'css/competition.css',
    ];
    public $js = [
//        'js/jquery-ui.js',
//        'js/jquery.cookie.js',
        'js/jquery.auroramenu.js',
        'js/site.js',
    ];
//    public $jsOptions=[
//        'position'=>View::POS_HEAD
//    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
