<?php

namespace frontend\modules\shop;

/**
 * shop module definition class
 */
class Shop extends \yii\base\Module
{
    /**
     * @var string The prefix for user module URL.
     *
     * @See [[GroupUrlRule::prefix]]
     */
    public $urlPrefix = 'user';

    /** @var array The rules to be used in URL management. */
    public $urlRules = [
        ''                              => 'default/index',
        '<action:\w+>'                  => 'default/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
    ];

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\shop\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
