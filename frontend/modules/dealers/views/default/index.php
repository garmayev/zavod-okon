<?php
/**
 * @var Dealer $model
 * @var Array $orders
 */

use frontend\modules\dealers\models\Dealer;
use frontend\modules\dealers\models\Itokna;
use yii\helpers\Html;


$this->registerCss("
.about_inner {
    top: 0; 
    margin-bottom: 20px;
}
.row {
    display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	justify-content: flex-start;
	align-items: stretch;
	align-content: stretch;
}
.item {
    display: inline-block; 
    width: 45%; 
    padding: 10px; 
    margin: 1%;
    border: 1px solid #ccc; 
    box-shadow: 5px 0px 3px #ccc;
    transition: box-shadow .3s;
    color: #000;
}
.item table {
    width: 100%;
}
.item:hover {
    box-shadow: 10px 5px 5px #aaa;
}
tr:nth-child(even) {
    background: #ddd;
}
td:nth-child(even) {
    padding-left: 10px;
}
");

echo Html::beginTag("section", ["style" => "padding-top: 250px; padding-bottom: 30px;"]);
echo Html::beginTag("div", ["class" => "container"]);

if ( !is_null($model) ) {
	echo Html::beginTag("div", ["class" => "row"]);
	foreach ($orders["orders"] as $order) {
	    if ( $order["status"] !== 7 ) {
		    echo "<a href='".\yii\helpers\Url::to(["/dealers/default/view", "code" => $order["code"]])."' class='item'>";
		    echo Html::beginTag("table", ["border" => 0, "cellspacing" => 0]);
		    echo Html::beginTag("tr");
		    echo Html::tag("td", "Имя клиента");
		    echo Html::tag("td", $order["client_name"]);
		    echo Html::endTag("tr");

		    echo Html::beginTag("tr", ["class" => "even"]);
		    echo Html::tag("td", "Дата создания документа");
		    echo Html::tag("td", $order["docdate"]);
		    echo Html::endTag("tr");

		    echo Html::beginTag("tr");
		    echo Html::tag("td", "Сумма к оплате");
		    echo Html::tag("td", $order["syma"]);
		    echo Html::endTag("tr");

		    echo Html::beginTag("tr", ["class" => "even"]);
		    echo Html::tag("td", "Сумма долга");
		    echo Html::tag("td", $order["syma_dolg"]);
		    echo Html::endTag("tr");

		    echo Html::endTag("table");
		    echo "</a>";
        }
    }
	echo Html::endTag("div");
} else {
?>
<div class="dealers-default-index">
    <h3>Please, input your Dealer info</h3>
    <?= $this->render("/dealer/create", [
            "model" => new Dealer()
    ]) ?>
</div>
<?php
}

echo Html::endTag("div");
echo Html::endTag("section");