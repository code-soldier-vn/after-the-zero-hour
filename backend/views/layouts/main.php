<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<?= $this->render('@app/views/layouts/_header') ?>

<?= $content ?>

<?= $this->render('@app/views/layouts/_footer') ?>
<?php $this->endPage() ?>
