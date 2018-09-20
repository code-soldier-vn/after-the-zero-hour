<?php

namespace backend\components\helpers\grid\columns;

use yii\helpers\Html;

class ActionColumn implements ColumInterface
{

    public static function get($col = '')
    {
        return [
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
        ];

    }

}