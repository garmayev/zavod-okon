<?php


namespace frontend\modules\dealers\models;

use dektrium\user\models\User;
use yii\httpclient\Client;

/**
 * Class Dealer
 * @package frontend\modules\dealers\models
 *
 * @property string $name
 * @property string $pass
 * @property string $phone
 * @property User $user
 * @property int $id [int(11)]
 * @property int $user_id [int(11)]
 */
class Dealer extends \yii\db\ActiveRecord
{
	public static function tableName(): string
	{
		return "dealer";
	}

	public function rules(): array
	{
        return [
            [["name", "pass", "phone"], "required"],
            [["name", "pass", "phone"], "string"],
            [["user_id"], "exist", "targetClass" => User::class, 'targetAttribute' => ["user_id" => "id"]],
            [["user_id"], "default", "value" => \Yii::$app->user->id],
        ];
    }

    public function toOkna(): array
    {
        return ["name" => $this->name, "pass" => $this->pass, "phone" => $this->phone];
    }

    public function getUser(): \yii\db\ActiveQuery
    {
        return $this->hasOne(User::className(), ["user_id" => "id"]);
    }

    protected function execute($args): \yii\httpclient\Response
    {
	    $client = new Client();
	    return $client->createRequest()->setUrl("http://90.188.39.88:8000/")->setData($args)->setMethod("POST")->setFormat("json")->send();
    }

    public function getOrders($startDate = null, $finishDate = null)
    {
    	if ( is_null($startDate) ) {
    		$startDate = date("d.m.Y", 10);
	    }
    	if ( is_null($finishDate) ) {
		    $finishDate = date("d.m.Y");
	    }

	    $response = $this->execute(["user" => $this->toOkna(), "command" => ["name" => "GetOrders", "start" => $startDate, "finish" => $finishDate]]);
    	if ($response->isOk) {
	    	return $response->data;
	    } else {
	    	return ["ok" => false];
	    }
    }

    public function getOrder($code) {
	    $response = $this->execute(["user" => $this->toOkna(), "command" => ["name" => "GetOrder", "order_code" => $code]]);
	    if ($response->isOk) {
		    return $response->data;
	    } else {
		    return ["ok" => false];
	    }
    }
}