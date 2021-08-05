<?php
/**
 * @var Article $model
 */

use frontend\models\Article;
use yii\helpers\Html;

$this->registerCss("
.about {
    padding-top: 50px; 
    margin-top: 250px;
}
.about_inner {
    top: 0; 
    margin-bottom: 20px;
} 
.about_inner .about_item {
    width: 100%
} 
.about_inner .about_item:last-child {
    background-image: url('')
}
.about_inner .about_item .about_info {
    text-align: justify;
}
.about_inner .about_item .about_info p {
    margin: 15px 0;
} 
");

?>
    <section class="about">
        <div class="container">
            <div class="about_inner">
                <div class="about_item">
                    <?= Html::tag("div", $model->title, ["class" => "title"]) ?>
                    <?= Html::tag("div", $model->summary, ["class" => "about_text"]) ?>
                    <?= Html::tag("div", $model->content, ["class" => "about_info", "style" => "width: 100%;"]) ?>
                </div>
            </div>
        </div>
    </section>
<?php
