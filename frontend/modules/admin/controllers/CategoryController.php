<?php


namespace frontend\modules\admin\controllers;


use frontend\models\Category;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class CategoryController extends DefaultController
{
	public function actionIndex() {
		return $this->render("index", [
			"dataProvider" => new ActiveDataProvider([
				"query" => Category::find()
			])
		]);
	}

	public function actionCreate() {
		$category = new Category();
		if ( \Yii::$app->request->isPost ) {
			$category->file = UploadedFile::getInstance($category, "file");
			if ( $category->upload() && $category->load(Yii::$app->request->post()) && $category->save() ) {
				Yii::$app->session->setFlash("success", Yii::t("app", "Category is saved"));
				return $this->redirect(["/admin/category/index"]);
			} else {
				Yii::$app->session->setFlash("error", Yii::t("app", "Category is not saved"));
			}
		}
		return $this->render("create", [
			"model" => $category
		]);
	}

	public function actionUpdate($id) {
		$category = Category::findOne($id);
		if ( \Yii::$app->request->isPost ) {
			if ( $category->load(Yii::$app->request->post()) && $category->save() ) {
				Yii::$app->session->setFlash("success", Yii::t("app", "Category is saved"));
				return $this->redirect(["/admin/category/index"]);
			} else {
				Yii::$app->session->setFlash("error", Yii::t("app", "Category is not saved"));
			}
		}
		return $this->render("create", [
			"model" => $category
		]);
	}

	public function actionView() {

	}

	public function actionDelete($id) {
		$category = Category::findOne($id);
		if ( $category->delete() ) {
			Yii::$app->session->setFlash("success", Yii::t("app", "Category is successfully deleted"));
		} else {
			Yii::$app->session->setFlash("error", Yii::t("app", "Category delete is failed"));
		}
		return $this->redirect(["/admin/category/index"]);
	}
}