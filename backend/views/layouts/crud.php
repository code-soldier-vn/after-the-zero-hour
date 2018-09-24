<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<?= $this->render('@app/views/layouts/_header') ?>

<div class="card">
    <div class="header clearfix">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="title"><?= \yii\helpers\Html::encode($this->title) ?></h4>
            </div>
        </div>
    </div>
    <div class="content table-responsive">
        <?= $content ?>
    </div>
</div>

<?= $this->render('@app/views/layouts/_footer') ?>
<?php $this->endPage() ?>
