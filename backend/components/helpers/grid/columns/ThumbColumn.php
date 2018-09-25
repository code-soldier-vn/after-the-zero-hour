<?php

namespace backend\components\helpers\grid\columns;

use backend\models\MediaThumbs;

class ThumbColumn implements ColumInterface
{
    public static function get($col = '')
    {
        return [
            'attribute' => $col,
            'content' => function (\yii\db\ActiveRecord $model) {
                /** @var MediaThumbs $thumb */
                $thumb = $model->thumb;
                if ($thumb) {
                    return sprintf('<img src="%s" alt="%s">', $thumb->path, $model->title);
                } else {
                    return '';
                }
            },
            'headerOptions' => [
                'style' => 'width: 60px'
            ]
        ];
    }
}