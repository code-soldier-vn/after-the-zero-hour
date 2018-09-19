<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="header clearfix">
        <div class="row">
            <div class="col-xs-9">
                <h4 class="title"><?= Html::encode($this->title) ?></h4>
            </div>
            <div class="col-xs-3 text-right">
                <?= Html::a(Yii::t('app', 'Create Contact'), ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <div class="content table-responsive">
        <div class="contact-index">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    #['class' => \yii\grid\SerialColumn::className()],
//                    [
//                        'class' => \yii\grid\CheckboxColumn::className(),
//                        'headerOptions' => [
//                            'style' => 'width: 5px;'
//                        ]
//                    ],
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
                    [
                        'attribute' => 'created_at',
                        'content' => function (\backend\models\Contact $model) {
                            return date('d/m/Y H:i:s', $model->created_at);
                        },
                        'headerOptions' => [
                            'style' => 'width: 10%;'
                        ]
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'headerOptions' => [
                            'style' => 'width: 140px;'
                        ],
                        'buttons' => [
                            'view' => function ($url) {
                                return Html::a('<span class="ti-eye"></span>', $url, ['class' => 'btn btn-sm btn btn-success']);
                            },
                            'update' => function ($url) {
                                return Html::a('<span class="ti-pencil"></span>', $url, ['class' => 'btn btn-sm btn btn-primary']);
                            },
                            'delete' => function ($url) {
                                return Html::a('<span class="ti-trash"></span>', $url, [
                                    'data' => [
                                        'method' => 'post',
                                        'confirm' => \Yii::t('app', 'Are you sure?'),
                                    ],
                                    'class' => 'btn btn-sm btn btn-danger'
                                ]);
                            }
                        ]
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>



