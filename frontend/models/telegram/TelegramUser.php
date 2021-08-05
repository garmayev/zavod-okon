<?php

namespace frontend\models\telegram;

use dektrium\user\models\User;
use Yii;

/**
 * This is the model class for table "telegram_user".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $username
 * @property int|null $user_id
 *
 * @property User $user
 */
class TelegramUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'telegram_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['user_id'], 'integer'],
            [['first_name', 'last_name', 'username'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser(): \yii\db\ActiveQuery
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function setLink($user_id) {
        $this->user_id = $user_id;
    }

    static public function search($user_id) {
        $model = self::findOne($user_id);
        if ( empty($model) ) {
            return new self(["id" => $user_id]);
        }
        return $model;
    }
}
