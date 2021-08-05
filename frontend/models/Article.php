<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 * @property int|null $image_id
 * @property int $created_at [int(11)]
 * @property string|null $summary
 *
 * @property Image $image
 * @property Tag[] $tags
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['content', 'summary'], 'string'],
            [['image_id'], 'integer'],
            [['title'], 'string', 'max' => 128],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'image_id' => Yii::t('app', 'Image ID'),
            'summary' => Yii::t('app', 'Summary'),
        ];
    }

    public function beforeSave($insert): bool
    {
        if ( $this->isNewRecord ) {
            $this->created_at = time();
        }
        return parent::beforeSave($insert);
    }

    /**
     * Gets query for [[Image]].
     *
     * @return ActiveQuery
     */
    public function getImage(): ActiveQuery
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * Gets query for [[Tag]]
     *
     * @return ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getTags(): ActiveQuery
    {
        return $this->hasMany(Tag::className(), ["id" => "tag_id"])->viaTable("article_tags", ["article_id" => "id"]);
    }
}
