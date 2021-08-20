<?php
/**
 * @var Category[] $categories
 * @var Request $model
 * @var Image[] $images
 * @var View $this
 */

use frontend\models\Category;
use frontend\models\Image;
use frontend\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;


$this->registerJsFile("https://maps.api.2gis.ru/2.0/loader.js?pkg=lazy");
$this->registerJsFile("/js/map_footer.js", ["depends" => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("/css/css/font-awesome.css");

?>
<section class="main">
    <div class="container">
        <div class="main_inner">
            <h1 class="main_title" data-aos="fade-left">
                ЭНЕРГОСБЕРЕГАЮЩИЕ ОКНА ДЛЯ КОМФОРТА
                <br>
                В ДОМЕ ОТ ЗАВОДА - ПРОИЗВОДИТЕЛЯ
            </h1>
        </div>
    </div>
</section>
<section class="about">
    <div class="container">
        <div class="about_inner">
            <a href="#services" class="scroll_to">
                <img src="/img/slider.svg" alt="scroll">
            </a>
            <div class="about_item" data-aos="fade-right">
                <h2 class="title">
                    20 лет изготавливаем качественные окна в Республике Бурятия
                </h2>
                <p class="about_text">
                    Основные преимущества работы с компанией «Завод окон»:
                </p>
                <div class="about_info">
                    <div class="about_content">
                        <div class="about_content_img">
                            <img src="/img/about-1.svg" alt="icon">
                        </div>
                        <p class="about_content_text">
                            Окна, выполненные нашим заводом – производителем отвечают всем строгим требованиям
                            государственного отраслевого стандарта.
                        </p>
                    </div>
                    <div class="about_content">
                        <div class="about_content_img">
                            <img src="/img/about-2.svg" alt="icon">
                        </div>
                        <p class="about_content_text">
                            Каждый пластиковый профиль в наших окнах проходит процедуру армирования металлическим
                            профилем, за счет чего обеспечивается надежность целой конструкции.
                        </p>
                    </div>
                    <div class="about_content">
                        <div class="about_content_img">
                            <img src="/img/about-3.svg" alt="icon">
                        </div>
                        <p class="about_content_text">
                            Стеклопакеты для наших окон изготавливаются с учетом всех требований и качественных
                            материалов, благодаря чему отлично сохраняют тепло и шумоизоляционные свойства.
                        </p>
                    </div>
                    <div class="about_content">
                        <div class="about_content_img">
                            <img src="/img/about-4.svg" alt="icon">
                        </div>
                        <p class="about_content_text">
                            Для повышения энергоэффективных свойств наших пластиковых окон вы можете заказать
                            стеклопакеты с наполнением аргоновым газом.
                        </p>
                    </div>
                    <div class="about_content">
                        <div class="about_content_img">
                            <img src="/img/about-5.svg" alt="icon">
                        </div>
                        <p class="about_content_text">
                            Также мы производим установку многофункциональных стекол, которые отражают тепловую энергию
                            внутри помещения зимой и сохраняют комфортный прохладный воздух летом.
                        </p>
                    </div>
                </div>
            </div>
            <div class="about_item" data-aos="fade-left">
                <img src="/img/logo-2.png" alt="logo" class="about_logo">
                <h2 class="title">
                    Энерго-
                    <br>эффективное
                    <br>окно
                </h2>
                <a href="/news/view?id=1" class="btn"><i class="fa fa-play" aria-hidden="true"></i>&nbsp;&nbsp;УЗНАТЬ БОЛЬШЕ</a>
            </div>
        </div>
        <form class="about_form" data-aos="fade-right" action="<?= Url::to(["site/show"]) ?>" method="get">
            <h2 class="title">
                Опишите вашу задачу и мы покажем
                нужную вам продукцию
            </h2>
            <p class="about_form_text">
                Выберите нужный пункт и вы перейдете
                в раздел с нужной продукцией
            </p>
            <span class="you_want">
                    Вы хотите:
                </span>
            <select name="category_id">
                <?php
                foreach ($categories as $category) {
                    echo "<option value='{$category->id}'>{$category->title}</option>";
                }
                ?>
            </select>
            <button type="submit" class="btn">
                ПОКАЗАТЬ ПРОДУКЦИЮ
            </button>
            <div class="about_form_show">
                <img src="/img/show.svg" alt="icon">
                <a href="<?= Url::to(["category/index"]) ?>">
                    ПОКАЗАТЬ ВЕСЬ КАТАЛОГ
                </a>
            </div>
        </form>
    </div>
</section>
<section class="services" id="services">
    <div class="container">
        <h2 class="title" data-aos="fade-down">
            ДОПОЛНИТЕЛЬНЫЕ УСЛУГИ
        </h2>
        <div class="services_inner">
            <div class="services_item">
                <div class="services_img" data-aos="fade-down">
                    <img src="/img/services-1.png" alt="services">
                </div>
                <h2 class="title">
                    РЕМОНТ ОКОН
                </h2>
                <ul>
                    <li>
                        Ремонт и замена фурнитуры
                    </li>
                    <li>
                        Регулировка фурнитуры
                    </li>
                    <li>
                        Замена уплотнителя окна
                    </li>
                    <li>
                        Замена разбитого стекла/стеклопакета
                    </li>
                    <li>
                        Устранение продувания/промерзания
                    </li>
                    <li>
                        Утепление откосов
                    </li>
                    <li>
                        Установка отделки и ручки
                    </li>
                    <li>
                        Установка детского замка, гребенки
                    </li>
                </ul>
                <span class="services_num">1</span>
            </div>
            <div class="services_item">
                <div class="services_img" data-aos="fade-down">
                    <img src="/img/services-2.png" alt="services">
                </div>
                <h2 class="title">
                    ЗАМЕНА ДВЕРЕЙ
                </h2>
                <ul>
                    <li>
                        Замена дверей
                    </li>
                    <li>
                        Металл/Дерево/Стекло/Другое
                    </li>
                    <li>
                        Монтаж/Демонтаж
                    </li>
                    <li>
                        Пропенка
                    </li>
                    <li>
                        Регулировка двери
                    </li>
                    <li>
                        Ремот доводчика
                    </li>
                </ul>
                <span class="services_num">2</span>
            </div>
            <div class="services_item">
                <div class="services_img" data-aos="fade-down">
                    <img src="/img/services-3.png" alt="services">
                </div>
                <h2 class="title">
                    СОПУТСТВУЮЩИЕ ТОВАРЫ
                </h2>
                <ul>
                    <li>
                        Москитные сетки
                    </li>
                    <li>
                        Алюминиевая москитная сетка
                    </li>
                    <li>
                        Ремонт москитных сеток
                    </li>
                    <li>
                        Замена полотна и крепленй сеток
                    </li>
                </ul>
                <span class="services_num">3</span>
            </div>
        </div>
    </div>
</section>
<section class="organisation">
    <div class="container">
        <h2 class="title" data-aos="fade-down">
            НАШИ ПРЕИМУЩЕСТВА ДЛЯ ОРГАНИЗАЦИЙ
        </h2>
        <div class="organisation_inner">
            <div class="organisation_item" data-aos="fade-left">
                <div class="organisation_title">
                    <img src="/img/organisation-1.svg" alt="icon">
                    <p>Для организаций</p>
                </div>
                <p class="text">
                    У вас будет надежный поставщик с гарантированным качеством окон:<br />
                    - Делаем до 120 окон в день<br />
                    - Любой формы<br />
                    - Любого размера<br />
                </p>
            </div>
            <div class="organisation_item" data-aos="fade-right">
                <div class="organisation_title">
                    <img src="/img/organisation-2.svg" alt="icon">
                    <p>Для индивидуальных застройщиков</p>
                </div>
                <p class="text">
                    Вы получите окна, которые будут вас радовать десятилетия:<br />
                    - Удобное обслуживание<br />
                    - Гарантия 36 месяцев<br />
                    - Акции, скидки и подарки<br />
                    - При повторном обращении дополнительные бонусы<br />
                </p>
            </div>
        </div>
    </div>
</section>
<section class="advantages">
    <div class="container">
        <div class="advantages_info">
            <img src="/img/logo-3.png" alt="logo">
            <p>
                ВАШИ ВЫГОДЫ
                <br> ОТ СОТРУДНИЧЕСТВА
            </p>
        </div>
        <div class="advantages_inner">
            <div class="advantages_item" data-aos="fade-down">
                <div class="advantages_top">
                    <p class="advantages_title">
                        1. Оперативный выезд замерщика
                    </p>
                    <div class="advantages_img">
                        <img src="/img/advantages-1.svg" alt="advantages">
                    </div>
                </div>
                <p class="advantages_text">
                    Наши специалисты по замеру в короткие сроки снимут грамотные замеры и произведут расчет
                </p>
            </div>
            <div class="advantages_item" data-aos="fade-down">
                <div class="advantages_top">
                    <p class="advantages_title">
                        2. Помощь с выбором
                    </p>
                    <div class="advantages_img">
                        <img src="/img/advantages-2.svg" alt="advantages">
                    </div>
                </div>
                <p class="advantages_text">
                    Специалисты нашей компании проконсультируют Вас по всем необходимым вопросом с выбором материалов
                    для изготовления, фурнитуры и комплектующих. А также расскажут о правильном уходе за изделиями
                </p>
            </div>
            <div class="advantages_item" data-aos="fade-down">
                <div class="advantages_top">
                    <p class="advantages_title">
                        3. Быстрое изготовление
                    </p>
                    <div class="advantages_img">
                        <img src="/img/advantages-3.svg" alt="advantages">
                    </div>
                </div>
                <p class="advantages_text">
                    Благодаря собственному производству мы реализуем ваш заказ в короткие сроки, с учетом всех ГОСТов и
                    стандартов качества.
                </p>
            </div>
            <div class="advantages_item" data-aos="fade-down">
                <div class="advantages_top">
                    <p class="advantages_title">
                        4. Профессиональный монтаж
                    </p>
                    <div class="advantages_img">
                        <img src="/img/advantages-4.svg" alt="advantages">
                    </div>
                </div>
                <p class="advantages_text">
                    Монтаж, как и изготовление необходимо доверять профессионалам, поэтому только наши специалисты
                    установят ваши будущие окна аккуратно и правильно.
                </p>
            </div>
            <div class="advantages_item" data-aos="fade-down">
                <div class="advantages_top">
                    <p class="advantages_title">
                        5. Удобная оплата
                    </p>
                    <div class="advantages_img">
                        <img src="/img/advantages-5.svg" alt="advantages">
                    </div>
                </div>
                <p class="advantages_text">
                    Для вашего удобства наша компания предусмотрена несколько способов оплаты. Выберете наиболее
                    приемлемый для вас.
                </p>
            </div>
            <div class="advantages_item" data-aos="fade-down">
                <div class="advantages_top">
                    <p class="advantages_title">
                        6. Гарантия и сервисное обслуживание
                    </p>
                    <div class="advantages_img">
                        <img src="/img/advantages-6.svg" alt="advantages">
                    </div>
                </div>
                <p class="advantages_text">
                    На продукцию, которая была изготовлена и установлена нашим заводом окон, распространяется
                    обязательная гарантия и бесплатное сервисное обслуживание в течении 3х лет.
                </p>
                <a href="#" class="certificate_link">
                    Смотреть наши сертификаты
                </a>
            </div>
        </div>
    </div>
</section>
<section class="ask" id="ask">
    <div class="container">
        <div class="ask_info">
            <p class="ask_info_text">
                <strong>Компания «Завод окон»</strong> уделяет особое внимание сервису. Мы ориентируемся на потребности
                клиента, чтобы стать исполнителем, с которым приятно иметь дело, и заботимся о комфорте заказчика на
                любом этапе сотрудничества.
            </p>
            <a href="#" class="btn recall call_me" data-aos="fade-up">
                ЗАКАЗАТЬ РАСЧЕТ
            </a>
            <img src="/img/ask.png" alt="ask" class="ask_img">
        </div>
        <form class="ask_form" data-aos="fade-down" action="<?= Url::to(["site/request"]) ?>" method="post">
            <h2 class="title">
                Ответим на все ваши вопросы
            </h2>
            <p class="text">
                Заполните форму, и наш специалист проконсультирует вас!
            </p>
            <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
            <div class="ask_form_input">
                <?= Html::activeInput("text", $model, "client_name", ["placeholder" => "Ваше имя"]); ?>
                <?= Html::activeInput("text", $model, "client_phone", ["placeholder" => "Ваш телефон"]); ?>
            </div>
            <div class="ask_form_btn">
<!--                <div class="form_checkbox">-->
<!--                    <input type="checkbox" id="checkbox">-->
<!--                    <label for="checkbox">-->
<!--                        Я согласен на хранение и обработку-->
<!--                        персональных данных-->
<!--                    </label>-->
<!--                </div>-->
                <?= Html::submitButton("ЗАКАЗАТЬ ЗВОНОК", ["class" => "btn"]) ?>
            </div>
        </form>
    </div>
</section>
<section class="video" id="video">
    <div class="container">
        <h2 class="title aos-init aos-animate" data-aos="fade-down">
            Смотрите видео о процессе производства
        </h2>
        <p class="text aos-init aos-animate" data-aos="fade-down">
            Нашей системе менеджмента и качестве
        </p>
        <div class="video_inner">
            <img src="/img/video_logo.png" alt="logo" class="video_logo">
            <div class="video_info aos-init aos-animate" data-aos="fade-right">
                <div class="video_content">
                    <p class="text">
                            <span>
                                Собственное
                            </span>
                        производство пластиковых окон и изделий из алюминия
                    </p>
                </div>
                <div class="video_content">
                    <p class="text">
                        Высокое
                        <span>
                                качество продукции
                            </span>
                    </p>
                </div>
                <div class="video_content">
                    <p class="text">
                            <span>
                                Лучшие цены
                            </span>
                        для корпоративных клиентов
                    </p>
                </div>
                <div class="video_content">
                    <p class="text">
                            <span>
                                Контроль всего процесса
                            </span>
                        от замера до сдачи объекта заказчику
                    </p>
                </div>
                <div class="video_content">
                    <p class="text">
                        Использование оконных профилей и фурнитуры
                        <span>
                                высокого качества
                            </span>
                    </p>
                </div>
                <div class="video_content">
                    <p class="text">
                            <span>
                                3 года гарантии
                            </span>
                        с монтажом
                    </p>
                </div>
            </div>
            <div class="video_monitor">
                <img src="/img/monitor.png" alt="monitor">
                <iframe width="1280" height="720" src="https://www.youtube.com/embed/AtF2cnE3aEQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="work_inner">
            <div class="work_item">
                <div class="work_item_content">
                    <h2 class="title">
                        Как работают другие
                    </h2>
                    <ul>
                        <li>
                            <img src="/img/work_icon-1.svg" alt="icon">
                            Снижение себестоимости монтажа за счет рабочих без опыта и необходимых знаний
                        </li>
                        <li>
                            <img src="/img/work_icon-1.svg" alt="icon">
                            Щели между профилями, не плотно закрывающиеся окна, скрипы, щелчки при открывании и закрывании
                        </li>
                        <li>
                            <img src="/img/work_icon-1.svg" alt="icon">
                            Некоторые фирмы тянут с ремонтом или отказываются исправить ошибки
                        </li>
                    </ul>
                    <img src="/img/arrow.svg" class="work_arrow aos-init" alt="arrow" data-aos="fade-down">
                </div>
                <img src="/img/work-1.png" alt="work" class="work_img aos-init" data-aos="fade-up">
            </div>
            <div class="work_item">
                <img src="/img/work-2.png" alt="work" class="work_img aos-init" data-aos="fade-down">
                <div class="work_item_content">
                    <h2 class="title">
                        Как работаем мы
                    </h2>
                    <ul>
                        <li>
                            <img src="/img/work_icon-2.svg" alt="icon">
                            Только проверенные монтажники, с
                            опытом от 3-х лет
                        </li>
                        <li>
                            <img src="/img/work_icon-2.svg" alt="icon">
                            Постоянное повышение квалификации сотрудников
                        </li>
                        <li>
                            <img src="/img/work_icon-2.svg" alt="icon">
                            Исправление недочетов работы в течение суток с момента поступления жалобы
                        </li>
                    </ul>
                    <img src="/img/arrow.svg" class="work_arrow aos-init" alt="arrow" data-aos="fade-up">
                </div>
            </div>
            <a href="#" class="btn recall call_me">
                ЗАКАЗАТЬ РАСЧЕТ
            </a>
        </div>
    </div>
</section>
<section class="faq">
    <?= $this->render("/gallery/index", [
            "dataProvider" => new \yii\data\ActiveDataProvider([
                    "query" => Image::find()->where(["type" => Image::TYPE_GALLERY])->andWhere(["favourite" => 1])
            ])
    ]) ?>
    <div class="manager">
        <div class="container">
            <h2 class="title">
                На ваши вопросы ответят квалифицированные менеджеры
            </h2>
            <div class="faq_inner">
                <div class="faq_slider">
                    <div class="faq_item">
                        <img src="/img/270.png" alt="manager">
                    </div>
                    <div class="faq_item">
                        <img src="/img/271.png" alt="manager">
                    </div>
                    <div class="faq_item">
                        <img src="/img/272.png" alt="manager">
                    </div>
                    <div class="faq_item">
                        <img src="/img/273.png" alt="manager">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="request" id="request">
    <div class="container">
        <form class="request_form" action="<?= Url::to(['site/request']); ?>" method="post">
            <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>" />
            <h2 class="title">
                Оставьте заявку и наш
                специалист Вам позвонит
            </h2>
            <?= Html::activeInput("text", $model, "client_name", ["placeholder" => "Ваше имя"]) ?>
            <?= Html::activeInput("text", $model, "client_phone", ["placeholder" => "Ваш Телефон"]) ?>
<!--            <div class="form_checkbox">-->
<!--                <input type="checkbox" id="checkbox">-->
<!--                <label for="checkbox">-->
<!--                    Я согласен на хранение и обработку-->
<!--                    персональных данных-->
<!--                </label>-->
<!--            </div>-->
            <?= Html::submitButton("ЗАКАЗАТЬ ЗВОНОК", ["class" => "btn"]) ?>
        </form>
    </div>
</section>
<section class="map">
    <div class="map_1" id="map"></div>
    <div class="container">
        <div class="map_info">
            <h2 class="title">
                Контактная информация
            </h2>
            <div class="map_office">
                <p class="text blue">
                    Адрес офиса:
                </p>
                <div class="map_content active" data-latitude="51.812802" data-longitude="107.595992" data-popup="<p>Улан-Удэ, Бабушкина, 5</p><a href='tel:+73012374060'>+7 3012 374060</a>">
                    <p class="text">
                        Улан-Удэ, Бабушкина, 5
                    </p>
                    <a href="tel:+73012374060" class="tel">
                        +7 3012 374060
                    </a>
                </div>
            </div>
            <div class="map_product">
                <p class="text blue">
                    Адреса производства
                </p>
                <div class="map_content" data-latitude="51.832451" data-longitude="107.689904" data-popup="<p>Улан-Удэ, Матросова, 2</p><a href='tel:+79025356363'>+7 902 5356363</a>">
                    <p class="text">
                        Улан-Удэ, Матросова, 2
                    </p>
                    <a href="tel:+79025356363" class="tel">
                        +7 902 5356363
                    </a>
                </div>
                <div class="map_content" data-latitude="51.842568" data-longitude="107.531618" data-popup="<p>Улан-Удэ, Иволгинская, 13 'Г'</p><a href='tel:+79503806363'>+7 950 3806363</a>">
                    <p class="text">
                        Улан-Удэ, Иволгинская, 13 "Г"
                    </p>
                    <a href="tel:+79503806363" class="tel">
                        +7 950 3806363
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
