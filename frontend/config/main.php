<?php

use frontend\modules\shop\models\Order;
use pantera\yii2\pay\sberbank\models\Invoice;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'Завод окон',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'sberbank' => [
            'class' => 'pantera\yii2\pay\sberbank\Module',
            'components' => [
                'sberbank' => [
                    'class' => pantera\yii2\pay\sberbank\components\Sberbank::class,

                    // время жизни инвойса в секундах (по умолчанию 20 минут - см. документацию Сбербанка)
                    // в этом примере мы ставим время 1 неделю, т.е. в течение этого времени покупатель может
                    // произвести оплату по выданной ему ссылке
                    'sessionTimeoutSecs' => 60 * 60 * 24 * 7,

                    // логин api мерчанта
                    'login' => 'ваш логин',

                    // пароль api мерчанта
                    'password' => 'ваш пароль',

                    // использовать тестовый режим (по умолчанию - нет)
                    'testServer' => false,

                    // использовать двухстадийную оплату (по умолчанию - нет)
                    'registerPreAuth' => false
                ],
            ],

            // страница вашего сайта с информацией об успешной оплате
            'successUrl' => '/paySuccess',

            // страница вашего сайта с информацией о НЕуспешной оплате
            'failUrl' => '/payFail',

            // обработчик, вызываемый по факту успешной оплаты
            'successCallback' => function($invoice) {
                // какая-то ваша логика, например
                $order = Order::findOne($invoice->order_id);
                $client = $order->getClient();
                Yii::$app->telegram->send("Заказ #{$order->id} оплачен");
                // .. и т.д.
            },

            // обработчик, вызываемый по факту НЕуспешной оплаты
            'failCallback' => function($invoice) {
                // какая-то ваша логика, например
                $order = Order::findOne($invoice->order_id);
                $client = $order->getClient();
                Yii::$app->telegram->send("Заказ #{$order->id} не оплачен\nПроизошла ошибка");
                // .. и т.д.
            },
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'modelMap' => [
                'Profile' => 'frontend\models\Profile'
            ],
            'admins' => ['garmayev'],
            'controllerMap' => [
                'registration' => [
                    'class' => \dektrium\user\controllers\RegistrationController::className(),
                    'on ' . \dektrium\user\controllers\RegistrationController::EVENT_AFTER_REGISTER => function ($e) {
                        $auth = Yii::$app->authManager;
                        $role = $auth->getRole('user');
                        $user = \dektrium\user\models\User::findOne(["username" => $e->form->username]);
                        $auth->assign($role, $user->id);
                    }
                ],
                'security' => [
                    'class' => \dektrium\user\controllers\SecurityController::className(),
                    'on ' . \dektrium\user\controllers\SecurityController::EVENT_AFTER_LOGIN => function ($e) {
                        $referrer = Yii::$app->session->get("referrer");
                        if ($referrer) {
                            Yii::$app->response->redirect($referrer)->send();
                        }
                    }
                ]
            ]
        ],
        'dealers' => [
            'class' => 'frontend\modules\dealers\Dealers'
        ],
        'shop' => [
            'class' => 'frontend\modules\shop\Shop'
        ],
        'admin' => [
            'class' => 'frontend\modules\admin\Module',
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
    ],
    'components' => [
        'telegram' => [
            'class' => 'aki\telegram\Telegram',
            'botToken' => '1848578941:AAEJYT_0tdmemgIS7J3X9xkr2WlD1_eGMaE',
        ],
        'cart' => [
            'class' => 'devanych\cart\Cart',
            'storageClass' => 'devanych\cart\storage\DbSessionStorage',
            'calculatorClass' => 'devanych\cart\calculators\SimpleCalculator',
            'params' => [
                'key' => 'cart',
                'expire' => 604800,
                'productClass' => 'frontend\modules\shop\models\Product',
                'productFieldId' => 'id',
                'productFieldPrice' => 'price',
            ],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => '.',
            'thousandSeparator' => ' ',
            'currencyCode' => 'RUB',
            'locale' => 'RU',
            'timeFormat' => 'php:H:i:s',
            'timeZone' => 'Asia/Irkutsk',
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user',
//                    '@frontend/modules/admin/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                '/<action:\w+>' => 'site/<action>',
                '/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
];
