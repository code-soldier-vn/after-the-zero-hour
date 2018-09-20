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
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'slug',
            'name',
            'parent',
            'status',
            DateTimeColumn::get('created_at'),
            ActionColumn::get()
        ],
    ]); ?>
</div>
