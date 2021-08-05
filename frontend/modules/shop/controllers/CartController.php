<?php


namespace frontend\modules\shop\controllers;


use frontend\modules\shop\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii2mod\cart\Cart;

class CartController extends Controller
{
    public function actionIndex()
    {
        if ( Yii::$app->request->isAjax ) {

            return $this->renderAjax('index', [
                'positions' => \Yii::$app->cart->getItems()
            ]);
        }
        return $this->render('index', [
            'positions' => \Yii::$app->cart->getItems()
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
            $cart->plus($product_id, 1);
        }
        return $this->renderAjax('_ajax', [
            'positions' => $cart->getItems(),
        ]);
    }

    public function actionRemove($product_id)
    {
        $cart = Yii::$app->cart;

        $model = Product::findOne($product_id);
        if ( $model ) {
            if ( $cart->getItem($product_id)->getQuantity() > 1 ) {
                $cart->plus($product_id, - 1);
            } else {
                $cart->remove($product_id);
            }
        }
        return $this->renderAjax('_ajax', [
            'positions' => $cart->getItems(),
        ]);
    }

    public function actionRemoveProduct($product_id)
    {
        $cart = Yii::$app->cart;

        $model = Product::findOne($product_id);
        if ( $model ) {
            $cart->remove($model);
        }
        return $this->renderAjax('index', [
            'positions' => \Yii::$app->cart->getItems()
        ]);
    }

    public function actionSetCount($product_id, $count) {
        $cart = Yii::$app->cart;
        $model = Product::findOne($product_id);
        if ( $model ) {
            $cart->remove($product_id);
            if ( $count > 0 ) {
                $cart->add($model, $count);
            }
        }
        return $this->renderAjax('index', [
            'positions' => \Yii::$app->cart->getItems()
        ]);
    }

    public function actionRemoveAll()
    {
        $cart = Yii::$app->cart;

        $cart->clear();
        $this->redirect(["default/index"]);
    }
}