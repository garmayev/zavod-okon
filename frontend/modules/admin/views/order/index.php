<?php
/**
 * @var $dataProvider ActiveDataProvider
 * @var $this View
 */

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;

echo \yii\grid\GridView::widget([
	"dataProvider" => $dataProvider,
	"summary" => "",
	"columns" => [
		"id",
		[
			"attribute" => "client_id",
			"label" => "Client",
			"content" => function ($model, $key) {
				return $model->client->fullname();
			}
		], [
			"attribute" => "Cost",
			"label" => "Cost",
			"content" => function ($model) {
				return $model->price;
			}
		], [
			"attribute" => "status",
			"label" => "Status",
			"content" => function ($model) {
				$html = Html::beginTag("div", ["class" => "form-group"]);
				$html .= Html::activeDropDownList($model, "status", ["Не оплачен", "Предоплата", "Оплачен", "Выполнен", "Отказ"], ["class" => "form-control"]);
				return $html.Html::endTag("div");
			}
		], [
			"content" => function ($model) {
				$html = Html::a(Html::tag("span", "", ["class" => ["glyphicon", "glyphicon-eye-open"]]), ["/admin/order/view", "id" => $model->id]);
				$html .= Html::a(Html::tag("span", "", ["class" => ["glyphicon", "glyphicon-trash"]]), ["/admin/order/delete", "id" => $model->id]);
				return $html;
			}
		]
	]
]);

$this->registerJs("$(() => {
	$('select').on('change', (e) => {
		let target = $(e.currentTarget).closest('[data-key]');
		let index = target.attr('data-key');
		console.log( $(e.currentTarget).val() );
		$.ajax({
			url: '/admin/order/update?id='+index,
			method: 'POST',
			data: {'Order[status]': $(e.currentTarget).val()},
			success: function (response) {
				if (response.ok && (response.model.status === '3' || response.model.status === '4')) {
					target.toggle();
					window.location.reload();
				}
			}
		});
	});
})", View::POS_LOAD);

$this->registerCss("
tr > td:last-child {width: 80px;}
td {line-height: 36px !important; height: 36px !important;} 
td > .form-group {margin-bottom: 0;}
td .glyphicon {margin: 0 5px;}
");