<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\helpers\Url;

function render_nav($items) {
    $result = "<ul>";
    $classes = "";
    foreach ( $items as $item ) {
        $result .= "<li><a href='{$item['url']}'";
        if ( isset($item["options"]) ) {
            if ( isset($item["options"]["class"]) ) {
                $classes = $item["options"]["class"];
            }
        }
        if ($_SERVER["REQUEST_URI"] === $item['url']) {
            $result .= " class='{$classes} active'";
        }
        $result .= ">{$item['label']}</a>";
    }
    return $result."</ul>";
}

$items = [
    ["label" => strtoupper("НАША ПРОДУКЦИЯ"), "url" => Url::to(["/category/index"])],
    ["label" => strtoupper("О ПРОИЗВОДСТВЕ"), "url" => "/#video"],
    ["label" => strtoupper("ФОТОГАЛЕРЕЯ"), "url" => Url::to(["/gallery/index"])],
    ["label" => strtoupper("НОВОСТИ"), "url" => Url::to(["/news/index"])],
    ["label" => strtoupper("КАТАЛОГ"), "url" => Url::to(["/shop/default/index"])],
    ["label" => strtoupper("КОНТАКТЫ"), "url" => Url::to(["/#request"])],
    ["label" => strtoupper("ПАРТНЕРАМ"), "url" => "/dealers/default/index"],
];

?>
<div class="header_inner">
    <div class="burger_menu">
        <div class="nav_toggle">
            <span class="nav_toggle-item"></span>
        </div>
    </div>
    <nav class="nav">
        <?=
            render_nav($items);
        ?>
    </nav>
    <div class="header_social">
        <a href="<?= Url::to(["/shop/cart/index"]) ?>" class="shop">
            <img src="/img/shop.svg" alt="shop">
        </a>
        <a href="#" class="social">
            <img src="/img/social-2.svg" alt="social">
        </a>
        <a href="#" class="social">
            <img src="/img/social-1.svg" alt="social">
        </a>
        <?php
            if ( !Yii::$app->user->isGuest ) {
                if (Yii::$app->user->can("manager") || Yii::$app->user->can("admin") || Yii::$app->user->can("master")) {
                    echo Html::a(Html::img("/img/acc.svg"), ["/admin/main/index"], ["class" => 'account']);
                } else {
                    echo Html::a(Html::img("/img/acc.svg"), Url::to(['/user/security/logout']), ['data-method' => 'POST']);
                }
            } else {
                echo Html::a(Html::img("/img/acc.svg"), Url::to(['/user/security/login']), ['data-method' => 'POST']);
            }
        ?>
    </div>
</div>
