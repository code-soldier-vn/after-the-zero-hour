<?php

namespace backend\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class AdminMenuWidget extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $sections = ['contact', 'category', 'post', 'media'];
        $html = '<ul class="nav">';
        $html .= $this->_defaultItem();

        foreach ($sections as $section) {
            $permission = "{$section}-index";
            if (\Yii::$app->user->can($permission)) {
                $html .= '<li>';
                $html .= Html::a('<i class="ti-control-record"></i>' . $section, "/{$section}/index");
                $html .= '</li>';
            }
        }

        $html .= '</ul>';

        return $html;
    }

    private function _defaultItem()
    {
        ob_start();
        ?>
        <li>
            <a href="<?= \Yii::$app->homeUrl; ?>">
                <i class="ti-panel"></i>
                <p><?= \Yii::t('app', 'Dashboard'); ?></p>
            </a>
        </li>
        <?php
        return ob_get_clean();
    }

}