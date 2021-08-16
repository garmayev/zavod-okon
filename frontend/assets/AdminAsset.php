<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AdminAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $css = [
    	"/css/admin.css",
    ];
    public $depends = [
        'dmstr\adminlte\web\AdminLteAsset',
    ];
}
