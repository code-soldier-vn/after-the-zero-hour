<?php

namespace backend\components\helpers\data\datetime;

use \Westsworld\TimeAgo as WestsworldTimeAgo;

class TimeAgo
{
    private $_timeAgo;

    public function __construct()
    {
        $this->_timeAgo = new WestsworldTimeAgo();
    }


    public function parseTimestamp($timestamp, $fromString = true)
    {
        $date = date('Y/m/d H:i:s', $timestamp);
        return $fromString ? $this->_timeAgo->inWordsFromStrings($date) : $this->_timeAgo->inWords($date);
    }
}