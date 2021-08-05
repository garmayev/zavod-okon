<?php
/**
 * @var $client Client
 * @var $model Order
 */

use frontend\modules\shop\models\Client;
use frontend\modules\shop\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;

$i = 0;

echo Html::beginTag("section", ["style" => "margin-top: 250px;", "class" => ["advantages"]]);

?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Client info</h4>
    </div>
    <div class="panel-body">
        <?= Html::tag("p", Html::tag("bold", "Fullname: ").$client->fullname()) ?>
        <?= Html::tag("p", Html::tag("bold", "Address: ").$client->address) ?>
        <?= Html::tag("p", Html::tag("bold", "Phone: ").$client->phone) ?>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Price</th>
            <th>Count</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach ( Yii::$app->cart->getItems() as $item ) {
    $product = $item->getProduct();
    echo Html::beginTag("tr");
    echo Html::tag("td", ++$i);
    echo Html::tag("td", $product->title);
    echo Html::tag("td", $product->price);
    echo Html::tag("td", $item->getQuantity());
    echo Html::endTag("tr");
}
?>
    </tbody>
</table>
<?= Html::tag("p", "Total: ".Yii::$app->cart->getTotalCost()) ?>
<?= Html::a('submit', Url::to(['order/create']), ['class' => 'btn', 'data-method' => 'POST']) ?>
<?= Html::endTag("section"); ?>