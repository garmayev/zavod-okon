<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_tags}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%article}}`
 * - `{{%tags}}`
 */
class m210608_041402_create_junction_table_for_article_and_tags_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article_tags}}', [
            'article_id' => $this->integer(),
            'tags_id' => $this->integer(),
            'PRIMARY KEY(article_id, tags_id)',
        ]);

        // creates index for column `article_id`
        $this->createIndex(
            '{{%idx-article_tags-article_id}}',
            '{{%article_tags}}',
            'article_id'
        );

        // add foreign key for table `{{%article}}`
        $this->addForeignKey(
            '{{%fk-article_tags-article_id}}',
            '{{%article_tags}}',
            'article_id',
            '{{%article}}',
            'id',
            'CASCADE'
        );

        // creates index for column `tags_id`
        $this->createIndex(
            '{{%idx-article_tags-tags_id}}',
            '{{%article_tags}}',
            'tags_id'
        );

        // add foreign key for table `{{%tags}}`
        $this->addForeignKey(
            '{{%fk-article_tags-tags_id}}',
            '{{%article_tags}}',
            'tags_id',
            '{{%tags}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%article}}`
        $this->dropForeignKey(
            '{{%fk-article_tags-article_id}}',
            '{{%article_tags}}'
        );

        // drops index for column `article_id`
        $this->dropIndex(
            '{{%idx-article_tags-article_id}}',
            '{{%article_tags}}'
        );

        // drops foreign key for table `{{%tags}}`
        $this->dropForeignKey(
            '{{%fk-article_tags-tags_id}}',
            '{{%article_tags}}'
        );

        // drops index for column `tags_id`
        $this->dropIndex(
            '{{%idx-article_tags-tags_id}}',
            '{{%article_tags}}'
        );

        $this->dropTable('{{%article_tags}}');
    }
}
