<?php

use frontend\models\Category;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ListView;
use yii\widgets\Menu;

/**
 * @var ActiveDataProvider $categories
 * @var View $this
 * @var Category $category
 */

$this->registerCss("
.services {
	margin-top: 200px;
}
.services_inner {
	flex-wrap: wrap;
}
.services_item {
    text-align: center;
    margin: 10px 0;
    transition: transform .5s;
    transition: box-shadow .5s;
}
.services_item:hover {
    transform: scale(1.05);
    box-shadow: 0px 0px 25px 0px rgb(0 0 0 / 50%);
}
");

$this->registerJs("
$(() => {
	$('.services_inner > a').first().remove();
	// $('.services_item > a:not(.submit)').remove();
})
", View::POS_LOAD);
?>
<div class="services">
	<div class="container">
		<h2 class="title">НАША ПРОДУКЦИЯ</h2>
<?php
echo ListView::widget([
    "dataProvider" => $categories,
    "itemView" => "_category",
    "summary" => "",
	"itemOptions" => [
		"class" => "services_item aos-init aos-animate",
        "data-aos" => "fade-down"
	],
	"options" => [
		"tag" => "div",
		"class" => "services_inner",
	]
]);
?>
	</div>
</div>
