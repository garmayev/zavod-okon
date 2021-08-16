<?php

use yii\helpers\Html;
use yii\web\View;



/**
 * @var $this View
 * @var $order Array
 */
?>
<style>
    table {
        border: 1px solid #ccc;
        box-shadow: 10px 5px 5px #aaa;
    }
    table tr:nth-child(even) {
        background: #eee;
    }
    table tr td {
        padding: 5px 5px;
    }
</style>
<div class="container" style="padding: 250px 0 30px;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
            <td width="30%">Имя клиента</td>
            <td width="70%"><?= $order["order"]["client"]["name"] ?></td>
        </tr>
        <tr>
            <td>Адрес клиента</td>
            <td><?= $order["order"]["client"]["address"] ?></td>
        </tr>
        <tr>
            <td>Номер телефона</td>
            <td><?= $order["order"]["client"]["phone"] ?></td>
        </tr>
        <tr>
            <td>Код заказа</td>
            <td><?= $order["order"]["code"] ?></td>
        </tr>
        <tr>
            <td>Дата создания</td>
            <td><?= $order["order"]["docdate"] ?></td>
        </tr>
        <tr>
            <td>Номер документа</td>
            <td><?= $order["order"]["ordno"] ?></td>
        </tr>
        <tr>
            <td>Номер отдела</td>
            <td><?= $order["order"]["depno"] ?></td>
        </tr>
        <tr>
            <td>Готовность</td>
            <td><?= $order["order"]["isready"] ?></td>
        </tr>
        <tr>
            <td>Стоимость</td>
            <td><?= $order["order"]["syma"] ?></td>
        </tr>
        <tr>
            <td>Скидка</td>
            <td><?= $order["order"]["discount"] ?></td>
        </tr>
        <tr>
            <td>Итого к оплате</td>
            <td><?= $order["order"]["total"] ?></td>
        </tr>
        <tr>
            <td>status_name</td>
            <td><?= $order["order"]["status_name"] ?></td>
        </tr>
        <tr>
            <td>id_doc</td>
            <td><?= $order["order"]["id_doc"] ?></td>
        </tr>
        <tr>
            <td>Статус</td>
            <td><?= $order["order"]["status"] ?></td>
        </tr>
        <tr>
            <td>Комментарий</td>
            <td><?= $order["order"]["comment"] ?></td>
        </tr>
    </table>
<?php
//echo Html::tag("p", "Итого к оплате: {$order["order"]["total"]}");
//echo Html::tag("p", "status_name: {$order["order"]["status_name"]}");
//echo Html::tag("p", "id_doc: {$order["order"]["id_doc"]}");
//echo Html::tag("p", "Статус: {$order["order"]["status"]}");
//echo Html::tag("p", "Комментарий: {$order["order"]["comment"]}");
//echo Html::endTag("div");
?>
</div>
