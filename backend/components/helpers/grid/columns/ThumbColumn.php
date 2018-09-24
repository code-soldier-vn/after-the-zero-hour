<?php

namespace backend\components\helpers\grid\columns;

class ThumbColumn implements ColumInterface
{
    public static function get($col = '')
    {
        return [
            'attribute' => $col,
            'content' => function (\yii\db\ActiveRecord $model) {
                return sprintf('<img src="%s" alt="%s">', $model->path, $model->title);
            },
            'headerOptions' => [
                'style' => 'width: 60px'
            ]
        ];
    }
}