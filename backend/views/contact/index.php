<?php

use \yii\helpers\Html;
use \yii\grid\GridView;
use \backend\components\helpers\grid\columns\ActionColumn;
use \backend\components\helpers\grid\columns\DateTimeColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
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
            [
                'attribute' => 'name',
                'headerOptions' => [
                    'style' => 'width: 10%;'
                ]
            ],
            [
                'attribute' => 'email',
                'headerOptions' => [
                    'style' => 'width: 10%;'
                ]
            ],
            [
                'attribute' => 'subject',
                'headerOptions' => [
                    'style' => 'width: 10%;'
                ]
            ],
            'body:ntext',
            DateTimeColumn::get('created_at'),
            DateTimeColumn::get('updated_at'),
            ActionColumn::get()
        ]
    ]); ?>
</div>
<div class="footer">
    <div class="stats">
        <i class="ti-new-window"></i> <?= Html::a(Yii::t('app', 'Create Contact'), ['create'], ['class' => '']) ?>
    </div>
</div>
