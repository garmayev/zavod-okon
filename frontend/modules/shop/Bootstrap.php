<?php


namespace frontend\modules\shop;


use Yii;
use yii\base\BootstrapInterface;
use yii\base\Module;
use yii\i18n\PhpMessageSource;

class Bootstrap implements BootstrapInterface
{
    private $moduleName = 'shop';

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function bootstrap($app)
    {
        /** @var Module $module */
        if ($app->hasModule($this->moduleName) && ($module = $app->getModule($this->moduleName)) instanceof Module) {
            $configUrlRule = [
                'prefix' => $module->urlPrefix,
                'rules' => $module->urlRules,
            ];

            if ($module->urlPrefix != $this->moduleName) {
                $configUrlRule['routePrefix'] = $this->moduleName;
            }

            $configUrlRule['class'] = 'yii\web\GroupUrlRule';
            $rule = Yii::createObject($configUrlRule);

            $app->urlManager->addRules([$rule], false);
        }

        if (!isset($app->get('i18n')->translations[$this->moduleName . "*"])) {
            $app->get('i18n')->translations[$this->moduleName . '*'] = [
                'class' => PhpMessageSource::className(),
                'basePath' => __DIR__ . '/messages',
                'sourceLanguage' => 'en-US'
            ];
        }
    }
}