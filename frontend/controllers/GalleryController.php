<?php


namespace frontend\controllers;


use frontend\models\Image;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;

class GalleryController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render("index", [
            "dataProvider" => new ActiveDataProvider([
                "query" => Image::find()->where(["type" => Image::TYPE_GALLERY])
            ])
        ]);
    }

    public function actionCreate()
    {
        $image = new Image();
        if ( \Yii::$app->request->isPost ) {
            $image->file = UploadedFile::getInstance($image, "file");
            if ( $image->upload() && $image->load(\Yii::$app->request->post()) && $image->save() ) {
                return $this->redirect(["gallery/index"]);
            } else {
                \Yii::error(["status" => "Image record not save", "form" => $image->errors], "application");
                var_dump($image->getErrorSummary(true));
            }
        } else {
            return $this->render("create", [
                "model" => $image
            ]);
        }
    }
}