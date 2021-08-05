<?php

namespace frontend\modules\dealers\controllers;

use frontend\modules\dealers\models\Dealer;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `dealers` module
 */
class DefaultController extends Controller
{
	protected $dealer;

	public function behaviors(): array
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => Yii::$app->user->can("admin") || Yii::$app->user->can("manager") || Yii::$app->user->can("master"),
						'denyCallback' => function () {
							if (Yii::$app->user->isGuest) {
								return $this->redirect("/user/security/login");
							}
							return $this->redirect("/dealer/default/index");
						}
					]
				],
			]
		];
	}

	/**
	 * Renders the index view for the module
	 */
	public function actionIndex()
	{
		if (\Yii::$app->user->isGuest) {
			return $this->redirect(["/user/security/login"]);
		}
		$this->dealer = Dealer::find()->where(["user_id" => Yii::$app->user->id])->one();
		$orders = $this->dealer->getOrders();
		return $this->render('index', [
			'model' => $this->dealer,
			"orders" => $orders,
		]);
//		if () {
//		}
	}

	public function actionView($code): string
	{
		$this->dealer = Dealer::find()->where(["user_id" => Yii::$app->user->id])->one();
		return $this->render("view", [
			"order" => $this->dealer->getOrder($code)
		]);
	}
}
