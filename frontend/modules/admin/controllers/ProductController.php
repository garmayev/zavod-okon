<?php


namespace frontend\modules\admin\controllers;


use frontend\modules\shop\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class ProductController extends DefaultController
{
	public function actionIndex() {
		return $this->render("index", [
			"dataProvider" => new ActiveDataProvider([
				"query" => Product::find()
			])
		]);
	}

	public function actionCreate() {
		$product = new Product();
		if ( Yii::$app->request->isPost ) {
			$product->file = UploadedFile::getInstance($product, "file");
			if ( $product->upload() && $product->load(Yii::$app->request->post()) && $product->save() ) {
				Yii::$app->session->setFlash("success", "Product is saved");
				return $this->redirect("product/index");
			} else {
				Yii::error(json_encode($product));
				Yii::$app->session->setFlash("error", "Product is not saved");
			}
		}
		return $this->render("create", [
			"model" => $product
		]);
	}

	public function actionUpdate($id) {
		$product = Product::findOne($id);
		if ( Yii::$app->request->isPost ) {
			$product->file = UploadedFile::getInstance($product, "file");
			if ( $product->upload() && $product->load(Yii::$app->request->post()) && $product->save() ) {
				Yii::$app->session->setFlash("success", "Product is saved");
			} else {
				Yii::error(json_encode($product));
				Yii::$app->session->setFlash("error", "Product is not saved");
			}
			return $this->redirect("/admin/product/index");
		}
		return $this->render("create", [
			"model" => $product
		]);
	}

	public function actionDelete($id) {
		$model = Product::findOne($id);
		$model->delete();
		return $this->redirect("/admin/product/index");
	}
}