<?php

use yii\web\View;

/**
 * @var View $this
 */

?>
<header class="header">
    <div class="header_top">
        <div class="container-fluid">
            <?= $this->render("_nav"); ?>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container-fluid">
            <div class="header_info">
                <a href="/" class="logo">
                    <img src="/img/logo.png" alt="logo">
                </a>
                <div class="header_contacts">
                    <div class="header_contacts_item">
                        <a href="tel:+73012374060" class="tel">
                            +7 3012 374060
                        </a>
                        <p class="header_graph">
                            пн-пт <strong>9:00 – 18:00</strong>
                        </p>
                        <p class="header_graph">
                            сб <strong>10:00 – 14:00</strong>
                        </p>
                    </div>
                    <div class="header_contacts_item">
                        <a href="tel:+79503806363" class="tel">
                            +7 950 3806363
                        </a>
                        <a href="#" class="recall call_me">
                            ПЕРЕЗВОНИТЕ МНЕ
                        </a>
                    </div>
                </div>
                <div class="header_adress">
                    <p class="header_adress_text">
                        <img src="/img/geo.svg" alt="geo">
                        <span>Наши адреса в Улан-Удэ</span>
                    </p>
                    <a class="btn recall call_me" data-toggle="modal">
                        ВЫЗВАТЬ ЗАМЕРЩИКА
                    <a>
                </div>
            </div>
        </div>
    </div>

</header>
