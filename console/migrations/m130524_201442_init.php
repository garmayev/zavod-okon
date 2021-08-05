<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    private $tableName = '{{%user}}';
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        if (is_null(Yii::$app->db->getTableSchema($this->tableName, true))) {
            $this->createTable($this->tableName, [
                'id' => $this->primaryKey(),
                'username' => $this->string()->notNull()->unique(),
                'auth_key' => $this->string(32)->notNull(),
                'password_hash' => $this->string()->notNull(),
                'password_reset_token' => $this->string()->unique(),
                'email' => $this->string()->notNull()->unique(),

                'status' => $this->smallInteger()->notNull()->defaultValue(10),
                'created_at' => $this->integer()->notNull(),
                'updated_at' => $this->integer()->notNull(),
            ], $tableOptions);
        }
    }

    public function down()
    {
        if (Yii::$app->db->getTableSchema($this->tableName)) {
            $this->dropTable($this->tableName);
        }
    }
}
