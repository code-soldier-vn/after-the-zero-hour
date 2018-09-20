<?php

namespace backend\components\helpers\grid\columns;

class DateTimeColumn implements ColumInterface
{

    public static function get($col = '')
    {
        return [
            'attribute' => $col,
            'content' => function (\yii\db\ActiveRecord $model) {
                return empty($model->created_at) ? '' : date('d/m/Y H:i:s', $model->created_at);
            },
            'headerOptions' => [
                'style' => 'width: 10%;'
            ]
        ];
    }
}