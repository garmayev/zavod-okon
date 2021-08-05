<?php


namespace frontend\models;

use Imagine\Image\Box;
use yii\db\ActiveQuery;

/**
 * Class Category
 * @package frontend\models
 *
 * @property int $id [int(11)]
 * @property string $title [varchar(128)]
 * @property string $description
 * @property string $thumbs [varchar(255)]
 *
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
	public $file;

    public static function tableName(): string
    {
        return "{{%category}}";
    }

    public function rules(): array
    {
        return [
            [["title", "description"], "required"],
            [["title", "description"], "string"],
	        [["thumbs"], "string"]
        ];
    }

    public function upload()
    {
	    $folder = dirname(dirname(__DIR__)) . "/frontend/web";
	    $this->file->saveAs($folder . '/img/uploads/full/' . strtolower($this->file->baseName) . '.' . strtolower($this->file->extension) );
	    \yii\imagine\Image::thumbnail($folder . "/img/uploads/full/" . strtolower($this->file), 300, 240)
		    ->resize(new Box(300, 240))
		    ->save($folder . '/img/uploads/thumbnails/' . strtolower($this->file->baseName) . '.' . strtolower($this->file->extension), ["quality" => 70]);
	    $this->thumbs = '/img/uploads/thumbnails/' . strtolower($this->file->baseName) . '.' . strtolower($this->file->extension);
	    return true;

    }

    /**
     * @return ActiveQuery
     */
    public function getProducts(): ActiveQuery
    {
        return $this->hasMany(Product::className(), ["category_id" => "id"]);
    }
}