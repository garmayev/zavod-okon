<?php

use dektrium\user\models\User;
use frontend\models\Profile;
use yii\helpers\Html;

/**
 *
 * @var User $model
 */

$profile = $model->profile;

echo Html::beginTag("div");
echo Html::beginForm(["/admin/users/profile", "id" => $model->id]);
echo field(Html::activeInput("text", $profile, 'name', ["class" => "form-control"]));
echo field(Html::activeInput("text", $profile, 'public_email', ["class" => "form-control"]));
echo field(Html::activeInput("text", $profile, 'gravatar_email', ["class" => "form-control"]));
echo field(Html::activeInput("text", $profile, 'location', ["class" => "form-control"]));
echo field(Html::activeInput("text", $profile, 'website', ["class" => "form-control"]));
echo field(Html::activeTextarea($profile, 'bio', ["class" => "form-control"]));
echo field(Html::activeDropDownList($profile, 'timezone', ["Asia/Irkutsk" => "Иркутск"], ["class" => "form-control"]));
echo field(Html::activeInput("text", $profile, 'phone', ["class" => "form-control"]));
if ( $profile->phone !== null || $profile->phone !== "" ) {
    echo field(Html::activeDropDownList($profile, "area", ["Железнодорожный" => "Железнодорожный", "Октябрьский" => "Октябрьский", "Советский" => "Советский"], ["class" => "form-control"]));
}
echo Html::submitButton("Save", ["class" => ["btn", "btn-success"]]);
echo Html::endForm();
echo Html::endTag("div");