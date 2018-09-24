<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Contact */

$this->title = Yii::t('app', 'Update Contact: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
