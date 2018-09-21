<?php

use yii\db\Migration;

/**
 * Class m180921_043057_init_rbac_for_post
 */
class m180921_043057_init_rbac_for_post extends Migration
{
    public function safeUp()
    {
        $this->addColumn("{{%post}}", 'level', $this->integer()->defaultValue(0));

        $auth = Yii::$app->authManager;

        $permissions = [
            'post' => ['index', 'view', 'create', 'update', 'delete']
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
