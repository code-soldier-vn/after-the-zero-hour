<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \backend\components\helpers\data\datetime\TimeAgo;

/* @var $this yii\web\View */
/* @var $model backend\models\Media */

$timeAgo = new TimeAgo();

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Media'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'path:ntext',
            'created_by',
            'created_at',
            'updated_at',
            'status',
            'del_flag',
        ],
    ]) ?>

</div>
<div class="footer">
    <div class="chart-legend">
        <i class="fa fa-circle text-info"></i> <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id]) ?>
        <i class="fa fa-circle text-danger"></i> <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <hr>
    <div class="stats">
        <i class="ti-reload"></i>
        <?php
        if ($model->updated_at) {
            echo Yii::t('app', 'Updated') . ' ' . $timeAgo->parseTimestamp($model->updated_at);
        }
        ?>
    </div>
</div>