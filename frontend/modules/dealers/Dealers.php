<?php

namespace frontend\modules\dealers;

/**
 * dealers module definition class
 */
class Dealers extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\dealers\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        if ( !isset(\Yii::$app->bootstrap["frontend\modules\dealers\Bootstrap"]) ) {
            \Yii::$app->bootstrap[] = "frontend\modules\dealers\Bootstrap";
        }

        // custom initialization code goes here
    }
}
