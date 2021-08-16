<?php

namespace frontend\modules\admin\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => Yii::$app->user->can("admin") || Yii::$app->user->can("manager") || Yii::$app->user->can("master"),
                        'denyCallback' => function () {
                            if (Yii::$app->user->isGuest) {
                                return $this->redirect("/user/security/login");
                            }
                            return $this->redirect("/shop/order/index");
                        }
                    ]
                ]
            ]
        ];
    }

    public function beforeAction($action)
    {
        $user = Yii::$app->user;
        if ( $user->isGuest && ($user->can("manager") || $user->can("admin") || $user->can("master")) ) {
            Yii::$app->user->returnUrl = "/admin/main/index";
            return $this->redirect(["/user/security/login"]);
        }
        return parent::beforeAction($action);
    }
}
