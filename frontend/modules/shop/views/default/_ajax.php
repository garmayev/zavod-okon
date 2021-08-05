<?php

/**
 * @var $productProvider ActiveDataProvider
 */

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\ListView;

echo Html::a(Yii::t("app", "Cart")." ".Html::tag("span", Yii::$app->cart->getTotalCount(), ["class" => "badge"]), ["/shop/cart/"], ["class" => "btn btn-primary", "style" => "margin: 15px 0;"]);
echo ListView::widget(["dataProvider" => $productProvider, "itemView" => "_product", "summary" => ""]);
$this->registerJs('
    $(()=>{
        $(".btn-buy").on("click", (e) => {
            e.preventDefault();
            console.log(e);
            $.pjax.reload({
                container: "#pjax-container", 
                history: false, 
                url: "/shop/default/add?product_id="+$(e.target).attr("data-key")
            });
        })
    });
');