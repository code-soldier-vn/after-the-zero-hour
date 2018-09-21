<?php

use \yii\helpers\Html;
use \yii\grid\GridView;
use \backend\components\helpers\grid\columns\ActionColumn;
use \backend\components\helpers\grid\columns\DateTimeColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <?= GridView::widget([
        'showFooter' => false,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => [
                    'style' => 'width: 40px;'
                ]
            ],
            'slug',
            'name',
            [
                'attribute' => 'parent',
                'content' => function ($model, $id) {
                    $flatList = \backend\models\Category::getFlatList();
                    return isset($flatList[$model->parent]) ? $flatList[$model->parent] : '';
                }
            ],
            'status',
            'level',
            DateTimeColumn::get('created_at'),
            DateTimeColumn::get('updated_at'),
            ActionColumn::get()
        ],
    ]); ?>
</div>
<div class="footer">
    <div class="stats">
        <i class="ti-new-window"></i> <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => '']) ?>
    </div>
</div>