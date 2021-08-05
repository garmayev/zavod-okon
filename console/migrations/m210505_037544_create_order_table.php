<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m210505_037544_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'session_id' => $this->string(),
            'client_id' => $this->integer()
        ]);

        $this->createIndex(
            '{{idx-order_client_id}}',
            '{{%order}}',
            'client_id'
        );

        $this->addForeignKey(
            '{{%fk-order_client_id}}',
            '{{%order}}',
            'client_id',
            '{{%client}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
