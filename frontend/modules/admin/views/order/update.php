<?php

use frontend\modules\shop\models\Order;
use frontend\modules\shop\models\Product;
use yii\helpers\Html;

/**
 * @var $model Order
 */

echo Html::tag("h3", "Заказ #$model->id");
?>
<table class="table table-striped">
	<thead>
	<td>Продукт</td>
	<td>Количество</td>
	<td>Цена</td>
	</thead>
	<tbody>
	<?php
	foreach ($model->orderProducts as $orderProduct) {
		$product = Product::findOne($orderProduct->product);
		echo Html::beginTag("tr", ["data-key" => $product->id]);
		echo Html::tag("td", $product->title);
		echo Html::tag("td", $orderProduct->count);
		echo Html::tag("td", $product->price);
		echo Html::endTag("tr");
	}
	?>
	</tbody>
</table>
<p>Итого: <?= $model->price ?></p>