<?php

namespace backend\components\assets;

use yii\base\Component;

class ImageResize extends Component
{
    public function getThumb()
    {
        return [
            'w' => 60,
            'h' => 60
        ];
    }
}