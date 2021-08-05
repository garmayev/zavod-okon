<?php

namespace frontend\modules\admin;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    public $layout = "main";

    public $defaultController = "main";

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\admin\controllers';
}
