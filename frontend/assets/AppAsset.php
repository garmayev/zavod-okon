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
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css',
        'https://unpkg.com/aos@2.3.1/dist/aos.css',
        '/css/normalize.css',
        '/css/fonts.css',
        '/css/style.css',
        '/css/magnific-popup.css',
        '/css/jquery.pagepiling.css',
    ];
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js',
        'https://unpkg.com/aos@2.3.1/dist/aos.js',
        '/js/main.js',
        '/js/jquery.magnific-popup.min.js',
        '/js/jquery.pagepiling.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        parent::init();

        \Yii::$app->assetManager->bundles['yii\\bootstrap\\BootstrapAsset'] = [
            'css' => [],
            'js' => []
        ];
    }
}
