<?php


namespace frontend\modules\dealers\controllers;


use frontend\modules\dealers\models\Dealer;
use Yii;
use yii\base\BaseObject;

class DealerController extends \yii\web\Controller
{
	public function actionIndex()
    {
        return $this->render("index");
    }

    public function actionCreate()
    {
        $model = new Dealer();
        if ( Yii::$app->request->isPost ) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(["default/index"]);
            }
        } else {
            return $this->render("create", [
                "model" => $model
            ]);
        }
        var_dump($model->errors);
    }
}