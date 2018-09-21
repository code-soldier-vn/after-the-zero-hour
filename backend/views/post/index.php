<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'post_author',
            'post_slug',
            'post_title',
            'post_excerpt:ntext',
            //'post_content:ntext',
            //'post_parent',
            //'post_status',
            //'del_flag',
            //'comment_count',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<div class="footer">
    <div class="stats">
        <i class="ti-new-window"></i>  <?= Html::a(Yii::t('app', 'Create Post'), ['create'], ['class' => '']) ?>
    </div>
</div>