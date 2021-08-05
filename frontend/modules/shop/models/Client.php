<?php

namespace frontend\modules\shop\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $patronymic
 *
 * @property Order[] $orders
 * @property int $user_id [int(11)]
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'phone', 'firstname', 'lastname', 'patronymic'], 'string', 'max' => 255],
            [['user_id'], 'default', 'value' => Yii::$app->user->id],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'phone' => 'Phone',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'patronymic' => 'Patronymic',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['client_id' => 'id']);
    }

    public function fullname()
    {
        return "{$this->firstname} {$this->lastname} {$this->patronymic}";
    }
}
