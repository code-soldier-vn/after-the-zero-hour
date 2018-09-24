<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;

?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="<?= Yii::$app->homeUrl; ?>">Dashboard</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php if (!\Yii::$app->user->isGuest) : ?>
                    <li>
                        <?php
                        $item = Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'btn btn-success btn-fill logout']
                            )
                            . Html::endForm();
                        echo $item;
                        ?>
                    </li>

                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>