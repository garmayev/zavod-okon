<?php

namespace frontend\modules\shop\models;

use yii2mod\cart\models\CartItemInterface;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * Class Product
 * @package frontend\modules\shop\models
 *
 * @property-read int $price
 * @property-read void $title
 * @property int $id [int(11)]
 * @property string $description [varchar(255)]
 * @property string $thumb
 */
class Product extends \yii\db\ActiveRecord implements CartItemInterface
{
	public $file;

    use CartPositionTrait;

    public function rules()
    {
        return [
            [['price', 'title'], 'required'],
            [['title', 'description'], 'string'],
            [['price'], 'integer'],
        ];
    }

    public function getLabel()
    {
        return $this->title;
    }

    public function getUniqueId()
    {
        return $this->id;
    }

    public function getPrice():int
    {
        return $this->price;
    }

	public function upload(): bool
	{
		if ( isset($this->file) ) {
			$folder = dirname(dirname(__DIR__)) . "/../../frontend/web";
			$this->file->saveAs($folder . '/img/uploads/full/' . strtolower($this->file->baseName) . '.' . strtolower($this->file->extension));
			$this->thumb = '/img/uploads/full/' . strtolower($this->file->baseName) . '.' . strtolower($this->file->extension);
		}
		return true;
	}
}