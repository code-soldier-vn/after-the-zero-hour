<?php
/* @var $this \yii\web\View */

use yii\helpers\Html;

?>

<div class="sidebar" data-background-color="black" data-active-color="danger">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">Code Soldier</a>
        </div>

        <?php
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }
        ?>

        <?= \backend\components\widgets\AdminMenuWidget::widget() ?>

    </div>
</div>