<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m210505_035402_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'address' => $this->string(),
            'phone' => $this->string(),
            'firstname' => $this->string(),
            'lastname' => $this->string(),
            'patronymic' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%client}}');
    }
}
