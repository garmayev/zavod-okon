<?php


namespace frontend\modules\admin\controllers;


use frontend\models\Product;
use Yii;
use yii\web\UploadedFile;

class ProductionController extends DefaultController
{
	public function actionIndex()
	{

	}

	public function actionCreate()
	{
		$production = new Product();
		if (Yii::$app->request->isPost) {
			$production->file = UploadedFile::getInstance($production, "file");
			if ($production->upload() && $production->load(Yii::$app->request->post()) && $production->save()) {
				Yii::$app->session->setFlash("success", Yii::t("app", "Production is saved"));
				return $this->redirect(["/admin/category/index"]);
			} else {
				Yii::$app->session->setFlash("error", Yii::t("app", "Production is not saved"));
			}
		}
		return $this->render("create", [
			"model" => $production
		]);
	}

	public function actionUpdate($id)
	{
		$production = Product::findOne($id);
		if (Yii::$app->request->isPost) {
			$production->file = UploadedFile::getInstance($production, "file");
			if ($production->upload() && $production->load(Yii::$app->request->post()) && $production->save()) {
				Yii::$app->session->setFlash("success", Yii::t("app", "Production is saved"));
				return $this->redirect(["/admin/category/index"]);
			} else {
				Yii::$app->session->setFlash("error", Yii::t("app", "Production is not saved"));
			}
		}
		return $this->render("create", [
			"model" => $production
		]);
	}

	public function actionView()
	{

	}

	public function actionDelete($id)
	{
		$model = Product::findOne($id);
		$model->delete();
		return $this->redirect("/admin/category/index");
	}
}