<?php
/**
 * @var Article $model
 */

use frontend\models\Article;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([]);
echo $form->field($model, "title")->textInput(["placeholder" => Yii::t("app", "Title of Article")])->label(false);
echo $form->field($model, "summary")->widget(Widget::className(), [
	'options' => [
//		'placeholder' => Yii::t("admin", "Summary about article")
	],
	'settings' => [
		'lang' => 'ru',
		'minHeight' => 200,
	],
])->label(false);
echo $form->field($model, "content")->widget(Widget::className(), [
	'settings' => [
		'lang' => 'ru',
		'minHeight' => 400,
	],
])->label(false);
echo Html::submitButton("Save", ["class" => ["btn", "btn-success"]]);
ActiveForm::end();