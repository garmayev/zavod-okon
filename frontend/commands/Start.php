<?php


namespace frontend\commands;


use frontend\models\Profile;

class Start extends \aki\telegram\base\Command
{
    public static function run($command, callable $fun)
    {
        $telegram = \Yii::$app->telegram;
        $data = json_decode("php://input");
        $message = ($telegram->input->message) ? $telegram->input->message : $data["callback_query"];
        $profile = Profile::findOne(["telegram_chat_id" => $message->from->id]);
        if ( $profile ) {
            $keyboard = [
                [
                    ["text" => "Список заявок", "callback_data" => "/requests"],
                ]
            ];
        } else {
            $keyboard = [
                [
                    ["text" => \Yii::t("user", "Sign in"), "callback_data" => "/signin"],
                ], [
                    ["text" => \Yii::t("user", "Sign up"), "callback_data" => "/signup"],
                ],
            ];
        }
        $telegram->sendMessage([
            "chat_id" => $message->from->id,
            "text" => "Welcome!",
            "reply_markup" => json_encode([
                "inline_keyboard" => $keyboard
            ])
        ]);
        parent::run($command, $fun);
    }
}