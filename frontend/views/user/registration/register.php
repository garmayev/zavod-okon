<?php

use dektrium\user\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/**
 * @var User $model
 * @var View $this
 */

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
.item {
    border: 2px solid #00bfff;
}
.input {
    border: 2px solid #00bfff;
}
");
?>
<section class="about">
    <div class="container">
        <div class="about_inner">
            <div class="about_item">
                <form action="<?= Url::to(["/user/register"]) ?>" method="post"
                      class="ask_form aos-init aos-animate"
                      data-aos="fade-up">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>"
                           value="<?= Yii::$app->request->getCsrfToken(); ?>"/>
                    <?= Html::activeInput("text", $model, 'email', ["placeholder" => Yii::t("user", "Email"), "class" => "input"]) ?>
                    <?= Html::activeInput("text", $model, 'username', ["placeholder" => Yii::t("user", "Username"), "class" => "input"]) ?>
                    <?= Html::activeInput("password", $model, 'password', ["placeholder" => Yii::t("user", "Password"), "class" => "input"]) ?>
                    <?= Html::submitButton(Yii::t("user", "Sign up"), ["class" => "btn"]) ?>
                </form>
            </div>
        </div>
    </div>
</section>
