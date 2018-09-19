<?php

use yii\db\Migration;

/**
 * Class m180918_104642_init_category
 */
class m180918_104642_init_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tblOptions = null;
        if ('mysql' === $this->db->driverName) {
            $tblOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable("{{%category}}", [
            'id' => $this->primaryKey(),
            'slug' => $this->string()->notNull()->unique(),
            'name' => $this->string()->notNull(),
            'parent' => $this->smallInteger()->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tblOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("{{%category}}");
    }
}
