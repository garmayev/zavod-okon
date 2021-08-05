<?php


namespace frontend\models;

/**
 * Class Profile
 * @package frontend\models
 *
 * @property string $phone [varchar(16)]
 * @property string $area [varchar(512)]
 * @property int $telegram_chat_id [int(11)]
 */
class Profile extends \dektrium\user\models\Profile
{
    public function rules()
    {
        $rules = parent::rules();
        return $rules[] = [
            [["phone"], "string"],
            [["area"], "string"],
            [["telegram_chat_id"], "integer"],
        ];
    }

    public function attributeLabels(): array
    {
        $labels = parent::attributeLabels();
        return $labels[] = [
            "phone" => \Yii::t("app", "Phone")
        ];
    }
}