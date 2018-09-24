<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Media');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => [
                    'style' => 'width: 40px;'
                ]
            ],
            'title',
            \backend\components\helpers\grid\columns\ThumbColumn::get('path'),
            'created_by',
            //'status',
            //'del_flag',
            \backend\components\helpers\grid\columns\DateTimeColumn::get('created_at'),
            \backend\components\helpers\grid\columns\DateTimeColumn::get('updated_at'),
            \backend\components\helpers\grid\columns\ActionColumn::get()
        ],
    ]); ?>
</div>
<div class="footer">
    <div class="stats">
        <i class="ti-new-window"></i> <?= Html::a(Yii::t('app', 'Create Media'), ['create']) ?>
    </div>
</div>