<?php


namespace frontend\modules\dealers\models;


class Order extends \yii\base\Model
{
    public $code;
    public $docdate;
    public $ordno;
    public $depno;
    public $comment;
    public $isready;
    public $syma;
    public $discount;
    public $total;
    public $status;
    public $status_name;
    public $id_doc;

}