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
    <p>
        <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'showFooter' => false,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
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
