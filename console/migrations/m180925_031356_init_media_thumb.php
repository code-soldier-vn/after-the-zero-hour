<?php

use yii\db\Migration;

/**
 * Class m180925_031356_init_media_thumb
 */
class m180925_031356_init_media_thumb extends Migration
{
    const TABLE_NAME = "{{%media_thumbs}}";

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $options = null;

        if ('mysql' === $this->db->driverName) {
            $options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'media_id' => $this->integer()->notNull(),
            'size' => $this->string(20)->defaultValue('thumb'),
            'path' => $this->text(),
        ], $options);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }

}
