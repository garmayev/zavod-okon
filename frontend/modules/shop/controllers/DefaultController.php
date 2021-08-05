<?php

namespace frontend\modules\shop\controllers;

use frontend\modules\shop\models\Product;
use Yii;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Default controller for the `shop` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(): string
    {
        if ( Yii::$app->request->isAjax ) {
            return $this->renderAjax('_ajax', [
                'productProvider' => new ActiveDataProvider([
                    'query' => Product::find()
                ])
            ]);
        }
        return $this->render('index', [
            'productProvider' => new ActiveDataProvider([
                'query' => Product::find()
            ])
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionAdd($product_id)
    {
        $cart = Yii::$app->cart;

        $model = Product::findOne($product_id);
        if ( $model ) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $cart->add($model, 1);
            return $cart->getItems();
//            return $this->renderAjax('index', [
//                'productProvider' => new ActiveDataProvider([
//                    'query' => Product::find()
//                ]),
//            ]);
        }
        throw new NotFoundHttpException();
    }
}
