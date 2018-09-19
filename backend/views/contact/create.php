<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Contact */

$this->title = Yii::t('app', 'Create Contact');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="header clearfix">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="title"><?= Html::encode($this->title) ?></h4>
            </div>
        </div>
    </div>
    <div class="content table-responsive">
        <div class="contact-index">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>