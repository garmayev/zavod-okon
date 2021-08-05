<?php


namespace frontend\models;

use Imagine\Image\Box;

/**
 * Class Product
 * @package frontend\models
 * @property int $id [int(11)]
 *
 * @property string $title [varchar(128)]
 * @property string $description
 * @property int $image [int(11)]
 * @property int $category_id [int(11)]
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
	public $file;

    public static function tableName()
    {
        return "{{%main_product}}";
    }

    public function rules()
    {
	    return [
	    	[["title", "category_id"], "required"],
		    [["title", "description", "image"], "string"],
		    [["category_id"], "integer"],
	    ];
    }

	public function upload() {
    	if ( isset($this->file) ) {
		    $folder = dirname(dirname(__DIR__)) . "/frontend/web";
		    $this->file->saveAs($folder . '/img/uploads/full/' . strtolower($this->file->baseName) . '.' . strtolower($this->file->extension));
		    $this->image = '/img/uploads/full/' . strtolower($this->file->baseName) . '.' . strtolower($this->file->extension);
	    }
    	return true;
    }

	public function getCategory() {
        return $this->hasOne(Category::tableName(), ["id" => "category_id"]);
    }
}