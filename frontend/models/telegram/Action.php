<?php


namespace frontend\models\telegram;

use garmayev\telegram\models\telegram\User;
use yii\db\ActiveQuery;

/**
 * Class Action
 * @package garmayev\telegram\models
 *
 * @property int $id [int(11)]
 * @property int $user_id [int(11)]
 *
 * @property User $user
 * @property int $chat_id [int(11)]
 * @property string $value [varchar(512)]
 * @property string $action_name [varchar(128)]
 * @property string $name [varchar(256)]
 */
class Action extends \yii\db\ActiveRecord
{
    public $name;

    public static function tableName(): string
    {
        return "{{%telegram_action}}";
    }

    public function rules(): array
    {
        return [
            [["chat_id"], "required"],
            [["chat_id"], "integer"],
            [["name", "value"], "string"],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            "user_id" => "User ID",
            "data" => "Data",
            "status" => "Status"
        ];
    }

    public function getUser(): ActiveQuery
    {
        return $this->hasOne(TelegramUser::class, ["id" => "user_id"]);
    }
}