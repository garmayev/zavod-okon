<?php
/**
 * @var ActiveDataProvider $dataProvider
 * @var View $this
 */

use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\ListView;

$this->registerCss("
.about {
    margin-top: 250px;
    padding-top: 50px;
}
.about_inner {
    top: 0; 
    margin-bottom: 20px;
    flex-direction: column;
    border: none;
} 
.about_inner .about_item {
    width: 100%;
    margin-bottom: 15px;
    border-top: 2px solid #00bfff;
} 
.about_inner .about_item:last-child {
    background-image: url('')
}");

?>
<section class="about">
    <div class="container">
        <?php
        echo ListView::widget([
            "dataProvider" => $dataProvider,
            "summary" => "",
            "itemView" => "_article",
            "emptyText" => "Пока не добавлена ни одна статья",
            "options" => [
                "tag" => "div",
                "class" => "about_inner"
            ],
            "itemOptions" => [
                "tag" => "div",
                "class" => [
                    "about_item",
                    "aos-init",
                    "aos-animate"
                ],
                "data-aos" => "fade-up",
                "data-aos-duration" => 800,
            ]
        ]);
        ?>
    </div>
</section>
