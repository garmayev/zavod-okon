<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_action}}`.
 */
class m210520_044106_create_telegram_action_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_action}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'data' => $this->text(),
            'status' => 'ENUM("COMPLETE", "WAIT", "NEW")'
        ]);

        $this->createIndex(
            "idx-telegram_action-user_id",
            '{{%telegram_action}}',
            'user_id'
        );

        $this->addForeignKey(
            "fk-telegram_action-user_id",
            '{{%telegram_action}}',
            'user_id',
            '{{%telegram_user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-telegram_action-user_id', '{{%telegram_user}}');
        $this->dropIndex('idx-telegram_action-user_id', '{{%telegram_user}}');
        $this->dropTable('{{%telegram_action}}');
    }
}
