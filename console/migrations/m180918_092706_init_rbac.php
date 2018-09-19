<?php

use yii\db\Migration;

/**
 * Class m180918_092706_init_rbac
 */
class m180918_092706_init_rbac extends Migration
{
    /**
     * @return bool|void
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        /** @var \yii\rbac\ManagerInterface $auth */
        $auth = Yii::$app->authManager;

        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update a post';
        $auth->add($updatePost);

        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        $auth->assign($admin, 1);
        $auth->assign($author, 2);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180918_092706_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
