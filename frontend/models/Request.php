<?php


namespace frontend\models;

use dektrium\rbac\models\Assignment;
use dektrium\user\models\User;
use Yii;
use yii\httpclient\Client;

/**
 * Class Request
 * @package frontend\models
 * @property int $id [int(11)]
 *
 * @property string $client_name [varchar(255)]
 * @property string $client_phone [varchar(15)]
 * @property int $status [int(11)]
 * @property string $address [varchar(255)]
 * @property int $created_at [int(11)]
 * @property int $user_id [int(11)]
 */
class Request extends \yii\db\ActiveRecord
{
    const STATUS_CALL = 0;
    const STATUS_MASTER = 1;
    const STATUS_DEPLOY = 2;
    const STATUS_COMPLETE = 3;
    const STATUS_CANCEL = 4;

    public $district;

    /** @noinspection MissedFieldInspection */
//    protected function getDistrict()
//    {
//        $client = new Client();
//        $request = $client->createRequest()
//            ->setMethod("POST")
//            ->setFormat(Client::FORMAT_JSON)
//            ->setHeaders([
//                    "Authorization"=>"Token 2c9418f4fdb909e7469087c681aac4dd7eca158c",
//                    "X-Secret"=>"1a89b2f48d84ca6374b26b36e66f601336891e51"
//            ])
//            ->setData([$this->address])
//            ->setUrl("https://cleaner.dadata.ru/api/v1/clean/address");
//        $response = $request->send();
//        if ( $response->isOk ) {
//            return $response->data;
//        } else {
//            return null;
//        }
//    }

    protected function getMaster()
    {
        if ( !is_null($dadata = $this->getDistrict()) ) {
            return Profile::findAll(["area" => $dadata[0]["city_district"]]);
        } else {
            return null;
        }
    }

    public function init()
    {
        parent::init();
        $this->on(self::EVENT_BEFORE_INSERT, function ($event) {
        	$district = Yii::$app->request->post()["Request"]["district"];
//        	\Yii::error(json_encode($this));
//        	var_dump($district); die();
            if ( is_null($this->address) ) {
                $text = "Вас просят перезвонить\nИмя клиента: {$this->client_name}\nНомер телефона: {$this->client_phone}\nРайон: {$this->district}\nСтатус: {$this->getStatus()}";
            } else {
                $text = "Клиент запрашивает выезд мастера\nИмя клиента: {$this->client_name}\nНомер телефона: {$this->client_phone}\nРайон: {$district}\nАдрес: {$this->address}";
            }
//            $masters = $this->getMaster();
//            if ( $masters ) {
//                foreach ($masters as $master) {
//                    \Yii::$app->telegram->sendMessage([
//                        "chat_id" => $master->telegram_chat_id,
//                        "text" => $text
//                    ]);
//                }
//            } else {
                $assignmentArray = \Yii::$app->db->createCommand("SELECT * FROM `auth_assignment` WHERE `item_name` = 'manager'")->queryOne();
                $manager = Profile::findOne(["user_id" => $assignmentArray["user_id"]]);
                \Yii::$app->telegram->sendMessage([
                    "chat_id" => $manager->telegram_chat_id,
                    "text" => $text
                ]);
//            }
        });
    }

    public static function tableName(): string
    {
        return "{{%request}}";
    }

    public function rules(): array
    {
        return [
            [["client_name", "client_phone"], "required"],
            [["client_name", "client_phone"], "string"],
            [["address"], "string"],
            [["status"], "default", "value" => self::STATUS_CALL],
            [["created_at"], "default", "value" => time()],
        ];
    }

    public function getStatus($status = null): string
    {
        if ($status === null)
            $status = $this->status;
        switch ($status) {
            case self::STATUS_CALL:
                return \Yii::t("app", "Wait call");
                break;
            case self::STATUS_MASTER:
                return \Yii::t("app", "Wait master");
                break;
            case self::STATUS_DEPLOY:
                return \Yii::t("app", "Wait deploy");
                break;
            case self::STATUS_COMPLETE:
                return \Yii::t("app", "Complete");
                break;
            case self::STATUS_CANCEL:
                return \Yii::t("app", "Cancel");
                break;
        }
    }

    public function getStatuses(): array
    {
        return [
            self::STATUS_CALL => $this->getStatus(self::STATUS_CALL),
            self::STATUS_MASTER => $this->getStatus(self::STATUS_MASTER),
            self::STATUS_DEPLOY => $this->getStatus(self::STATUS_DEPLOY),
            self::STATUS_COMPLETE => $this->getStatus(self::STATUS_COMPLETE),
            self::STATUS_CANCEL => $this->getStatus(self::STATUS_CANCEL),
        ];
    }

    public function getUser()
    {
        $this->hasOne(User::className(), ["id" => "user_id"]);
    }
}