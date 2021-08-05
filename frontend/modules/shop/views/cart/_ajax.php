<?php
/**
 * @var $positions Product[]
 */

use frontend\modules\shop\models\Product;
use yii\helpers\Html;

if ( count($positions) ) {
foreach ($positions as $item) {
//    var_dump($item->getProduct()); die;
    $product = $item->getProduct();
    ?>
    <div class="media">
        <div class="media-left media-middle">
            <img class="media-object" src="<?= $product->thumb ?>" alt="<?= $product->title ?>" style="width: 200px">
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?= $product->title ?></h4>
            <div><?= $product->description ?></div>
            <p><?= Yii::t("app", "Quantity") . ": " ?></p>
            <div class="input-group col-lg-2 col-md-2 col-xs-2" data-key="<?= $product->id ?>">
                <a href="#" class="input-group-addon dec" style="text-decoration: none">-</a>
                <input type="text" class="form-control col-md-6 col-lg-3 col-xs-12" aria-describedby="basic-addon2" value="<?= $item->getQuantity() ?>">
                <a href="#" class="input-group-addon inc" style="text-decoration: none">+</a>
            </div>
            <a href="#" data-key="<?= $product->id ?>" class="btn btn-danger"><?= Yii::t("app", "Delete") ?></a>
        </div>
    </div>
    <?php
}

echo Html::tag("h3", Yii::t("app", "Total").": ".Yii::$app->cart->getTotalCount());
} else {
    echo Html::tag("h3", Yii::t("app", "Cart is empty"));
}
$this->registerJs('
    $(()=>{
        $(".btn-danger").on("click", (e) => {
            e.preventDefault();
            console.log(e);
            $.pjax.reload({
                container: "#pjax-container", 
                history: false, 
                url: "/shop/cart/remove-product?product_id="+$(e.target).attr("data-key")
            });
        })
        $("input.form-control").on("blur", (e) => {
            
                $.pjax.reload({
                    container: "#pjax-container", 
                    history: false, 
                    url: "/shop/cart/set-count?product_id="+$(e.target).parent().attr("data-key")+"&count="+$(e.currentTarget).val()
                });
        });
        $(".input-group-addon").on("click", (e) => {
            e.preventDefault();
            let product_id = $(e.target).parent().attr("data-key");
            let inc = $(e.target).hasClass("inc");
            // increment 
            if ( inc ) {
                $.pjax.reload({
                    container: "#pjax-container", 
                    history: false, 
                    url: "/shop/cart/add?product_id="+product_id
                });
            } else {
                $.pjax.reload({
                    container: "#pjax-container", 
                    history: false, 
                    url: "/shop/cart/remove?product_id="+product_id
                });
            }
        });
    });
');