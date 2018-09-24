<?php

use yii\db\Migration;

/**
 * Class m180920_105346_init_rbac_category
 */
class m180920_105346_init_rbac_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /** @var \yii\rbac\ManagerInterface $auth */
        $auth = Yii::$app->authManager;

        $author = $auth->createRole('author');
        $auth->add($author);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $author);

        $permissions = [
            'category' => ['index', 'view', 'create', 'update', 'delete']
        ];

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

        $auth->assign($admin, 1);
        $auth->assign($author, 2);
    }
}
