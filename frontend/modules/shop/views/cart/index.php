<?php
/**
 * @var $positions
 */

use frontend\modules\shop\models\Client;
use frontend\modules\shop\models\Order;
use yii\helpers\Html;
use yii\widgets\Pjax;

//var_dump(Yii::$app->cart->getItems(\yii2mod\cart\Cart::ITEM_PRODUCT));
//die;
$client = Client::find()->where(["user_id" => Yii::$app->user->id])->one();
$orders = ($client) ? Order::find()->where(["client_id" => $client->id])->asArray()->all() : [];

echo Html::beginTag("section", ["style" => "margin-top: 250px;", "class" => ["advantages"]]);
echo Html::beginTag("div", ["class" => "container"]);
echo Html::a("Orders " . count($orders), ["/shop/order/index"]);
echo $this->render("_ajax", [
    "positions" => $positions
]);
echo Html::a(Yii::t("app", ""));

echo Html::a("Remove all", ["cart/remove-all"]);

echo Html::tag("p", Html::a("Оформить закза", ["order/preview"], ["class" => "btn btn-primary"]));
echo Html::endTag("div");
echo Html::endTag("section");