<?php

use yii\db\Migration;

/**
 * Class m180920_090005_add_col_level_to_category
 */
class m180920_090005_add_col_level_to_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("{{%category}}", 'level', $this->integer()->defaultValue(0));
    }
}
