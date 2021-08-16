<?php


namespace frontend\controllers;


use dektrium\user\helpers\Password;
use dektrium\user\models\User;
use frontend\models\telegram\Action;
use frontend\models\telegram\TelegramUser;
use Yii;

class TelegramController extends \yii\rest\Controller
{
    public function actionSignin($edit, $data = "", $action_id = null): bool
    {
        $data = json_decode($data, true);
        $text = "Для авторизации вы должны указать ваш _*email*_ и пароль\n\nДля начала отправьте ваш *email*:";
        Yii::error($data["chat"]);
        $sender = $this->findOrCreate($data["chat"]);
        $action = Action::findOne($action_id);
        if (empty($action)) {
            $action = new Action(["chat_id" => $data["chat"]["id"]]);
            $action->action_name = "signin";
            if ($action->save()) {
                Yii::$app->telegram->sendMessage([
                    "chat_id" => $sender->id,
                    "text" => $text
                ]);
                return true;
            }
            return false;
        } else {
            $argv = unserialize($action->value);
            if ($argv === false) $argv = [];
            switch (count($argv)) {
                case 0:
                    $argv["email"] = $data["text"];
                    $text = "Отлично, теперь введите пароль";
                    $action->value = serialize($argv);
                    $action->save();
                    Yii::$app->telegram->sendMessage([
                        "chat_id" => $sender->id,
                        "text" => $text
                    ]);
                    return true;
                    break;
                case 1:
                    $argv["secret"] = $data["text"];
                    if (($user = $this->checkUser($argv)) !== null) {
                        $sender->user_id = $user->id;
                        $sender->save();
                        $action->delete();
                        $text = "Вы успешно авторизовались";
                        Yii::$app->telegram->sendMessage([
                            "chat_id" => $sender->id,
                            "text" => $text
                        ]);
                        Yii::$app->runAction("telegram/start", ["edit" => false, "data" => json_encode($data)]);
                        return true;
                    } else {
                        $action->value = null;
                        $action->save();
                        $text = "Ошибка авторизации!\n";
                        Yii::$app->telegram->sendMessage([
                            "chat_id" => $sender->id,
                            "text" => $text
                        ]);
                        return false;
                    }
                    break;
                default:

                    break;
            }
        }
        Yii::$app->telegram->sendMessage([
            "chat_id" => $sender->id,
            "text" => $text
        ]);
    }

    public function actionStart($edit, $data = null)
    {
        $data = json_decode($data, true);
        $sender = $this->findOrCreate(($edit) ? $data["chat"] : $data["from"]);

        if (is_null($sender->user_id)) {
            $text = "Для продолжения работы вы должны авторизоваться и должны быть зарегистрированы на сайте";
            $keyboard = [[
                [
                    "text" => \Yii::t("user", "Sign in"),
                    "callback_data" => "/signin"
                ], [
                    "text" => \Yii::t("user", "Sign up"),
                    "url" => "https://{$_SERVER['SERVER_NAME']}/user/register"
                ]
            ]];
        } else {
            $text = "Добро пожаловать в нашу систему управления";
            $keyboard = [[
                [
                    "text" => \Yii::t("user", "Profile"),
                    "callback_data" => "/whoiam"
                ], [
                    "text" => \Yii::t("user", "Logout"),
                    "callback_data" => "/logout"
                ]
            ]];
            $user = User::findOne($sender->user_id);
            $duration = 0;
            Yii::$app->user->switchIdentity($user, $duration); //Change the current user.
            if ( Yii::$app->user->can('master') ) {
                $keyboard = array_merge($keyboard,
                    [
                        [["text" => "Текущие заяки", "callback_data" => "/issues"]]
                    ]);
            }
        }

        $keyboard = array_merge($keyboard,
            [
                [
                    ["text" => "About us","callback_data" => "/about",]
                ], [
                    ["text" => "Help", "callback_data" => "/help"]
                ]
            ]);

        if ( $edit ) {
            Yii::$app->telegram->editMessageText([
                "chat_id" => $sender->id,
                "message_id" => $data["message_id"],
                "text" => $text,
                "reply_markup" => json_encode([
                    "inline_keyboard" => $keyboard,
                ]),
            ]);
        } else {
            Yii::$app->telegram->sendMessage([
                "chat_id" => $sender->id,
                "text" => $text,
                "reply_markup" => json_encode([
                    "inline_keyboard" => $keyboard,
                ]),
            ]);
        }
    }

