<?php

use frontend\modules\shop\models\Order;
use frontend\modules\shop\models\Product;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $model Order
 * @var $this View
 */

echo Html::beginForm(["/admin/order/update", "id" => $model->id], "POST");
echo Html::tag("h3", "Заказ #$model->id");
echo Html::beginTag("h4");
echo Html::tag("span", "Статус: ");
$items = [
        "Не оплачен", "Предоплата", "Оплачен", "Выполнен", "Отменен"
];
echo Html::beginTag("div", ["class" => "form-group"]);
echo Html::activeDropDownList($model, "status", $items, ["class" => "form-control"]);
echo Html::endTag("div");
//switch ($model->status) {
//    case 0 : echo Html::tag("h4", "Статус: Не оплачен"); break;
//	case 1 : echo Html::tag("h4", "Статус: Предоплата"); break;
//	case 2 : echo Html::tag("h4", "Статус: Оплачен"); break;
//}
echo Html::endTag("h4");
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
			$countGroup = "<div class='form-group'>".
                Html::tag("button", "", ["class" => ["glyphicon", "glyphicon-chevron-left", "form-control"]]).
                Html::input("text", "OrderProduct[{$product->id}][count]", $orderProduct->count, ["class" => "form-control"]).
			    Html::tag("button", "",  ["class" => ["glyphicon", "glyphicon-chevron-right", "form-control"]]).
                "</div>";
			echo Html::beginTag("tr", ["data-key" => $product->id]);
			echo Html::tag("td", Html::img($product->thumb, ["height" => 80]));
			echo Html::tag("td", $product->title);
			echo Html::tag("td", $countGroup, ["data-price" => $product->price]);
			echo Html::tag("td", $product->price * $orderProduct->count);
			echo Html::endTag("tr");
		}
	?>
	</tbody>
</table>
    <p>Итого: <span class="form-group" style="display: inline-block"><?= Html::activeTextInput($model, 'price', ["class" => ["form-control"], "disabled" => true]) ?></span></p>

<?php
echo Html::activeHiddenInput($model, "client_id", ["value" => $model->client_id]);
echo Html::submitButton(Yii::t("app", "Save"), ["class" => ["btn", "btn-success"]]);
echo Html::a(Yii::t("app", "Cancel"), Yii::$app->request->referrer, ["class" => ["btn", "btn-danger"]]);
echo Html::endForm();

$this->registerCss("
.glyphicon.glyphicon-chevron-left.form-control, .glyphicon.glyphicon-chevron-right.form-control {
    width: 6%;
    display: inline-block;
    margin-top: 2px;
}
input.form-control {
    width: 50%;
    display: inline-block;
}
");

$this->registerJs("
$(() => {
    function calc(outer) {
        let sum = 0;
        console.log(outer);
        $('tr').each((index, element) => {
            let count = $(element).find('input').val();
            let price = $(element).find('[data-price]').attr('data-price');
            if (count && price) {
                let cost = parseInt(count) * parseInt(price);
                sum += cost;
                $(element).find('td:last-child').text(cost);
                outer.val(sum);
            }
        });
    }
    
    $('.glyphicon.glyphicon-chevron-left.form-control, .glyphicon.glyphicon-chevron-right.form-control').on('click', (event) => {
        event.preventDefault();
        let input = $(event.currentTarget).parent().find('input');
        if ( $(event.currentTarget).hasClass('glyphicon-chevron-left') ) {
            input.val(parseInt(input.val()) - 1);
        } else {
            input.val(parseInt(input.val()) + 1);
        }
        calc($('#order-price'));
    })
})
", View::POS_LOAD);