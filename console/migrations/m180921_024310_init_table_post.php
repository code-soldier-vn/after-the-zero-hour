<?php

use yii\db\Migration;

/**
 * Class m180921_024310_init_table_post
 */
class m180921_024310_init_table_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $options = null;
        if ('mysql' === $this->db->driverName) {
            $options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%post}}", [
            'id' => $this->primaryKey(),
            'post_author' => $this->integer()->notNull(),
            'post_slug' => $this->string(255)->notNull(),
            'post_title' => $this->string(255)->notNull(),
            'post_excerpt' => $this->text(),
            'post_content' => $this->text(),
            'post_parent' => $this->integer()->notNull()->defaultValue(0),
            'post_status' => $this->smallInteger()->defaultValue(1),
            'del_flag' => $this->smallInteger()->defaultValue(0),
            'comment_count' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ], $options);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
