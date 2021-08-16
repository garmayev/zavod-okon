<?php

use dektrium\user\models\User;
use yii\helpers\Html;
use yii\web\View;

/**
 *
 * @return string
 * @var User $model
 */

function field($input): string
{
    $field = Html::beginTag("div", ["class" => "input-group"]);
    $field .= $input;
    return $field . Html::endTag("div");
}

echo Html::beginTag("div");
echo Html::beginForm(["/admin/users/info", "id" => $model->id]);
echo field(Html::activeInput("text", $model, 'username', ["class" => "form-control"]));
echo field(Html::activeInput("text", $model, 'email', ["class" => "form-control"]));
echo field(Html::activeInput("text", $model, 'created_at', ["class" => "form-control"]));
echo field(Html::activeInput("text", $model, 'last_login_at', ["class" => "form-control"]));
echo Html::submitButton("Save", ["class" => ["btn", "btn-success"]]);
echo Html::endForm();
echo Html::endTag("div");

