<?php


namespace frontend\modules\dealers\models;


use yii\base\BaseObject;
use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\httpclient\Client;
use yii\httpclient\Exception;
use yii\web\Response;

class Itokna extends Model
{
    private $url = "http://90.188.39.88:8000/";
    public function getOrder($code)
    {
        $dealer = Dealer::findOne(["user_id" => \Yii::$app->user->id]);
        $client = new Client();
        try {
            $response = $client->createRequest()
                ->setMethod("POST")
                ->setUrl($this->url)
                ->setData(["user" => $dealer->toOkna(), "command" => ["name" => "GetOrder", "order_code" => $code]])
                ->send();
            if ( $response->isOk ) {
                if ( ($response->data["result"]["code"] === 0) && count($response->data["order"]) ) {
                    $order = new Order();
                    $order->load($response->data);
                }
            }
        } catch (Exception $e) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return $e;
        } catch (InvalidConfigException $e) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return $e;
        }
    }

    public function getOrders($start = null)
    {
        $dealer = Dealer::findOne(["user_id" => \Yii::$app->user->id]);
        $client = new Client();
        try {
            if ( $start === null ) {
                $start = date("d.m.Y", 0);
            }
            $response = $client->createRequest()
                ->setMethod("POST")
                ->setUrl($this->url)
                ->setData(json_encode(["user" => ["name" => $dealer->name, "pass" => $dealer->pass, "phone" => $dealer->phone], "command" => ["name" => "GetOrders", "start" => $start, "finish" => date("d.m.Y")]]))
                ->send();
            if ( $response->isOk ) {
                return $response->data;
            } else {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ["ok is false"];
            }
        } catch (InvalidConfigException $e) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return $e;
        } catch (Exception $e) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return $e;
        }
    }

    public function createOrder()
    {

    }
}