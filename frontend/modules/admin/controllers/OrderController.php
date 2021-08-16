<?php


namespace frontend\modules\admin\controllers;


use frontend\modules\shop\models\Order;
use frontend\modules\shop\models\OrderProduct;
use frontend\modules\shop\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Response;

class OrderController extends DefaultController
{
	public function actionIndex() {
		return $this->render("index", [
			"dataProvider" => new ActiveDataProvider([
				"query" => Order::find()->where(["<>", "status", Order::STATUS_COMPLETE])->andWhere(["<>", "status", Order::STATUS_CANCEL])
			])
		]);
	}

	public function actionView($id) {
		$order = Order::findOne($id);
		return $this->render("view", [
			"model" => $order
		]);
	}

	public function actionUpdate($id) {
		$order = Order::findOne($id);
		Yii::$app->cart->clear();
		if ( \Yii::$app->request->isAjax ) {
			\Yii::$app->response->format = Response::FORMAT_JSON;
			if ( $order->load(\Yii::$app->request->post()) && $order->save() ) {
				return ["ok" => true, "model" => $order];
			}
		}
		foreach (\Yii::$app->request->post()["OrderProduct"] as $index => $postOrderProduct) {
			$product = Product::find()->where(["id" => $index])->one();
			Yii::error($postOrderProduct);
			Yii::$app->cart->add($product, intval($postOrderProduct["count"]));
		}
		$order->price = Yii::$app->cart->getTotalCost();
		if ( $order->load(\Yii::$app->request->post()) && $order->save() ) {
			\Yii::$app->session->setFlash("success", "Order successfully saved");
		} else {
			\Yii::$app->session->setFlash("error", "Order save is failed");
		}
		return $this->redirect(["/admin/order/index"]);
	}

	public function actionDelete($id) {
		$order = Order::findOne($id);
		$order->delete();
		$this->redirect("/admin/order/index");
	}
}