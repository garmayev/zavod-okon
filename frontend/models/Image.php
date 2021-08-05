<?php


namespace frontend\models;

use Imagine\Image\Box;

/**
 * Class Image
 * @package frontend\models
 * @property int $id [int(11)]
 *
 * @property string $thumbs [varchar(255)]
 * @property string $image [varchar(255)]
 * @property string $title [varchar(32)]
 * @property string $description
 * @property int $type [int(11)]
 * @property int $favourite [int(11)]
 * @property string $full [varchar(255)]
 * @property string $thumbnail [varchar(255)]
 * @property int $created_at [int(11)]
 */
class Image extends \yii\db\ActiveRecord
{
    const TYPE_GALLERY = 0;
    const TYPE_SINGLE = 1;

    public $file;

    public static function tableName(): string
    {
        return "{{%image}}";
    }

    public function rules(): array
    {
        return [
            [["thumbs", "image"], "required"],
            [['favourite'], 'integer'],
            [["title", "description"], "default", "value" => ""],
            [["type"], "default", "value" => self::TYPE_GALLERY],
            [["file"], "file", "skipOnEmpty" => true],
        ];
    }

    public function beforeDelete()
    {

        return (unlink($this->thumbs) && unlink($this->image));
    }

    public function upload()
    {
        $folder = dirname(dirname(__DIR__)) . "/frontend/web";
        $this->file->saveAs($folder . '/img/uploads/full/' . strtolower($this->file->baseName) . '.' . strtolower($this->file->extension) );
        $this->image = '/img/uploads/full/' . strtolower($this->file->baseName) . '.' . strtolower($this->file->extension);
        \yii\imagine\Image::thumbnail($folder . "/img/uploads/full/" . strtolower($this->file), 300, 240)
            ->resize(new Box(300, 240))
            ->save($folder . '/img/uploads/thumbnails/' . strtolower($this->file->baseName) . '.' . strtolower($this->file->extension), ["quality" => 70]);
        $this->thumbs = '/img/uploads/thumbnails/' . strtolower($this->file->baseName) . '.' . strtolower($this->file->extension);
        return true;
    }
}