    public function actionHelp($edit, $data = null) {
        $data = json_decode($data, true);
        $sender = $this->findOrCreate($data["chat"]);
        $keyboard = [
            [
                ["text" => "Назад", "callback_data" => "/start"]
            ]
        ];
        if ( $edit ) {
            Yii::$app->telegram->editMessageText([
                "chat_id" => $sender->id,
                "message_id" => $data["message_id"],
                "text" => "Система разработана специально для компании 'Завод окон' г. Улан-Удэ",
                "reply_markup" => json_encode([
                    "inline_keyboard" => $keyboard
                ])
            ]);
        } else {
            Yii::$app->telegram->sendMessage([
                "chat_id" => $sender->id,
                "text" => "Система разработана специально для компании 'Завод окон' г. Улан-Удэ",
                "reply_markup" => json_encode([
                    "inline_keyboard" => $keyboard
                ])
            ]);
        }
    }

    public function actionCallback()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data["message"]) && $data["message"]["text"][0] === "/") {
            Yii::$app->runAction("telegram{$data['message']['text']}", ["edit" => false, "data" => json_encode($data["message"])]);
        } elseif (isset($data["callback_query"])) {
            Yii::$app->runAction("telegram{$data['callback_query']['data']}", ["edit" => true, "data" => json_encode($data["callback_query"]["message"])]);
        } else {
            $action = Action::find()->where(["chat_id" => $data["message"]["chat"]["id"]])->orderBy(['id' => SORT_DESC])->one();
            if ( $action ) {
                Yii::$app->runAction("telegram/{$action->action_name}", ["edit" => false, "data" => json_encode($data["message"]), "action_id" => $action->id]);
            }
        }
    }

    public function actionWhoiam($edit, $data = "") {
        $data = json_decode($data, true);
        $sender = $this->findOrCreate($data["chat"]);
        if ( $edit ) {
            Yii::$app->telegram->editMessageText([
                "chat_id" => $sender->id,
                "message_id" => $data["message_id"],
                "text" => "first_name: {$sender->first_name}\nlast_name: {$sender->last_name}\nusername: {$sender->username}",
                "reply_markup" => json_encode([
                    "inline_keyboard" => [
                        [
                            ["text" => "Назад", "callback_data" => "/start"]
                        ]
                    ]
                ])
            ]);
        }
    }

    public function actionAbout($edit, $data = "") {
        $telegram = Yii::$app->telegram;
        $data = json_decode($data, true);
        $sender = $this->findOrCreate($data["chat"]);
        if ( $edit ) {
            $telegram->editMessageText([
                "chat_id" => $sender->id,
                "message_id" => $data["message_id"],
                "text" => "*AMG Company*\nАдрес: г. Улан-Удэ, ул. Революции 1905г, д 42\nКонтактный номер: +79242561056",
                "reply_markup" => json_encode([
                    "inline_keyboard" => [
                        [
                            ["text" => "Назад", "callback_data" => "/start"]
                        ]
                    ]
                ])
            ]);
        }
    }

    public function actionLogout($edit, $data = "")
    {
        $json = json_decode($data, true);
//        Yii::error($json);
        $user = TelegramUser::findOne(["id" => $json["chat"]["id"]]);
        $user->user_id = null;
        $user->save();
        Yii::$app->runAction("telegram/start", ["edit" => true, "data" => $data]);
    }

    public function actionEmail()
    {

    }

    public function actionIssue()
    {
        
    }

    private function findOrCreate($data): TelegramUser
    {
        $user = TelegramUser::search($data["id"]);
        if (empty($user->first_name)) {
            $user->first_name = $data["first_name"];
            $user->last_name = (isset($data["last_name"])) ? $data["last_name"] : "";
            $user->username = (isset($data["username"])) ? $data["username"] : "";
            $saved = $user->save();
        }
        return $user;
    }

    private function checkUser($params): ?User
    {
        $user = User::findOne(["email" => $params["email"]]);
        if ($user && Password::validate($params["secret"], $user->password_hash)) {
            return $user;
        } else {
            return null;
        }
    }

    public function actionIndex()
    {
        Yii::error(Yii::$app->telegram->input->callback_query);
    }
}