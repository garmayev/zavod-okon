<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dealer}}`.
 */
class m210430_055650_create_dealer_table extends Migration
{
    private $tableName = "{{%dealer}}";
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(128),
            'pass' => $this->string(128),
            'phone' => $this->string(16),
            'user_id' => $this->integer(),
        ]);
        $this->createIndex(
            'idx-dealer-user_id',
            $this->tableName,
            'user_id');
        $this->addForeignKey(
            'fk-dealer-user_id',
            $this->tableName,
            'user_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-dealer-user_id', $this->tableName);
        $this->dropIndex('idx-dealer-user_id', $this->tableName);
        $this->dropTable('{{%dealer}}');
    }
}
