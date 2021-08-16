<?php

use frontend\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <?php
                $requests = Request::find()->where(["status" => Request::STATUS_CALL])->all();
                ?>
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success"><?= count($requests) ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                            if ( count($requests) > 0 ) {
                                echo Html::tag("li", Yii::t("app", "You have {n} requests", count($requests)), ["class" => "header"]);
                            } else {
                                echo Html::tag("li", Yii::t("app", "You don`t have any requests", count($requests)), ["class" => "header"]);
                            }
                        ?>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <?php
                                    $result = "";
                                    foreach ($requests as $request) {
                                        $itemHtml = Html::beginTag("li");
                                        $item = Html::tag("h4", $request->client_name.Html::tag("small", Html::tag("i", time() - $request->created_at)));
                                        $item .= Html::tag("p", $request->client_phone);
                                        $itemHtml .= Html::a($item, ["/admin/request/view", "id" => $request->id]);
                                        echo $itemHtml . Html::endTag("li");
                                    }
                                ?>
                                <!-- end message -->
                            </ul>
                        </li>
                        <li class="footer"><a href="<?= Url::to(["request/index"]) ?>"><?= Yii::t("app", "See All Requests")?></a></li>
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= Yii::$app->user->identity->profile->getAvatarUrl() ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= Yii::$app->user->identity->profile->getAvatarUrl() ?>" class="img-circle"
                                 alt="User Image"/>
                            <p>
                                <?php
                                    $user_identity = Yii::$app->user->identity;
                                    echo Html::tag("span", $user_identity->username, ["class" => "username"]);
                                    $formatted_date = Yii::t("app", Yii::$app->formatter->asDate($user_identity->created_at, "php:M"))." ".Yii::$app->formatter->asDate($user_identity->created_at, "php:Y");
                                    echo Html::tag("small", Yii::t("app", "Member since").": ".$formatted_date);
                                ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= Url::to(["/user/profile/show", "id" => Yii::$app->user->id]) ?>" class="btn btn-default btn-flat"><?= Yii::t("user", "Profile")?></a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    Yii::t('user', 'Logout'),
                                    ['/user/security/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
<!--                <li>-->
<!--                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
<!--                </li>-->
            </ul>
        </div>
    </nav>
</header>
