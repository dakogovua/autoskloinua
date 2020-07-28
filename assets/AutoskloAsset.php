<?php
/**
 * Created by PhpStorm.
 * User: ggg
 * Date: 18.12.2018
 * Time: 11:21
 */

namespace app\assets;


use yii\web\AssetBundle;

class AutoskloAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/theme.css',

        'css/lightgallery.min.css',
    ];
    public $js = [
        'js/jquery-3.3.1.slim.min.js',
        'js/bootstrap.min.js',

        'js/jquery.mousewheel.min.js',
        'js/lightgallery-all.min.js',

        'js/main.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];
}