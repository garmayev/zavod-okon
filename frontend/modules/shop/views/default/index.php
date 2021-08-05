<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/**
 * @var $productProvider ActiveDataProvider
 * @var $this View;
 */
echo Html::beginTag("section", ["style" => "margin-top: 250px;", "class" => ["advantages"]]);

echo Html::a("Cart", ["/shop/cart/index"]);
?>
    <div class="container">
        <?php
        echo ListView::widget([
            "itemView" => "_product",
            "dataProvider" => $productProvider,
            "summary" => "",
            "options" => [
                "tag" => "div",
                "class" => "advantages_inner"
            ],
            "itemOptions" => [
                "tag" => "div",
                "class" => "advantages_item"
            ]
        ]);
        ?>
    </div>
<?php

$this->registerJs('
    $(()=>{
        $(".btn-buy").on("click", (e) => {
            e.preventDefault();
            console.log(e);
            $.ajax({
                url: "/shop/default/add?product_id="+$(e.target).closest("[data-key]").attr("data-key"),
                success: (response) => {
                    console.log(response);
                }
            });
        })
    });
');

echo Html::endTag("section");