<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m210504_005432_create_product_table extends Migration
{
    public $tableName = '{{%product}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'price' => $this->integer(),
            'thumb' => $this->string(256)
        ]);
        $this->insert($this->tableName, ['title' => 'Кирпич классический', 'description' => 'Кирпич классический, для битья морды лица', 'price' => 1000]);
        $this->insert($this->tableName, ['title' => 'Сковорода', 'description' => 'Сковорода чугунная, для встреч пьяного супруга', 'price' => 1200]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
