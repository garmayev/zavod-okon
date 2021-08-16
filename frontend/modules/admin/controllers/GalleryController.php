<?php


namespace frontend\modules\admin\controllers;


use frontend\models\Image;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class GalleryController extends DefaultController
{
    public function actionIndex(): string
    {
        return $this->render("index", [
            "dataProvider" => new ActiveDataProvider([
                "query" => Image::find()->where(["type" => Image::TYPE_GALLERY])->orderBy(["favourite" => SORT_DESC])
            ])
        ]);
    }

    public function actionView($id): string
    {
        $image = Image::findOne($id);
        return $this->render("view", [
            "model" => $image
        ]);
    }

    public function actionCreate() {
        $model = new Image();
        if ( \Yii::$app->request->isPost ) {
            $model->file = UploadedFile::getInstance($model, "file");
            if ( $model->upload() && $model->load(\Yii::$app->request->post()) && $model->save() ) {
                return $this->redirect("/admin/gallery/index");
            }
        }
        return $this->render("create", [
            "model" => $model
        ]);
    }

    public function actionUpdate($id) {
        $model = Image::findOne($id);
        if ( \Yii::$app->request->isPost ) {
            $model->file = UploadedFile::getInstance($model, "file");
            if ( $model->file ) {
                $model->upload();
            }
            if ( $model->load(\Yii::$app->request->post()) && $model->save() ) {
                return $this->redirect("/admin/gallery/index");
            }
        }
        return $this->render("update", [
            "model" => $model
        ]);
    }

    public function actionDelete($id) {
        $model = Image::findOne($id);
        $model->delete();
        return $this->redirect(["/admin/gallery/index"]);
    }
}