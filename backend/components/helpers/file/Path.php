<?php

namespace backend\components\helpers\file;

class Path
{
    private $_uploadDir;

    public function __construct()
    {
        $this->_uploadDir = \Yii::getAlias('@backend/web/uploads/');
    }

    public function getUploadDir()
    {
        return $this->_uploadDir;
    }

    public function getUploadSubDir()
    {
        return $this->getUploadDir() . date('Y/m/d/');
    }

    public function getUploadThumbDir()
    {
        return $this->getUploadSubDir() . 'thumb/';
    }

    public static function generateUniqueFileName($baseName, $extension)
    {
        $affix = substr(sha1($baseName), 0, 6);
        return sprintf('%s-%s.%s', $baseName, $affix, $extension);
    }

    public static function toShortUrl($path)
    {
        return str_replace(\Yii::getAlias('@backend/web/uploads/'), '/uploads/', $path);
    }

    public static function toAbsUrl($path)
    {
        return \Yii::getAlias('@backend/web' . $path);
    }
}