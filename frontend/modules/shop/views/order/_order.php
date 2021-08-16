<?php

use frontend\modules\shop\models\Order;
use pantera\yii2\pay\sberbank\models\Invoice;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var Order $model
 */

echo "<br><br>";
?>
<h3>Order #<?= $model->id ?></h3>

<table class="table table-striped">
    <thead>
            <td>Product name</td>
            <td></td>
            <td>Count</td>
    </thead>
    <tbody>
    <?php
        foreach ($model->orderProducts as $op) {
            $product = \frontend\modules\shop\models\Product::findOne($op->product_id);
            echo "<tr><td>{$product->title}</td><td>".Html::img($product->thumb, ["width" => "200px"])."</td><td>{$op->count}</td></tr>";
        }
    ?>
    </tbody>
</table>
<b>Total: <?= $model->price ?></b>
<?php
    $invoice = Invoice::find()->where(["user_id" => Yii::$app->user->id])->andWhere(["order_id" => $model->id])->one();
//    var_dump($invoice); die;
?>
<a href="<?= Url::to(['/sberbank/default/create', 'id' => $invoice->id]); ?>">Pay</a>