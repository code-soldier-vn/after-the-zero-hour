<?php

use yii\db\Migration;

/**
 * Class m180921_022518_init_rbac_contact
 */
class m180921_022518_init_rbac_contact extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $permissions = [
            'contact' => ['index', 'view', 'create', 'update', 'delete']
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
