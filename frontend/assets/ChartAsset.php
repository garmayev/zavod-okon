<?php


namespace frontend\assets;


class ChartAsset extends \yii\web\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'chart.js/Chart.min.css',
        // more plugin CSS here
    ];
    public $js = [
        'chart.js/Chart.bundle.min.js'
        // more plugin Js here
    ];

}