<?php
/**
 * @var Dealer $model
 * @var Array $orders
 */

use frontend\modules\dealers\models\Dealer;
use frontend\modules\dealers\models\Itokna;
use yii\helpers\Html;


$this->registerCss(".about_inner {top: 0; margin-bottom: 20px;}");

echo Html::beginTag("section", ["style" => "padding-top: 250px;"]);
echo Html::beginTag("div", ["class" => "container"]);

if ( !is_null($model) ) {
	echo Html::beginTag("div", ["class" => "row"]);
	foreach ($orders["orders"] as $order) {
        echo Html::beginTag("div", ["style" => "display: inline-block; width: 50%;"]);
        echo Html::tag("p", "Имя клиента: ".$order["client_name"]);
		echo Html::tag("p", "Номер телефона клиента: ".$order["client_name"]);
		echo Html::tag("p", "Адрес клиента: ".$order["client_address"]);
        echo Html::tag("p", "Дата создания документа: ".$order["docdate"]);
		echo Html::tag("p", "Сумма к оплате: ".Html::tag("span", $order["syma"])." Сумма долга: ".Html::tag("span", $order["syma_dolg"]));
		echo Html::a("Смотреть подробнее ...", ["/dealers/default/view", "code" => $order["code"]]);
        echo Html::endTag("div");
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