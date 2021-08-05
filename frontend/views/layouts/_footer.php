<?php
/**
 * @var View $this
 */

use frontend\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$request = new Request();
?>
<footer class="footer">
    <div class="container">
        <div class="footer_inner">
            <p class="text">
                Copyright 2021
                <br>Все права защищены
            </p>
            <div class="footer_tel">
                <div class="footer_item">
                    <a href="tel:+73012374060" class="tel">
                        +7 3012 374060
                    </a>
                    <a href="tel:+79503806363" class="tel">
                        +7 950 3806363
                    </a>
                </div>
            </div>
            <div class="footer_text">
                <p class="text">
                    Почта для заявок
                    <br>и предложений сотрудничества
                </p>
                <a href="mailto:zavodokon@inbox.ru" class="mail">
                    zavodokon@inbox.ru
                </a>
            </div>
            <a href="#" class="footer_logo">
                <img src="/img/logo.png" alt="logo">
            </a>
        </div>
    </div>
</footer>

<div class="certificate">
    <img src="/img/close.svg" alt="close" class="close_modal">
    <h2 class="title">
        Наши сертификаты и лицензии
    </h2>
    <p class="text">
        Аккредитация, сертификация, профессионализм
    </p>
    <div class="certificate_slider">
        <a href="/img/certificate-1.png" class="certificate_item">
            <img src="/img/certificate-1.png" alt="certificate">
        </a>
        <a href="/img/certificate-2.png" class="certificate_item">
            <img src="/img/certificate-2.png" alt="certificate">
        </a>
        <a href="/img/certificate-3.png" class="certificate_item">
            <img src="/img/certificate-3.png" alt="certificate">
        </a>
        <a href="/img/certificate-4.png" class="certificate_item">
            <img src="/img/certificate-4.png" alt="certificate">
        </a>
        <a href="/img/certificate-5.png" class="certificate_item">
            <img src="/img/certificate-5.png" alt="certificate">
        </a>
    </div>
</div>
<div class="recall_modal">
    <img src="/img/close.svg" alt="close" class="close_modal">
    <h2 class="title">
        Оставьте ваш номер телефона и наш
        специалист Вам позвонит
    </h2>
    <?php
        $this->registerJsFile("https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js", ["depends" => [\yii\web\JqueryAsset::className()]]);
        $this->registerCssFile("https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css");
        $model = new Request();
        echo Html::beginForm(["/site/request"], 'post', ["class" => "recall_form"]);
        echo Html::activeInput("text", $model, 'client_name', ["placeholder" => "Ваше имя"]);
        echo Html::activeInput("text", $model, 'client_phone', ["placeholder" => "Ваше телефон"]);
        echo Html::activeInput("text", $model, "address", ["placeholder" => "Введите адрес", "id" => "request_address"]);
        echo Html::activeHiddenInput($model, "district");
        echo Html::submitButton("ЗАКАЗАТЬ ЗВОНОК", ["class" => "btn"]);
        echo Html::endForm();
        $this->registerJs('
                $(function () {
                    $("#request_address").suggestions({
                        token: "2c9418f4fdb909e7469087c681aac4dd7eca158c",
                        type: "ADDRESS",
                        onSelect: function(suggestion) {
                            if (suggestion.data.city_district !== null) {
                                $("#request-district").val(suggestion.data.city_district);
                            } else {
                                $("#request-district").val(suggestion.data.area);
                            }
                        }
                    });
                });', View::POS_LOAD);
    ?>
</div>
