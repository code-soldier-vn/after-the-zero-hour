<?php

use yii\db\Migration;

/**
 * Class m180924_044005_init_tbl_media
 */
class m180924_044005_init_tbl_media extends Migration
{
    const TABLE_NAME = "{{%media}}";

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->_createTable();
        $this->_appendPermissions();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }

    private function _createTable()
    {
        $options = null;
        if ('mysql' == $this->db->driverName) {
            $options = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        }

        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'path' => $this->text(),
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->smallInteger(),
            'del_flag' => $this->smallInteger()->defaultValue(0)
        ], $options);
    }

    private function _appendPermissions()
    {
        $auth = Yii::$app->authManager;

        $permissions = [
            'media' => ['index', 'view', 'create', 'update', 'delete']
        ];

        $author = $auth->getRole('author');
        $admin = $auth->getRole('admin');

        foreach ($permissions as $controller => $actions) {
            foreach ($actions as $action) {
                $permission = $auth->createPermission(sprintf('%s-%s', $controller, $action));
                $auth->add($permission);

                if (in_array($action, ['index', 'view', 'create'])) {
                    $auth->addChild($author, $permission);
                } else {
                    $auth->addChild($admin, $permission);
                }
            }
        }
    }
}
