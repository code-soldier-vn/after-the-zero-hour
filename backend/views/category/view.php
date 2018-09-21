<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \backend\components\helpers\data\datetime\TimeAgo;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$timeAgo = new TimeAgo();

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slug',
            'name',
            [
                'attribute' => 'parent',
                'value' => function ($model) {
                    $flatList = \backend\models\Category::getFlatList();
                    return isset($flatList[$model->parent]) ? $flatList[$model->parent] : '';
                }
            ],
            'status',
            'level',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
<div class="footer">
    <div class="chart-legend">
        <i class="fa fa-circle text-info"></i> <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => '']) ?>
        <i class="fa fa-circle text-danger"></i> <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => '',
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