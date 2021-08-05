<?php

use yii\helpers\Html;
use yii\web\View;



/**
 * @var $this View
 * @var $order Array
 */
?>
</a>
<?php
echo Html::beginTag("div", ["style" => "padding: 250px 0 30px"]);
echo Html::tag("p", "Код заказа: {$order["order"]["code"]}");
echo Html::tag("p", "Дата создания: {$order["order"]["docdate"]}");
echo Html::tag("p", "Номер документа: {$order["order"]["ordno"]}");
echo Html::tag("p", "Номер отдела: {$order["order"]["depno"]}");
echo Html::tag("p", "Готовность: {$order["order"]["isready"]}");
echo Html::tag("p", "Стоимость: {$order["order"]["syma"]}");
echo Html::tag("p", "Скидка: {$order["order"]["discount"]}");
echo Html::tag("p", "Итого к оплате: {$order["order"]["total"]}");
echo Html::tag("p", "status_name: {$order["order"]["status_name"]}");
echo Html::tag("p", "id_doc: {$order["order"]["id_doc"]}");
echo Html::tag("p", "Статус: {$order["order"]["status"]}");
echo Html::tag("p", "Комментарий: {$order["order"]["comment"]}");
echo Html::endTag("div");