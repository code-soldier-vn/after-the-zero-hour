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

        <ul class="nav">
            <li>
                <a href="<?= Yii::$app->homeUrl; ?>">
                    <i class="ti-panel"></i>
                    <p><?= \Yii::t('app', 'Dashboard'); ?></p>
                </a>
            </li>
            <li>
                <a href="/contact/index">
                    <i class="ti-email"></i>
                    <p><?= \Yii::t('app', 'Contact'); ?></p>
                </a>
            </li>
            <li>
                <a href="/category/index">
                    <i class="ti-archive"></i>
                    <p><?= \Yii::t('app', 'Category'); ?></p>
                </a>
            </li>
        </ul>
    </div>
</div>