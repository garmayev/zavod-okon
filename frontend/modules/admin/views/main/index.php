<?php

use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 */

$shopOrder = \frontend\modules\shop\models\Order::find()->where(["<>", "status", 3])->andWhere(["<>", "status", 4])->limit(5)->orderBy("id")->all();
$requests = \frontend\models\Request::find()->limit(5)->all();
?>

<div class="col-lg-6 col-md-6 col-xs-12">
    <div class="box box-default col-lg-4 col-md-4 col-xs-12">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::a(Yii::t("app", "Orders in shop"), ["/admin/order/index"])?></h3>
            <div class="box-tools pull-right">
                <span class="label label-default"><?= count($shopOrder) ?></span>
            </div>
        </div>
        <div class="box-body">
            <?php
                foreach ($shopOrder as $order) {
                    echo Html::beginTag("div", ["class" => "row"]);
                    $content = "<div class='col-lg-8 col-md-8 col-xs-8'>{$order->client->fullname()}</div>";
                    switch ($order->status) {
                        case 0:
	                        $content .= "<div class='col-lg-2 col-md-2 col-xs-2'>Не оплачен</div>";
	                        break;
                        case 1:
	                        $content .= "<div class='col-lg-2 col-md-2 col-xs-2'>Предоплата</div>";
	                        break;
                        case 2:
	                        $content .= "<div class='col-lg-2 col-md-2 col-xs-2'>Оплачен</div>";
                            break;
                    }
	                $content .= "<div class='col-lg-2 col-md-2 col-xs-2'>{$order->price}</div>";
	                echo Html::a($content, ["/admin/order/view", "id" => $order->id]);
	                echo Html::endTag("div");
                }
            ?>
        </div>
    </div>

    <div class="card card-primary card-outline">
        <div class="card-body">
            <canvas id="line-chart">
            </canvas>
        </div>
    </div>
    
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
    <div class="box box-info col-lg-4 col-md-4 col-xs-12">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::a(Yii::t("app", "Requests"), ["/admin/request/index"])?></h3>
            <div class="box-tools pull-right">
                <span class="label label-info"><?= count($requests) ?></span>
            </div>
        </div>
        <div class="box-body">
            <?php
            foreach ($requests as $request) {
	            echo Html::beginTag("div", ["class" => "row"]);
	            $content = "<div class='col-lg-6 col-md-6 col-xs-6'>{$request->client_name}</div>";
	            $content .= "<div class='col-lg-4 col-md-4 col-xs-4'>{$request->address}</div>";
	            $content .= "<div class='col-lg-2 col-md-2 col-xs-2'>{$request->client_phone}</div>";
	            echo Html::a($content, ["/admin/request/view", "id" => $request->id]);
	            echo Html::endTag("div");
            }

            ?>
        </div>
    </div>
    <!-- /.box -->

    <div class="box box-success col-lg-4 col-md-4 col-xs-12">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::a(Yii::t("app", "Orders from dealers"), ["/admin/dealers/index"])?></h3>
            <div class="box-tools pull-right">
                <span class="label label-info">0</span>
            </div>
        </div>
        <div class="box-body">
        </div>
    </div>
</div>

<?php
    $this->registerJsFile('//cdn.jsdelivr.net/npm/chart.js');
    $this->registerJs("
    $(function () {
        let data = {
            labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label               : '".Yii::t("app", "Orders in shop")."',
                    borderColor         : 'rgb(255, 99, 0)',
                    backgroundColor     : 'rgba(255, 99, 0, .3)',
                    data                : [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label               : '".Yii::t("app", "Orders from dealers")."',
                    borderColor         : 'rgb(99, 255, 0)',
                    backgroundColor     : 'rgba(99, 255, 0, .3)',
                    data                : [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label               : '".Yii::t("app", "Requests")."',
                    borderColor         : 'rgb(255, 0, 99)',
                    backgroundColor     : 'rgba(255, 0, 99, .3)',
                    data                : [96, 32, 67, 56, 19, 93, 22]
                }
            ]
        }

        let lineChart = new Chart('line-chart',{
            type: 'line',
            data,
            options: {
                elements: {
                    tension: 1,
                    borderWidth: 1,
                }
            }
        })
    })
", \yii\web\View::POS_LOAD);