<?php

use frontend\modules\dealers\models\Dealer;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View $this
 * @var Dealer $model
 * @var ActiveForm $form
 */

$form = \yii\widgets\ActiveForm::begin(["action" => ["/dealers/dealer/create"]]);
echo $form->field($model, 'name')->textInput();
echo $form->field($model, 'pass')->passwordInput();
echo $form->field($model, 'phone')->textInput();
echo Html::submitButton(Yii::t("app", "Save"));
\yii\widgets\ActiveForm::end();