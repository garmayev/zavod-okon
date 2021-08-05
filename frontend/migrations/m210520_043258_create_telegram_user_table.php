<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_user}}`.
 */
class m210520_043258_create_telegram_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_user}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(),
            'last_name' => $this->string()->null(),
            'username' => $this->string()->null(),
            'user_id' => $this->integer()->null()
        ]);

        $this->createIndex(
            "idx-telegram_user-user_id",
            "{{%telegram_user}}",
            "user_id"
        );

        $this->addForeignKey(
            "fk-telegram_user-user_id",
            "{{%telegram_user}}",
            "user_id",
            "{{%user}}",
            "id",
            "CASCADE",
            "CASCADE"
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey("fk-telegram_user-user_id", "{{%telegram_user}}");
        $this->dropIndex("idx-telegram_user-user_id", "{{%telegram_user}}");
        $this->dropTable('{{%telegram_user}}');
    }
}
